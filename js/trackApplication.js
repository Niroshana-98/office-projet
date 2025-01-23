document.addEventListener("DOMContentLoaded", () => {
    
    fetch("trackApplication_to_db.php")
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          const progress = document.getElementById("progress");
          const steps = document.querySelectorAll(".step");
  
          const statusMap = {
            "1": 22, 
            "2": 40, 
            "3": 60, 
            "4": 80,
            "5": 100,
          };
  
          const appStatus = data.app_status; 
          const offi_cat = data.offi_cat;
          const progressWidth = statusMap[appStatus] || 0;

          const office = document.getElementById("step1");
          const distOffi = document.getElementById("step2");
          const department = document.getElementById("step3");
          const ministry = document.getElementById("step4");
          const cs = document.getElementById("step5");

          if(offi_cat == "1"){

            office.style.display = "none";
            distOffi.style.display = "none";
            department.style.display = "none";
            ministry.style.display = "none";

          } else if(offi_cat == "2"){

            office.style.display = "none";
            distOffi.style.display = "none";
            department.style.display = "none";

            if(appStatus >= "200"){
                ministry.style.backgroundColor = "green";
            } else{
                ministry.style.backgroundColor = "gray";
            }

            if(appStatus >= "260"){
                cs.style.backgroundColor = "green";
            } else{
                cs.style.backgroundColor = "gray";
            }
          } else if(offi_cat == "3"){

            office.style.display = "none";
            distOffi.style.display = "none";

            if (appStatus <= "114" && appStatus != 2 && appStatus != 3) {
                department.style.backgroundColor = "green";
            } else {
                department.style.backgroundColor = "gray";
            } 

            if(appStatus >= "100"){
                ministry.style.backgroundColor = "green";
            } else{
                ministry.style.backgroundColor = "gray";
            }

            if(appStatus >= "200"){
                cs.style.backgroundColor = "green";
            } else{
                cs.style.backgroundColor = "gray";
            }
         

          } else if(offi_cat == "4"){
            office.style.display = "none";
          } else if(offi_cat == "6"){
            distOffi.style.display = "none";
          }
  
          
          progress.style.width = progressWidth + "%";
          steps.forEach((step, index) => {
            if (index < appStatus) {
              step.classList.add("active");
            }
          });
        } else {
          console.error("Error:", data.error);
        }
      })
      .catch((error) => console.error("Fetch error:", error));
  });
  