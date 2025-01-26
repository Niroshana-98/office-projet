<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/trackApplication.css">
    <script src ="./js/trackApplication.js"></script>
    <title>Document</title>
</head>
<body>
    <button class="back-button" onclick="window.history.back();">
      <span class="arrow">&larr;</span> Back
    </button>

    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
      <h1 id = "name_eng">Hi,</h1>
      <div class="row">
        <div class="progress" id="progress1">
          <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
            <span class="progress-text">Overall Progress: 20%</span>
          </div>
        </div>                        
      </div>
      <div class="row">
        <div class="row step">
          <div id="div1" class="col-md-2" >
            <span class="fa fa-cloud-upload"></span>
            <p>Submit Application</p>
          </div>
          <div class="col-md-2  hidden-step" id="step1" >
            <span class="fa" id ="offiIcon"><i class="bi bi-building"></i></span>
            <div class="marquee-container">
              <p id="offiName">Office</p>
            </div>
          </div>
          <div class="col-md-2 hidden-step" id="step2">
            <span class="fa" id="distIcon"><i class="bi bi-building"></i></span>
            <div class="marquee-container">
              <p id="distOffiName">District Office</p>
            </div>
          </div>
          <div class="col-md-2  hidden-step" id="step3" >
            <span class="fa" id ="depIcon"><i class="bi bi-building"></i></span>
            <div class="marquee-container">
              <p id="depName">Department</p>
            </div>
          </div>
          <div class="col-md-2  hidden-step" id="step4" >
            <span class="fa" id ="minIcon"><i class="bi bi-building"></i></span>
            <div class="marquee-container">
              <p id="minName">Ministry</p>
            </div>
          </div>
          <div id="step5" class="col-md-2">
            <span class="fa" id ="csIcon"><i class="bi bi-building"></i></span>
            <p>Chief Secetariat Office</p>
          </div>
        </div>
      </div>
      <div class="row setup-content step activeStepInfo" id="step-2">
        <div class="col-xs-12">
          <div class="col-md-12 well text-center modern-notice">
            <h1 class="notice-title">NOTICE</h1>
            <h3 class="underline"></h3>
            <h3 id="location"></h3>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>      
</body>
</html>