<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
      </a>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="off"/>
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="off"/>
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
      </div>
      
      <x-button class="mt-8 float-left bg-blue-600 hover:bg-blue-900 mr-9">
        <a href="{{ route('login.guest') }}" class="text-block-700">
          ゲストログイン
        </a>
      </x-button>

      <div class="flex items-center  mt-8">
        <a class="underline text-sm text-gray-900 hover:text-gray-900" href="{{ route('login') }}">
          {{ __('ログインする') }}
        </a>

        <x-button class="block  ml-10">
          {{ __('ユーザー登録') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>