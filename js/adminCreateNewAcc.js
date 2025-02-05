document.addEventListener('DOMContentLoaded', function () {
    const officeDropdown = document.getElementById("selectOffi");

    if (officeDropdown) {
        fetchOffices();

        function fetchOffices() {
            fetch("adminCreateNewAcc_to_db.php", {
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

                    // ✅ Corrected Select2 initialization
                    $("#selectOffi").select2({
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
});
