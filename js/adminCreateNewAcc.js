document.addEventListener('DOMContentLoaded', function () {
    const officeDropdown = document.getElementById("selectOffi");
    const form = document.querySelector("form");

    // Fetch Offices
    function fetchOffices() {
        fetch("adminCreateNewAcc_to_db.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "action=fetchOffices",
        })
        .then((response) => response.json()) 
        .then((data) => {
            officeDropdown.innerHTML = '<option value="">Select an office</option>';
            data.forEach((office) => {
                const option = document.createElement("option");
                option.value = office.offi_id;
                option.textContent = office.offi_name;
                officeDropdown.appendChild(option);
            });

            // Initialize Select2
            $("#selectOffi").select2({
                theme: "bootstrap-5",
                placeholder: "Search or select an office",
                allowClear: true,
                width: "100%",
            });
        })
        .catch((error) => console.error("Error fetching offices:", error));
    }

    if (officeDropdown) {
        fetchOffices();
    }

    // Handle form submission
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        const nic = document.querySelector("input[placeholder='Username']").value.trim();
        const password = document.querySelector("input[placeholder='Password']").value.trim();
        const office = document.getElementById("selectOffi").value;
        const position = document.getElementById("selectPosi").value;

        if (!nic || !password || !office || !position) {
            alert("All fields are required!");
            return;
        }

        const formData = new URLSearchParams();
        formData.append("nic", nic);
        formData.append("password", password);
        formData.append("office", office);
        formData.append("position", position);

        fetch("adminCreateNewAcc_to_db.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: formData.toString(),
        })
        .then((response) => response.json())
        .then((data) => {
            alert(data.message);
            if (data.status === "success") {
                form.reset();
                $("#selectOffi").val(null).trigger("change");
                $("#selectPosi").val(""); 
            }
        })
        .catch((error) => console.error("Error:", error));
    });
});
