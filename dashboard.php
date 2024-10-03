<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
        <link rel="stylesheet" href="./css/dashboard.css"> <!-- External CSS -->
    </head>
    <body>
        <div class="row text-center">
            <div class="col-1"></div>
            <div class="col-10">
                <h1 id="heading">DASHBOARD</h1>
                <form class="msform">
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Personal</strong></li>
                        <li id="personal"><strong>Job Details</strong></li>
                        <li id="payment"><strong>Image</strong></li>
                        <li id="finish"><strong>Finish</strong></li>
                    </ul>
                    
                    <!--Fieldset 1-->
                    <fieldset>
                        <h3 class="fs-title">Personal Details:</h3>
                        <h2 class="steps">Step 1 - 4</h2>
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">සම්පූර්ණ නම (සිංහලෙන්)</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput2" class="form-label">මුලකුරු සමග නම (සිංහලෙන්)</label>
                                    <input type="text" class="form-control" id="iname" name="iname" placeholder="" pattern="^(?:[ආ-හඊ-ඟඞ-ඳඹ-ඳ්ඪ-ති-ලු-නි-දේ]?\.[\s]*)*[අ-හඅ-හඉ-ළා-යි]+(?:\s+[අ-හඅ-හඉ-ළා-යි]+)*$" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput3" class="form-label">මුලකුරු සමග නම (ඉංග්‍රීසියෙන්)</label>
                                    <input type="text" class="form-control" id="iename" name="iename" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput4" class="form-label">ජා.හැ. අංකය</label>
                                    <input type="text" class="form-control" id="nic" name="nic" placeholder="" pattern="^(\d{9}[vV]|\b(19|20)\d{10}\b)$" title="Please enter a valid NIC (9 digits followed by 'V' or 12 digits starting with '19' or '20')." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput5" class="form-label">පෞද්ගලික ලිපිනය</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput6" class="form-label">දුරකථන අංකය (ස්ථාවර)</label>
                                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="" pattern="^07\d{8}$" title="Please enter a valid Sri Lankan mobile number (starting with 07 and followed by 8 digits)." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput7" class="form-label">දුරකථන අංකය (ජංගම)</label>
                                        <input type="tel" class="form-control" id="htel" name="htel" placeholder="" pattern="^07\d{8}$" title="Please enter a valid Sri Lankan mobile number (starting with 07 and followed by 8 digits)." required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput8" class="form-label">ඊමේල් ලිපිනය</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Only letters, Sinhala characters, periods, and single spaces are allowed." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" onclick="validateFieldset(this)" />
                    </fieldset>

                    <!--Fieldset 2-->
                    <fieldset>
                        <h3 class="fs-title">Personal Details:</h3>
                        <h2 class="steps">Step 2 - 4</h2>
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <h5 for="ball">සම්පූර්ණ නම (සිංහලෙන්)</h5>
                                <input type="text" class="form-control" id="exampleFormControlInput9" placeholder="">
                            </div>
                            <div class="col-12 col-md-5">
                                <h5 for="ball">මුලකුරු සමග නම (සිංහලෙන්)</h5>
                                <input type="text" class="form-control" id="exampleFormControlInput10" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">මුලකුරු සමග නම (ඉංග්‍රීසියෙන්)</h5>
                                <input type="text" class="form-control" id="exampleFormControlInput11" placeholder="">
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">ජා.හැ. අංකය</h5>
                                <input type="text" class="form-control" id="exampleFormControlInput12" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <h5 for="ball">පෞද්ගලික ලිපිනය</h5>
                                <input type="text" class="form-control" id="exampleFormControlInput13" placeholder="">
                            </div>
                            <div class="col-12 col-md-5">
                                <h5 for="ball">දුරකථන අංකය (ස්ථාවර)</h5>
                                <input type="text" class="form-control" id="exampleFormControlInput14" placeholder="">
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <h5 for="ball">දුරකථන අංකය (ජංගම)</h5>
                                    <input type="text" class="form-control" id="exampleFormControlInput15" placeholder="">
                                </div>
                                <div class="col-12 col-md-5">
                                    <h5 for="ball">ඊමේල් ලිපිනය</h5>
                                    <input type="text" class="form-control" id="exampleFormControlInput16" placeholder="">
                                </div>
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                </form>
            </div>
            <div class="col-1"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src="./scripts/dashboard.js"></script>
    </body>
</html>
