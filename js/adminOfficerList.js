document.addEventListener("DOMContentLoaded", function () {
    let applicationsData = []; 

    // Fetch data from the server
    fetch('adminOfficerList_to_db.php') 
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
                        <td colspan="7" class="text-center text-danger">Failed to load Users List. Please try again later.</td>
                    </tr>
                `;
            }
        });

        function renderTable(data) {
            const tableBody = document.querySelector('.table tbody');
            if (!tableBody) {
                console.error('Table body element not found.');
                return;
            }
        
            tableBody.innerHTML = '';
        
            // Sort data to bring "To Activate" rows to the top
            data.sort((a, b) => {
                const statusA = getStatusLabels(a.status);
                const statusB = getStatusLabels(b.status);
        
                if (statusA === "To Activate" && statusB !== "To Activate") {
                    return -1; // Move "To Activate" to the top
                } else if (statusA !== "To Activate" && statusB === "To Activate") {
                    return 1; // Keep others below
                }
                return 0; // Keep order for other statuses
            });
        
            // Render the sorted data in the table
            if (Array.isArray(data) && data.length > 0) {
                data.forEach(app => {
                    const row = document.createElement('tr');
        
                    row.innerHTML = `
                        <td>${app.name}</td>
                        <td>${app.nic || 'N/A'}</td>
                        <td>${app.offi_name}</td>
                        <td>${app.desi}</td>
                        <td>${getStatusLabel(app.status)}</td>
                        <td>${getStatusLabels(app.status)}</td>
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
                        <td colspan="7" class="text-center">No new Users found.</td>
                    </tr>
                `;
            }
        }     
        

    function getStatusLabel(status) {
        if (status == 22 || status == 21 || status == 20 || status == 19) return "Office Head";
        if (status == 34 || status == 33 || status == 32 || status == 31) return " District Office Head";
        if (status == 46 || status == 45 || status == 44 || status == 43) return "Department Head";
        if (status == 58 || status == 57 || status == 56 || status == 55) return "Ministry Head";
        if (status == 62 || status == 61 || status == 60 || status == 59) return "CS Check Officer";
        if (status == 66 || status == 65 || status == 64 || status == 63) return "AO";
        if (status == 70 || status == 69 || status == 68 || status == 67) return "ACS";
        if (status == 74 || status == 73 || status == 72 || status == 71) return "DCS";
        if (status == 78 || status == 77 || status == 76 || status == 75) return "CS";
        if (status == 82 || status == 81 || status == 80 || status == 79) return "Accountant 1";
        if (status == 86 || status == 85 || status == 84 || status == 83) return "Accountant 2";
        return "Unknown"; // Default if no match
    }

    function getStatusLabels(status){
        if(status == 22 || status == 34 || status == 46 || status == 58 || status == 62 || status == 66 || status == 70 || status == 74 || status == 78 || status == 82 || status == 86) return "Activated";
        if(status == 21 || status == 33 || status == 45 || status == 57 || status == 61 || status == 65 || status == 69 || status == 73 || status == 77 || status == 81 || status == 85) return "To Activate";
        if(status == 20 || status == 32 || status == 44 || status == 56 || status == 60 || status == 64 || status == 68 || status == 72 || status == 76 || status == 80 || status == 84) return "Not Activate";
        if(status == 19 || status == 31 || status == 43 || status == 55 || status == 59 || status == 63 || status == 67 || status == 71 || status == 75 || status == 79 || status == 83) return "No Insert Data";
        return "Unknown";
    }

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();
    
        const filteredData = applicationsData.filter(app => {
            return (
                (app.name && app.name.toLowerCase().includes(searchTerm)) ||
                (app.nic && app.nic.toLowerCase().includes(searchTerm))
            );
        });
    
        renderTable(filteredData); // Render table with filtered data
    });
    
});
/*
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
            window.location.href = `csOfficersListForm.php?user_id=${user_id}`;
        } else {
            alert('Error setting session');
        }
    })
    .catch(error => console.error('Error setting session:', error));
}*/
