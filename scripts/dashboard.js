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
    const selectBox = document.getElementById("selectBox");
    const textBoxRow = document.getElementById("textBoxRow");

    if (selectBox.value == "1") {
        textBoxRow.style.display = "block";  // Show the text box
    } else {
        textBoxRow.style.display = "none";   // Hide the text box
    }
}

// course Details plus button click
document.getElementById('addCourseButton').addEventListener('click', function() {
    if (!document.getElementById('courseDeatails').querySelector('.rows')) {
        var newRows = document.getElementById('textBoxRows').cloneNode(true);

        newRows.style.display = 'block'; // Show the new cloned rows

        document.getElementById('courseDeatails').appendChild(newRows);
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
];

fields.forEach(function(field) {
    document.getElementById(field.input).addEventListener('input', function() {
        document.getElementById(field.cell).innerText = this.value;
    });
});



