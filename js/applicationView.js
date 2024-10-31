document.addEventListener("DOMContentLoaded", function () {
    fetch("../applicationView_to_db.php")
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById("appNoDisplay").innerText = data.app_no;
                document.getElementById("name_si").value = data.name_si;
                document.getElementById("name_full").value = data.name_full;
                document.getElementById("name_eng").value = data.name_eng;
                document.getElementById("nic").value = data.nic;
                document.getElementById("address_pri").value = data.address_pri;
                document.getElementById("tel_land").value = data.tel_land;
                document.getElementById("tel_mob").value = data.tel_mob;
                document.getElementById("email_pri").value = data.email_pri;
            } else {
                console.error(data.error);
            }
        })
        .catch(error => console.error("Error fetching application data:", error));
});

function printPage() {
    window.print(); // Opens the print dialog
}
