@props(['name', 'username', 'email', 'password'])
<x-layout>
    <x-slot name="content">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10">
                <x-panel>
                    <h1 class="text-center font-bold text-xl">Register!</h1>
                    <form method="POST" action="/register" class="mt-10">
                        @csrf
                        <x-form.input name="name" label='Name' placeholder="Please enter your name" :value="$name" />
                        <x-form.input name="username" label='Username' placeholder="Please enter your username" :value="$username"/>
                        <x-form.input name="email" label='Email' type='email' placeholder="Place enter your email address" :value="$email" autocomplete="username"/>
                        <x-form.input name="password" label='Password' type='password' placeholder="Please enter your password" :value="$password" autocomplete="new-password"/>
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
