document.addEventListener("DOMContentLoaded", function () {
    fetch("csOfficersListForm_to_db.php", {
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

            const status = data.status;
            const postion = document.getElementById("position");
            
            if(status === "62"){
                postion.innerText = "CS Check Officer";
            } else if(status === "66"){
                postion.innerText = "AO";
            } else if(status === "70"){
                postion.innerText = "ACS";
            } else if(status === "74"){
                postion.innerText = "DCS";
            } else if(status === "78"){
                postion.innerText = "CS";
            } else if(status === "82"){
                postion.innerText = "Accountant 1";
            } else if(status === "86"){
                postion.innerText = "Accountant 2";
            } else {
                postion.innerText = "No Position";
            }

            document.getElementById("editProfileBtn").addEventListener("click", function () {
                updateUserStatus(data.nic);
            });

        } else {
            console.error(data.error);
        }
    })
    .catch(error => console.error("Error fetching user data:", error));
});

function updateUserStatus(nic) {
    fetch("userControlOfficerUpdateStatus.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "nic=" + encodeURIComponent(nic),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("User status updated successfully!");
            window.location.href = `userControlOfficerList.php?user_id=${user_id}`;
        } else {
            alert("Error: " + data.error);
        }
    })
    .catch(error => console.error("Error updating user status:", error));
}
