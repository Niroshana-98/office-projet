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
                document.getElementById("service").value = data.service;
                document.getElementById("grade").value = data.grade;
                document.getElementById("upp_status").value = data.upp_status;
                document.getElementById("desi").value = data.desi;
                document.getElementById("c_w_p").value = data.c_w_p;
                document.getElementById("min").value = data.min;
                document.getElementById("date_att_sp").value = data.date_att_sp;
                document.getElementById("ins_name").value = data.ins_name;
                document.getElementById("course_name").value = data.course_name;
                document.getElementById("service_minite_no").value = data.service_minite_no;
                document.getElementById("course_start_date").value = data.course_start_date;
                document.getElementById("course_end_date").value = data.course_end_date;
                document.getElementById("course_fee").value = data.course_fee;
                document.getElementById("before_recieved").value = data.before_recieved;
            } else {
                console.error(data.error);
            }
        })
        .catch(error => console.error("Error fetching application data:", error));
});

function printPage() {
    window.print(); // Opens the print dialog
}