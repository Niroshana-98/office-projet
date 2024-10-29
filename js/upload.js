function setupUploadButton(uploadButtonId, fileInputId, viewButtonId, fileKey) {
    document.getElementById(uploadButtonId).addEventListener('click', function() {
        const fileInput = document.getElementById(fileInputId);
        const file = fileInput.files[0];

        if (!file) {
            alert("Please select a file.");
            return;
        }

        // Validate file type
        const allowedTypes = ['application/pdf', 'image/png', 'image/jpeg'];
        if (!allowedTypes.includes(file.type)) {
            alert("Only PDF, PNG, and JPG files are allowed.");
            return;
        }

        const formData = new FormData();
        formData.append(fileKey, file);

        fetch('../upload_to_db.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok: " + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert("File uploaded successfully.");
                document.getElementById(viewButtonId).disabled = false;
                document.getElementById(uploadButtonId).disabled = true;
                document.getElementById(viewButtonId).addEventListener('click', function() {
                    window.open(data.filePath, '_blank');
                });
            } else {
                alert(data.error || "File upload failed.");
            }
        })
        .catch(error => console.error("Error:", error));
    });
}

window.onload = function() {
    fetch('../check_file_path.php')
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok: " + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                const handleFilePath = (filePath, uploadButtonId, fileInputId, viewButtonId) => {
                    if (filePath) {
                        document.getElementById(uploadButtonId).disabled = true;
                        document.getElementById(fileInputId).disabled = true;
                        document.getElementById(viewButtonId).disabled = false;
                        document.getElementById(viewButtonId).addEventListener('click', function() {
                            window.open(filePath, '_blank');
                        });
                    } else {
                        document.getElementById(uploadButtonId).disabled = false;
                        document.getElementById(fileInputId).disabled = false;
                        document.getElementById(viewButtonId).disabled = true;
                    }
                };

                handleFilePath(data.filePath1, 'uploadButton', 'up_porva_anu', 'viewButton');
                handleFilePath(data.filePath2, 'uploadButton_2', 'up_service_minite', 'viewButton_2');
                handleFilePath(data.filePath3, 'uploadButton_3', 'up_app_letter_confirm', 'viewButton_3');
                handleFilePath(data.filePath4, 'uploadButton_4', 'up_attach_sp', 'viewButton_4');
                handleFilePath(data.filePath5, 'uploadButton_5', 'up_course_selected', 'viewButton_5');
                handleFilePath(data.filePath6, 'uploadButton_6', 'up_campus_confirm', 'viewButton_6');
                handleFilePath(data.filePath7, 'uploadButton_7', 'up_course_complete', 'viewButton_7');
                handleFilePath(data.filePath8, 'uploadButton_8', 'up_pay_recept', 'viewButton_8');
                handleFilePath(data.filePath9, 'uploadButton_9', 'up_other', 'viewButton_9');
            } else {
                console.error("Error fetching file path:", data.error);
            }
        })
        .catch(error => console.error("Error:", error));
};

// Setup upload button functionality
setupUploadButton('uploadButton', 'up_porva_anu', 'viewButton', 'up_porva_anu');
setupUploadButton('uploadButton_2', 'up_service_minite', 'viewButton_2', 'up_service_minite');
setupUploadButton('uploadButton_3', 'up_app_letter_confirm', 'viewButton_3', 'up_app_letter_confirm');
setupUploadButton('uploadButton_4', 'up_attach_sp', 'viewButton_4', 'up_attach_sp');
setupUploadButton('uploadButton_5', 'up_course_selected', 'viewButton_5', 'up_course_selected');
setupUploadButton('uploadButton_6', 'up_campus_confirm', 'viewButton_6', 'up_campus_confirm');
setupUploadButton('uploadButton_7', 'up_course_complete', 'viewButton_7', 'up_course_complete');
setupUploadButton('uploadButton_8', 'up_pay_recept', 'viewButton_8', 'up_pay_recept');
setupUploadButton('uploadButton_9', 'up_other', 'viewButton_9', 'up_other');


document.addEventListener('DOMContentLoaded', function() {
    const buttonIds = [
        'viewButton', 'viewButton_2', 'viewButton_3', 'viewButton_4', 'viewButton_5',
        'viewButton_6', 'viewButton_7', 'viewButton_8', 'viewButton_9'
    ];

    const hoverIcon = `
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
        </svg> View
    `;
    
    const defaultIcon = `
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
        </svg> View
    `;

    buttonIds.forEach(buttonId => {
        const button = document.getElementById(buttonId);
        if (button) {
            button.innerHTML = defaultIcon; // Set initial icon

            button.addEventListener('mouseenter', function() {
                button.innerHTML = hoverIcon; 
            });

            button.addEventListener('mouseleave', function() {
                button.innerHTML = defaultIcon;
            });
        }
    });
});




