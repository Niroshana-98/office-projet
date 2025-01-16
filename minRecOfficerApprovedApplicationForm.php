<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application View</title>
    <link rel="stylesheet" type="text/css" href="./css/subjectOfficerNewApplicationForm.css">
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
                        <td class="text-left"><input type="text" id="address_pri" name="address_pri" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">දුරකතන අංකය - ස්ථාවර</th>
                        <td class="text-left"><input type="text" id="tel_land" name="tel_land" disabled></td>
                        <th class="text-left">දුරකතන අංකය - ජංගම</th>
                        <td class="text-left"><input type="text" id="tel_mob" name="tel_mob" disabled></td>
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
                        <td class="text-left"><input type="text" name="date_att_sp" id="date_att_sp" disabled></td>
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
                        <td class="text-left" colspan="3"><input type="text" name="ins_name" id="ins_name" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">පශ්චාත් උපාදිය/ ඩිප්ලෝමාව</th>
                        <td class="text-left"><input type="text" name="course_name" id="course_name" disabled></td>
                        <th class="text-left">පාඨමාලාව හැදෑරීමට අදාල සේවා ව්‍යවස්ථාවේ උ අංකය</td>
                        <td class="text-left"><input type="text" name="service_minite_no" id="service_minite_no" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">පාඨමාලාව ආරම්භ කරනු ලැබූ දිනය</th>
                        <td class="text-left"><input type="text" name="course_start_date" id="course_start_date" disabled></td>
                        <th class="text-left">පාඨමාලාව අවසන් වීමට නියමිත දිනය</th>
                        <td class="text-left"><input type="text" name="course_end_date" id="course_end_date" disabled></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">ප්‍රතිපාදනයේ ප්‍රමාණය</th>
                        <td class="text-left"><input type="text" name="course_fee" id="course_fee" disabled></td>
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
                                <td class="text-left" colspan="3"><input type="text" id="bf_01course_name" name="bf_01course_name" disabled></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">පශ්චාත් උපාදි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</th>
                                <td class="text-left"><input type="text" name="bf_01ins_name" id="bf_01ins_name" disabled></td>
                                <th class="text-left">පාඨමාලාව ආරම්භ කල දිනය</td>
                                <td class="text-left"><input type="text" name="bf_01start_date" id="bf_01start_date" disabled></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">රජය මඟින් ලබාගත් ප්‍රතිපාදනය</th>
                                <td class="text-left"><input type="text" id="bf_01gov_paid" name="bf_01gov_paid" disabled></td>
                                <th class="text-left">පාඨමාලා ගාස්තුව</th>
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
                                <th scope="col" colspan="4" class="text-left"><h5 class="table-head">3.2) උපාදි / ඩිප්ලෝමා පිලිබඳ විස්තර</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-left">පාඨමාලාවේ නම</th>
                                <td class="text-left" colspan="3"><input type="text" id="bf_02course_name" name="bf_02course_name" disabled></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">පශ්චාත් උපාදි/ ඩිප්ලෝමා පාඨමාලාව ලබාගත් ආයතනය</th>
                                <td class="text-left"><input type="text" name="bf_02ins_name" id="bf_02ins_name" disabled></td>
                                <th class="text-left">පාඨමාලාව ආරම්භ කල දිනය</td>
                                <td class="text-left"><input type="text" name="bf_02start_date" id="bf_02start_date" disabled></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-left">රජය මඟින් ලබාගත් ප්‍රතිපාදනය</th>
                                <td class="text-left"><input type="text" id="bf_02gov_paid" name="bf_02gov_paid" disabled></td>
                                <th class="text-left">පාඨමාලා ගාස්තුව</th>
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
                    <tr>
                        <td>1</td>
                        <td>ප්‍රතිපාදන ඉල්ලීමක් නම් පූර්ව අනුමැතිය ලබා ගත් ලිපිය</td>
                        <td>
                            <button class="action-btn" data-doc="up_porva_anu" id="viewButton">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>අදාල සේවා ව්‍යස්ථාවේ උදෘතයන්</td>
                        <td>
                            <button class="action-btn" data-doc="up_service_minite" id="viewButton_2">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>සේවය ස්ථීර කිරීමේ ලිපියේ සහතික කරන ලද පිටපත</td>
                        <td>
                            <button class="action-btn" data-doc="up_app_letter_confirm" id="viewButton_3">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>නිලධාරියා දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කරන ලද ලිපියේ සහතික කළ පිටපත</td>
                        <td>
                            <button class="action-btn" data-doc="up_attach_sp" id="viewButton_4">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>නිලධාරියා අදාල පාඨමාලාව සඳහා තෝරා ගත් බවට වන ලිපිය</td>
                        <td>
                            <button class="action-btn" data-doc="up_course_selected" id="viewButton_5">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>විශ්ව විද්‍යාල ප්‍රතිපාදන කොමිෂන් සභාව විසින් අනුමත කරන ලද විශ්ව විද්‍යාලයක බව සහතික කරන ලද ලිපිය</td>
                        <td>
                            <button class="action-btn" data-doc="up_campus_confirm" id="viewButton_6">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>පාථමාලාව අවසන් කළ බවට සහතිකය</td>
                        <td>
                            <button class="action-btn" data-doc="up_course_complete" id="viewButton_7">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>මුදල් ගෙවූ රිසිට්පත්</td>
                        <td>
                            <button class="action-btn" data-doc="up_pay_recept" id="viewButton_8">
                                View
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
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
        
        <div id = "applicateDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="applicateName" id="applicateName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="applicateDesi" id="applicateDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="applicateDate" id="applicateDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id = "applicateHR">
        
        <div id = "subjectOfficerDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remark">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="Remark" id="Remark" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="subName" id="subName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="subDesi" id="subDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="subjectOfficerDate" id="subjectOfficerDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id = "subjectOfficerHR">
        
        <div id ="offiRecOfficerDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remarkRec">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="RemarkRec" id="RemarkRec" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="recName" id="recName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="recDesi" id="recDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="recommendOfficerDate" id="recommendOfficerDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id = "offiRecOfficerHR">

        <div id="offiHeadDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remarkOfficeHead">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="remarkOffiHead" id="remarkOffiHead" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="offiHeadName" id="offiHeadName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="offiHeadDesi" id="offiHeadDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="offiHeadDate" id="offiHeadDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id="offiHeadHR">

        <div id ="distChkOffiDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remarkDistChkOfficerDiv">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="remarkDistChkOfficer" id="remarkDistChkOfficer" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="distChkOffiName" id="distChkOffiName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="distChkOffiDesi" id="distChkOffiDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="distChkOffiDate" id="distChkOffiDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id="distChkOffiHR">

        <div id ="distRecOffiDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remarkDistRecOfficerDiv">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="remarkDistRecOfficer" id="remarkDistRecOfficer" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="distRecOffiName" id="distRecOffiName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="distRecOffiDesi" id="distRecOffiDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="distRecOffiDate" id="distRecOffiDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id="distRecOffiHR">

        <div id ="distOffiHeadDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remarkDistOffiHeadDiv">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="remarkDistOfficeHead" id="remarkDistOfficeHead" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="distOffiHeadName" id="distOffiHeadName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="distOffiHeadDesi" id="distOffiHeadDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="distOffiHeadDate" id="distOffiHeadDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id="distOffiHeadHR">

        <div id ="depChkOffiDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remarkDepChkOffiDiv">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="remarkDepChkOffi" id="remarkDepChkOffi" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="depChkOffiName" id="depChkOffiName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="depChkOffiDesi" id="depChkOffiDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="depChkOffiDate" id="depChkOffiDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id="depChkOffiHR">

        <div id ="depRecOffiDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remarkDepRecOffiDiv">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="remarkDepRecOffi" id="remarkDepRecOffi" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="depRecOffiName" id="depRecOffiName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="depRecOffiDesi" id="depRecOffiDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="depRecOffiDate" id="depRecOffiDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id="depRecOffiHR">

        <div id ="depHeadDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remarkDepHeadDiv">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="remarkDepHead" id="remarkDepHead" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="depHeadName" id="depHeadName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="depHeadDesi" id="depHeadDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="depHeadDate" id="depHeadDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id="depHeadDHR">

        <div id ="minChkOffiDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remarkMinChkOffiDiv">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="remarkMinChkOffi" id="remarkMinChkOffi" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="minChkName" id="minChkName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="minChkDesi" id="minChkDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="minChkDate" id="minChkDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>

        <hr id="minCheckOffi">

        <div id ="minRecOffiDiv">
            <span>
                උක්ත තොරතුරු සත්‍ය හා නිවැරදි බවත් මීට පෙර පශ්චාත් උපාධි / ඩිප්ලෝමා/පුහුණු පාඨමාලා සඳහා රජය මඟින් ප්‍රතිපාදන ලබා දී ඇති/නොමැති අතර ප්‍රධාන ලේකම් පරිපාලන චක්‍රලේඛ 02/2023 අනුව කටයුතු කිරිමට එකඟ වෙමි.
            </span>

            <div id="remarkMinRecOffiDiv">
                <div class="table-responsive">
                    <table class="table" id="tableApplicate">
                        <tr>
                            <th scope="row" class="text-left" style="width: 150px;">Remark</th>
                            <td class="text-left"><input type="text" name="remarkMinRecOffi" id="remarkMinRecOffi" disabled></td>
                        </tr>
                    </table> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="tableApplicate">
                    <tr>
                        <th scope="row" class="text-left">Name</th>
                        <td class="text-left" colspan="3"><input type="text" name="minRecName" id="minRecName" disabled></td>
                        <th scope="row" class="text-left">Designation</th>
                        <td class="text-left" colspan="3"><input type="text" name="minRecDesi" id="minRecDesi" disabled></td>
                        <th scope="row" class="text-left">Date</th>
                        <td class="text-left" colspan="3"><input type="text" name="minRecDate" id="minRecDate" disabled></td>
                    </tr>
                </table>
            </div>
        </div>        

    </div>  
               
    <script src="./js/minRecOfficerApprovedApplicationForm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>