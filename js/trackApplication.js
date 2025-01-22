document.addEventListener("DOMContentLoaded", function () {
    fetch("trackApplication_to_db.php")
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Set the value of the textboxes instead of innerText
                document.getElementById("appNo").value = data.app_no;
                document.getElementById("offi_cat").value = data.offi_cat;

                const office = document.getElementById("office");

                if (data.offi_cat == 6) {
                    office.style.display = "none";
                }

            } else {
                console.error(data.error);
            }
        })
        .catch(error => console.error("Error fetching application data:", error));
});
