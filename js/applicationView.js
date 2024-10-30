document.addEventListener("DOMContentLoaded", function () {
    fetch("../applicationView_to_db.php")
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById("appNoDisplay").innerText = data.app_no;
            } else {
                console.error(data.error);
            }
        })
        .catch(error => console.error("Error fetching app_no:", error));
});
