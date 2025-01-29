fetch("userControl_to_db.php")
    .then(response => response.json())
    .then(data => {
        console.log("Fetched Data:", data); 
        if (data.success) {
            document.querySelector(".users-count").innerText = data.total_users;
            document.querySelector(".officers-count").innerText = data.approved_users;
        } else {
            console.error("Server Error:", data.error);
        }
    })
    .catch(error => console.error("Fetch Error:", error));
