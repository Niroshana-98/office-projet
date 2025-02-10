<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>
        <link rel="stylesheet" href="./css/userControlProfile.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <div class="profile-container" style="width: 900px;">
            <div class="profile-card">
                <div class="profile-header">
                    <h2><i class="fas fa-user-tie card-icon"></i> Officer Profile</h2>
                </div>
                <div class="profile-body">
                    <div class="profile-row">
                        <label>User ID:</label>
                        <span id="user_id">Loading...</span>
                    </div>
                    <div class="profile-row">
                        <label>Name:</label>
                        <span id="name">Loading...</span>
                    </div>
                    <div class="profile-row">
                        <label>NIC:</label>
                        <span id="nic">Loading...</span>
                    </div>
                    <div class="profile-row">
                        <label>Email:</label>
                        <span id="email">Loading...</span>
                    </div>
                    <div class="profile-row">
                        <label>Telephone:</label>
                        <span id="tel">Loading...</span>
                    </div>
                    <div class="profile-row">
                        <label>Designation:</label>
                        <span id="desi">Loading...</span>
                    </div>
                    <div class="profile-row">
                        <label>Office:</label>
                        <span id="offi">Loading...</span>
                    </div>
                    <div class="profile-row">
                        <label>Position:</label>
                        <span id="position">Loading...</span>
                    </div>
                </div>
                <div class="profile-footer" style="display: flex;">
                    <button id="delProfileBtn" class="del-btn">Delete Account</button>
                    <button id="editProfileBtn" class="edit-btn">Swap to Applicate Account</button>
                    <button id="actiProfileBtn" class="edit-btnAtv">Activate Account</button>
                </div>
            </div> 
        </div>

        <script src="./js/adminOfficerListForm.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
