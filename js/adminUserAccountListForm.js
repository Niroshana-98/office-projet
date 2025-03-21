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
            const tempStatus = data.temp_status;

            if(position == 1 || position == 2 || position == 3 || position == 4 || position == 5){
                document.getElementById("desi").innerText = data.desi_name;
            } else{
                document.getElementById("desi").innerText = data.desi;
            }

            // Display position name based on status
            const positionMap = {
                1: "Register User",
                2: "Verify User",
                3: "Applicant",
                4: "Applicant",
                5: "Reject Applicant",
                10: "Subject Officer",
                18: "Office Recommend Officer",
                26: "District Check Officer",
                30: "District Recommend Officer",
                38: "Department Check Officer",
                42: "Department Recommend Officer",
                50: "Ministry Check Officer"
            };

            document.getElementById("position").innerText = positionMap[position] || "Not Found";

             // Handle Delete Application
             document.getElementById("delApplicationBtn").addEventListener("click", function () {
                if (confirm("Are you sure you want to delete your application?")) {
                    fetch("adminUserApplicationDelete_to_db.php", {
                        method: "POST",
                        credentials: "include",
                        headers: {
                            "Content-Type": "application/json"
                        }
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert("Application deleted successfully!");
                            location.reload();
                        } else {
                            alert("Error: " + result.error);
                        }
                    })
                    .catch(error => console.error("Error deleting application:", error));
                }
            });

            // Handle Delete Account
            document.getElementById("delProfileBtn").addEventListener("click", function () {
                if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
                    fetch("adminUserDelete_to_db.php", {
                        method: "POST",
                        credentials: "include",
                        headers: {
                            "Content-Type": "application/json"
                        }
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert("Account deleted successfully!");
                            window.location.href = "adminUserAccountList.php";
                        } else {
                            alert("Error: " + result.error);
                        }
                    })
                    .catch(error => console.error("Error deleting account:", error));
                }
            });

            // Show the "Swap to Officer Account" button only if temp_status has a value
            const editBtn = document.getElementById("editProfileBtn");
            if (tempStatus) {
                editBtn.style.display = "block";  // Show button
            } else {
                editBtn.style.display = "none";   // Hide button
            }

            // Handle button click
            editBtn.addEventListener("click", function () {
                fetch("adminUserSwap_to_db.php", {
                    method: "POST",
                    credentials: 'include',
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ user_id: data.user_id })
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        alert("Account updated successfully!");
                        window.location.href = "adminUserAccountList.php"; // Reload page to reflect changes
                    } else {
                        alert("Error: " + result.error);
                    }
                })
                .catch(error => console.error("Error updating user status:", error));
            });


            
        } else {
            console.error(data.error);
        }
    })
    .catch(error => console.error("Error fetching user data:", error));
});
