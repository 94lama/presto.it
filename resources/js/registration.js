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