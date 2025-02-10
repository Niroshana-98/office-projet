fetch("csOfficers_to_db.php")
    .then(response => response.json())
    .then(data => {
        console.log("Fetched Data:", data); 
        if (data.success) {
            document.querySelector(".officers-count").innerText = data.officers_count;
        } else {
            console.error("Server Error:", data.error);
        }
    })
    .catch(error => console.error("Fetch Error:", error));
