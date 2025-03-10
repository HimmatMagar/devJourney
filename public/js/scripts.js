function togglePasswordVisibility(inputId, toggleId) {
    const passwordInput = document.querySelector(inputId);
    const toggleIcon = document.querySelector(toggleId);

        toggleIcon.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
         });
    }
togglePasswordVisibility('#password', '#togglePassword');
togglePasswordVisibility('#confirmPassword', '#toggleConfirmPassword');