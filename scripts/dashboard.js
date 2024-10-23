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

document.addEventListener('DOMContentLoaded', function() {
    const radioButtons = document.querySelectorAll('input[name="flexRadioDefault"]');
    const textBoxRow = document.getElementById("textBoxRow");
    const nextFieldsetTableContainer = document.getElementById("nextFieldsetTableContainer");
    const textBoxRows = document.getElementById("textBoxRows");
    const nextFieldsetTableContainers = document.getElementById("nextFieldsetTableContainers");
    const courseDetailsContainer = document.getElementById('courseDeatails'); // Ensure you have this ID in your HTML.

    // Function to toggle display based on the radio button selection
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.id === "flexRadioDefault1") { 
                textBoxRow.style.display = "block"; 
                nextFieldsetTableContainer.style.display = "block"; 
            } else { 
                textBoxRow.style.display = "none";   
                nextFieldsetTableContainer.style.display = "none";
                textBoxRows.style.display = "none"; 
                nextFieldsetTableContainers.style.display = "none"; 
            }
        });
    });

    // Course Details plus button click
    document.getElementById('addCourseButton').addEventListener('click', function() {
        var newRows = document.getElementById('textBoxRows').cloneNode(true);
        newRows.style.display = 'block'; 

        var clonedInputs = newRows.querySelectorAll('input');
        clonedInputs.forEach(function(input) {
            input.id = input.id + '_' + (courseDetailsContainer.children.length + 1);
            input.name = input.name + '_' + (courseDetailsContainer.children.length + 1);
            input.value = ''; 
        });

        courseDetailsContainer.appendChild(newRows);

        // Display the next fieldset table
        nextFieldsetTableContainers.style.display = 'block';

        clonedInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                var cellId = input.id.replace(/_[0-9]+$/, 'Cell'); // Map to the corresponding table cell
                var tableCell = document.getElementById(cellId);
                if (tableCell) {
                    tableCell.innerText = this.value;
                }
            });
        });
    });

    // Course Details remove button click
    document.addEventListener('click', function(event) {
        if (event.target && event.target.id === 'removeCourseButton') {
            var rowsToRemove = event.target.closest('.rows');
            if (rowsToRemove) {
                rowsToRemove.remove();
                nextFieldsetTableContainers.style.display = "none"; // Hide the next fieldset
            }
        }
    });
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
    { input: 'permenant', cell: 'permenantCell' },
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
    { input: 'courseName1', cell: 'courseName1Cell' },
    { input: 'universityName1', cell: 'universityName1Cell' },
    { input: 'csDate1', cell: 'csDate1Cell' },
    { input: 'loan1', cell: 'loan1Cell' },
    { input: 'cFees1', cell: 'cFees1Cell' },
    { input: 'courseName2', cell: 'courseName2Cell' },
    { input: 'universityName2', cell: 'universityName2Cell' },
    { input: 'csDate2', cell: 'csDate2Cell' },
    { input: 'loan2', cell: 'loan2Cell' },
    { input: 'cFees2', cell: 'cFees2Cell' },
    { input: 'flexRadioDefault', cell: 'chargesCell' },
];

// Attach input event listeners
fields.forEach(function(field) {
    const inputElement = document.getElementById(field.input);
    if (inputElement) {
        inputElement.addEventListener('change', function() {
            document.getElementById(field.cell).innerText = this.value;
        });
    }
});

const radioButtons = document.querySelectorAll('input[name="flexRadioDefault"]');
radioButtons.forEach(function(radio) {
    radio.addEventListener('change', function() {
        // Update the chargesCell with the selected radio button value
        document.getElementById('chargesCell').innerText = this.value;
    });
});

document.getElementById('chargesCell').innerText = 'නැත';

// Fetch and fill data function
function fetchAndFillData() {
    fetch('api/dashboard_2db.php')  // Adjust the path if needed
        .then(response => response.json())
        .then(data => {
            if (!data.error) {
                // Fill the readonly text inputs with fetched data
                document.getElementById('service').value = data.service;
                document.getElementById('grade').value = data.grade;
                document.getElementById('job').value = data.desi;

                // Also fill the corresponding table cells
                document.getElementById('serviceCell').innerText = data.service;
                document.getElementById('gradeCell').innerText = data.grade;
                document.getElementById('jobCell').innerText = data.desi;
            } else {
                alert("Error: " + data.error);
            }
        })
        .catch(error => console.error('Error:', error));
}

// Call fetchAndFillData when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', fetchAndFillData);


// Call the function to fetch and fill data
fetchAndFillData();


//submit button color change
document.getElementById('terms-checkbox-37').addEventListener('change', function() {
    var submitButton = document.getElementById('submitButton');

    if (this.checked) {
        submitButton.disabled = false; // Enable button
        submitButton.classList.add('enabled'); // Add class for animation
        submitButton.style.cursor = "pointer"; // Change cursor to pointer
    } else {
        submitButton.disabled = true; // Disable button
        submitButton.classList.remove('enabled'); // Remove class for animation
        submitButton.style.cursor = "not-allowed"; // Change cursor to not-allowed
    }
});


window.onload = function() {
    fetch('api/dashboard_2db.php')  
        .then(response => response.json())
        .then(data => {
            if (!data.error) {
                // Fill readonly text inputs with fetched data
                document.getElementById('service').value = data.user.service;
                document.getElementById('grade').value = data.user.grade;
                document.getElementById('job').value = data.user.desi;

                // Fill corresponding table cells
                document.getElementById('serviceCell').innerText = data.user.service;
                document.getElementById('gradeCell').innerText = data.user.grade;
                document.getElementById('jobCell').innerText = data.user.desi;

                // Populate ministry dropdown and select the current ministry
                const ministrySelect = document.getElementById('ministry');
                data.ministries.forEach(ministry => {
                    const option = document.createElement('option');
                    option.value = ministry.min_id;  // Set value to min_id
                    option.textContent = ministry.min_name;  // Set display text to min_name
                    
                    // Check if this is the user's current ministry
                    if (ministry.min_id === data.user.ministry_id) {
                        option.selected = true;  // Auto-select the current ministry
                    }

                    ministrySelect.appendChild(option);  // Add option to dropdown
                });

                // Set the ministry value for autofill based on selected option
                const selectedMinistryId = ministrySelect.value;
                const selectedMinistry = data.ministries.find(ministry => ministry.min_id == selectedMinistryId);
                if (selectedMinistry) {
                    const selectedMinistryName = selectedMinistry.min_name;
                    document.getElementById('ministry').value = selectedMinistryName;  // Autofill the ministry name
                    document.getElementById('ministryCell').innerText = selectedMinistryName;  // Update the table cell
                }

                // Listen to changes in dropdown and update the ministry name in the readonly field and table cell
                ministrySelect.addEventListener('change', function() {
                    const selectedOption = ministrySelect.options[ministrySelect.selectedIndex];
                    const selectedMinistryName = selectedOption.textContent;  // Get the selected ministry's name
                    
                    // Update readonly field and table with selected ministry's name
                    document.getElementById('ministry').value = selectedMinistryName;
                    document.getElementById('ministryCell').innerText = selectedMinistryName;
                });

            } else {
                alert("Error: " + data.error);
            }
        })
        .catch(error => console.error('Error:', error));
};













