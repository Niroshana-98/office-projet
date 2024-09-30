    document.querySelector('form').addEventListener('submit', function(event) {
        const password = document.getElementById('inputPassword').value;
        const confirmPassword = document.getElementById('inputConfirmPassword').value;
        const passwordError = document.getElementById('passwordError');

        if (password !== confirmPassword) {
            event.preventDefault(); 
            passwordError.style.display = 'block';
        } else {
            passwordError.style.display = 'none';
        }
    });

