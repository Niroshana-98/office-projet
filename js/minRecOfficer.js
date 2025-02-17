document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    nav.classList.toggle('show')
    toggle.classList.toggle('bx-x')
    bodypd.classList.toggle('body-pd')
    headerpd.classList.toggle('body-pd')
    })
    } 
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
    });

function updateTime() {
    const currentTime = new Date().toLocaleTimeString();
    document.getElementById('login-time').textContent = currentTime;
} 

setInterval(updateTime, 1000);
updateTime();

function fetchUserDetails() {
    fetch('minRecOfficer_to_db.php') 
        .then(response => response.json())  
        .then(data => {
            if (data.name && data.offi_name) {
                document.getElementById('user-name').textContent = data.name;
                document.getElementById('user-work-place').textContent = data.offi_name;

                // Update My Application link based on app_status
                let appLink = document.getElementById("my-application-link");
                
                if (data.app_status === 0) {
                    appLink.href = "./officerApplication.php";
                } else if (data.app_status === 1) {
                    appLink.href = "./officerApplicationUpload.php";
                } else if(data.app_status === 4){
                    appLink.href = "./officerApplicationReject.php"; 
                } else{
                    appLink.href = "./officerApplicationView.php"; 
                }
                
            } else {
                console.error(data.error);
            }
        })
        .catch(error => {
            console.error('Error fetching user details:', error);
        });
}
fetchUserDetails();

document.addEventListener("DOMContentLoaded", function(event) {
    const logoutLink = document.getElementById("logout-link");
    const logoutButton = document.getElementById("logout-button");

    if (logoutLink) {
        logoutLink.addEventListener("click", function(event) {
            event.preventDefault(); 

            logoutButton.click();  
        });
    }

    logoutButton.addEventListener("click", function() {
        Swal.fire({
            title: "Are you sure you want to log out?",
            text: "You will need to log back in to access your account.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, log out",
            cancelButtonText: "Cancel",
            customClass: {
                popup: 'swal2-popup',
                title: 'swal2-title',
                content: 'swal2-content',
                confirmButton: 'swal2-confirm',
                cancelButton: 'swal2-cancel',
                actions: 'swal2-actions' 
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = './index.html'; 
            }
        });
    });
});
