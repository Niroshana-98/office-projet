document.addEventListener("DOMContentLoaded", function () {
    fetch("adminUserAccountListForm_to_db.php", {
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
            document.getElementById("offi").innerText = data.offi_name;
            document.getElementById("position").value = data.status;

            const position = data.status;

            if(position == 1 || position == 2 || position == 3 || position == 4 || position == 5){
                document.getElementById("desi").innerText = data.desi_name;
            } else{
                document.getElementById("desi").innerText = data.desi;
            }

            if(position == 1){
                document.getElementById("position").innerText = "Register User";
            } else if(position == 2){
                document.getElementById("position").innerText = "Verify User";
            } else if(position == 3 || position == 4){
                document.getElementById("position").innerText = "Applicant";
            } else if(position == 5){
                document.getElementById("position").innerText = "Reject Applicant";
            } else if(position == 10){
                document.getElementById("position").innerText = "Subject Officer";
            } else if(position == 18){
                document.getElementById("position").innerText = "Office Recommend Officer";
            } else if(position == 26){
                document.getElementById("position").innerText = "District Check Officer";
            } else if(position == 30){
                document.getElementById("position").innerText = "District Recommend Officer";
            } else if(position == 38){
                document.getElementById("position").innerText = "Department Check Officer";
            } else if(position == 42){
                document.getElementById("position").innerText = "Department Recommend Officer";
            } else if(position == 50){
                document.getElementById("position").innerText = "Ministry Check Officer";
            } else if(position == 42){
                document.getElementById("position").innerText = "Ministry Recommend Officer";
            } else {
                document.getElementById("position").innerText = "Not Found";
            }
            
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
