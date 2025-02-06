<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Officer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/createOfficer.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.3.0/select2-bootstrap-5-theme.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Create New Officer Account</h2>
        <form>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <i class="fas fa-building"></i>
                <select id="selectOffi" name="selectOffi" required>
                    <option value="">Select Office</option>
                </select>
            </div>
            <div class="input-group">
                <i class="fas fa-user-tag"></i>
                <select id="selectPosi" required>
                    <option value="">Select Position</option>
                    <option value="position1">Office Head</option>
                    <option value="position2">District Office Head</option>
                    <option value="position3">Department Head</option>
                    <option value="position4">Ministry Head</option>
                    <option value="position5">CS Check Officer</option>
                    <option value="position6">AO</option>
                    <option value="position7">ACS</option>
                    <option value="position8">DCS</option>
                    <option value="position9">CS</option>
                    <option value="position10">Accountant 1</option>
                    <option value="position11">Accountant 2</option>
                </select>
            </div>
            <button type="submit" class="btn">Create Officer</button>
        </form>
    </div>

    <script src="./js/adminCreateNewAcc.js"></script>
</body>
</html>
