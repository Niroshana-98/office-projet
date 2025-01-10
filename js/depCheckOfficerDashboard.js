document.addEventListener("DOMContentLoaded", function () {
    fetch("depCheckOfficerDashboard_to_db.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok " + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log("Received data:", data); // Debugging log
            if (data.success) {
                document.querySelector(".new-applications-count").innerText = data.new_applications || 0;
                document.querySelector(".approved-applications-count").innerText = data.approved_applications || 0;
                document.querySelector(".rejected-applications-count").innerText = data.rejected_applications || 0;
            } else {
                console.error("Error:", data.error);
                alert("Error fetching application counts: " + data.error);
            }
        })
        .catch(error => console.error("Fetch error:", error));
});
