document.addEventListener("DOMContentLoaded", function () {
    fetch("adminOfficerListForm_to_db.php", {
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
            document.getElementById("desi").innerText = data.desi;
            document.getElementById("offi").innerText = data.offi_name;

            const status = parseInt(data.status);  
            const nic = data.nic;
            const postion = document.getElementById("position");
            const actiProfileBtn = document.getElementById("actiProfileBtn"); 
            const editProfileBtn = document.getElementById("editProfileBtn");

            const allowedStatuses = [21, 33, 45, 57, 61, 65, 69, 73, 77, 81, 85];

            // Show or hide button based on status
            if (allowedStatuses.includes(status)) {
                actiProfileBtn.style.display = "block"; 
                editProfileBtn.style.display = "none"; 
            } else {
                actiProfileBtn.style.display = "none";   
            }

            // Assign position based on status
            if ([19, 20, 21, 22].includes(status)) {
                postion.innerText = "Office Head";
            } else if ([31, 32, 33, 34].includes(status)) {
                postion.innerText = "District Office Head";
            } else if ([43, 44, 45, 46].includes(status)) {
                postion.innerText = "Department Head";
            } else if ([55, 56, 57, 58].includes(status)) {
                postion.innerText = "Ministry Head";
            } else if ([59, 60, 61, 62].includes(status)) {
                postion.innerText = "CS Check Officer";
            } else if ([63, 64, 65, 66].includes(status)) {
                postion.innerText = "AO";
            } else if ([67, 68, 69, 70].includes(status)) {
                postion.innerText = "ACS";
            } else if ([71, 72, 73, 74].includes(status)) {
                postion.innerText = "DCS";
            } else if ([75, 76, 77, 78].includes(status)) {
                postion.innerText = "CS";
            } else if ([79, 80, 81, 82].includes(status)) {
                postion.innerText = "Accountant 1";
            } else if ([83, 84, 85, 86].includes(status)) {
                postion.innerText = "Accountant 2";
            } else {
                postion.innerText = "No Position";
            }

            // Add event listener only if the button is visible
            if (allowedStatuses.includes(status)) {
                actiProfileBtn.addEventListener("click", function () {
                    activateUserAccount(nic, status);
                });
            }
        } else {
            console.error(data.error);
        }
    })
    .catch(error => console.error("Error fetching user data:", error));
});

function activateUserAccount(nic, currentStatus) {
    let newStatus = currentStatus + 1;  // Increment status by 1

    if (![22, 34, 46, 58, 62, 66, 70, 74, 78, 82, 86].includes(newStatus)) {
        alert("This account cannot be activated.");
        return;
    }

    fetch("adminOfficerActivate.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "nic=" + encodeURIComponent(nic) + "&status=" + newStatus,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Account activated successfully!");
            window.location.href = "adminOfficerList.php";
        } else {
            alert("Error: " + data.error);
        }
    })
    .catch(error => console.error("Error activating account:", error));
}
