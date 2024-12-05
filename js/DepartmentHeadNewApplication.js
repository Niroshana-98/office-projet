document.addEventListener("DOMContentLoaded", function () {
    // Fetch data from the server
    fetch('../DepartmentHeadNewApplication_to_db.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Get the table body element
            const tableBody = document.querySelector('.table tbody');

            if (!tableBody) {
                console.error('Table body element not found.');
                return;
            }

            // Clear the table body
            tableBody.innerHTML = '';

            // Populate table rows with fetched data
            if (Array.isArray(data) && data.length > 0) {
                data.forEach(app => {
                    const row = document.createElement('tr');

                    row.innerHTML = `
                        <td>${app.app_no}</td>
                        <td>${app.name_eng}</td>
                        <td>${app.desi_name || 'N/A'}</td>
                        <td>
                            <button class="btn btn-primary view-button" onclick="viewApplication(${app.app_no})">
                                View
                            </button>
                        </td>
                    `;

                    tableBody.appendChild(row);
                });
            } else {
                // Display a message if no applications are found
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="text-center">No new applications found.</td>
                    </tr>
                `;
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);

            //display an error message in the table
            const tableBody = document.querySelector('.table tbody');
            if (tableBody) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="text-center text-danger">Failed to load applications. Please try again later.</td>
                    </tr>
                `;
            }
        });
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
            window.location.href = `DepartmentHeadNewApplicationForm.php?app_no=${appNo}`;
        } else {
            alert('Error setting session');
        }
    })
    .catch(error => console.error('Error setting session:', error));
}
