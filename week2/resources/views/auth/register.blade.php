<x-guest-layout>
    <script src="{{ asset('js/user/register.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('이름')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                          autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <!-- Nickname -->
        <div class="mt-4">
            <x-input-label for="nickname" :value="__('닉네임')"/>
            <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('nickname')"
                          required
                          autocomplete="nickname"/>
            <x-input-error :messages="$errors->get('nickname')" class="mt-2"/>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('이메일')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- checkedEmail button -->
        <div class="flex items-center justify-end mt-4">
            <span id="emailStatus" class="text-gray-500 text-sm me-4">이메일 중복 확인을 해주세요</span>
            <x-primary-button class="ms-4" onclick="checkedEmail()">
                {{ __('중복확인') }}
            </x-primary-button>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('비밀번호 (소문자, 숫자 포함 8자 이상)')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('비밀번호 확인')"/>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="{{ route('login') }}">
                {{ __('기존 회원이신가요?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('회원가입') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
