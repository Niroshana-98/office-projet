    
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

    //navigation bar transtion
    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar');
    let timer = null;
    
    window.addEventListener('scroll', function () {
        clearTimeout(timer); 
    
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
        if (scrollTop > lastScrollTop) {
            navbar.style.top = '-120px';
        } else {
            navbar.style.top = '0';
        }
    
        lastScrollTop = scrollTop;
    
        // Set a delay before hiding the navbar again
        timer = setTimeout(function () {
            if (scrollTop > lastScrollTop) {
                navbar.style.top = '-120px';
            }
        }, 200); // Adjust delay time (in milliseconds)
    });

    //office select box
    document.addEventListener('DOMContentLoaded', function () {
        fetchOffices();
    
        function fetchOffices() {
            fetch('../register_to_db.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=fetchOffices'
            }) 
            .then(response => response.text())
            .then(data => {
                document.getElementById('office').innerHTML += data;
            });
        }
    
        document.getElementById('office').addEventListener('change', function () {
            const office_id = this.value;
            if (office_id !== '') {
                fetchGrades(office_id);
            }
        });
        
        // Update form submission to pass names instead of IDs
        document.querySelector('form').addEventListener('submit', function (event) {
            const officeSelect = document.getElementById('office');

            // Get selected names
            const officeName = officeSelect.options[officeSelect.selectedIndex].text;

            // Append names to the hidden inputs before submission
            this.querySelector('input[name="offices"]').value = officeName;

        });

    });