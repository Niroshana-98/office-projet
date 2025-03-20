<?php
session_start();

$nic = isset($_SESSION['nic']) ? $_SESSION['nic'] : null;

$email = isset($_GET['email']) ? $_GET['email'] : null;

if (!$nic && !$email) {
    echo "<script>alert('Email or NIC is required. Please try again.'); window.location.href='index.html';</script>";
    exit;
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application View</title>
    <link rel="stylesheet" type="text/css" href="./css/applicationView.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
</head>
<body>
    <div class="hero">
        <div class="logo">
            <img src="./images/logo.png" alt="Logo">
        </div>
        <div style="position: absolute; top: 10px; right: 10px; display: flex; align-items: center; gap: 10px;">
            
            <button id="trackApplicationBtn" class="button" onclick="trackApplication()">
                <span class="text">Track Application</span>
                <span class="svg">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="50"
                    height="20"
                    viewBox="0 0 38 15"
                    fill="none"
                    >
                    <path
                        fill="white"
                        d="M10 7.519l-.939-.344h0l.939.344zm14.386-1.205l-.981-.192.981.192zm1.276 5.509l.537.843.148-.094.107-.139-.792-.611zm4.819-4.304l-.385-.923h0l.385.923zm7.227.707a1 1 0 0 0 0-1.414L31.343.448a1 1 0 0 0-1.414 0 1 1 0 0 0 0 1.414l5.657 5.657-5.657 5.657a1 1 0 0 0 1.414 1.414l6.364-6.364zM1 7.519l.554.833.029-.019.094-.061.361-.23 1.277-.77c1.054-.609 2.397-1.32 3.629-1.787.617-.234 1.17-.392 1.623-.455.477-.066.707-.008.788.034.025.013.031.021.039.034a.56.56 0 0 1 .058.235c.029.327-.047.906-.39 1.842l1.878.689c.383-1.044.571-1.949.505-2.705-.072-.815-.45-1.493-1.16-1.865-.627-.329-1.358-.332-1.993-.244-.659.092-1.367.305-2.056.566-1.381.523-2.833 1.297-3.921 1.925l-1.341.808-.385.245-.104.068-.028.018c-.011.007-.011.007.543.84zm8.061-.344c-.198.54-.328 1.038-.36 1.484-.032.441.024.94.325 1.364.319.45.786.64 1.21.697.403.054.824-.001 1.21-.09.775-.179 1.694-.566 2.633-1.014l3.023-1.554c2.115-1.122 4.107-2.168 5.476-2.524.329-.086.573-.117.742-.115s.195.038.161.014c-.15-.105.085-.139-.076.685l1.963.384c.192-.98.152-2.083-.74-2.707-.405-.283-.868-.37-1.28-.376s-.849.069-1.274.179c-1.65.43-3.888 1.621-5.909 2.693l-2.948 1.517c-.92.439-1.673.743-2.221.87-.276.064-.429.065-.492.057-.043-.006.066.003.155.127.07.099.024.131.038-.063.014-.187.078-.49.243-.94l-1.878-.689zm14.343-1.053c-.361 1.844-.474 3.185-.413 4.161.059.95.294 1.72.811 2.215.567.544 1.242.546 1.664.459a2.34 2.34 0 0 0 .502-.167l.15-.076.049-.028.018-.011c.013-.008.013-.008-.524-.852l-.536-.844.019-.012c-.038.018-.064.027-.084.032-.037.008.053-.013.125.056.021.02-.151-.135-.198-.895-.046-.734.034-1.887.38-3.652l-1.963-.384zm2.257 5.701l.791.611.024-.031.08-.101.311-.377 1.093-1.213c.922-.954 2.005-1.894 2.904-2.27l-.771-1.846c-1.31.547-2.637 1.758-3.572 2.725l-1.184 1.314-.341.414-.093.117-.025.032c-.01.013-.01.013.781.624zm5.204-3.381c.989-.413 1.791-.42 2.697-.307.871.108 2.083.385 3.437.385v-2c-1.197 0-2.041-.226-3.19-.369-1.114-.139-2.297-.146-3.715.447l.771 1.846z"
                    ></path>
                    </svg>
                </span>
            </button>

            <button type="button" id="logout-btn" class="logout-btn" onclick="logout()">Logout</button>
        </div>

        <div>
            <h4><b>දකුණු පළාත් ප්‍රධාන ලේකම් කාර්යාලය<b></h4>
            <h5><b>සේවා ව්‍යවස්ථාවේ අවශ්‍යතාවය මත පශ්චාත් උපාධි/ඩිප්ලෝමා පාඨමාලා සඳහා <span id="applicationType"></span> සඳහා වන අයදුම්පත්‍රය</b></h5>
            <h6><b>අයදුම්පත් අංකය: <span id="appNoDisplay"></span></b></h6> 
        </div>     
    </div> 
    <div class="tableLayout"> 
        <div class="table-responsive">
            <table class="table small-table" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col" colspan="4" class="text-left">
                            <h5 class="table-head">1) පෞද්ගලික විස්තර</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-left">1.1) සම්පූර්ණ නම (සිංහලෙන්)</th>
                        <td class="text-left" colspan="3"><input type="text" id="name_si" name="name_si" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">1.2) මුලකුරු සමග නම (සිංහලෙන්)</th>
                        <td class="text-left"><input type="text" id="name_full" name="name_full" disabled></td>
                        <th class="text-left">1.3) මුලකුරු සමග නම (ඉංග්‍රීසියෙන්)</th>
                        <td class="text-left"><input type="text" id="name_eng" name="name_eng" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">1.4) හැදුනුම්පත් අංකය</th>
                        <td class="text-left"><input type="text" id="nic" name="nic" disabled></td>
                        <th class="text-left">1.5) පෞද්ගලික ලිපිනය</th>
                        <td class="text-left"><input type="text" id="address_pri" name="address_pri" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">1.6) දුරකතන අංකය - ස්ථාවර</th>
                        <td class="text-left"><input type="text" id="tel_land" name="tel_land" disabled></td>
                        <th class="text-left">1.7) දුරකතන අංකය - ජංගම</th>
                        <td class="text-left"><input type="text" id="tel_mob" name="tel_mob" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">1.8) විද්‍යුත් තැපැල් ලිපිනය</th>
                        <td class="text-left" colspan="3"><input type="text" id="email_pri" name="email_pri" disabled></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
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
                        <td class="text-left" colspan="3"><input type="text" name="service" id="service" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">2.2) නිලධාරියා අයත්වන ශ්‍රේණිය</th>
                        <td class="text-left"><input type="text" name="grade" id="grade" disabled></td>
                        <th class="text-left">2.3) පත්වීම ස්ථිරද? / නොමැතිද?</td>
                        <td class="text-left"><input type="text" name="upp_status" id="upp_status" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">2.4) තනතුර</th>
                        <td class="text-left"><input type="text" name="desi" id="desi" disabled></td>
                        <th class="text-left">2.5) සේවා ස්ථානය</th>
                        <td class="text-left"><input type="text" name="c_w_p" id="c_w_p" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">2.6) අයත්වන අමාත්‍යාංශය</th>
                        <td class="text-left"><input type="text" name="min" id="min" disabled></td>
                        <th class="text-left">2.7) දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කල දිනය</td>
                        <td class="text-left"><input type="text" name="date_att_sp" id="date_att_sp" disabled></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" style="border: 1px solid;">
                <thead>
                    <tr>
                        <th scope="col" colspan="4" class="text-left"><h5 class="table-head">3) උපාධි / ඩිප්ලෝමා පිලිබඳ විස්තර</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-left">3.1) පශ්චාත් උපාධිය/ ඩිප්ලෝමාව පැවත්වෙන විශ්ව විද්‍යාලය/ ආයතනය</th>
                        <td class="text-left" colspan="3"><input type="text" name="ins_name" id="ins_name" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">3.2) පශ්චාත් උපාධිය/ ඩිප්ලෝමාව</th>
                        <td class="text-left"><input type="text" name="course_name" id="course_name" disabled></td>
                        <th class="text-left">3.3) පාඨමාලාව හැදෑරීමට අදාල සේවා ව්‍යවස්ථාවේ උදෘත අංකය</td>
                        <td class="text-left"><input type="text" name="service_minite_no" id="service_minite_no" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">3.4) පාඨමාලාව ආරම්භ කරනු ලැබූ දිනය</th>
                        <td class="text-left"><input type="text" name="course_start_date" id="course_start_date" disabled></td>
                        <th class="text-left">3.5) පාඨමාලාව අවසන් වීමට නියමිත දිනය</th>
                        <td class="text-left"><input type="text" name="course_end_date" id="course_end_date" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">3.6) ප්‍රතිපාදනයේ ප්‍රමාණය</th>
                        <td class="text-left"><input type="text" name="course_fee" id="course_fee" disabled></td>
                        <th class="text-left">3.7) මීට පෙර සේවා ව්‍යවවස්ථාවට අදාල වෙනත් පාඨමාලා ගාස්තු ලබාගෙන</td>
                        <td class="text-left"><input type="text" name="before_recieved" id="before_recieved" disabled></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="page-break"></div>
        
        <div>
            <div id="nextFieldsetTableContainer" style="display: none;">
                <h6 class="view-h5">මීට පෙර සේවා ව්‍යවස්ථාවට අදාළව පශ්චාත් උපාධි/ ඩිප්ලෝමා පාඨමාලා ගාස්තු ලබා ගෙන ඇත්නම් ඒ පිළිබඳ තොරතුරු</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" style="border: 1px solid;">
                        <thead>
                            <tr>
                                <th scope="col" colspan="4" class="text-left"><h5 class="table-head">4) උපාධිධි / ඩිප්ලෝමා පිලිබඳ විස්තර</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-left">4.1) පාඨමාලාවේ නම</th>
                                <td class="text-left" colspan="3"><input type="text" id="bf_01course_name" name="bf_01course_name" disabled></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">4.2) පශ්චාත් උපාධි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</th>
                                <td class="text-left"><input type="text" name="bf_01ins_name" id="bf_01ins_name" disabled></td>
                                <th class="text-left">4.3) පාඨමාලාව ආරම්භ කල දිනය</td>
                                <td class="text-left"><input type="text" name="bf_01start_date" id="bf_01start_date" disabled></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">4.4) පාඨමාලා ගාස්තුව</th>
                                <td class="text-left"><input type="text" id="bf_01gov_paid" name="bf_01gov_paid" disabled></td>
                                <th class="text-left">4.5) රජය මඟින් ලබාගත් ප්‍රතිපාදනය ප්‍රමාණය</th>
                                <td class="text-left"><input type="text" id="bf_01full_course_fee" name="bf_01full_course_fee" disabled></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="nextFieldsetTableContainers" style="display: none;">
                <div class="table-responsive">
                    <table class="table table-bordered" style="border: 1px solid;">
                        <thead>
                            <tr>
                                <th scope="col" colspan="4" class="text-left"><h5 class="table-head">5) උපාධි / ඩිප්ලෝමා පිලිබඳ විස්තර</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-left">5.1) පාඨමාලාවේ නම</th>
                                <td class="text-left" colspan="3"><input type="text" id="bf_02course_name" name="bf_02course_name" disabled></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">5.2) පශ්චාත් උපාධි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</th>
                                <td class="text-left"><input type="text" name="bf_02ins_name" id="bf_02ins_name" disabled></td>
                                <th class="text-left">5.3) පාඨමාලාව ආරම්භ කල දිනය</td>
                                <td class="text-left"><input type="text" name="bf_02start_date" id="bf_02start_date" disabled></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">5.4) පාඨමාලා ගාස්තුව</th>
                                <td class="text-left"><input type="text" id="bf_02gov_paid" name="bf_02gov_paid" disabled></td>
                                <th class="text-left">5.5) රජය මඟින් ලබාගත් ප්‍රතිපාදනය</th>
                                <td class="text-left"><input type="text" id="bf_02full_course_fee" name="bf_02full_course_fee" disabled></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="documentContainer" class="row-container" style="display: none;"></div>

        <div class="tableLayouts">
            <table class="tables" id="documentsTable">
                <tbody>
                    <tr class="hover-row">
                        <td id = "upDoc1">UP_1</td>
                        <td>ප්‍රතිපාදන ඉල්ලීමක් නම් පූර්ව අනුමැතිය ලබා ගත් ලිපිය</td>
                        <td>
                            <button class="action-btn" data-doc="up_porva_anu" id="viewButton">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td id = "upDoc2">UP_2</td>
                        <td>අදාල සේවා ව්‍යවවස්ථාවේ උදෘතයන්</td>
                        <td>
                            <button class="action-btn" data-doc="up_service_minite" id="viewButton_2">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td id = "upDoc3">UP_3</td>
                        <td>සේවය ස්ථීර කිරීමේ ලිපියේ සහතික කරන ලද පිටපත</td>
                        <td>
                            <button class="action-btn" data-doc="up_app_letter_confirm" id="viewButton_3">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td id = "upDoc4">UP_4</td>
                        <td>නිලධාරියා දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කරන ලද ලිපියේ සහතික කළ පිටපත</td>
                        <td>
                            <button class="action-btn" data-doc="up_attach_sp" id="viewButton_4">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td id = "upDoc5">UP_5</td>
                        <td>නිලධාරියා අදාල පාඨමාලාව සඳහා තෝරා ගත් බවට වන ලිපිය</td>
                        <td>
                            <button class="action-btn" data-doc="up_course_selected" id="viewButton_5">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td id = "upDoc6">UP_6</td>
                        <td>විශ්ව විද්‍යාල ප්‍රතිපාදන කොමිෂන් සභාව විසින් අනුමත කරන ලද විශ්ව විද්‍යාලයක බව සහතික කරන ලද ලිපිය</td>
                        <td>
                            <button class="action-btn" data-doc="up_campus_confirm" id="viewButton_6">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td id = "upDoc7">UP_7</td>
                        <td>පාඨමාලාව අවසන් කළ බවට සහතිකය</td>
                        <td>
                            <button class="action-btn" data-doc="up_course_complete" id="viewButton_7">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td id = "upDoc8">UP_8</td>
                        <td>මුදල් ගෙවූ රිසිට්පත්</td>
                        <td>
                            <button class="action-btn" data-doc="up_pay_recept" id="viewButton_8">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td id = "upDoc9">UP_9</td>
                        <td>වෙනත් </td>
                        <td>
                            <button class="action-btn" data-doc="up_other" id="viewButton_9">
                                View
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="printButton">
            <button class="Documents-btn" onclick="printPage()">
                Print Document
            </button>
        </div>
    </div>   
               
    <script src="./js/applicationView.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>