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
        <div>
            <h4><b>දකුණු පළාත් ප්‍රධාන ලේකම් කාර්යාලය<b></h4>
            <h5><b>සේවා ව්‍යවස්ථාවේ අවශ්‍යතාවය මත පශ්චාත් උපාධි/ඩිප්ලෝමා පාඨමාලා සඳහා පූර්ව අනුමැතිය ලබා ගැනීම හා ප්‍රතිපාදන ඉල්ලුම් කිරීම සඳහා වන අයදුම්පත්‍රය</b></h5>
            <h6><b>අයදුම්පත් අංකය: <span id="appNoDisplay"></span></b></h6>
        </div>     
    </div> 
    <div class="reason"> 
        <span id="rejectMessage">කරුණාකර සදහන් කර ඇති අංකයට අදාල තොරතුරු නැවත පුරවන්න :</span> 
        <div class="custom-select-container d-flex align-items-center gap-3" data-aos="fade-up">
            <h6 class="mb-0" style="font-weight:bold;">ඔබ මෙම අයදුම්පත යොමුකරනු ලබන්නේ</h6>
            <select class="form-select required-field" id="reason" name="reason" style="width: 450px;" required>
                <option value="">Select an option</option>
                <option value="1">පූර්ව අනුමැතිය හා ප්‍රතිපාදන ඉල්ලුම් කිරීමට</option>
                <option value="2">පූර්ව අනුමැතිය ලබාගැනීමට</option>
            </select>
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
                        <th scope="row" class="text-left">සම්පූර්ණ නම (සිංහලෙන්)</th>
                        <td class="text-left" colspan="3"><input type="text" id="name_si" name="name_si" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">මුලකුරු සමග නම (සිංහලෙන්)</th>
                        <td class="text-left"><input type="text" id="name_full" name="name_full" disabled></td>
                        <th class="text-left">මුලකුරු සමග නම (ඉංග්‍රීසියෙන්)</th>
                        <td class="text-left"><input type="text" id="name_eng" name="name_eng" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">හැදුනුම්පත් අංකය</th>
                        <td class="text-left"><input type="text" id="nic" name="nic" disabled></td>
                        <th class="text-left">පෞද්ගලික ලිපිනය</th>
                        <td class="text-left"><input type="text" id="address_pri" name="address_pri" ></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">දුරකතන අංකය - ස්ථාවර</th>
                        <td class="text-left"><input type="text" id="tel_land" name="tel_land" disabled></td>
                        <th class="text-left">දුරකතන අංකය - ජංගම</th>
                        <td class="text-left"><input type="text" id="tel_mob" name="tel_mob"></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">විද්‍යුත් තැපැල් ලිපිනය</th>
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
                        <th scope="row" class="text-left">නිලධාරියා අයත් සේවාව</th>
                        <td class="text-left" colspan="3"><input type="text" name="service" id="service" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">නිලධාරියා අයත්වන ශ්‍රේණිය</th>
                        <td class="text-left"><input type="text" name="grade" id="grade" disabled></td>
                        <th class="text-left">පත්වීම ස්ථිරද? / නොමැතිද?</td>
                        <td class="text-left"><input type="text" name="upp_status" id="upp_status" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">තනතුර</th>
                        <td class="text-left"><input type="text" name="desi" id="desi" disabled></td>
                        <th class="text-left">සේවා ස්ථානය</th>
                        <td class="text-left"><input type="text" name="c_w_p" id="c_w_p" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">අයත්වන අමාත්‍යාංශය</th>
                        <td class="text-left"><input type="text" name="min" id="min" disabled></td>
                        <th class="text-left">දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කල දිනය</td>
                        <td class="text-left"><input type="text" name="date_att_sp" id="date_att_sp"></td>
                    </tr>
                </tbody>
            </table>
        </div>

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
                        <td class="text-left" colspan="3"><input type="text" name="ins_name" id="ins_name"></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">පශ්චාත් උපාදිය/ ඩිප්ලෝමාව</th>
                        <td class="text-left"><input type="text" name="course_name" id="course_name"></td>
                        <th class="text-left">පාඨමාලාව හැදෑරීමට අදාල සේවා ව්‍යවස්ථාවේ උ අංකය</td>
                        <td class="text-left"><input type="text" name="service_minite_no" id="service_minite_no"></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">පාඨමාලාව ආරම්භ කරනු ලැබූ දිනය</th>
                        <td class="text-left"><input type="text" name="course_start_date" id="course_start_date"></td>
                        <th class="text-left">පාඨමාලාව අවසන් වීමට නියමිත දිනය</th>
                        <td class="text-left"><input type="text" name="course_end_date" id="course_end_date"></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">ප්‍රතිපාදනයේ ප්‍රමාණය</th>
                        <td class="text-left"><input type="text" name="course_fee" id="course_fee"></td>
                        <th class="text-left">මීට පෙර සේවා ව්‍යස්ථාවට අදාල වෙනත් පාඨමාලා ගාස්තු ලබාගෙන</td>
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
                                <th scope="col" colspan="4" class="text-left"><h5 class="table-head">3.1) උපාදි / ඩිප්ලෝමා පිලිබඳ විස්තර</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-left">පාඨමාලාවේ නම</th>
                                <td class="text-left" colspan="3"><input type="text" id="bf_01course_name" name="bf_01course_name" ></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">පශ්චාත් උපාදි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</th>
                                <td class="text-left"><input type="text" name="bf_01ins_name" id="bf_01ins_name" ></td>
                                <th class="text-left">පාඨමාලාව ආරම්භ කල දිනය</td>
                                <td class="text-left"><input type="text" name="bf_01start_date" id="bf_01start_date" ></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">රජය මඟින් ලබාගත් ප්‍රතිපාදනය</th>
                                <td class="text-left"><input type="text" id="bf_01gov_paid" name="bf_01gov_paid" ></td>
                                <th class="text-left">පාඨමාලා ගාස්තුව</th>
                                <td class="text-left"><input type="text" id="bf_01full_course_fee" name="bf_01full_course_fee" ></td>
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
                                <th scope="col" colspan="4" class="text-left"><h5 class="table-head">3.2) උපාදි / ඩිප්ලෝමා පිලිබඳ විස්තර</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-left">පාඨමාලාවේ නම</th>
                                <td class="text-left" colspan="3"><input type="text" id="bf_02course_name" name="bf_02course_name" ></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">පශ්චාත් උපාදි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</th>
                                <td class="text-left"><input type="text" name="bf_02ins_name" id="bf_02ins_name" ></td>
                                <th class="text-left">පාඨමාලාව ආරම්භ කල දිනය</td>
                                <td class="text-left"><input type="text" name="bf_02start_date" id="bf_02start_date" ></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">රජය මඟින් ලබාගත් ප්‍රතිපාදනය</th>
                                <td class="text-left"><input type="text" id="bf_02gov_paid" name="bf_02gov_paid" ></td>
                                <th class="text-left">පාඨමාලා ගාස්තුව</th>
                                <td class="text-left"><input type="text" id="bf_02full_course_fee" name="bf_02full_course_fee" ></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="documentContainer" class="row-container" style="display: none;"></div>
        <div class="upload-container">
            <span>Upload කර ඇති ලේඛන</span>
        </div>
        <div class="tableLayouts">
            <table class="tables" id="documentsTable">
                <tbody>
                    <tr>
                        <td>UP_1</td>
                        <td>ප්‍රතිපාදන ඉල්ලීමක් නම් පූර්ව අනුමැතිය ලබා ගත් ලිපිය</td>
                        <td><input class="form-control form-control-sm" id="up_porva_anu" name="up_porva_anu" type="file"></td>
                        <td>
                            <button class="action-btn" data-doc="up_porva_anu" id="viewButton">
                                View
                            </button>
                        </td>
                        <td>
                            <button type="button" class="action-btns" id="uploadButton" name="uploadButton" disabled>
                                Upload
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>UP_2</td>
                        <td>අදාල සේවා ව්‍යස්ථාවේ උදෘතයන්</td>
                        <td><input class="form-control form-control-sm" id="up_service_minite" name="up_service_minite" type="file"></td>
                        <td>
                            <button class="action-btn" data-doc="up_service_minite" id="viewButton_2">
                                View
                            </button>
                        </td>
                        <td>
                            <button type="button" class="action-btns"  id="uploadButton_2" name="uploadButton_2" disabled>
                                Upload
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>UP_3</td>
                        <td>සේවය ස්ථීර කිරීමේ ලිපියේ සහතික කරන ලද පිටපත</td>
                        <td><input class="form-control form-control-sm" id="up_app_letter_confirm" name="up_app_letter_confirm" type="file"></td>
                        <td>
                            <button class="action-btn" data-doc="up_app_letter_confirm" id="viewButton_3">
                                View
                            </button>
                        </td>
                        <td>
                            <button type="button" class="action-btns"  id="uploadButton_3" name="uploadButton_3" disabled>
                                Upload
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>UP_4</td>
                        <td>නිලධාරියා දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කරන ලද ලිපියේ සහතික කළ පිටපත</td>
                        <td><input class="form-control form-control-sm" id="up_attach_sp" name="up_attach_sp" type="file"></td>
                        <td>
                            <button class="action-btn" data-doc="up_attach_sp" id="viewButton_4">
                                View
                            </button>
                        </td>
                        <td>
                            <button type="button" class="action-btns"  id="uploadButton_4" name="uploadButton_4" disabled>
                                Upload
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>UP_5</td>
                        <td>නිලධාරියා අදාල පාඨමාලාව සඳහා තෝරා ගත් බවට වන ලිපිය</td>
                        <td><input class="form-control form-control-sm" id="up_course_selected" name="up_course_selected" type="file"></td>
                        <td>
                            <button class="action-btn" data-doc="up_course_selected" id="viewButton_5">
                                View
                            </button>
                        </td>
                        <td>
                            <button type="button" class="action-btns"  id="uploadButton_5" name="uploadButton_5" disabled>
                                Upload
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>UP_6</td>
                        <td>විශ්ව විද්‍යාල ප්‍රතිපාදන කොමිෂන් සභාව විසින් අනුමත කරන ලද විශ්ව විද්‍යාලයක බව සහතික කරන ලද ලිපිය</td>
                        <td><input class="form-control form-control-sm" id="up_campus_confirm" name="up_campus_confirm" type="file"></td>
                        <td>
                            <button class="action-btn" data-doc="up_campus_confirm" id="viewButton_6">
                                View
                            </button>
                        </td>
                        <td>
                            <button type="button" class="action-btns"  id="uploadButton_6" name="uploadButton_6" disabled>
                                Upload
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>UP_7</td>
                        <td>පාථමාලාව අවසන් කළ බවට සහතිකය</td>
                        <td><input class="form-control form-control-sm" id="up_course_complete" name="up_course_complete" type="file"></td>
                        <td>
                            <button class="action-btn" data-doc="up_course_complete" id="viewButton_7">
                                View
                            </button>
                        </td>
                        <td>
                            <button type="button" class="action-btns"  id="uploadButton_7" name="uploadButton_7" disabled>
                                Upload
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>UP_8</td>
                        <td>මුදල් ගෙවූ රිසිට්පත්</td>
                        <td><input class="form-control form-control-sm" id="up_pay_recept" name="up_pay_recept" type="file"></td>
                        <td>
                            <button class="action-btn" data-doc="up_pay_recept" id="viewButton_8">
                                View
                            </button>
                        </td>
                        <td>
                            <button type="button" class="action-btns"  id="uploadButton_8" name="uploadButton_8" disabled>
                                Upload
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>UP_9</td>
                        <td>වෙනත් </td>
                        <td><input class="form-control form-control-sm" id="up_other" name="up_other" type="file"></td>
                        <td>
                            <button class="action-btn" data-doc="up_other" id="viewButton_9">
                                View
                            </button>
                        </td>
                        <td>
                            <button type="button" class="action-btns"  id="uploadButton_9" name="uploadButton_9" disabled>
                                Upload
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button id="updateButton" type="button" class="btn btn-primary">
            Update Application
        </button>
    </div>
               
    <script src="./js/rejectApplication.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>