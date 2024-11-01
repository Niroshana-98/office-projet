<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application View</title>
    <link rel="stylesheet" type="text/css" href="./css/applicationView.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="hero">
        <div class="logo">
            <img src="./images/logo.png" alt="Logo">
        </div>
        <div>
            <h4><b>දකුණු පලාත් ප්‍රදාන ලේඛම් කාර්‍යාලය<b></h4>
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

        <div id="nextFieldsetTableContainer">
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

        <div id="nextFieldsetTableContainers">
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
        <button class="Documents-btn" onclick="printPage()">
            <p class="text">Print Document</p>
        </button>
    </div>  
               
    <script src="./js/applicationView.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>