document.addEventListener("DOMContentLoaded", function () {
    fetch("userControlOfficerListForm_to_db.php", {
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
            
            if(status === "10"){
                postion.innerText = "Subject Officer";
            } else if(status === "18"){
                postion.innerText = "Office Recommend Offcier";
            } else if(status === "26"){
                postion.innerText = "District Check Officer";
            } else if(status === "30"){
                postion.innerText = "District Recommend Officer";
            } else if(status === "38"){
                postion.innerText = "Department Check Officer";
            } else if(status === "42"){
                postion.innerText = "Department Recommend Officer";
            } else if(status === "50"){
                postion.innerText = "Ministry Check Officer";
            } else if(status === "54"){
                postion.innerText = "Ministry Recommend Officer";
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
