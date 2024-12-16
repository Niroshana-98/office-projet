document.addEventListener("DOMContentLoaded", function () {
    fetch("rejectApplication_to_db.php")
        .then(response => response.json()) // Parse the JSON from the response
        .then(data => {
            if (data.success) {

                const rejectSpan = document.getElementById("rejectMessage");
                if (data.Subject_Reject_RM) {
                    rejectSpan.innerText = `කරුණාකර සදහන් කර ඇති අංකයට අදාල තොරතුරු නැවත පුරවන්න: ${data.Subject_Reject_RM}`;
                } else {
                    rejectSpan.innerText = "No rejection information available.";
                }

                // Fill form fields with data
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

                // Display document function
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
                            // Enable button only if the filePath is valid
                            if (button.filePath && button.filePath.trim() !== "") {
                                buttonElement.disabled = false;
                                buttonElement.addEventListener("click", function () {
                                    openDocumentInNewWindow(button.filePath);
                                });
                            } else {
                                buttonElement.disabled = true;
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


document.getElementById("updateButton").addEventListener("click", function () {
    const fields = [
        "address_pri", "tel_mob", "date_att_sp", "ins_name", "course_name", "service_minite_no",
        "course_start_date", "course_end_date", "course_fee",
        "bf_01course_name", "bf_01ins_name", "bf_01start_date", "bf_01gov_paid", "bf_01full_course_fee",
        "bf_02course_name", "bf_02ins_name", "bf_02start_date", "bf_02gov_paid", "bf_02full_course_fee"
    ];

    let postData = `nic=${encodeURIComponent(document.getElementById("nic").value)}`;
    fields.forEach(field => {
        const value = document.getElementById(field)?.value || "";
        postData += `&${field}=${encodeURIComponent(value)}`;
    });

    if (postData.includes("nic=")) {        
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "rejectApplication_update.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                if (xhr.responseText.trim() === "success") {
                    alert("Update successful!");
                    window.location.href = "applicationView.php"; 
                } else {
                    console.error("Update failed:", xhr.responseText);
                    alert("Update failed: " + xhr.responseText);
                }
            } else {
                console.error("Request failed. Status:", xhr.status);
                alert("Server error. Please try again.");
            }
        };

        xhr.send(postData);
    } else {
        alert("Please enter valid data.");
    }
    
});


const uploadFields = [
    { inputId: "up_porva_anu", buttonId: "uploadButton" },
    { inputId: "up_service_minite", buttonId: "uploadButton_2" },
    { inputId: "up_app_letter_confirm", buttonId: "uploadButton_3" },
    { inputId: "up_attach_sp", buttonId: "uploadButton_4" },
    { inputId: "up_course_selected", buttonId: "uploadButton_5" },
    { inputId: "up_campus_confirm", buttonId: "uploadButton_6" },
    { inputId: "up_course_complete", buttonId: "uploadButton_7" },
    { inputId: "up_pay_recept", buttonId: "uploadButton_8" },
    { inputId: "up_other", buttonId: "uploadButton_9" }
];

uploadFields.forEach(field => {
    const fileInput = document.getElementById(field.inputId);
    const uploadButton = document.getElementById(field.buttonId);

    fileInput.addEventListener("change", function () {
        if (this.files && this.files.length > 0) {
            uploadButton.disabled = false;
        } else {
            uploadButton.disabled = true;
        }
    });
});


// General function to handle file uploads
function handleFileUpload(fileInputId, uploadButtonId, viewButtonId, uploadUrl) {
    document.getElementById(uploadButtonId).addEventListener('click', function() {
        const fileInput = document.getElementById(fileInputId);
        const file = fileInput.files[0];

        if (!file) {
            alert("Please select a file to upload.");
            return;
        }

        const allowedTypes = ['application/pdf', 'image/png', 'image/jpeg'];
        if (!allowedTypes.includes(file.type)) {
            alert("Only PDF, PNG, and JPG files are allowed.");
            return;
        }

        const formData = new FormData();
        formData.append(fileInputId, file);

        fetch(uploadUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("File uploaded successfully.");

                // Hide the upload button and input
                document.getElementById(uploadButtonId).style.display = 'none';
                document.getElementById(fileInputId).style.display = 'none';

                // Enable the View button
                const viewButton = document.getElementById(viewButtonId);
                viewButton.style.display = 'inline-block';
                viewButton.disabled = false;

                // Set up the view button to open the file
                viewButton.addEventListener('click', function() {
                    window.open(data.filePath, '_blank');
                });
            } else {
                alert(data.error || "File upload failed.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred during the upload.");
        });
    });
}


handleFileUpload('up_porva_anu', 'uploadButton', 'viewButton', 'rejectApplicationUpload_to_db.php');
handleFileUpload('up_service_minite', 'uploadButton_2', 'viewButton_2', 'rejectApplicationUpload_to_db.php');
handleFileUpload('up_app_letter_confirm', 'uploadButton_3', 'viewButton_3', 'rejectApplicationUpload_to_db.php');
handleFileUpload('up_attach_sp', 'uploadButton_4', 'viewButton_4', 'rejectApplicationUpload_to_db.php');
handleFileUpload('up_course_selected', 'uploadButton_5', 'viewButton_5', 'rejectApplicationUpload_to_db.php');
handleFileUpload('up_campus_confirm', 'uploadButton_6', 'viewButton_6', 'rejectApplicationUpload_to_db.php');
handleFileUpload('up_course_complete', 'uploadButton_7', 'viewButton_7', 'rejectApplicationUpload_to_db.php');
handleFileUpload('up_pay_recept', 'uploadButton_8', 'viewButton_8', 'rejectApplicationUpload_to_db.php');
handleFileUpload('up_other', 'uploadButton_9', 'viewButton_9', 'rejectApplicationUpload_to_db.php');


