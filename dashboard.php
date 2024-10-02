<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multi-step form</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <link rel="stylesheet" href="./css/dashboard.css"> <!-- External CSS -->
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h1 id="heading">Dashboard</h1>
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Personal</strong></li>
                            <li id="personal"><strong>Job Details</strong></li>
                            <li id="payment"><strong>Image</strong></li>
                            <li id="finish"><strong>Finish</strong></li> <!-- Corrected ID to avoid duplicates -->
                        </ul>
                        <br>
                        <!-- fieldsets -->
                        <fieldset class="white-box">
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Personal Details:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 4</h2>
                                    </div>
                                </div>
                                <h5 for="ball">සම්පූර්ණ නම</h5><input type="text">
                                <h5 for="ball">හැදුනුම්පත් අංකය</h5><input type="text">
                                <h5 for="ball">පෞද්ගලික ලිපිනය</h5><input type="text">
                                <h5 for="ball">දුරකතන අංකය - ස්ථාවර</h5><input type="text">
                                <h5 for="ball">දුරකතන අංකය - ජංගම</h5><input type="text">
                                <h5 for="ball">විද්‍යුත් තැපැල් ලිපිනය</h5><input type="text">
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Job Details:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 4</h2>
                                    </div>
                                </div>
                                <!-- Add fields as needed -->
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Image Upload:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 4</h2>
                                    </div>
                                </div>
                                <!-- Add image upload fields as needed -->
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 4 - 4</h2>
                                    </div>
                                </div>
                                <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-3"><img src="img.png" class="fit-image"></div>
                                </div>
                                <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="./scripts/dashboard.js"></script>
</body>
</html>
