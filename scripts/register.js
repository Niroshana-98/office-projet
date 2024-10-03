    
    //password equals
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

    // Function to reset the form fields
    function resetForm() {
        const form = document.querySelector('form');
        form.reset(); // Reset the form fields to their default values
        
        const errorMessages = document.querySelectorAll('.text-danger');
        errorMessages.forEach(error => {
            error.style.display = 'none'; 
        });

        const inputs = form.querySelectorAll('input');
        inputs.forEach(input => {
            input.classList.remove('is-invalid'); 
        });
    }

    //close the window
    function closeWindow() {
        if (confirm('Are you sure you want to exit?')) {
            window.open('', '_self').close(); 
        }
    }

