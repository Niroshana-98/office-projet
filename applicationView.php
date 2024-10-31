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
        <button class="Documents-btn" onclick="printPage()">
            <p class="text">Print Document</p>
        </button>
    </div>  
               
    <script src="./js/applicationView.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
