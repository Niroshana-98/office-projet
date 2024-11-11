document.addEventListener("DOMContentLoaded", function() {
    fetch('../subjectOfficerApprovedApplication_to_db.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('.table tbody');
            tableBody.innerHTML = '';

            data.forEach(app => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${app.app_no}</td>
                    <td>${app.name_eng}</td>
                    <td>${app.desi}</td>
                    <td><button class="btn btn-primary view-button" onclick="viewApplication(${app.app_no})">View</button></td>
                `;

                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});

function viewApplication(appNo) {
    fetch('setSessionAppNo.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `app_no=${appNo}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = `subjectOfficerApprovedApplicationForm.php?app_no=${appNo}`;
        } else {
            alert('Error setting session');
        }
    })
    .catch(error => console.error('Error setting session:', error));
}
