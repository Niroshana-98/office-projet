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
        } else {
            console.error(data.error);
        }
    })
    .catch(error => console.error("Error fetching application data:", error));       
});
