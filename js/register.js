    
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

    //dependat select box
    document.addEventListener('DOMContentLoaded', function () {
        fetchServices();
    
        function fetchServices() {
            fetch('register_to_db.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=fetchServices'
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('service').innerHTML += data;
            });
        }
    
        document.getElementById('service').addEventListener('change', function () {
            const service_id = this.value;
            if (service_id !== '') {
                fetchGrades(service_id);
            } else {
                document.getElementById('grade').disabled = true;
                document.getElementById('job').disabled = true;
            }
        });
    
        function fetchGrades(service_id) {
            fetch('register_to_db.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=fetchGrades&service_id=' + service_id
            })
            .then(response => response.text())
            .then(data => {
                const gradeSelect = document.getElementById('grade');
                gradeSelect.innerHTML = '<option value="">Select Grade</option>';
                gradeSelect.innerHTML += data;
                gradeSelect.disabled = false;
            });
        }
    
        document.getElementById('grade').addEventListener('change', function () {
            const grade_id = this.value;
            if (grade_id !== '') {
                fetchPositions(grade_id);
            } else {
                document.getElementById('job').disabled = true;
            }
        });
    
        function fetchPositions(grade_id) {
            fetch('register_to_db.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=fetchPositions&grade_id=' + grade_id
            })
            .then(response => response.text())
            .then(data => {
                const positionSelect = document.getElementById('job');
                positionSelect.innerHTML = '<option value="">Select Position</option>';
                positionSelect.innerHTML += data;
                positionSelect.disabled = false;
            });
        }
    
        // Update form submission to pass names instead of IDs
        document.querySelector('form').addEventListener('submit', function (event) {
            const serviceSelect = document.getElementById('service');
            const gradeSelect = document.getElementById('grade');
            const positionSelect = document.getElementById('job');

            // Get selected names
            const serviceName = serviceSelect.options[serviceSelect.selectedIndex].text;
            const gradeName = gradeSelect.options[gradeSelect.selectedIndex].text;
            const positionName = positionSelect.options[positionSelect.selectedIndex].text;

            // Append names to the hidden inputs before submission
            this.querySelector('input[name="service"]').value = serviceName;
            this.querySelector('input[name="grade"]').value = gradeName;
            this.querySelector('input[name="position"]').value = positionName;

            // Submit the form normally
        });

    });
    


