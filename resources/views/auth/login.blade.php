<x-layout>
    <div class="w-100 vh-100 d-flex justify-content-center align-items-center">
        {{-- <p class="title">{{__('ui.login')}}</p> --}}

        <div style="width: 25rem">
            <form method="post" action="{{ route('login') }}" class="form">
                @csrf
                <p class="form-heading fs-4">{{ __('ui.login') }}</p>
                <div class="row px-3 py-1">
                    <input type="email" class="form-control input @error('password') is-invalid @enderror"
                        placeholder="Email" name="email" value={{ old('email') }}>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row px-3 py-1">
                    <input type="password" id="passwordRegister" onkeyup="check()"
                        class="form-control input @error('password') is-invalid @enderror" placeholder="Password"
                        name="password">
                    <button type="button" id="showPasswordButton"
                        class="bg-transparent border-0 fa-solid fa-eye align-self-center @error('password') text-danger @enderror"
                        style="translate: 9rem -2rem;" onclick="showPassword()"></button>
                    @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <p class="page-link">
                </div>
            <span class="page-link-label">Forgot Password?</span>
          </p> --}}
                <div class="row p-3">
                    <button type="submit"
                        class="form-btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('ui.access') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
                <p class="sign-up-label">
                    {{__('ui.noAccount')}} <a class="sign-up-link" href="{{ route('register') }}">{{ __('ui.signin') }}
                    </a>
                </p>
                <div class="buttons-container">
                </div>
            </form>
        </div>
    </div>

    {{-- @vite('/resources/js/registration.js') --}}
    <script>
        let hide = true;
        let checked = true;
        let password = document.getElementById('passwordRegister');

        function check() {
            let password = document.getElementById('passwordRegister');
            let confirmPassword = document.getElementById('passwordConfirmationRegister');
            if (password.value == confirmPassword.value && password.value != "") {
                checked = true;
                password.classList.add('bg-success-subtle');
                confirmPassword.classList.add('bg-success-subtle');
            } else {
                password.classList.remove('bg-success-subtle');
                confirmPassword.classList.remove('bg-success-subtle');
            }
        };

        function showPassword() {
            let button = document.getElementById('showPasswordButton');
            if (checked) {
                button.classList.add('fa-eye-slash');
                button.classList.remove('fa-eye');
                password.type = 'text';
            } else {
                button.classList.add('fa-eye');
                button.classList.remove('fa-eye-slash');
                password.type = 'password';
            };
            checked = !checked;
        };
    </script>

</x-layout>
