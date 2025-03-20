<?php
session_start();
include 'connect.php';

$nic = isset($_SESSION['nic']) ? $_SESSION['nic'] : null;
$email = isset($_GET['email']) ? $_GET['email'] : null;

// If NIC is not set, redirect to index.html
if (!$nic) {
    echo "<script>alert('NIC is required. Please try again.'); window.location.href='index.html';</script>";
    exit;
}

// Check if NIC exists and status is 2 in the database
$stmt = $conn->prepare("SELECT status FROM users WHERE nic = ?");
$stmt->bind_param("s", $nic);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('NIC not found. Please try again.'); window.location.href='index.html';</script>";
    exit;
}

$row = $result->fetch_assoc();
$status = $row['status'];

if ($status != 3) {
    echo "<script>alert('Access denied. Please contact support.'); window.location.href='index.html';</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
    <link rel="stylesheet" type="text/css" href="./css/upload.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<section class="table__body">
    <form id="uploadForm" enctype="multipart/form-data">
        <table>
            <tbody>
                <tr class="hover-row">
                    <td id = "upDoc1">UP_1</td> 
                    <td colspan="2">
                        <i class="bi bi-filetype-pdf" style="font-size: 24px;"></i>
                        ප්‍රතිපාදන ඉල්ලීමක් නම් පූර්ව අනුමැතිය ලබා ගත් ලිපිය
                    </td>                        
                    <td style="display: flex; justify-content: flex-end; align-items: center; height:80px">
                        <input class="form-control form-control-sm" id="up_porva_anu" name="up_porva_anu" type="file">
                        <div name="complete" id="complete" style="display: none;">
                            <i class="bi bi-check-circle-fill" style="font-size: 24px;"></i>
                        </div>
                    </td>
                    <td> 
                        <button type="button" class="btn btn-outline-primary" id="uploadButton">
                            <i class="bi bi-cloud-upload-fill" style="font-size: 16px;"></i>
                            Upload
                        </button>
                        <button type="button" class="btn btn-outline-success" id="viewButton" name="viewButton" style="display: none;">
                            <i class="bi bi-eye-slash-fill" style="font-size: 24px;"></i>
                            View
                        </button>
                    </td>
                </tr>
                <tr class="hover-row">
                    <td id = "upDoc2">UP_2</td>
                    <td colspan=2>
                        <i class="bi bi-filetype-pdf" style="font-size: 24px;"></i>
                        අදාල සේවා ව්‍යස්ථාවේ උදෘතයන්
                    </td>
                    <td style="display: flex; justify-content: flex-end; align-items: center; height:80px">
                        <input class="form-control form-control-sm" id="up_service_minite" name="up_service_minite" type="file">
                        <div name="complete_2" id="complete_2" style="display: none;">
                            <i class="bi bi-check-circle-fill" style="font-size: 24px;"></i>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" id="uploadButton_2">
                            <i class="bi bi-cloud-upload-fill" style="font-size: 16px;"></i>
                            Upload
                        </button>
                        <button type="button" class="btn btn-outline-success" id="viewButton_2" name="viewButton_2" style="display: none;" disabled>
                            <i class="bi bi-eye-slash-fill" style="font-size: 24px;"></i>
                            View
                        </button>
                    </td>
                </tr>
                <tr class="hover-row">
                    <td id = "upDoc3">UP_3</td>
                    <td colspan=2>
                        <i class="bi bi-filetype-pdf" style="font-size: 24px;"></i>
                        සේවය ස්ථිර කිරීමේ ලිපියේ සහතික කරන ලද පිටපත
                    </td>
                    <td style="display: flex; justify-content: flex-end; align-items: center; height:80px">
                        <input class="form-control form-control-sm" id="up_app_letter_confirm" name="up_app_letter_confirm" type="file">
                        <div name="complete_3" id="complete_3" style="display: none;">
                            <i class="bi bi-check-circle-fill" style="font-size: 24px;"></i>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" id="uploadButton_3">
                            <i class="bi bi-cloud-upload-fill" style="font-size: 16px;"></i>
                            Upload
                        </button>
                        <button type="button" class="btn btn-outline-success" id="viewButton_3" style="display: none;" disabled>
                            <i class="bi bi-eye-slash-fill" style="font-size: 24px;"></i>
                            View
                        </button>
                    </td>
                </tr>
                <tr class="hover-row">
                    <td id = "upDoc4">UP_4</td>
                    <td colspan=2>
                        <i class="bi bi-filetype-pdf" style="font-size: 24px;"></i>
                        නිලධාරියා දකුණු පළාත් සභාවට අන්තර්ග්‍රහණය කරන ලද ලිපියේ සහතික කල පිටපත
                    </td>
                    <td style="display: flex; justify-content: flex-end; align-items: center; height:80px">
                        <input class="form-control form-control-sm" id="up_attach_sp" name="up_attach_sp" type="file">
                        <div name="complete_4" id="complete_4" style="display: none;">
                            <i class="bi bi-check-circle-fill" style="font-size: 24px;"></i>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" id="uploadButton_4">
                            <i class="bi bi-cloud-upload-fill" style="font-size: 16px;"></i>
                            Upload
                        </button>
                        <button type="button" class="btn btn-outline-success" id="viewButton_4" style="display: none;" disabled>
                            <i class="bi bi-eye-slash-fill" style="font-size: 24px;"></i>
                            View
                        </button>
                    </td>
                </tr>
                <tr class="hover-row">
                    <td id = "upDoc5">UP_5</td>
                    <td colspan=2>
                        <i class="bi bi-filetype-pdf" style="font-size: 24px;"></i>
                        නිලධාරියා අදාල පාඨමාලාව සඳහා තොරා ගත් බවට වන ලිපිය
                    </td>
                    <td style="display: flex; justify-content: flex-end; align-items: center; height:80px">
                        <input class="form-control form-control-sm" id="up_course_selected" name="up_course_selected" type="file">
                        <div name="complete_5" id="complete_5" style="display: none;">
                            <i class="bi bi-check-circle-fill" style="font-size: 24px;"></i>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" id="uploadButton_5">
                            <i class="bi bi-cloud-upload-fill" style="font-size: 16px;"></i>
                            Upload
                        </button>
                        <button type="button" class="btn btn-outline-success" id="viewButton_5" style="display: none;" disabled>
                            <i class="bi bi-eye-slash-fill" style="font-size: 24px;"></i>
                            View
                        </button>
                    </td>
                </tr>
                <tr class="hover-row">
                    <td id = "upDoc6">UP_6</td>
                    <td colspan=2>
                        <i class="bi bi-filetype-pdf" style="font-size: 24px;"></i>
                        විශ්ව විද්‍යාල ප්‍රතිපාදන කොමිෂන් සභාව විසින් අනුමත කරන ලද විශ්ව විද්‍යාලයක බව සහතික කරන ලද ලිපිය
                    </td>
                    <td style="display: flex; justify-content: flex-end; align-items: center; height:80px">
                        <input class="form-control form-control-sm" id="up_campus_confirm" name="up_campus_confirm" type="file">
                        <div name="complete_6" id="complete_6" style="display: none;">
                            <i class="bi bi-check-circle-fill" style="font-size: 24px;"></i>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" id="uploadButton_6">
                            <i class="bi bi-cloud-upload-fill" style="font-size: 16px;"></i>
                            Upload
                        </button>
                        <button type="button" class="btn btn-outline-success" id="viewButton_6" style="display: none;" disabled>
                            <i class="bi bi-eye-slash-fill" style="font-size: 24px;"></i>
                            View
                        </button>
                    </td>
                </tr>
                <tr class="hover-row">
                    <td id = "upDoc7">UP_7</td>
                    <td colspan=2>
                        <i class="bi bi-filetype-pdf" style="font-size: 24px;"></i>
                        පාථමාලාව අවසන් කළ බවට සහතිකය
                    </td>
                    <td style="display: flex; justify-content: flex-end; align-items: center; height:80px">
                        <input class="form-control form-control-sm" id="up_course_complete" name="up_course_complete" type="file">
                        <div name="complete_7" id="complete_7" style="display: none;">
                            <i class="bi bi-check-circle-fill" style="font-size: 24px;"></i>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" id="uploadButton_7">
                            <i class="bi bi-cloud-upload-fill" style="font-size: 16px;"></i>
                            Upload
                        </button>
                        <button type="button" class="btn btn-outline-success" id="viewButton_7" style="display: none;" disabled>
                            <i class="bi bi-eye-slash-fill" style="font-size: 24px;"></i>
                            View
                        </button>
                    </td>
                </tr>
                <tr class="hover-row">
                    <td id = "upDoc8">UP_8</td>
                    <td colspan=2>
                        <i class="bi bi-filetype-pdf" style="font-size: 24px;"></i>
                        මුදල් ගෙවූ රිසිට්පත්
                    </td>
                    <td style="display: flex; justify-content: flex-end; align-items: center; height:80px">
                        <input class="form-control form-control-sm" id="up_pay_recept" name="up_pay_recept" type="file">
                        <div name="complete_8" id="complete_8" style="display: none;">
                            <i class="bi bi-check-circle-fill" style="font-size: 24px;"></i>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" id="uploadButton_8">
                            <i class="bi bi-cloud-upload-fill" style="font-size: 16px;"></i>
                            Upload
                        </button>
                        <button type="button" class="btn btn-outline-success" id="viewButton_8" style="display: none;" disabled>
                            <i class="bi bi-eye-slash-fill" style="font-size: 24px;"></i>
                            View
                        </button>
                    </td>
                </tr>
                <tr class="hover-row">
                    <td id = "upDoc9">UP_9</td>
                    <td colspan=2>
                        <i class="bi bi-filetype-pdf" style="font-size: 24px;"></i>
                        වෙනත්
                    </td>
                    <td style="display: flex; justify-content: flex-end; align-items: center; height:80px">
                        <input class="form-control form-control-sm" id="up_other" name="up_other" type="file">
                        <div name="complete_9" id="complete_9" style="display: none;">
                            <i class="bi bi-check-circle-fill" style="font-size: 24px;"></i>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" id="uploadButton_9">
                            <i class="bi bi-cloud-upload-fill" style="font-size: 16px;"></i>
                            Upload
                        </button>
                        <button type="button" class="btn btn-outline-success" id="viewButton_9" style="display: none;" disabled>
                            <i class="bi bi-eye-slash-fill" style="font-size: 24px;"></i>
                            View
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <form method="post" action="./status.php">
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
                <span class="label-text">මෙම අයදුම්පත සඳහා කිරීමට අවශ්‍ය සියලු ලිපි හා ලේඛන කල බවට සහතික කරමි.</span>
            </label>
        </div>
                                
        <button type="button" id="Documents-btn" class="Documents-btn" disabled >
            <span class="folderContainer">
                <svg
                class="fileBack"
                width="146"
                height="113"
                viewBox="0 0 146 113"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    d="M0 4C0 1.79086 1.79086 0 4 0H50.3802C51.8285 0 53.2056 0.627965 54.1553 1.72142L64.3303 13.4371C65.2799 14.5306 66.657 15.1585 68.1053 15.1585H141.509C143.718 15.1585 145.509 16.9494 145.509 19.1585V109C145.509 111.209 143.718 113 141.509 113H3.99999C1.79085 113 0 111.209 0 109V4Z"
                    fill="url(#paint0_linear_117_4)"
                ></path>
                <defs>
                    <linearGradient
                    id="paint0_linear_117_4"
                    x1="0"
                    y1="0"
                    x2="72.93"
                    y2="95.4804"
                    gradientUnits="userSpaceOnUse"
                    >
                    <stop stop-color="#8F88C2"></stop>
                    <stop offset="1" stop-color="#5C52A2"></stop>
                    </linearGradient>
                </defs>
                </svg>

                <svg
                class="filePage"
                width="88"
                height="99"
                viewBox="0 0 88 99"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                >
                <rect width="88" height="99" fill="url(#paint0_linear_117_6)"></rect>
                <defs>
                    <linearGradient
                    id="paint0_linear_117_6"
                    x1="0"
                    y1="0"
                    x2="81"
                    y2="160.5"
                    gradientUnits="userSpaceOnUse"
                    >
                    <stop stop-color="white"></stop>
                    <stop offset="1" stop-color="#686868"></stop>
                    </linearGradient>
                </defs>
                </svg>

                <svg
                class="fileFront"
                width="160"
                height="79"
                viewBox="0 0 160 79"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    d="M0.29306 12.2478C0.133905 9.38186 2.41499 6.97059 5.28537 6.97059H30.419H58.1902C59.5751 6.97059 60.9288 6.55982 62.0802 5.79025L68.977 1.18034C70.1283 0.410771 71.482 0 72.8669 0H77H155.462C157.87 0 159.733 2.1129 159.43 4.50232L150.443 75.5023C150.19 77.5013 148.489 79 146.474 79H7.78403C5.66106 79 3.9079 77.3415 3.79019 75.2218L0.29306 12.2478Z"
                    fill="url(#paint0_linear_117_5)"
                ></path>
                <defs>
                    <linearGradient
                    id="paint0_linear_117_5"
                    x1="38.7619"
                    y1="8.71323"
                    x2="66.9106"
                    y2="82.8317"
                    gradientUnits="userSpaceOnUse"
                    >
                    <stop stop-color="#C3BBFF"></stop>
                    <stop offset="1" stop-color="#51469A"></stop>
                    </linearGradient>
                </defs>
                </svg>
            </span>
            <p class="text">Submit Application</p>
        </button>
    </form>
</section>
    

    <script src="./js/upload.js"></script>
    <script src="./js/register.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
