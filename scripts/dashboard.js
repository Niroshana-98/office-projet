var current_fs, next_fs, previous_fs; // fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function() {
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    // Add class active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    // Show the next fieldset
    next_fs.show();
    // Hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
            // For making fieldset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
        },
        duration: 500
    });
    setProgressBar(++current);
});

$(".previous").click(function() {
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    // Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    // Show the previous fieldset
    previous_fs.show();

    // Hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
            // For making fieldset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
        },
        duration: 500
    });
    setProgressBar(--current);
});

function setProgressBar(curStep) {
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar").css("width", percent + "%");
}

$(".submit").click(function() {
    return false;
});

function toggleTextBox() {
    const selectBox = document.getElementById("charges");
    const textBoxRow = document.getElementById("textBoxRow");
    const textBoxRows = document.getElementById("textBoxRows");

    if (selectBox.value == "1") {
        textBoxRow.style.display = "block";  // Show the text box
        nextFieldsetTableContainer.style.display = "block";
    } else {
        textBoxRow.style.display = "none";   // Hide the text box
        textBoxRows.style.display = "none";
        nextFieldsetTableContainer.style.display = "none";
    }
}

// course Details plus button click
document.getElementById('addCourseButton').addEventListener('click', function() {
    if (!document.getElementById('courseDeatails').querySelector('.rows')) {
        var newRows = document.getElementById('textBoxRows').cloneNode(true);

        // Ensure that the cloned rows are displayed
        newRows.style.display = 'block';

        // Change the IDs of the cloned inputs to avoid ID conflicts
        var clonedInputs = newRows.querySelectorAll('input');
        clonedInputs.forEach(function(input, index) {
            input.id = input.id + '_clone';  // Add '_clone' suffix or any unique identifier to the ID
            input.name = input.name + '_clone'; // Modify the name if necessary
        });

        // Append the cloned rows to the course details section
        document.getElementById('courseDeatails').appendChild(newRows);

        // Display the next fieldset table
        document.getElementById('nextFieldsetTableContainers').style.display = 'block';

        // Reattach event listeners for the cloned inputs
        clonedInputs.forEach(function(input, index) {
            input.addEventListener('input', function() {
                var cellId = input.id.replace('_clone', 'Cell');  // Map to the corresponding table cell
                var tableCell = document.getElementById(cellId);
                if (tableCell) {
                    tableCell.innerText = this.value;
                }
            });
        });
    } else {
        alert("Course details have already been added.");
    }
});


// course Button remove button click
document.addEventListener('click', function(event) {
    if (event.target && event.target.id === 'removeCourseButton') {
        var rowsToRemove = event.target.closest('.rows');
        if (rowsToRemove) {
            rowsToRemove.remove();
            nextFieldsetTableContainers.style.display = "none";
        }
    }
});

//View 
const fields = [
    { input: 'fname', cell: 'fnameCell' },
    { input: 'iname', cell: 'inameCell' },
    { input: 'iename', cell: 'ienameCell' },
    { input: 'nic', cell: 'nicCell' },
    { input: 'address', cell: 'addressCell' },
    { input: 'tel', cell: 'telCell' },
    { input: 'htel', cell: 'htelCell' },
    { input: 'email', cell: 'emailCell' },
    { input: 'service', cell: 'serviceCell' },
    { input: 'grade', cell: 'gradeCell' },
    { input: 'permenant', cell: 'permenantCell' },
    { input: 'job', cell: 'jobCell' },
    { input: 'location', cell: 'locationCell' },
    { input: 'ministry', cell: 'ministryCell' },
    { input: 'includeDate', cell: 'includeDateCell' },
    { input: 'university', cell: 'universityCell' },
    { input: 'digree', cell: 'digreeCell' },
    { input: 'eno', cell: 'enoCell' },
    { input: 'sDate', cell: 'sDateCell' },
    { input: 'eDate', cell: 'eDateCell' },
    { input: 'provision', cell: 'provisionCell' },
    { input: 'charges', cell: 'chargesCell' },
    { input: 'courseName1', cell: 'courseName1Cell'},
    { input: 'universityName1', cell: 'universityName1Cell'},
    { input: 'csDate1', cell: 'csDate1Cell'},
    { input: 'loan1', cell: 'loan1Cell'},
    { input: 'cFees1', cell: 'cFees1Cell'},
    { input: 'courseName2', cell: 'courseName2Cell'},
    { input: 'universityName2', cell: 'universityName2Cell'},
    { input: 'csDate2', cell: 'csDate2Cell'},
    { input: 'loan2', cell: 'loan2Cell'},
    { input: 'cFees2', cell: 'cFees2Cell'},
];

fields.forEach(function(field) {
    document.getElementById(field.input).addEventListener('input', function() {
        document.getElementById(field.cell).innerText = this.value;
    });
});

document.getElementById('agreeCheckbox').addEventListener('change', function() {
    var submitButton = document.getElementById('submitButton');
    
    if (this.checked) {
        submitButton.disabled = false;
        submitButton.style.backgroundColor = "#0000ff"; // Green when enabled
        submitButton.style.color = "white";
    } else {
        submitButton.disabled = true;
        submitButton.style.backgroundColor = "#ccc"; // Gray when disabled
        submitButton.style.color = "black";
    }
});


document.addEventListener('DOMContentLoaded', function(){
    // Fetch the data from the PHP backend
    fetch('./api/dashboard_2db.php')
        .then(response => response.json())
        .then(data => {
            // service dropdown
            let serviceDropdown = document.getElementById('service');
            data.serviceNames.forEach(service_name => {
                let option = document.createElement('option');
                option.value = service_name;
                option.text = service_name;
                serviceDropdown.add(option);
            });

            // job dropdown
            let jobDropdown = document.getElementById('job');
            data.jobNames.forEach(desi_name => {
                let option = document.createElement('option');
                option.value = desi_name;
                option.text = desi_name;
                jobDropdown.add(option);
            });
        })
        .catch(error => console.log('Error', error));
});

