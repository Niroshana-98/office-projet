document.addEventListener("DOMContentLoaded", function () {
    fetch("applicationView_to_db.php")
        .then(response => response.json()) 
        .then(data => {
            if (data.success) {
                // Fill form fields with data
                if(data.reason === 1){
                    document.getElementById("applicationType").innerText = "පූර්ව අනුමැතිය ලබා ගැනීම හා ප්‍රතිපාදන ඉල්ලුම් කිරීම";
                }else if(data.reason === 2){
                    document.getElementById("applicationType").innerText = "පූර්ව අනුමැතිය ලබා ගැනීම";
                }

                document.getElementById("appNoDisplay").innerText = data.app_no; 
                document.getElementById("name_si").value = data.name_si;
                document.getElementById("name_full").value = data.name_full;
                document.getElementById("name_eng").value = data.name_eng;
                document.getElementById("nic").value = data.nic;
                document.getElementById("address_pri").value = data.address_pri;
                document.getElementById("tel_land").value = data.tel_land;
                document.getElementById("tel_mob").value = data.tel_mob;
                document.getElementById("email_pri").value = data.email_pri;
                document.getElementById("service").value = data.service_name;
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

                // Show additional fieldsets if course information is available
                if (data.bf_01course_name) {
                    document.getElementById("bf_01course_name").value = data.bf_01course_name;
                    document.getElementById("bf_01ins_name").value = data.bf_01ins_name;
                    document.getElementById("bf_01start_date").value = data.bf_01start_date;
                    document.getElementById("bf_01gov_paid").value = data.bf_01gov_paid;
                    document.getElementById("bf_01full_course_fee").value = data.bf_01full_course_fee;
                    document.getElementById("nextFieldsetTableContainer").style.display = 'block';
                } else {
                    document.getElementById("nextFieldsetTableContainer").style.display = 'none';
                } 

                if (data.bf_02course_name) {
                    document.getElementById("bf_02course_name").value = data.bf_02course_name;
                    document.getElementById("bf_02ins_name").value = data.bf_02ins_name;
                    document.getElementById("bf_02start_date").value = data.bf_02start_date;
                    document.getElementById("bf_02gov_paid").value = data.bf_02gov_paid;
                    document.getElementById("bf_02full_course_fee").value = data.bf_02full_course_fee;
                    document.getElementById("nextFieldsetTableContainers").style.display = 'block';
                } else {
                    document.getElementById("nextFieldsetTableContainers").style.display = 'none';
                }

                function displayDocument(containerId, filePath) {
                    const container = document.getElementById(containerId);

                    if (filePath) {
                        const card = document.createElement("div");
                        card.className = "documentCard";

                        if (filePath.endsWith(".pdf")) {
                            card.innerHTML = `
                                <div class="card">
                                    <a href="${filePath}" target="_blank">View PDF Document</a>
                                </div>`;
                        } else {
                            card.innerHTML = `
                                <div class="card">
                                    <img src="${filePath}" alt="Document Image" style="width: 100%;" />
                                </div>`;
                        }
                        container.appendChild(card);
                    }
                }

                const documentContainerId = "documentContainer";

                // Display various documents if they exist
                displayDocument(documentContainerId, data.up_porva_anu);
                displayDocument(documentContainerId, data.up_service_minite);
                displayDocument(documentContainerId, data.up_app_letter_confirm);
                displayDocument(documentContainerId, data.up_attach_sp);
                displayDocument(documentContainerId, data.up_course_selected);
                displayDocument(documentContainerId, data.up_campus_confirm);
                displayDocument(documentContainerId, data.up_course_complete);
                displayDocument(documentContainerId, data.up_pay_recept);
                displayDocument(documentContainerId, data.up_other);

                // Function to open document in a new window
                function openDocumentInNewWindow(filePath) {
                    if (filePath) {
                        window.open(filePath, "_blank", "width=auto,height=auto,scrollbars=yes");
                    }
                }

                // Setup the view buttons to open documents in a new window
                function setupViewButtons() {
                    const viewButtons = [
                        { id: "viewButton", filePath: data.up_porva_anu },
                        { id: "viewButton_2", filePath: data.up_service_minite },
                        { id: "viewButton_3", filePath: data.up_app_letter_confirm },
                        { id: "viewButton_4", filePath: data.up_attach_sp },
                        { id: "viewButton_5", filePath: data.up_course_selected },
                        { id: "viewButton_6", filePath: data.up_campus_confirm },
                        { id: "viewButton_7", filePath: data.up_course_complete },
                        { id: "viewButton_8", filePath: data.up_pay_recept },
                        { id: "viewButton_9", filePath: data.up_other }
                    ];

                    viewButtons.forEach(button => {
                        const buttonElement = document.getElementById(button.id);
                        if (buttonElement) {
                            if (button.filePath) {
                                buttonElement.disabled = false;
                                buttonElement.addEventListener("click", function () {
                                    window.open(button.filePath, "_blank", "width=auto,height=auto,scrollbars=yes");
                                });
                            } else {
                                buttonElement.disabled = true;
                                buttonElement.title = "Document not available";
                            }
                        }
                    });
                }

                setupViewButtons();

            } else {
                console.error(data.error);
            }
        })
        .catch(error => console.error("Error fetching application data:", error));
});

function printPage() {
    const documentContainer = document.getElementById("documentContainer");
    documentContainer.style.display = 'grid';
    window.print();
    setTimeout(() => {
        documentContainer.style.display = 'none';
    }, 1000);
}

function logout() {
    window.location.href = 'index.html';
}

function trackApplication() {
    window.location.href = 'trackApplication.php';
}

document.addEventListener("DOMContentLoaded", function () {
    fetch("uploadReasonGet_to_db.php") 
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let variable = data.reason; 
                hideRows(variable);
            } else {
                console.error("Error:", data.error);
            }
        })
        .catch(error => console.error("Fetch error:", error));

    function hideRows(variable) {
        const rows = document.querySelectorAll("#documentsTable tbody tr"); // Select only relevant table rows

        // Ensure rows exist before modifying them
        if (rows.length < 9) {
            console.error("Error: Not enough rows in the table.");
            return;
        }

        // Show all rows before hiding specific ones
        rows.forEach(row => row.style.display = "");

        const tdElement1 = document.getElementById("upDoc1");
        const tdElement2 = document.getElementById("upDoc2");
        const tdElement3 = document.getElementById("upDoc3");
        const tdElement4 = document.getElementById("upDoc4");
        const tdElement5 = document.getElementById("upDoc5");
        const tdElement6 = document.getElementById("upDoc6");
        const tdElement7 = document.getElementById("upDoc7");
        const tdElement8 = document.getElementById("upDoc8");
        const tdElement9 = document.getElementById("upDoc9");

        if (variable === 1) {
            rows[0].style.display = "none"; 
            rows[6].style.display = "none"; 

            tdElement2.textContent = "1";
            tdElement3.textContent = "2";
            tdElement4.textContent = "3";
            tdElement5.textContent = "4";
            tdElement6.textContent = "5";
            tdElement8.textContent = "6";
            tdElement9.textContent = "7";

        } else if (variable === 2) {
            rows[0].style.display = "none";
            rows[6].style.display = "none";
            rows[7].style.display = "none";

            tdElement2.textContent = "1";
            tdElement3.textContent = "2";
            tdElement4.textContent = "3";
            tdElement5.textContent = "4";
            tdElement6.textContent = "5";
            tdElement9.textContent = "7";
        }
    }
});

