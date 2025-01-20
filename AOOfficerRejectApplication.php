<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/applicationPage.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Application Page</h2>
        <p>Welcome to the Application Page! Here you can manage user applications and view details.</p>

        <div class="search-bar">
            <label for="searchInput" class="sr-only">Search Applications:</label>
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
                    placeholder="Search by Application ID, Name, or Position">
            </div>
        </div>
        
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Application ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>View</th>
                </tr>
            </thead> 
            <tbody>
                
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/AOOfficerRejectApplication.js"></script>
</body>
</html>
