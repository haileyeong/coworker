<x-guest-layout>
    <script>
        function sendCode() {
            const email = document.getElementById('email').value;

            if (!email) {
                alert("이메일을 입력해주세요.");
                return;
            }

            fetch('{{ route('emails.verify') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email: email })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("인증번호가 이메일로 발송되었습니다.");
                    } else {
                        alert("인증번호 발송에 실패했습니다. 이메일 주소를 확인해주세요.");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("오류 발생");
                });
        }
    </script>

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
            <x-text-input id="nickname" class="block mt-1 w-full" type="text" name="nickname" :value="old('nickname')" required
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

        <!-- 인증번호 발송 버튼 -->
        <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4" onclick="sendCode()">
            {{ __('인증번호 발송') }}
        </x-primary-button>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('비밀번호')"/>

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
