<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Account</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/applicationPage.css">
    </head>
    <body>
        <div class="container mt-4">
            <h2>Chief Secretariat Officer Account</h2>
            <p>Welcome to the CS Officer Account Page! Here you can manage users and view details.</p>

            <div class="search-bar">
                <label for="searchInput" class="sr-only">Search Officers:</label>
                <div class="search-bar-container">
                    <span class="search-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </span> 
                    <input 
                        type="text" 
                        id="searchInput" 
                        class="search-bar-input" 
                        placeholder="Search by Officers ID, Name, or NIC">
                </div>
            </div>
            
            <table class="table table-striped mt-3">
                <thead>
                    <tr> 
                        <th>Name</th>
                        <th>NIC</th>
                        <th>Office</th>
                        <th>Designation</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>View</th> 
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./js/adminOfficerList.js"></script>
    </body>
</html>
