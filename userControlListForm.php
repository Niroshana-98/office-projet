<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="./css/userControlProfile.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-header">
                <h2>User Profile</h2>
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
            </div>
            <div class="profile-footer">
                <button class="edit-btn">Edit Profile</button>
            </div>
        </div>
    </div>

    <script src="./js/userControlListForm.js"></script>
</body>
</html>
