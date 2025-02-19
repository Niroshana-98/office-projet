function setupUploadButton(uploadButtonId, fileInputId, completeId, viewButtonId, fileKey) {
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

        fetch('upload_to_db.php', {
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
                document.getElementById(uploadButtonId).style.display = 'none';
                document.getElementById(fileInputId).style.display = 'none';

                // Show view button and enable it
                const viewButton = document.getElementById(viewButtonId);
                viewButton.disabled = false;
                viewButton.style.display = 'inline-block';

                const complete = document.getElementById(completeId);
                complete.style.display = 'inline-flex';
                complete.style.alignItems='right'

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
    fetch('check_file_path.php')
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok: " + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                const handleFilePath = (filePath, uploadButtonId, fileInputId, viewButtonId, completeId) => {
                    if (filePath) {
                        document.getElementById(uploadButtonId).style.display = 'none';
                        document.getElementById(fileInputId).style.display = 'none';

                        const viewButton = document.getElementById(viewButtonId);
                        viewButton.style.display = 'inline-block';
                        viewButton.disabled = false;

                        const complete = document.getElementById(completeId);
                        complete.style.display = 'inline-flex';

                        viewButton.addEventListener('click', function() {
                            window.open(filePath, '_blank');
                        });
                    } else {
                        document.getElementById(uploadButtonId).style.display = 'inline-block';
                        document.getElementById(fileInputId).style.display = 'inline-block';
                        document.getElementById(viewButtonId).style.display = 'none';
                        document.getElementById(completeId).style.display = 'none';
                    }
                };

                handleFilePath(data.filePath1, 'uploadButton', 'up_porva_anu', 'viewButton', 'complete');
                handleFilePath(data.filePath2, 'uploadButton_2', 'up_service_minite', 'viewButton_2', 'complete_2');
                handleFilePath(data.filePath3, 'uploadButton_3', 'up_app_letter_confirm', 'viewButton_3', 'complete_3');
                handleFilePath(data.filePath4, 'uploadButton_4', 'up_attach_sp', 'viewButton_4', 'complete_4');
                handleFilePath(data.filePath5, 'uploadButton_5', 'up_course_selected', 'viewButton_5', 'complete_5');
                handleFilePath(data.filePath6, 'uploadButton_6', 'up_campus_confirm', 'viewButton_6', 'complete_6');
                handleFilePath(data.filePath7, 'uploadButton_7', 'up_course_complete', 'viewButton_7', 'complete_7');
                handleFilePath(data.filePath8, 'uploadButton_8', 'up_pay_recept', 'viewButton_8', 'complete_8');
                handleFilePath(data.filePath9, 'uploadButton_9', 'up_other', 'viewButton_9', 'complete_9');
            } else {
                console.error("Error fetching file path:", data.error);
            }
        })
        .catch(error => console.error("Error:", error));
};

// Setup upload button functionality
setupUploadButton('uploadButton', 'up_porva_anu','complete', 'viewButton', 'up_porva_anu');
setupUploadButton('uploadButton_2', 'up_service_minite', 'complete_2', 'viewButton_2', 'up_service_minite');
setupUploadButton('uploadButton_3', 'up_app_letter_confirm','complete_3', 'viewButton_3', 'up_app_letter_confirm');
setupUploadButton('uploadButton_4', 'up_attach_sp','complete_4', 'viewButton_4', 'up_attach_sp');
setupUploadButton('uploadButton_5', 'up_course_selected','complete_5', 'viewButton_5', 'up_course_selected');
setupUploadButton('uploadButton_6', 'up_campus_confirm','complete_6', 'viewButton_6', 'up_campus_confirm');
setupUploadButton('uploadButton_7', 'up_course_complete','complete_7', 'viewButton_7', 'up_course_complete');
setupUploadButton('uploadButton_8', 'up_pay_recept','complete_8', 'viewButton_8', 'up_pay_recept');
setupUploadButton('uploadButton_9', 'up_other','complete_9', 'viewButton_9', 'up_other');


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



document.getElementById('terms-checkbox-37').addEventListener('change', function() {
    var submitButton = document.getElementById('Documents-btn');

    if (this.checked) {
        submitButton.disabled = false; 
        submitButton.classList.add('enabled');
        submitButton.style.cursor = "pointer"; 
    } else {
        submitButton.disabled = true; 
        submitButton.classList.remove('enabled'); 
        submitButton.style.cursor = "not-allowed"; 
    }
});


document.getElementById('Documents-btn').disabled = false;

document.getElementById("Documents-btn").addEventListener("click", function() {
    fetch("status.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = "applicationView.php";
        } else {
            console.error("Error updating status:", data.error);
            alert("Failed to update status. Please try again.");
        }
    })
    .catch(error => {
        console.error("AJAX request failed:", error);
        alert("An error occurred. Please try again.");
    });
});

