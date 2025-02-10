document.addEventListener("DOMContentLoaded", function () {
    let applicationsData = []; // To store fetched data for filtering

    // Fetch data from the server
    fetch('adminUserAccountList_to_db.php')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            applicationsData = data; 
            renderTable(data);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            const tableBody = document.querySelector('.table tbody');
            if (tableBody) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center text-danger">Failed to load Users List. Please try again later.</td>
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
                    <td>${app.user_id}</td>
                    <td>${app.name}</td>
                    <td>${app.nic || 'N/A'}</td>
                    <td>${(app.status >= 1 && app.status <= 5) ? app.desi_name : app.desi}</td>
                    <td>${app.offi_name}</td>
                    <td>
                        <button class="btn btn-primary view-button" onclick="viewApplication(${app.user_id})">
                            View
                        </button>
                    </td>
                `;

                tableBody.appendChild(row);
            });
        } else {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center">No new Users found.</td>
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
                (app.user_id && app.user_id.toString().includes(searchTerm)) ||
                (app.name && app.name.toLowerCase().includes(searchTerm)) ||
                (app.nic && app.nic.toLowerCase().includes(searchTerm))
            );
        });
    
        renderTable(filteredData); // Render table with filtered data
    });
    
});

function viewApplication(user_id) {
    fetch('setSessionUserId.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `user_id=${user_id}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = `adminUserAccountListForm.php?user_id=${user_id}`;
        } else {
            alert('Error setting session');
        }
    })
    .catch(error => console.error('Error setting session:', error));
}
