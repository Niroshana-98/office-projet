document.addEventListener("DOMContentLoaded", function () {
    fetch("userControlListForm_to_db.php", {
        credentials: 'include'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById("user_id").innerText = data.user_id;
            document.getElementById("name").innerText = data.name;
            document.getElementById("nic").innerText = data.nic;
            document.getElementById("email").innerText = data.email;
            document.getElementById("tel").innerText = data.tel;

            // Populate Designation Dropdown
            const desiSelect = document.querySelector(".form-select");
            desiSelect.innerHTML = ""; // Clear previous options

            let defaultOption = document.createElement("option");
            defaultOption.textContent = "Select Designation";
            defaultOption.value = "";
            desiSelect.appendChild(defaultOption);

            data.designations.forEach(desi => {
                let option = document.createElement("option");
                option.value = desi.desi_id;
                option.textContent = desi.desi_name;

                if (desi.desi_id == data.user_desi) {
                    option.selected = true;
                }

                desiSelect.appendChild(option);
            });

            const offiCatSelect = document.getElementById("position");
            offiCatSelect.innerHTML = "";

            let defaultOptions = document.createElement("option");
            defaultOptions.textContent = "Open this select menu";
            defaultOptions.value = "";
            defaultOptions.selected = true;
            offiCatSelect.appendChild(defaultOptions);

            let options = [];

            if (data.offi_cat === 2) {
                options = ["Subject Officer", "Ministry Check Officer", "Ministry Recommend Officer"];
            } else if (data.offi_cat === 3) {
                options = ["Subject Officer", "Department Check Officer", "Department Recommend Officer"];
            } else if (data.offi_cat === 4) {
                options = ["Subject Officer", "District Check Officer", "District Recommend Officer"];
            } else if (data.offi_cat === 5) {
                options = ["Subject Officer", "Office Recommend Officer"];
            } else if (data.offi_cat === 6) {
                options = ["Subject Officer", "Office Recommend Officer"];
            }

            options.forEach((position) => {
                let option = document.createElement("option");
                option.textContent = position;
                option.value = position;
                offiCatSelect.appendChild(option);
            });
        } else {
            console.error(data.error);
        }
    })
    .catch(error => console.error("Error fetching user data:", error));

    document.querySelector(".edit-btn").addEventListener("click", function () {
        const desiSelect = document.querySelector(".form-select");
        const desi_id = desiSelect.value;

        const positionSelect = document.getElementById("position");
        const position = positionSelect.value;

        fetch("userControlUpdateStatus.php", {
            method: "POST",
            credentials: "include",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ desi_id, position }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Profile updated successfully!");
                window.location.href = "userControlList.php";
            } else {
                alert("Error: " + data.error);
            }
        })
        .catch(error => console.error("Error updating profile:", error));
    });
});
