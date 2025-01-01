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
                <span class="search-icon">&#128269;</span> <!-- Unicode for search icon -->
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
                    <th>
                        Application ID
                    </th>
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
    <script src="./js/subjectOfficerNewApplication.js"></script>
</body>
</html>
