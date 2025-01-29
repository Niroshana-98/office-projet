document.addEventListener("DOMContentLoaded", () => {
    
    fetch("trackApplication_to_db.php")
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          
  
          const appStatus = data.app_status; 
          const offi_cat = data.offi_cat;

          document.getElementById("name_eng").textContent = "Hi, " + data.name_eng;

          function updateProgressBar(progressId, newValue) {
            const progressBar = document.querySelector(`#${progressId} .progress-bar`);
            const progressText = progressBar.querySelector('.progress-text');
          
            progressBar.classList.remove('initial');
          
            progressBar.style.width = `${newValue}%`;
          
            progressBar.setAttribute('aria-valuenow', newValue);
          
            progressText.textContent = `Overall Progress: ${newValue}%`;
          }
          
          function activateStep(stepNumber) {
            // Deactivate any previously active steps
            const allSteps = document.querySelectorAll('.step .col-md-2');
            allSteps.forEach(step => step.classList.remove('activesteps'));
          
            // Activate the specified step
            const stepToActivate = document.getElementById(`step${stepNumber}`);
            if (stepToActivate) {
              stepToActivate.classList.add('activesteps');
            } else {
              console.error(`Step ${stepNumber} not found!`);
            }
          }
          
          function changeIconPro(elementId) {
            // Accept either an element ID or the element itself
            const element = typeof elementId === 'string' ? document.getElementById(elementId) : elementId;
      
            // Ensure the element exists
            if (element) {
              element.innerHTML = '<i class="fa fa-gear fa-spin" style="font-size:36px"></i>';
            }
          }

          function changeIconCom(elementId) {
            // Accept either an element ID or the element itself
            const element = typeof elementId === 'string' ? document.getElementById(elementId) : elementId;
      
            // Ensure the element exists
            if (element) {
              element.innerHTML = '<i class="bi bi-building-check"></i>';
            }
          }

          function updateTextContents(elementId, ...names) {
            const element = document.getElementById(elementId);
            
            if (element) {
              // Concatenate all names with a newline for better readability
              element.textContent = names.map(name => `Your application is still beign checked by the , ${name}`).join("\n");
            } else {
              console.error(`Element with ID '${elementId}' not found`);
            }
          }          

          function updateTextContent(elementId, text) {
            const element = document.getElementById(elementId);
          
            element.textContent = text;
          
            if (text.length <= 25) {
              element.classList.add("no-animation");
            } else {
              element.classList.remove("no-animation");
            }
          }
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

            updateTextContent("minName", data.min_name);
            
            if (appStatusesMin.includes(appStatus)) {
            
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(4);

              setTimeout(() => {
                updateProgressBar('progress1', 33);
              }, 100);

              changeIconPro('minIcon');

              updateTextContents("location", data.min_name);

            } else if (appStatusesCS.includes(appStatus)) {

              ministry.classList.add("background-4");
              cs.style.backgroundColor = "gray";

              setTimeout(() => {
                updateProgressBar('progress1', 66);
              }, 100);

              activateStep(5);

              changeIconCom('minIcon');
              changeIconPro('csIcon');

              updateTextContents("location", "Chief Secetraiat Office");

            } else{
              
              ministry.classList.add("background-4");
              cs.classList.add("background-4");

              setTimeout(() => {
                updateProgressBar('progress1', 100);
              }, 100);

              changeIconCom('depIcon');
              changeIconCom('minIcon');
              changeIconCom('csIcon');

              document.getElementById("location").textContent = "Congratulation, Your Application Approved ! ";
            }

          } else if(offi_cat == "3"){

            office.style.display = "none";
            distOffi.style.display = "none";

            const appStatusesDep = [2, 3, 120, 121, 128, 129];
            const appStatusesMin = [110, 111, 114, 115, 118, 119];

            updateTextContent("depName", data.dep_name);
            updateTextContent("minName", data.min_name);

            if (appStatusesDep.includes(appStatus)) {
            
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(3);

              setTimeout(() => {
                updateProgressBar('progress1', 25);
              }, 100);

              changeIconPro('depIcon');

              updateTextContents("location", data.dep_name);

            } else if (appStatusesMin.includes(appStatus)) {

              department.classList.add("background-4");
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(4);

              setTimeout(() => {
                updateProgressBar('progress1', 50);
              }, 100);

              changeIconCom('depIcon');
              changeIconPro('minIcon');

              updateTextContents("location", data.min_name);

            } else if (appStatusesCS.includes(appStatus)) {
              department.classList.add("background-4");
              ministry.classList.add("background-4");
              cs.style.backgroundColor = "gray";

              setTimeout(() => {
                updateProgressBar('progress1', 75);
              }, 100);

              activateStep(5);

              changeIconCom('depIcon');
              changeIconCom('minIcon');
              changeIconPro('csIcon');

              updateTextContents("location", "Chief Secetraiat Office");

            } else{
              department.classList.add("background-4");
              ministry.classList.add("background-4");
              cs.style.classList.add("background-4");

              setTimeout(() => {
                updateProgressBar('progress1', 100);
              }, 100);

              changeIconCom('depIcon');
              changeIconCom('minIcon');
              changeIconCom('csIcon');

              document.getElementById("location").textContent = "Congratulation, Your Application Approved ! ";

            }

          } else if(offi_cat == "4"){
            office.style.display = "none";

            const appStatusesDis = [2, 3, 130, 131, 138, 139];
            const appStatusesDep = [120, 121, 124, 125, 128, 129];
            const appStatusesMin = [110, 111, 114, 115, 118, 119];

            updateTextContent("distOffiName", data.distName);
            updateTextContent("depName", data.dep_name);
            updateTextContent("minName", data.min_name);

            if (appStatusesDis.includes(appStatus)) {
              distOffi.style.backgroundColor = "gray";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(2);

              setTimeout(() => {
                updateProgressBar('progress1', 20);
              }, 100);

              changeIconPro('distIcon');

              updateTextContents("location", data.distName);

            } else if (appStatusesDep.includes(appStatus)) {
              distOffi.classList.add("background-4");
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(3);

              setTimeout(() => {
                updateProgressBar('progress1', 40);
              }, 100);

              changeIconCom("distIcon");
              changeIconPro('depIcon');

              updateTextContents("location", data.dep_name);

            } else if (appStatusesMin.includes(appStatus)) {
              distOffi.classList.add("background-4");
              department.classList.add("background-4");
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(4);

              setTimeout(() => {
                updateProgressBar('progress1', 60);
              }, 100);

              changeIconCom("distIcon");
              changeIconCom('depIcon');
              changeIconPro('minIcon');

              updateTextContents("location", data.min_name);
              
            } else if (appStatusesCS.includes(appStatus)) {
              distOffi.classList.add("background-4");
              department.classList.add("background-4");
              ministry.classList.add("background-4");
              cs.style.backgroundColor = "gray";

              setTimeout(() => {
                updateProgressBar('progress1', 80);
              }, 100);

              activateStep(5);

              changeIconCom("distIcon");
              changeIconCom('depIcon');
              changeIconCom('minIcon');
              changeIconPro('csIcon');

              updateTextContents("location", "Chief Secetraiat Office");

            } else{
              distOffi.classList.add("background-4");
              department.classList.add("background-4");
              ministry.classList.add("background-4");
              cs.style.classList.add("background-4");

              setTimeout(() => {
                updateProgressBar('progress1', 100);
              }, 100);

              changeIconCom("distIcon");
              changeIconCom('depIcon');
              changeIconCom('minIcon');
              changeIconCom('csIcon');

              document.getElementById("location").textContent = "Congratulation, Your Application Approved ! ";

            }

          } else if(offi_cat == "5"){
            const appStatusesOff = [2, 3, 140, 141, 144, 145];
            const appStatusesDis = [130, 131, 134, 135, 138, 139];
            const appStatusesDep = [120, 121, 124, 125, 128, 129];
            const appStatusesMin = [110, 111, 114, 115, 118, 119];           
            // Usage
            updateTextContent("offiName", data.offiName);
            updateTextContent("distOffiName", data.distName);
            updateTextContent("depName", data.dep_name);
            updateTextContent("minName", data.min_name);

            if (appStatusesOff.includes(appStatus)) {
              office.style.backgroundColor = "gray";
              distOffi.style.backgroundColor = "gray";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(1);

              setTimeout(() => {
                updateProgressBar('progress1', 16);
              }, 100);

              changeIconPro('offiIcon');

              updateTextContents("location", data.offiName);           


            } else if (appStatusesDis.includes(appStatus)) {
              office.classList.add("background-4");
              distOffi.style.backgroundColor = "gray";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(2);

              setTimeout(() => {
                updateProgressBar('progress1', 33);
              }, 100);

              changeIconCom("offiIcon");
              changeIconPro('distIcon');

              updateTextContents("location", data.distName);

            } else if (appStatusesDep.includes(appStatus)) {
              office.classList.add("background-4");
              distOffi.classList.add("background-4");
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(3);

              setTimeout(() => {
                updateProgressBar('progress1', 50);
              }, 100);

              changeIconCom("offiIcon");
              changeIconCom("distIcon");
              changeIconPro('depIcon');

              updateTextContents("location", data.dep_name);

            } else if (appStatusesMin.includes(appStatus)) {
              office.classList.add("background-4");
              distOffi.classList.add("background-4");
              department.classList.add("background-4");
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(4);

              setTimeout(() => {
                updateProgressBar('progress1', 66);
              }, 100);

              changeIconCom("offiIcon");
              changeIconCom("distIcon");
              changeIconCom('depIcon');
              changeIconPro('minIcon');

              updateTextContents("location", data.min_name);

            } else if (appStatusesCS.includes(appStatus)) {
              office.classList.add("background-4");
              distOffi.classList.add("background-4");
              department.classList.add("background-4");
              ministry.classList.add("background-4");
              cs.style.backgroundColor = "gray";

              setTimeout(() => {
                updateProgressBar('progress1', 83);
              }, 100);

              activateStep(5);

              changeIconCom("offiIcon");
              changeIconCom("distIcon");
              changeIconCom('depIcon');
              changeIconCom('minIcon');
              changeIconPro('csIcon');

              updateTextContents("location", "Chief Secetraiat Office");

            } else{
              office.classList.add("background-4");
              distOffi.classList.add("background-4");
              department.classList.add("background-4");
              ministry.classList.add("background-4");
              cs.classList.add("background-4");

              setTimeout(() => {
                updateProgressBar('progress1', 100);
              }, 100);

              changeIconCom("offiIcon");
              changeIconCom("distIcon");
              changeIconCom('depIcon');
              changeIconCom('minIcon');
              changeIconCom('csIcon');

              document.getElementById("location").textContent = "Congratulation, Your Application Approved ! ";

            }

          } else if(offi_cat == "6"){
            distOffi.style.display = "none";

            const appStatusesOff = [2, 3, 150, 151, 154, 155];
            const appStatusesDep = [120, 121, 124, 125, 128, 129];
            const appStatusesMin = [110, 111, 114, 115, 118, 119];

            updateTextContent("offiName", data.offiName);
            updateTextContent("depName", data.dep_name);
            updateTextContent("minName", data.min_name);

            if (appStatusesOff.includes(appStatus)) {
              office.style.backgroundColor = "gray";
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(1);

              setTimeout(() => {
                updateProgressBar('progress1', 20);
              }, 100);

              changeIconPro('offiIcon');

              updateTextContents("location", data.offiName); 

            } else if (appStatusesDep.includes(appStatus)) {
              office.classList.add("background-4");
              department.style.backgroundColor = "gray";
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(3);

              setTimeout(() => {
                updateProgressBar('progress1', 40);
              }, 100);

              changeIconCom("offiIcon");
              changeIconPro('depIcon');

              updateTextContents("location", data.dep_name);

            } else if (appStatusesMin.includes(appStatus)) {
              office.classList.add("background-4");
              department.classList.add("background-4");
              ministry.style.backgroundColor = "gray";
              cs.style.backgroundColor = "gray";

              activateStep(4);

              setTimeout(() => {
                updateProgressBar('progress1', 60);
              }, 100);

              changeIconCom("offiIcon");
              changeIconCom('depIcon');
              changeIconPro('minIcon');

              updateTextContents("location", data.min_name);

            } else if (appStatusesCS.includes(appStatus)) {
              office.classList.add("background-4");
              department.classList.add("background-4");
              ministry.classList.add("background-4");
              cs.style.backgroundColor = "gray";

              setTimeout(() => {
                updateProgressBar('progress1', 80);
              }, 100);

              activateStep(5);

              changeIconCom("offiIcon");
              changeIconCom('depIcon');
              changeIconCom('minIcon');
              changeIconPro('csIcon');

              updateTextContents("location", "Chief Secetraiat Office");


            } else{
              office.classList.add("background-4");
              department.classList.add("background-4");
              ministry.classList.add("background-4");
              cs.classList.add("background-4");

              setTimeout(() => {
                updateProgressBar('progress1', 100);
              }, 100);

              changeIconCom("offiIcon");
              changeIconCom('depIcon');
              changeIconCom('minIcon');
              changeIconCom('csIcon');

              document.getElementById("location").textContent = "Congratulation, Your Application Approved ! ";

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



  