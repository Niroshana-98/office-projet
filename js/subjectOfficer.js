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
    fetch('../subjectOfficer_to_db.php') 
        .then(response => response.json())  
        .then(data => {
            if (data.name && data.position) {
                document.getElementById('user-name').textContent = data.name;
                document.getElementById('user-position').textContent = data.position;
            } else {
                console.error(data.error);
            }
        })
        .catch(error => {
            console.error('Error fetching user details:', error);
        });
}
fetchUserDetails();


    