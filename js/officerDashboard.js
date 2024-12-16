document.addEventListener("DOMContentLoaded", function () {
    fetch("officerDashboard_to_db.php")
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector(".card-title .new-applications-count").innerText = data.new_applications;
                document.querySelector(".card-title .approved-applications-count").innerText = data.approved_applications;
                document.querySelector(".card-title .rejected-applications-count").innerText = data.rejected_applications;
            } else {
                console.error(data.error);
            }
        })
        .catch(error => console.error("Error fetching application counts:", error));
});
