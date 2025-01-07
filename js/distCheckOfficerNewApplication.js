document.addEventListener("DOMContentLoaded", function () {
    let applicationsData = []; // To store fetched data for filtering

    // Fetch data from the server
    fetch('distCheckOfficerNewApplication_to_db.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            applicationsData = data; // Save data for filtering
            renderTable(data); // Populate the table with fetched data
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            const tableBody = document.querySelector('.table tbody');
            if (tableBody) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="4" class="text-center text-danger">Failed to load applications. Please try again later.</td>
                    </tr>
                `;
            }
        });

    // Function to render the table
    function renderTable(data) {
        const tableBody = document.querySelector('.table tbody');
        if (!tableBody) {
            console.error('Table body element not found.');
            return;
        }

        // Clear the table body
        tableBody.innerHTML = '';

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
            tableBody.innerHTML = `
                <tr>
                    <td colspan="4" class="text-center">No new applications found.</td>
                </tr>
            `;
        }
    }

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();
        const filteredData = applicationsData.filter(app => {
            return (
                app.app_no.toString().includes(searchTerm) ||
                app.name_eng.toLowerCase().includes(searchTerm) ||
                (app.desi_name && app.desi_name.toLowerCase().includes(searchTerm))
            );
        });

        renderTable(filteredData); // Render table with filtered data
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
            window.location.href = `distCheckOfficerNewApplicationForm.php?app_no=${appNo}`;
        } else {
            alert('Error setting session');
        }
    })
    .catch(error => console.error('Error setting session:', error));
}
