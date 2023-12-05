@props(['email', 'password'])
<x-layout>
    <x-slot name="content">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10">
                <x-panel>
                    <h1 class="text-center font-bold text-xl">Login!</h1>
                    <form method="POST" action="/login" class="mt-10">
                        @csrf
                        <x-form.input name="email" label='Email' placeholder="Please enter your email" :value="$email" autocomplete="username" />
                        <x-form.input name="password" label='Password' placeholder="Please enter your password" type='password' autocomplete="existing-password" :value="$password" />
                        <x-form.submit />
                    </form>
                    @if ($errors->any)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-800 text-xs mt-2 ">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </x-panel>
            </main>
        </section>
    </x-slot>
</x-layout>
