document.addEventListener('DOMContentLoaded', function () {
    // Password equals validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function (event) {
            const password = document.getElementById('inputPassword')?.value;
            const confirmPassword = document.getElementById('inputConfirmPassword')?.value;
            const passwordError = document.getElementById('passwordError');

            if (password !== confirmPassword) {
                event.preventDefault();
                if (passwordError) passwordError.style.display = 'block';
            } else {
                if (passwordError) passwordError.style.display = 'none';
            }
        });
    } 

    // Reset form
    const resetForm = () => {
        const form = document.querySelector('form');
        if (form) {
            form.reset();
            const errorMessages = document.querySelectorAll('.text-danger');
            errorMessages.forEach(error => error.style.display = 'none');
            const inputs = form.querySelectorAll('input');
            inputs.forEach(input => input.classList.remove('is-invalid'));
        }
    };

    // Close the window
    const closeWindow = () => {
        if (confirm('Are you sure you want to exit?')) {
            window.open('', '_self').close();
        }
    };

    // Navbar transition
    const navbar = document.getElementById('navbar');
    if (navbar) {
        let lastScrollTop = 0;
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

            timer = setTimeout(function () {
                if (scrollTop > lastScrollTop) {
                    navbar.style.top = '-120px';
                }
            }, 200);
        });
    }

    // Fetch offices and handle dropdowns
    const officeDropdown = document.getElementById("office");
    if (officeDropdown) {
        fetchOffices();

        function fetchOffices() {
            fetch("adminOfficerTempory_to_db.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "action=fetchOffices",
            })
                .then((response) => response.json()) // Expect JSON response
                .then((data) => {
                    officeDropdown.innerHTML = '<option value="">Select an office</option>'; // Default option
                    data.forEach((office) => {
                        const option = document.createElement("option");
                        option.value = office.offi_id;
                        option.textContent = office.offi_name;
                        officeDropdown.appendChild(option);
                    });

                    // Initialize Select2 after populating options
                    $("#office").select2({
                        theme: "bootstrap-5",
                        placeholder: "Search or select an office",
                        allowClear: true,
                        width: "100%", // Ensures full-width
                    });
                })
                .catch((error) => console.error("Error fetching offices:", error));
        }

        officeDropdown.addEventListener("change", function () {
            const office_id = this.value;
            if (office_id !== "") {
                fetchGrades(office_id);
            }
        });
    }

    const desiDropdown = document.getElementById("desi");
if (desiDropdown) {
    fetchDesi();

    function fetchDesi() {
        fetch("adminOfficerTempory_to_db.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "action=fetchDesi",
        })
            .then((response) => response.json()) // Expect JSON response
            .then((data) => {
                desiDropdown.innerHTML = '<option value="">Select a designation</option>'; // Default option
                data.forEach((desi) => {
                    const option = document.createElement("option");
                    option.value = desi.desi_id;
                    option.textContent = desi.desi_name;
                    desiDropdown.appendChild(option);
                });

                // Initialize Select2 after populating options
                $("#desi").select2({
                    theme: "bootstrap-5",
                    placeholder: "Search or select a designation",
                    allowClear: true,
                    width: "100%", // Ensures full-width
                });
            })
            .catch((error) => console.error("Error fetching designations:", error));
    }
}


    // Input validations
    const nameInput = document.getElementById('name');
    if (nameInput) {
        nameInput.addEventListener('input', function () {
            const regex = /^[\u0D80-\u0DFF]+$/; // Allow only Sinhala characters
            if (this.value && !regex.test(this.value)) {
                alert("Invalid input: Only Sinhala characters are allowed.");
                this.value = this.value.replace(/[^\u0D80-\u0DFF]/g, ''); // Remove invalid characters
            }
        });
    }

    const nicInput = document.getElementById('nic');
    if (nicInput) {
        nicInput.addEventListener('blur', function () {
            const regex = /^(\d{9}[vV]|(19|20)\d{10})$/;
            if (!regex.test(this.value)) {
                alert("Invalid NIC! Please enter a valid NIC (9 digits followed by 'V' or 12 digits starting with '19' or '20').");
                this.value = '';
            }
        });
    }

    const emailInput = document.getElementById('email');
    if (emailInput) {
        emailInput.addEventListener('blur', function () {
            const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (this.value && !regex.test(this.value)) {
                alert("Invalid email address! Please enter a valid email.");
                this.value = '';
            }
        });
    }

    const telInput = document.getElementById('tel');
    if (telInput) {
        telInput.addEventListener('blur', function () {
            const regex = /^07\d{8}$/;
            if (this.value && !regex.test(this.value)) {
                alert("Invalid telephone number! Please enter a valid Sri Lankan mobile number starting with 07 and followed by 8 digits.");
                this.value = '';
            }
        });
    }

    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn) {
        submitBtn.addEventListener('click', function () {
            const officeSelect = document.getElementById('office');
            if (officeSelect && officeSelect.value === '') {
                alert("Please select an option from the Office dropdown.");
            } else {
                alert("Selection successful: " + officeSelect?.value);
            }
        });
    }

    const passwordInput = document.getElementById('inputPassword');
    if (passwordInput) {
        passwordInput.addEventListener('blur', function () {
            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/;
            if (this.value && !passwordPattern.test(this.value)) {
                alert("Invalid password. Password must contain:\n" +
                    "- At least one uppercase letter\n" +
                    "- At least one lowercase letter\n" +
                    "- At least one number\n" +
                    "- At least one special character\n" +
                    "- Be at least 8 characters long");
            }
        });
    }
});

//password show
function handlePasswordVisibility() {
    const passwordInput = document.getElementById("inputPassword");
    const toggleWrapper = document.getElementById("toggleWrapper");

    if (passwordInput.value.trim() !== "") {
        // Show the toggle icon when there is input
        toggleWrapper.style.display = "inline";
    } else {
        // Hide the toggle icon when the field is empty
        toggleWrapper.style.display = "none";
        passwordInput.type = "password"; // Default to hidden
    }
}

function togglePasswordVisibility() {
    const passwordInput = document.getElementById("inputPassword");
    const toggleIcon = document.getElementById("toggleIcon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text"; // Show the password
        toggleIcon.classList.remove("bx-show");
        toggleIcon.classList.add("bx-hide");
    } else {
        passwordInput.type = "password"; // Hide the password
        toggleIcon.classList.remove("bx-hide");
        toggleIcon.classList.add("bx-show");
    }
}

