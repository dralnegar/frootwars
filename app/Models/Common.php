<?php 

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Common {
    public static function dbLogger() {
        // db_logging was added set as a channel is /config/logging.php
        DB::listen(function($query) {
            Log::channel('db_logging')->info($query->sql);
        });    
    }

    public static function decode_html(String $string) {
        $string = str_replace('<', '&lt;', $string);
        $string = str_replace('>', '&gt;',  $string);
        return $string;
    }
}