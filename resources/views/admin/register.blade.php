@extends('layouts.main')


<x-guest-layout>
    <x-jet-authentication-card>
       

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.register.submit') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nome') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <br>

            <div class="mb-3">
            <label for="user_type_id" class="form-label">User Type</label>
            <select name="user_type_id" class="form-control" id="user_type_id" required>
                <option value="1">Administrador</option>
                <option value="3">Técnico</option>
                <option value="2">Cliente</option>
             
            </select>
        </div>


            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já registado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
