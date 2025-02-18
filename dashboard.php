<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/register.css"> <!-- External CSS -->
    </head>
    <body>
        
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container-fluid">
            <!-- Left-Aligned Logo -->
            <a class="navbar-brand d-flex align-items-center" href="http://www.cs.sp.gov.lk/index_en.html">
                <img src="./images/logo.png" alt="logo" class="logo">
            </a>

            <!-- Center-Aligned Text -->
            <div class="navbar-text text-center flex-grow-1">Chief Secretariat Southern Province</div>

            <!-- Right-Aligned Logout Button -->
            <div class="d-flex">
                <a href="index.html" class="btn btn-outline-danger me-2" id="logout">Logout</a>
            </div>
        </div>
    </nav> 

        <div class="row text-center">
            <div class="col-1"></div>
            <div class="col-10">
                <h3 id="heading"> සේවා ව්‍යවස්ථාවේ අවශ්‍යතාවය මත පශ්චාත් උපාධි/ඩිප්ලෝමා පාඨමාලා සඳහා පූර්ව අනුමැතිය ලබා ගැනීම හා ප්‍රතිපාදන ඉල්ලුම් කිරීම සඳහා වන අයදුම්පත්‍රය</h3>
                <form class="msform" id="application" action="./dashboard_to_db.php" method="POST">
                    <!-- Progress Bar-->
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Personal</strong></li>
                        <li id="personal"><strong>Job Details</strong></li>
                        <li id="payment"><strong>Education</strong></li>
                        <li id="finish"><strong>View</strong></li>
                    </ul>
                    <!--Fieldset 1-->
                    <fieldset>
                    <div class="d-flex align-items-center gap-4">
                        <h5 class="mb-0">ඔබ මෙම අයදුම්පත යොමුකරනු ලබන්නේ</h5>
                        <select class="form-select required-field" id="reason" name="reason" style="width: 450px;" required>
                            <option value="">Open this select menu</option>
                            <option value="1">පූර්ව අනුමැතිය හා ප්‍රතිපාදන ඉල්ලුම් කිර්‍රිමට</option>
                            <option value="2">පූර්ව අනුමැතිය ලබාගැනීමට</option>
                        </select>
                    </div>
                        <h3 class="fs-title">Personal Details:</h3>
                        <h2 class="steps">Step 1 - 4</h2>
                        <div class="row">
                            <div class="col-12 col-md-6">
                            <h5 for="ball">සම්පූර්ණ නම (සිංහලෙන්)</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control required-field" id="fname" name="fname" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">මුලකුරු සමග නම (සිංහලෙන්)</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control required-field" id="iname" name="iname" placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">මුලකුරු සමග නම (ඉංග්‍රීසියෙන්)</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control required-field" id="iename" name="iename" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">ජා.හැ. අංකය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="nic" name="nic" placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">පෞද්ගලික ලිපිනය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control required-field" id="address" name="address" placeholder="" required >
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">දුරකථන අංකය (ස්ථාවර)</h5>
                                <div class="mb-3">
                                    <input type="tel" class="form-control required-field" id="tel" name="tel" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">දුරකථන අංකය (ජංගම)</h5>
                                    <div class="mb-3">
                                        <input type="tel" class="form-control" id="htel" name="htel" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">ඊමේල් ලිපිනය</h5>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="" readonly>
                                    </div>
                                </div>
                            </div>
                        <input type="button" name="next" class="next action-button" value="Next" onclick="validateFields()"/>
                    </fieldset>

                    <!--Fieldset 2-->
                    <fieldset>
                        <h3 class="fs-title">රැකියා විස්තර:</h3>
                        <h2 class="steps">Step 2 - 4</h2>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">නිලධාරියා අයත් සේවාව</h5>
                                <select class="form-select" name="service" id="service">
                                    <option selected>Open this select menu</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <h5 for="ball">නිලධාරියා අයත්වන ශ්‍රේණිය</h5>
                                <select class="form-select" name="grade" id="grade">
                                    <option selected>Open this select menu</option>
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
                                <select class="form-select" name="job" id="job">
                                    <option selected>Open this select menu</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">සේවා ස්ථානය</h5>
                                <input type="text" class="form-control" id="location" placeholder="" name="location" readonly>
                                
                                <!-- Hidden input to store offi_id -->
                                <input type="hidden" id="offi_id" name="offi_id">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ministry">අයත්වන අමාත්‍යාංශය</h5>
                                <!--<select class="form-select" aria-label="Default select example" name="ministry" id="ministry">
                                    <option value="" selected>Open this select menu</option>
                                </select>-->
                                <input type="text" class="form-control" id="ministry" placeholder="" name="ministry" readonly>
                                <input type="hidden" id="min_id" name="min_id">
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
                        <h3 class="fs-title">උපාධි / ඩිප්ලෝමා පිලිබඳ විස්තර:</h3>
                        <h2 class="steps">Step 3 - 4</h2>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h5 for="ball">පශ්චාත් උපාධිය/ ඩිප්ලෝමාව පැවත්වෙන විශ්ව විද්‍යාලය/ ආයතනය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="university" name="university" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">පශ්චාත් උපාධිය/ ඩිප්ලෝමාව</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="digree" name="digree" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">පාඨමාලාව හැදෑරීමට අදාල සේවා ව්‍යවස්ථාවේ උදෘත අංකය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="eno" name="eno" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <h5 for="ball">පාඨමාලාව ආරම්භ කරනු ලැබූ දිනය</h5>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="sDate" name="sDate" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">පාඨමාලාව අවසන් වීමට නියමිත දිනය</h5>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="eDate" name="eDate" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">ප්‍රතිපාදනයේ ප්‍රමාණය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="provision" name="provision" placeholder="">
                                </div>
                            </div>
                            <p>(පාඨමාලා ගාස්තුව රු.400,000.00 ට වඩා වැඩි වන්නේ නම් එම වැඩි වන මුදල පෞද්ගලිකව දරා ගත යුතුය.)</p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="d-flex align-items-center">
                                    <h5 for="ball" class="me-3">මීට පෙර සේවා ව්‍යස්ථාවට අදාල වෙනත් පාඨමාලා ගාස්තු ලබාගෙන</h5>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="ඇත">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            ඇත
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="නැත" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            නැත
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Course Details with Plus Button -->
                        <div class="rows" id="textBoxRow" style="display:none;">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">පාඨමාලාවේ නම</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="courseName1" name="courseName1" placeholder="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">පශ්චාත් උපාධි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="universityName1" name="universityName1" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලාව ආරම්භ කල දිනය</h5>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" id="csDate1" name="csDate1" placeholder="">
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලා ගාස්තුව</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="cFees1" name="cFees1" placeholder="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">රජය මඟින් ලබාගත් ප්‍රතිපාදන ප්‍රමාණය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="loan1" name="loan1" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" id="addCourseButton" class="btn btn-primary">
                                            +
                                        </button>
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
                                        <input type="text" class="form-control" id="courseName2" name="courseName2" placeholder="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">පශ්චාත් උපාධි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="universityName2" name="universityName2" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලාව ආරම්භ කල දිනය</h5>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" id="csDate2" name="csDate2" placeholder="" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලා ගාස්තුව</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="cFees2" name="cFees2" placeholder="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">රජය මඟින් ලබාගත් ප්‍රතිපාදන ප්‍රමාණය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="loan2" name="loan2" placeholder="">
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

                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>

                    <!--Fieldset 4-->
                    <fieldset>

                        <!-- Personal Details Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered small-table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="4" class="text-left"><h5 class="table-head">1) පෞද්ගලික විස්තර</h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-left">1.1) සම්පූර්ණ නම (සිංහලෙන්)</th>
                                        <td class="text-left" colspan="3" id="fnameCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">1.2) මුලකුරු සමග නම (සිංහලෙන්)</th>
                                        <td class="text-left" id="inameCell"></td>
                                        <th class="text-left">1.3) මුලකුරු සමග නම (ඉංග්‍රීසියෙන්)</th>
                                        <td class="text-left" id="ienameCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">1.4) හැදුනුම්පත් අංකය</th>
                                        <td class="text-left" id="nicCell"></td>
                                        <th class="text-left">1.5) පෞද්ගලික ලිපිනය</th>
                                        <td class="text-left" id="addressCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">1.6) දුරකතන අංකය - ස්ථාවර</th>
                                        <td class="text-left" id="telCell"></td>
                                        <th class="text-left">1.7) දුරකතන අංකය - ජංගම</th>
                                        <td class="text-left" id="htelCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">1.8) විද්‍යුත් තැපැල් ලිපිනය</th>
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
                                        <th scope="row" class="text-left">2.1) නිලධාරියා අයත් සේවාව</th>
                                        <td class="text-left" colspan="3" id="serviceCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">2.2) නිලධාරියා අයත්වන ශ්‍රේණිය</th>
                                        <td class="text-left" id="gradeCell"></td>
                                        <th class="text-left">2.3) පත්වීම ස්ථිරද? / නොමැතිද?</td>
                                        <td class="text-left" id="permenantCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">2.4) තනතුර</th>
                                        <td class="text-left" id="jobCell"></td>
                                        <th class="text-left">2.5) සේවා ස්ථානය</th>
                                        <td class="text-left" id="locationCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">2.6) අයත්වන අමාත්‍යාංශය</th>
                                        <td class="text-left" id="ministryCell"></td>
                                        <th class="text-left">2.7) දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කල දිනය</td>
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
                                        <th scope="col" colspan="4" class="text-left"><h5 class="table-head">3) උපාධි / ඩිප්ලෝමා පිළිබඳ විස්තර</h5></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-left">3.1) පශ්චාත් උපාධිය/ ඩිප්ලෝමාව පැවත්වෙන විශ්ව විද්‍යාලය/ ආයතනය</th>
                                        <td class="text-left" colspan="3" id="universityCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">3.2) පශ්චාත් උපාධිය/ ඩිප්ලෝමාව</th>
                                        <td class="text-left" id="digreeCell"></td>
                                        <th class="text-left">3.3) පාඨමාලාව හැදෑරීමට අදාල සේවා ව්‍යවස්ථාවේ උදෘත අංකය</td>
                                        <td class="text-left" id="enoCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">3.4) පාඨමාලාව ආරම්භ කරනු ලැබූ දිනය</th>
                                        <td class="text-left" id="sDateCell"></td>
                                        <th class="text-left">3.5) පාඨමාලාව අවසන් වීමට නියමිත දිනය</th>
                                        <td class="text-left" id="eDateCell"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="text-left">3.6) ප්‍රතිපාදනයේ ප්‍රමාණය</th>
                                        <td class="text-left" id="provisionCell"></td>
                                        <th class="text-left">3.7) මීට පෙර සේවා ව්‍යස්ථාවට අදාල වෙනත් පාඨමාලා ගාස්තු ලබාගෙන</td>
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
                                            <th scope="col" colspan="4" class="text-left"><h5 class="table-head">4) උපාධි / ඩිප්ලෝමා පිළිබඳ විස්තර</h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-left">4.1) පාඨමාලාවේ නම</th>
                                            <td class="text-left" colspan="3" id="courseName1Cell"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">4.2) පශ්චාත් උපාධි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</th>
                                            <td class="text-left" id="universityName1Cell"></td>
                                            <th class="text-left">4.3) පාඨමාලාව ආරම්භ කල දිනය</td>
                                            <td class="text-left" id="csDate1Cell"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">4.4) පාඨමාලා ගාස්තුව</th>
                                            <td class="text-left" id="loan1Cell"></td>
                                            <th class="text-left">4.5) රජය මඟින් ලබාගත් ප්‍රතිපාදනය</th>
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
                                            <th scope="col" colspan="4" class="text-left"><h5 class="table-head">5) උපාධි / ඩිප්ලෝමා පිළිබඳ විස්තර</h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-left">5.1) පාඨමාලාවේ නම</th>
                                            <td class="text-left" colspan="3" id="courseName2Cell"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">5.2) පශ්චාත් උපාධි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</th>
                                            <td class="text-left" id="universityName2Cell"></td>
                                            <th class="text-left">5.3) පාඨමාලාව ආරම්භ කල දිනය</td>
                                            <td class="text-left" id="csDate2Cell"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-left">5.4) පාඨමාලා ගාස්තුව</th>
                                            <td class="text-left" id="loan2Cell"></td>
                                            <th class="text-left">5.5) රජය මඟින් ලබාගත් ප්‍රතිපාදනය</th>
                                            <td class="text-left" id="cFees2Cell"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="checkbox-wrapper-37">
                            <input type="checkbox" name="checkbox" id="terms-checkbox-37" />
                            <label for="terms-checkbox-37" class="terms-label">
                                <svg
                                class="checkbox-svg"
                                viewBox="0 0 200 200"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <mask id="path-1-inside-1_476_5-37" fill="white">
                                    <rect width="200" height="200"></rect>
                                </mask>
                                <rect
                                    width="200"
                                    height="200"
                                    class="checkbox-box"
                                    stroke-width="40"
                                    mask="url(#path-1-inside-1_476_5-37)"
                                ></rect>
                                <path
                                    class="checkbox-tick"
                                    d="M52 111.018L76.9867 136L149 64"
                                    stroke-width="15"
                                ></path>
                                </svg>
                                <span class="label-text">උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.</span>
                            </label>
                        </div>
                        
                        <button type="submit" id="submitButton" class="next action" disabled> 
                            <span>Submit</span>
                        </button>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>

                </form>
            </div>
            <div class="col-1"></div> 
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src="./js/dashboard.js"></script>
        <script src="./js/register.js"></script>
    </body>
</html>
