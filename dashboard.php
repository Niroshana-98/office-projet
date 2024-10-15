<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
        <link rel="stylesheet" href="./css/dashboard.css"> <!-- External CSS -->
    </head>
    <body>
        <div class="row text-center">
            <div class="col-1"></div>
            <div class="col-10">
                <h3 id="heading"> සේවා ව්‍යවස්ථාවේ අවශ්‍යතාවය මත පශ්චාත් උපාධි/ඩිප්ලෝමා පාඨමාලා සඳහා පූර්ව අනුමැතිය ලබා ගැනීම හා ප්‍රතිපාදන ඉල්ලුම් කිරීම සඳහා වන අයදුම්පත්‍රය</h3>
                <form class="msform" action="./api/dashboard_2db.php" method="POST">
                    <!-- Progress Bar-->
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Personal</strong></li>
                        <li id="personal"><strong>Job Details</strong></li>
                        <li id="payment"><strong>Education</strong></li>
                        <li id="finish"><strong>View</strong></li>
                        <li id="upload"><strong>Upload</strong></li>
                    </ul>
                    
                    <!--Fieldset 1-->
                    <fieldset>
                        <h3 class="fs-title">Personal Details:</h3>
                        <h2 class="steps">Step 1 - 5</h2>
                        <div class="row">
                            <div class="col-12 col-md-7">
                            <h5 for="ball">සම්පූර්ණ නම (සිංහලෙන්)</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <h5 for="ball">මුලකුරු සමග නම (සිංහලෙන්)</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="iname" name="iname" placeholder="" pattern="^(?:[ආ-හඊ-ඟඞ-ඳඹ-ඳ්ඪ-ති-ලු-නි-දේ]?\.[\s]*)*[අ-හඅ-හඉ-ළා-යි]+(?:\s+[අ-හඅ-හඉ-ළා-යි]+)*$" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">මුලකුරු සමග නම (ඉංග්‍රීසියෙන්)</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="iename" name="iename" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">ජා.හැ. අංකය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="nic" name="nic" placeholder="" pattern="^(\d{9}[vV]|\b(19|20)\d{10}\b)$" title="Please enter a valid NIC (9 digits followed by 'V' or 12 digits starting with '19' or '20')." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-7">
                                <h5 for="ball">පෞද්ගලික ලිපිනය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <h5 for="ball">දුරකථන අංකය (ස්ථාවර)</h5>
                                <div class="mb-3">
                                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="" pattern="^07\d{8}$" title="Please enter a valid Sri Lankan mobile number (starting with 07 and followed by 8 digits)." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <h5 for="ball">දුරකථන අංකය (ජංගම)</h5>
                                    <div class="mb-3">
                                        <input type="tel" class="form-control" id="htel" name="htel" placeholder="" pattern="^07\d{8}$" title="Please enter a valid Sri Lankan mobile number (starting with 07 and followed by 8 digits)." required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <h5 for="ball">ඊමේල් ලිපිනය</h5>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Only letters, Sinhala characters, periods, and single spaces are allowed." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" onclick="validateFieldset(this)" />
                    </fieldset>

                    <!--Fieldset 2-->
                    <fieldset>
                        <h3 class="fs-title">රැකියා විස්තර:</h3>
                        <h2 class="steps">Step 2 - 5</h2>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">නිලධාරියා අයත් සේවාව</h5>
                                <select class="form-select" aria-label="Default select example" name="service" id="service">
                                    <option selected>Open this select menu</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <h5 for="ball">නිලධාරියා අයත්වන ශ්‍රේණිය</h5>
                                <select class="form-select" aria-label="Default select example" name="grade" id="grade">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <h5 for="ball">පත්වීම ස්ථිරද? / නොමැතිද?</h5>
                                <select class="form-select" aria-label="Default select example" name="permenant" id="permenant">
                                    <option selected>Open this select menu</option>
                                    <option value="ස්ථිරයි">ස්ථිරයි</option>
                                    <option value="ස්ථිර නැත">ස්ථිර නැත</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">තනතුර</h5>
                                <select class="form-select" aria-label="Default select example" name="job" id="job">
                                    <option selected>Open this select menu</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">සේවා ස්ථානය</h5>
                                <input type="text" class="form-control" id="location" placeholder="" name="location">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">අයත්වන අමාත්‍යාංශය</h5>
                                <select class="form-select" aria-label="Default select example" name="ministry" id="ministry">
                                    <option selected>Open this select menu</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කල දිනය</h5>
                                <input type="date" class="form-control" id="includeDate" name="includeDate" placeholder="">
                            </div>
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>

                    <!--Fieldset 3-->
                    <fieldset>
                        <h3 class="fs-title">උපාදි / ඩිප්ලෝමා පිලිබඳ විස්තර:</h3>
                        <h2 class="steps">Step 3 - 5</h2>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h5 for="ball">පශ්චාත් උපාදිය/ ඩිප්ලෝමාව පැවත්වෙන විශ්ව විද්‍යාලය/ ආයතනය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="university" name="university" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">පශ්චාත් උපාදිය/ ඩිප්ලෝමාව</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="digree" name="digree" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">පාඨමාලාව හැදෑරීමට අදාල සේවා ව්‍යවස්ථාවේ උ අංකය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="eno" name="eno" placeholder=""  required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <h5 for="ball">පාඨමාලාව ආරම්භ කරනු ලැබූ දිනය</h5>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="sDate" name="sDate" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">පාඨමාලාව අවසන් වීමට නියමිත දිනය</h5>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="eDate" name="eDate" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">ප්‍රතිපාදනයේ ප්‍රමාණය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="provision" name="provision" placeholder="" required>
                                </div>
                            </div>
                            <p>(පාඨමාලා ගාස්තුව රු.400,000.00 ට වඩා වැඩි වන්නේ නම් එම වැඩි වන මුදල පෞද්ගලිකව දරා ගත යුතුය.)</p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">මීට පෙර සේවා ව්‍යස්ථාවට අදාල වෙනත් පාඨමාලා ගාස්තු ලබාගෙන</h5>
                                <select class="form-select" id="charges" name="charges" aria-label="Default select example" onchange="toggleTextBox()">
                                    <option selected>තෝරන්න</option>
                                    <option value="1">ඇත</option>
                                    <option value="2">නැත</option>
                                </select>
                            </div>
                        </div>
                        <!-- Course Details with Plus Button -->
                        <div class="rows" id="textBoxRow" style="display:none;">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">පාඨමාලාවේ නම</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="courseName1" name="courseName" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">පශ්චාත් උපාදි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="universityName1" name="universityName" placeholder=""  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලාව ආරම්භ කල දිනය</h5>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" id="csDate1" name="csDate" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">රජය මඟින් ලබාගත් ප්‍රතිපාදනය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="loan1" name="loan" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලා ගාස්තුව</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="cFees1" name="cFees" placeholder="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button id="addCourseButton" class="btn btn-primary">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Course Details with Minus Button -->
                        <div class="rows" id="textBoxRows" style="display:none;">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">පාඨමාලාවේ නම</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="courseName2" name="courseName2" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">පශ්චාත් උපාදි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="universityName2" name="universityName2" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලාව ආරම්භ කල දිනය</h5>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" id="csDate2" name="csDate2" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">රජය මඟින් ලබාගත් ප්‍රතිපාදනය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="loan2" name="loan2" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලා ගාස්තුව</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="cFees2" name="cFees2" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button id="removeCourseButton" class="btn btn-primary">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="courseDeatails"></div>

                        <input type="submit" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>

                    <!--Fieldset 4-->
                    <fieldset>

                        <!-- Personal Details Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered small-table">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="4" class="text-left"><h5 class="table-head">1) පෞද්ගලික විස්තර</h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-left">සම්පූර්ණ නම (සිංහලෙන්)</th>
                                        <td class="text-left" colspan="3" id="fnameCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">මුලකුරු සමග නම (සිංහලෙන්)</th>
                                        <td class="text-left" id="inameCell"></td>
                                        <th class="text-left">මුලකුරු සමග නම (ඉංග්‍රීසියෙන්)</th>
                                        <td class="text-left" id="ienameCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">හැදුනුම්පත් අංකය</th>
                                        <td class="text-left" id="nicCell"></td>
                                        <th class="text-left">පෞද්ගලික ලිපිනය</th>
                                        <td class="text-left" id="addressCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">දුරකතන අංකය - ස්ථාවර</th>
                                        <td class="text-left" id="telCell"></td>
                                        <th class="text-left">දුරකතන අංකය - ජංගම</th>
                                        <td class="text-left" id="htelCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">විද්‍යුත් තැපැල් ලිපිනය</th>
                                        <td class="text-left" colspan="3" id="emailCell"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- Job Details Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" style="border: 1px solid;">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="4" class="text-left"><h5 class="table-head">2) රැකියා විස්තර</h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-left">නිලධාරියා අයත් සේවාව</th>
                                        <td class="text-left" colspan="3" id="serviceCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">නිලධාරියා අයත්වන ශ්‍රේණිය</th>
                                        <td class="text-left" id="gradeCell"></td>
                                        <th class="text-left">පත්වීම ස්ථිරද? / නොමැතිද?</td>
                                        <td class="text-left" id="permenantCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">තනතුර</th>
                                        <td class="text-left" id="jobCell"></td>
                                        <th class="text-left">සේවා ස්ථානය</th>
                                        <td class="text-left" id="locationCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">අයත්වන අමාත්‍යාංශය</th>
                                        <td class="text-left" id="ministryCell"></td>
                                        <th class="text-left">දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කල දිනය</td>
                                        <td class="text-left" id="includeDateCell"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Education Details Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" style="border: 1px solid;">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="4" class="text-left"><h5 class="table-head">3) උපාදි / ඩිප්ලෝමා පිලිබඳ විස්තර</h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-left">පශ්චාත් උපාදිය/ ඩිප්ලෝමාව පැවත්වෙන විශ්ව විද්‍යාලය/ ආයතනය</th>
                                        <td class="text-left" colspan="3" id="universityCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">පශ්චාත් උපාදිය/ ඩිප්ලෝමාව</th>
                                        <td class="text-left" id="digreeCell"></td>
                                        <th class="text-left">පාඨමාලාව හැදෑරීමට අදාල සේවා ව්‍යවස්ථාවේ උ අංකය</td>
                                        <td class="text-left" id="enoCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">පාඨමාලාව ආරම්භ කරනු ලැබූ දිනය</th>
                                        <td class="text-left" id="sDateCell"></td>
                                        <th class="text-left">පාඨමාලාව අවසන් වීමට නියමිත දිනය</th>
                                        <td class="text-left" id="eDateCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">ප්‍රතිපාදනයේ ප්‍රමාණය</th>
                                        <td class="text-left" id="provisionCell"></td>
                                        <th class="text-left">මීට පෙර සේවා ව්‍යස්ථාවට අදාල වෙනත් පාඨමාලා ගාස්තු ලබාගෙන</td>
                                        <td class="text-left" id="chargesCell"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Education Details Table extra #1 -->
                        <div id="nextFieldsetTableContainer" style="display: none;">
                            <h5 class="view-h5">මීට පෙර සේවා ව්‍යවස්ථාවට අදාළව පශ්චාත් උපාධි/ ඩිප්ලෝමා පාඨමාලා ගාස්තු ලබා ගෙන ඇත්නම් ඒ පිළිබඳ තොරතුරු</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered" style="border: 1px solid;">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="4" class="text-left"><h5 class="table-head">3.1) උපාදි / ඩිප්ලෝමා පිලිබඳ විස්තර</h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-left">පාඨමාලාවේ නම</th>
                                            <td class="text-left" colspan="3" id="courseName1Cell"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">පශ්චාත් උපාදි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</th>
                                            <td class="text-left" id="universityName1Cell"></td>
                                            <th class="text-left">පාඨමාලාව ආරම්භ කල දිනය</td>
                                            <td class="text-left" id="csDate1Cell"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">රජය මඟින් ලබාගත් ප්‍රතිපාදනය</th>
                                            <td class="text-left" id="loan1Cell"></td>
                                            <th class="text-left">පාඨමාලා ගාස්තුව</th>
                                            <td class="text-left" id="cFees1Cell"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Education Details Table extra #2 -->
                        <div id="nextFieldsetTableContainers" style="display: none;">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="border: 1px solid;">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="4" class="text-left"><h5 class="table-head">3.2) උපාදි / ඩිප්ලෝමා පිලිබඳ විස්තර</h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-left">පාඨමාලාවේ නම</th>
                                            <td class="text-left" colspan="3" id="courseName2Cell"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">පශ්චාත් උපාදි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</th>
                                            <td class="text-left" id="universityName2Cell"></td>
                                            <th class="text-left">පාඨමාලාව ආරම්භ කල දිනය</td>
                                            <td class="text-left" id="csDate2Cell"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">රජය මඟින් ලබාගත් ප්‍රතිපාදනය</th>
                                            <td class="text-left" id="loan2Cell"></td>
                                            <th class="text-left">පාඨමාලා ගාස්තුව</th>
                                            <td class="text-left" id="cFees2Cell"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="checkbox-container">
                            <input type="checkbox" id="agreeCheckbox">
                            <label for="agreeCheckbox">උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.</label>
                        </div>
                        <input type="submit" name="next" class="next action-button" id="submitButton" value="Submit" disabled />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>

                    <!--Fieldset 5-->
                    <fieldset>
                        <h3 class="fs-title">පරිලෝකන (scan) කර ඉදිරිපත් කරන ලේඛන:</h3>
                        <h2 class="steps">Step 5 - 5</h2>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <h5 for="ball">ප්‍රතිපාදන ඉල්ලීමක් නම් පූර්ව අනුමැතිය ලබා ගත් ලිපිය</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">අදාල සේවා ව්‍යස්ථාවේ උදෘතයන්</h5><br>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">සේවය ස්ථිර කිරීමේ ලිපියේ සහතික කරන ලද පිටපත</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <h5 for="ball">නිලධාරියා දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කරන ලද ලිපියේ සහතික කල පිටපත</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">නිලධාරියා අදාල පාඨමාලාව සඳහා තොරා ගත් බවට වන ලිපිය</h5><br>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">විශ්ව විද්‍යාල ප්‍රතිපාදන කොමිෂන් සභාව විසින් අනුමත කරන ලද විශ්ව විද්‍යාලයක බව සහතික කරන ලද ලිපිය</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <h5 for="ball">පාථමාලාව අවසන් කළ බවට සහතිකය</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">මුදල් ගෙවූ රිසිට්පත්</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">වෙනත් </h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
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
