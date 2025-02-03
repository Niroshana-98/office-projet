fetch("adminDashboard_to_db.php")
    .then(response => response.json())
    .then(data => {
        console.log("Fetched Data:", data); 
        if (data.success) {
            document.querySelector(".cs-count").innerText = data.total_csOfficers;
            document.querySelector(".officerHead-count").innerText = data.total_officeHeads;
            document.querySelector(".users-count").innerText = data.total_users;
        } else {
            console.error("Server Error:", data.error);
        }
    })
    .catch(error => console.error("Fetch Error:", error));
