document.addEventListener("DOMContentLoaded", () => {
    
    fetch("trackApplication_to_db.php")
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          
  
          const appStatus = data.app_status; 
          const offi_cat = data.offi_cat;

          console.log(appStatus);

          const appStatusesCS = [100, 101, 200, 201, 210, 211, 220, 221, 230, 231, 240, 241, 250];

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

            const appStatusesMin = [2, 3, 110, 111, 118, 119]; 
            
            if (appStatusesMin.includes(appStatus)) {
            
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesCS.includes(appStatus)) {

              ministry.style.backgroundColor = "green";
              cs.style.backgroundColor = "gray";
            } else{
              
              ministry.style.backgroundColor = "green";
              cs.style.backgroundColor = "green";
            }

          } else if(offi_cat == "3"){

            office.style.display = "none";
            distOffi.style.display = "none";

            const appStatusesDep = [2, 3, 120, 121, 128, 129];
            const appStatusesMin = [110, 111, 114, 115, 118, 119];

            if (appStatusesDep.includes(appStatus)) {
            
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesMin.includes(appStatus)) {

              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesCS.includes(appStatus)) {
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "green";
              cs.style.backgroundColor = "gray";
            } else{
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "green";
              cs.style.backgroundColor = "green";
            }

          } else if(offi_cat == "4"){
            office.style.display = "none";

            const appStatusesDis = [2, 3, 130, 131, 138, 139];
            const appStatusesDep = [120, 121, 124, 125, 128, 129];
            const appStatusesMin = [100, 111, 114, 115, 118, 119];

            if (appStatusesDis.includes(appStatus)) {
              distOffi.style.backgroundColor = "gray";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesDep.includes(appStatus)) {
              distOffi.style.backgroundColor = "green";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesMin.includes(appStatus)) {
              distOffi.style.backgroundColor = "green";
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesCS.includes(appStatus)) {
              distOffi.style.backgroundColor = "green";
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "green";
              cs.style.backgroundColor = "gray";
            } else{
              distOffi.style.backgroundColor = "green";
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "green";
              cs.style.backgroundColor = "green";
            }

          } else if(offi_cat == "5"){
            const appStatusesOff = [2, 3, 140, 141, 144, 145];
            const appStatusesDis = [130, 131, 134, 135, 138, 139];
            const appStatusesDep = [120, 121, 124, 125, 128, 129];
            const appStatusesMin = [110, 111, 114, 115, 118, 119];

            if (appStatusesOff.includes(appStatus)) {
              office.style.backgroundColor = "gray";
              distOffi.style.backgroundColor = "gray";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesDis.includes(appStatus)) {
              office.style.backgroundColor = "green";
              distOffi.style.backgroundColor = "gray";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesDep.includes(appStatus)) {
              office.style.backgroundColor = "green";
              distOffi.style.backgroundColor = "green";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesMin.includes(appStatus)) {
              office.style.backgroundColor = "green";
              distOffi.style.backgroundColor = "green";
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesCS.includes(appStatus)) {
              office.style.backgroundColor = "green";
              distOffi.style.backgroundColor = "green";
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "green";
              cs.style.backgroundColor = "gray";
            } else{
              office.style.backgroundColor = "green";
              distOffi.style.backgroundColor = "green";
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "green";
              cs.style.backgroundColor = "green";
            }

          } else if(offi_cat == "6"){
            distOffi.style.display = "none";

            const appStatusesOff = [2, 3, 150, 151, 154, 155];
            const appStatusesDep = [120, 121, 124, 125, 128, 129];
            const appStatusesMin = [110, 111, 114, 115, 118, 119];

            if (appStatusesOff.includes(appStatus)) {
              office.style.backgroundColor = "gray";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesDep.includes(appStatus)) {
              office.style.backgroundColor = "green";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesMin.includes(appStatus)) {
              office.style.backgroundColor = "green";
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";
            } else if (appStatusesCS.includes(appStatus)) {
              office.style.backgroundColor = "green";
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "green";
              cs.style.backgroundColor = "gray";
            } else{
              office.style.backgroundColor = "green";
              department.style.backgroundColor = "green";
              ministry.style.backgroundColor = "green";
              cs.style.backgroundColor = "green";
            }

          } else{
            console.log("Error");
          }
  
          
          
        } else {
          console.error("Error:", data.error);
        }
      })
      .catch((error) => console.error("Fetch error:", error));
  });



  