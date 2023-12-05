<?php 

namespace App\Services;

use MailchimpMarketing\ApiClient;


class MailchimpNewsletter implements Newsletter
{
   
    public function __construct(protected APICLient $client) 
    {
    }
    
    public function subscribe(String $email, String $list = null) {

        $list ??= config('services.mailchimp.lists.subscribers');
        
        $statuses = ['subscribed', 'unsubscribed', 'cleaned', 'pending', 'transactional'];
        // $response = $client->lists->getList($list);
        // $response = $client->lists->getListMembersInfo($list);
      
        $memberList = $this->client->lists->getListMembersInfo($list);
        $withinList = false;
        foreach($memberList->members as $member) {
            if ($member->email_address == $email) {
                $withinList = true;
            }
        }

        if ($withinList == false) {
            try {
                $response = $this->client->lists->addListMember($list, [
                    'email_address' => $email,
                    'status' => $statuses[0]
            
                ]);
                return true;
            } catch (\Exception $e) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'email' => 'This email could not be added to our newsletter list.'
                ]);
            }

        } else {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'You are already signed up for our newsletter.'
            ]);
        }

    }
}