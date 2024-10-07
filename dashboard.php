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
                <h1 id="heading">DASHBOARD</h1>
                <form class="msform">
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
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <h5 for="ball">නිලධාරියා අයත්වන ශ්‍රේණිය</h5>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <h5 for="ball">පත්වීම ස්ථිරද? / නොමැතිද?</h5>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">තනතුර</h5>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">සේවා ස්ථානය</h5>
                                <input type="text" class="form-control" id="exampleFormControlInput12" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">අයත්වන අමාත්‍යාංශය</h5>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කල දිනය</h5>
                                <input type="date" class="form-control" id="exampleFormControlInput14" placeholder="">
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
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">පශ්චාත් උපාදිය/ ඩිප්ලෝමාව</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5 for="ball">පාඨමාලාව හැදෑරීමට අදාල සේවා ව්‍යවස්ථාවේ උ අංකය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <h5 for="ball">පාඨමාලාව ආරම්භ කරනු ලැබූ දිනය</h5>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">පාඨමාලාව අවසන් වීමට නියමිත දිනය</h5>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5 for="ball">ප්‍රතිපාදනයේ ප්‍රමාණය</h5>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                </div>
                            </div>
                            <p>(පාඨමාලා ගාස්තුව රු.400,000.00 ට වඩා වැඩි වන්නේ නම් එම වැඩි වන මුදල පෞද්ගලිකව දරා ගත යුතුය.)</p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h5 for="ball">මීට පෙර සේවා ව්‍යස්ථාවට අදාල වෙනත් පාඨමාලා ගාස්තු ලබාගෙන</h5>
                                <select class="form-select" id="selectBox" aria-label="Default select example" onchange="toggleTextBox()">
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
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">පශ්චාත් උපාදි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලාව ආරම්භ කල දිනය</h5>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">රජය මඟින් ලබාගත් ප්‍රතිපාදනය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලා ගාස්තුව</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
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
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5 for="ball">පශ්චාත් උපාදි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලාව ආරම්භ කල දිනය</h5>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">රජය මඟින් ලබාගත් ප්‍රතිපාදනය</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h5 for="ball">පාඨමාලා ගාස්තුව</h5>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="" pattern="^(?:මාධ්‍ය|සිරි|ගුණ|කොතා|ගුන්සේ|නී|බී|මි|නි|සි|නො|රා|තා|ආ|උ|කුව|කො|කු|නෙ|සෙ|චන්|චා|තා|මය|මී|සුර|කැ|කු|සේ|ගු|මි)?[\u0D80-\u0DFF\s]+$" required>
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
                        <h3 class="fs-title">පරිලෝකන (scan) කර ඉදිරිපත් කරන ලේඛන:</h3>
                        <h2 class="steps">Step 4 - 5</h2>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h5 for="ball">ප්‍රතිපාදන ඉල්ලීමක් නම් පූර්ව අනුමැතිය ලබා ගත් ලිපිය</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h5 for="ball">අදාල සේවා ව්‍යස්ථාවේ උ</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h5 for="ball">සේවය ස්ථිර කිරීමේ ලිපියේ සහතික කරන ලද පිටපත</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h5 for="ball">නිල දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කරන ලද ලිපියේ සහතික කල පිටපත</h5>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h5 for="ball">නිල අදාල පාඨමාලාව සඳහා තොරා ගත් බවට වන ලිපිය</h5>
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
