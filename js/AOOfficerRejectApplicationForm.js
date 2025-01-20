document.addEventListener("DOMContentLoaded", function () {
    fetch("AOOfficerRejectApplicationForm_to_db.php", {
        credentials: 'include'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById("appNoDisplay").innerText = data.app_no;
            document.getElementById("name_si").value = data.name_si;
            document.getElementById("name_full").value = data.name_full;
            document.getElementById("name_eng").value = data.name_eng;
            document.getElementById("nic").value = data.nic;
            document.getElementById("address_pri").value = data.address_pri;
            document.getElementById("tel_land").value = data.tel_land;
            document.getElementById("tel_mob").value = data.tel_mob;
            document.getElementById("email_pri").value = data.email_pri;
            document.getElementById("service").value = data.service;
            document.getElementById("grade").value = data.grade;
            document.getElementById("upp_status").value = data.upp_status;
            document.getElementById("desi").value = data.desi;
            document.getElementById("c_w_p").value = data.c_w_p;
            document.getElementById("min").value = data.min;
            document.getElementById("date_att_sp").value = data.date_att_sp;
            document.getElementById("ins_name").value = data.ins_name;
            document.getElementById("course_name").value = data.course_name;
            document.getElementById("service_minite_no").value = data.service_minite_no;
            document.getElementById("course_start_date").value = data.course_start_date;
            document.getElementById("course_end_date").value = data.course_end_date;
            document.getElementById("course_fee").value = data.course_fee;
            document.getElementById("before_recieved").value = data.before_recieved;

            //Applicate Details
            document.getElementById("applicateName").value = data.name_si; 
            document.getElementById("applicateDesi").value = data.desi;
            document.getElementById("applicateDate").value = data.created;
            console.log(data.offi_cat);

            //Subject Officer Details
            const remarkDiv = document.getElementById("remark");

            if (!data.Subject_Aprv_Rm) {
                remarkDiv.style.display = "none";
            } else {
                document.getElementById("Remark").value = data.Subject_Aprv_Rm;
            }
            
            document.getElementById("subDesi").value = data.designation;
            document.getElementById("subjectOfficerDate").value = data.Subject_time_stamp;
            document.getElementById("subName").value = data.subject_officer_name;

            //div
            const offiRecOfficerDiv = document.getElementById("offiRecOfficerDiv");
            const offiHeadDiv = document.getElementById("offiHeadDiv");
            const distChkOffiDiv = document.getElementById("distChkOffiDiv");
            const distRecOffiDiv = document.getElementById("distRecOffiDiv");
            const distOffiHeadDiv = document.getElementById("distOffiHeadDiv");
            const depChkOffiDiv = document.getElementById("depChkOffiDiv");
            const depRecOffiDiv = document.getElementById("depRecOffiDiv");
            const depHeadDiv = document.getElementById("depHeadDiv");
            const minChkOffiDiv = document.getElementById("minChkOffiDiv");

            //HR
            const subjectOfficerHR = document.getElementById("subjectOfficerHR");
            const offiRecOfficerHR = document.getElementById("offiRecOfficerHR");
            const offiHeadHR = document.getElementById("offiHeadHR");
            const distChkOffiHR = document.getElementById("distChkOffiHR");
            const distRecOffiHR = document.getElementById("distRecOffiHR");
            const distOffiHeadHR = document.getElementById("distOffiHeadHR");
            const depChkOffiHR = document.getElementById("depChkOffiHR");
            const depRecOffiHR = document.getElementById("depRecOffiHR");
            const depHeadHR = document.getElementById("depHeadHR");

            if(data.offi_cat === 2){
                offiRecOfficerDiv.style.display = "none";
                offiHeadDiv.style.display = "none";
                distChkOffiDiv.style.display = "none";
                distRecOffiDiv.style.display = "none";
                distOffiHeadDiv.style.display = "none";
                depChkOffiDiv.style.display = "none";
                depRecOffiDiv.style.display = "none";
                depHeadDiv.style.display = "none";
                minChkOffiDiv.style.display = "none";
                
                subjectOfficerHR.style.display = "none";
                offiRecOfficerHR.style.display = "none";
                offiHeadHR.style.display = "none";
                distChkOffiHR.style.display = "none";
                distRecOffiHR.style.display = "none";
                distOffiHeadHR.style.display = "none";
                depChkOffiHR.style.display = "none";
                depRecOffiHR.style.display = "none";
                depHeadHR.style.display = "none";

            }else if(data.offi_cat === 3){
                offiRecOfficerDiv.style.display = "none";
                offiHeadDiv.style.display = "none";
                distChkOffiDiv.style.display = "none";
                distRecOffiDiv.style.display = "none";
                distOffiHeadDiv.style.display = "none";
                depChkOffiDiv.style.display = "none";

                subjectOfficerHR.style.display = "none";
                offiRecOfficerHR.style.display = "none";
                offiHeadHR.style.display = "none";
                distRecOffiHR.style.display = "none";
                offiHeadHR.style.display = "none";
                distOffiHeadHR.style.display = "none";
                depChkOffiHR.style.display = "none";

                //Department Recommend Officer Details
                const remarkDepRecOffiDiv = document.getElementById("remarkRecChkOffiDiv");

                if(!data.Dep_Rec_Offi_Aprv_RM) {
                    remarkDepRecOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepRecOffi").value = data.Dep_Rec_Offi_Aprv_RM;
                }

                document.getElementById("depRecOffiName").value = data.dep_rec_officer_name;
                document.getElementById("depRecOffiDesi").value = data.depRecOffiDesignation;
                document.getElementById("depRecOffiDate").value = data.Dep_Rec_Offi_time_stamp;

                //Department Head Details
                const remarkDepHeadDiv = document.getElementById("remarkDepHeadDiv");

                if(!data.Dep_head_Aprv_RM) {
                    remarkDepHeadDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepHead").value = data.Dep_head_Aprv_RM;
                }

                document.getElementById("depHeadName").value = data.dep_head_name;
                document.getElementById("depHeadDesi").value = data.depHeadDesignation;
                document.getElementById("depHeadDate").value = data.Dep_head_time_stamp;

                //Ministry Check Officer Details

                const remarkMinChkOffiDiv = document.getElementById("remarkMinChkOffiDiv");

                if(!data.Min_Chk_Offi_Aprv_RM) {
                    remarkMinChkOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkMinChkOffi").value = data.Min_Chk_Offi_Aprv_RM;
                }

                document.getElementById("minChkName").value = data.min_chk_name;
                document.getElementById("minChkDesi").value = data.minChkDesignation;
                document.getElementById("minChkDate").value = data.Min_Chk_Offi_time_stamp;

            }else if(data.offi_cat === 4){
                offiRecOfficerDiv.style.display = "none";
                offiHeadDiv.style.display = "none";
                distChkOffiDiv.style.display = "none";
                subjectOfficerHR.style.display = "none";
                offiRecOfficerHR.style.display = "none";
                offiHeadHR.style.display = "none";

                const remarkDistRecOfficerDiv = document.getElementById("remarkDistRecOfficerDiv");

                if(!data.Dist_Rec_Offi_Aprv_Rm){
                    remarkDistRecOfficerDiv.style.display = "none";
                }else{
                    document.getElementById("remarkDistRecOfficer").value = data.Dist_Rec_Offi_Aprv_Rm;
                }
                document.getElementById("distRecOffiName").value = data.dist_rec_officer_name;
                document.getElementById("distRecOffiDesi").value = data.distRecOffiDesignation;
                document.getElementById("distRecOffiDate").value = data.Dist_Rec_Offi_time_stamp;

                //District Office Head Details
                const remarkDistOffiHeadDiv = document.getElementById("remarkDistOffiHeadDiv");

                if(!data.Dist_offi_head_Aprv_RM) {
                    remarkDistOffiHeadDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDistOfficeHead").value = data.Dist_offi_head_Aprv_RM;
                }

                document.getElementById("distOffiHeadName").value = data.dist_offi_head_name;
                document.getElementById("distOffiHeadDesi").value = data.distOffiHeadDesignation;
                document.getElementById("distOffiHeadDate").value = data.Dist_offi_head_time_stamp;

                //Department Check Officer Details
                const remarkDepChkOffiDiv = document.getElementById("remarkDepChkOffiDiv");

                if(!data.Dep_Chk_Offi_Aprv_RM) {
                    remarkDepChkOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepChkOffi").value = data.Dep_Chk_Offi_Aprv_RM;
                }

                document.getElementById("depChkOffiName").value = data.dep_chk_officer_name;
                document.getElementById("depChkOffiDesi").value = data.depChkOffiDesignation;
                document.getElementById("depChkOffiDate").value = data.Dep_Chk_Offi_time_stamp;

                //Department Recommend Officer Details
                const remarkDepRecOffiDiv = document.getElementById("remarkRecChkOffiDiv");

                if(!data.Dep_Rec_Offi_Aprv_RM) {
                    remarkDepRecOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepRecOffi").value = data.Dep_Rec_Offi_Aprv_RM;
                }

                document.getElementById("depRecOffiName").value = data.dep_rec_officer_name;
                document.getElementById("depRecOffiDesi").value = data.depRecOffiDesignation;
                document.getElementById("depRecOffiDate").value = data.Dep_Rec_Offi_time_stamp;

                //Department Head Details
                const remarkDepHeadDiv = document.getElementById("remarkDepHeadDiv");

                if(!data.Dep_head_Aprv_RM) {
                    remarkDepHeadDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepHead").value = data.Dep_head_Aprv_RM;
                }

                document.getElementById("depHeadName").value = data.dep_head_name;
                document.getElementById("depHeadDesi").value = data.depHeadDesignation;
                document.getElementById("depHeadDate").value = data.Dep_head_time_stamp;

                //Ministry Check Officer Details

                const remarkMinChkOffiDiv = document.getElementById("remarkMinChkOffiDiv");

                if(!data.Min_Chk_Offi_Aprv_RM) {
                    remarkMinChkOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkMinChkOffi").value = data.Min_Chk_Offi_Aprv_RM;
                }

                document.getElementById("minChkName").value = data.min_chk_name;
                document.getElementById("minChkDesi").value = data.minChkDesignation;
                document.getElementById("minChkDate").value = data.Min_Chk_Offi_time_stamp;

            } else if(data.offi_cat === 5){
                //Recommend Officer Details
                const remarkRecDiv = document.getElementById("remarkRec");

                if (!data.office_Rec_Aprv_RM) {
                    remarkRecDiv.style.display = "none";
                } else {
                    document.getElementById("RemarkRec").value = data.office_Rec_Aprv_RM;
                }

                document.getElementById("recName").value = data.recommend_officer_name;
                document.getElementById("recDesi").value = data.recDesignation;
                document.getElementById("recommendOfficerDate").value = data.office_Rec_time_stamp; 

                //Office head Details
                const remarkOfficeHeadDiv = document.getElementById("remarkOfficeHead");

                if(!data.Office_head_Aprv_RM) {
                    remarkOfficeHeadDiv.style.display = "none";
                } else {
                    document.getElementById("remarkOffiHead").value = data.Office_head_Aprv_RM;
                }

                document.getElementById("offiHeadName").value = data.office_head_name;
                document.getElementById("offiHeadDesi").value = data.offiHeadDesignation;
                document.getElementById("offiHeadDate").value = data.Office_head_time_stamp;

                //District Check Officer Details
                const remarkDistChkOfficerDiv = document.getElementById("remarkDistChkOfficerDiv");

                if(!data.Dist_Chk_Offi_Aprv_Rm) {
                    remarkDistChkOfficerDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDistChkOfficer").value = data.Dist_Chk_Offi_Aprv_Rm;
                }

                document.getElementById("distChkOffiName").value = data.dist_chk_officer_name;
                document.getElementById("distChkOffiDesi").value = data.distChkOffiDesignation;
                document.getElementById("distChkOffiDate").value = data.Dist_Chk_Offi_time_stamp;

                //District Recommend Officer Details
                const remarkDistRecOfficerDiv = document.getElementById("remarkDistRecOfficerDiv");

                if(!data.Dist_Rec_Offi_Aprv_Rm) {
                    remarkDistRecOfficerDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDistRecOfficer").value = data.Dist_Rec_Offi_Aprv_Rm;
                }

                document.getElementById("distRecOffiName").value = data.dist_rec_officer_name;
                document.getElementById("distRecOffiDesi").value = data.distRecOffiDesignation;
                document.getElementById("distRecOffiDate").value = data.Dist_Rec_Offi_time_stamp;

                //District Office Head Details
                const remarkDistOffiHeadDiv = document.getElementById("remarkDistOffiHeadDiv");

                if(!data.Dist_offi_head_Aprv_RM) {
                    remarkDistOffiHeadDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDistOfficeHead").value = data.Dist_offi_head_Aprv_RM;
                }

                document.getElementById("distOffiHeadName").value = data.dist_offi_head_name;
                document.getElementById("distOffiHeadDesi").value = data.distOffiHeadDesignation;
                document.getElementById("distOffiHeadDate").value = data.Dist_offi_head_time_stamp;
                
                //Department Check Officer Details
                const remarkDepChkOffiDiv = document.getElementById("remarkDepChkOffiDiv");

                if(!data.Dep_Chk_Offi_Aprv_RM) {
                    remarkDepChkOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepChkOffi").value = data.Dep_Chk_Offi_Aprv_RM;
                }

                document.getElementById("depChkOffiName").value = data.dep_chk_officer_name;
                document.getElementById("depChkOffiDesi").value = data.depChkOffiDesignation;
                document.getElementById("depChkOffiDate").value = data.Dep_Chk_Offi_time_stamp;

                //Department Recommend Officer Details
                const remarkDepRecOffiDiv = document.getElementById("remarkRecChkOffiDiv");

                if(!data.Dep_Rec_Offi_Aprv_RM) {
                    remarkDepRecOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepRecOffi").value = data.Dep_Rec_Offi_Aprv_RM;
                }

                document.getElementById("depRecOffiName").value = data.dep_rec_officer_name;
                document.getElementById("depRecOffiDesi").value = data.depRecOffiDesignation;
                document.getElementById("depRecOffiDate").value = data.Dep_Rec_Offi_time_stamp;

                //Department Head Details
                const remarkDepHeadDiv = document.getElementById("remarkDepHeadDiv");

                if(!data.Dep_head_Aprv_RM) {
                    remarkDepHeadDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepHead").value = data.Dep_head_Aprv_RM;
                }

                document.getElementById("depHeadName").value = data.dep_head_name;
                document.getElementById("depHeadDesi").value = data.depHeadDesignation;
                document.getElementById("depHeadDate").value = data.Dep_head_time_stamp;

                //Ministry Check Officer Details

                const remarkMinChkOffiDiv = document.getElementById("remarkMinChkOffiDiv");

                if(!data.Min_Chk_Offi_Aprv_RM) {
                    remarkMinChkOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkMinChkOffi").value = data.Min_Chk_Offi_Aprv_RM;
                }

                document.getElementById("minChkName").value = data.min_chk_name;
                document.getElementById("minChkDesi").value = data.minChkDesignation;
                document.getElementById("minChkDate").value = data.Min_Chk_Offi_time_stamp;
            }else{

                distChkOffiDiv.style.display = "none";
                distRecOffiDiv.style.display = "none";
                distOffiHeadDiv.style.display = "none";

                offiHeadHR.style.display = "none";
                distChkOffiHR.style.display = "none";
                distRecOffiHR.style.display = "none";

                //Recommend Officer Details
                const remarkRecDiv = document.getElementById("remarkRec");

                if (!data.office_Rec_Aprv_RM) {
                    remarkRecDiv.style.display = "none";
                } else {
                    document.getElementById("RemarkRec").value = data.office_Rec_Aprv_RM;
                }

                document.getElementById("recName").value = data.recommend_officer_name;
                document.getElementById("recDesi").value = data.recDesignation;
                document.getElementById("recommendOfficerDate").value = data.office_Rec_time_stamp; 

                //Office head Details
                const remarkOfficeHeadDiv = document.getElementById("remarkOfficeHead");

                if(!data.Office_head_Aprv_RM) {
                    remarkOfficeHeadDiv.style.display = "none";
                } else {
                    document.getElementById("remarkOffiHead").value = data.Office_head_Aprv_RM;
                }

                document.getElementById("offiHeadName").value = data.office_head_name;
                document.getElementById("offiHeadDesi").value = data.offiHeadDesignation;
                document.getElementById("offiHeadDate").value = data.Office_head_time_stamp;

                //Department Check Officer Details
                const remarkDepChkOffiDiv = document.getElementById("remarkDepChkOffiDiv");

                if(!data.Dep_Chk_Offi_Aprv_RM) {
                    remarkDepChkOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepChkOffi").value = data.Dep_Chk_Offi_Aprv_RM;
                }

                document.getElementById("depChkOffiName").value = data.dep_chk_officer_name;
                document.getElementById("depChkOffiDesi").value = data.depChkOffiDesignation;
                document.getElementById("depChkOffiDate").value = data.Dep_Chk_Offi_time_stamp;

                //Department Recommend Officer Details
                const remarkDepRecOffiDiv = document.getElementById("remarkRecChkOffiDiv");

                if(!data.Dep_Rec_Offi_Aprv_RM) {
                    remarkDepRecOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepRecOffi").value = data.Dep_Rec_Offi_Aprv_RM;
                }

                document.getElementById("depRecOffiName").value = data.dep_rec_officer_name;
                document.getElementById("depRecOffiDesi").value = data.depRecOffiDesignation;
                document.getElementById("depRecOffiDate").value = data.Dep_Rec_Offi_time_stamp;

                //Department Head Details
                const remarkDepHeadDiv = document.getElementById("remarkDepHeadDiv");

                if(!data.Dep_head_Aprv_RM) {
                    remarkDepHeadDiv.style.display = "none";
                } else {
                    document.getElementById("remarkDepHead").value = data.Dep_head_Aprv_RM;
                }

                document.getElementById("depHeadName").value = data.dep_head_name;
                document.getElementById("depHeadDesi").value = data.depHeadDesignation;
                document.getElementById("depHeadDate").value = data.Dep_head_time_stamp;

                //Ministry Check Officer Details

                const remarkMinChkOffiDiv = document.getElementById("remarkMinChkOffiDiv");

                if(!data.Min_Chk_Offi_Aprv_RM) {
                    remarkMinChkOffiDiv.style.display = "none";
                } else {
                    document.getElementById("remarkMinChkOffi").value = data.Min_Chk_Offi_Aprv_RM;
                }

                document.getElementById("minChkName").value = data.min_chk_name;
                document.getElementById("minChkDesi").value = data.minChkDesignation;
                document.getElementById("minChkDate").value = data.Min_Chk_Offi_time_stamp;
            }

            //Ministry Recommend Officer Details

            const remarkMinRecOffiDiv = document.getElementById("remarkMinRecOffiDiv");

            if(!data.Min_Rec_Offi_Aprv_RM) {
                remarkMinRecOffiDiv.style.display = "none";
            } else {
                document.getElementById("remarkMinRecOffi").value = data.Min_Rec_Offi_Aprv_RM;
            }

            document.getElementById("minRecName").value = data.min_rec_name;
            document.getElementById("minRecDesi").value = data.minRecDesignation;
            document.getElementById("minRecDate").value = data.Min_Rec_Offi_time_stamp;

            //Ministry Head Details

            const remarkMinHeadOffiDiv = document.getElementById("remarkMinHeadOffiDiv");

            if(!data.Min_head_Aprv_RM) {
                remarkMinHeadOffiDiv.style.display = "none";
            } else {
                document.getElementById("remarkMinHeadOffi").value = data.Min_head_Aprv_RM;
            }

            document.getElementById("minHeadName").value = data.min_head_name;
            document.getElementById("minHeadDesi").value = data.minHeadDesignation;
            document.getElementById("minHeadDate").value = data.Min_head_time_stamp;

            //CS Check Officer Details

            const remarkCSChkOffiDiv = document.getElementById("remarkCSChkOffiDiv");

            if(!data.CS_Chk_Offi_Aprv_RM) {
                remarkCSChkOffiDiv.style.display = "none";
            } else {
                document.getElementById("remarkCSChkOffi").value = data.CS_Chk_Offi_Aprv_RM;
            }

            document.getElementById("CSChkName").value = data.cs_chk_name;
            document.getElementById("CSChkDesi").value = data.csChkDesignation;
            document.getElementById("CSChkDate").value = data.CS_Chk_Offi_time_stamp;

            //CS AO Officer Details

            const rejectAOOffiDiv = document.getElementById("rejectAOOffiDiv");

            if(!data.AO_Reject_RM) {
                rejectAOOffiDiv.style.display = "none";
            } else {
                document.getElementById("rejectAOOffi").value = data.AO_Reject_RM;
                document.getElementById("AOName").value = data.ao_name;
                document.getElementById("AODesi").value = data.aoDesignation;
                document.getElementById("AODate").value = data.AO_time_stamp;
            }

            
            // Show additional fieldsets if course information is available
            document.getElementById("nextFieldsetTableContainer").style.display = data.bf_01course_name ? 'block' : 'none';
            document.getElementById("bf_01course_name").value = data.bf_01course_name || "";
            document.getElementById("bf_01ins_name").value = data.bf_01ins_name || "";
            document.getElementById("bf_01start_date").value = data.bf_01start_date || "";
            document.getElementById("bf_01gov_paid").value = data.bf_01gov_paid || "";
            document.getElementById("bf_01full_course_fee").value = data.bf_01full_course_fee || "";

            document.getElementById("nextFieldsetTableContainers").style.display = data.bf_02course_name ? 'block' : 'none';
            document.getElementById("bf_02course_name").value = data.bf_02course_name || "";
            document.getElementById("bf_02ins_name").value = data.bf_02ins_name || "";
            document.getElementById("bf_02start_date").value = data.bf_02start_date || "";
            document.getElementById("bf_02gov_paid").value = data.bf_02gov_paid || "";
            document.getElementById("bf_02full_course_fee").value = data.bf_02full_course_fee || "";

            function displayDocument(containerId, filePath) {
                const container = document.getElementById(containerId);
                if (filePath) {
                    const card = document.createElement("div");
                    card.className = "documentCard";
                    card.innerHTML = filePath.endsWith(".pdf") 
                        ? `<div class="card"><a href="${filePath}" target="_blank">View PDF Document</a></div>`
                        : `<div class="card"><img src="${filePath}" alt="Document Image" style="width: 100%;" /></div>`;
                    container.appendChild(card);
                }
            }

            const documentContainerId = "documentContainer";
            displayDocument(documentContainerId, data.up_porva_anu);
            displayDocument(documentContainerId, data.up_service_minite);
            displayDocument(documentContainerId, data.up_app_letter_confirm);
            displayDocument(documentContainerId, data.up_attach_sp);
            displayDocument(documentContainerId, data.up_course_selected);
            displayDocument(documentContainerId, data.up_campus_confirm);
            displayDocument(documentContainerId, data.up_course_complete);
            displayDocument(documentContainerId, data.up_pay_recept);
            displayDocument(documentContainerId, data.up_other);

            function openDocumentInNewWindow(filePath) {
                if (filePath) {
                    window.open(filePath, "_blank", "width=auto,height=auto,scrollbars=yes");
                }
            }

            function setupViewButtons() {
                const viewButtons = [
                    { id: "viewButton", filePath: data.up_porva_anu },
                    { id: "viewButton_2", filePath: data.up_service_minite },
                    { id: "viewButton_3", filePath: data.up_app_letter_confirm },
                    { id: "viewButton_4", filePath: data.up_attach_sp },
                    { id: "viewButton_5", filePath: data.up_course_selected },
                    { id: "viewButton_6", filePath: data.up_campus_confirm },
                    { id: "viewButton_7", filePath: data.up_course_complete },
                    { id: "viewButton_8", filePath: data.up_pay_recept },
                    { id: "viewButton_9", filePath: data.up_other }
                ];

                viewButtons.forEach(button => {
                    const buttonElement = document.getElementById(button.id);
                    if (buttonElement) {
                        if (button.filePath) {
                            buttonElement.disabled = false;
                            buttonElement.addEventListener("click", function () {
                                window.open(button.filePath, "_blank", "width=auto,height=auto,scrollbars=yes");
                            });
                        } else {
                            buttonElement.disabled = true;
                            buttonElement.title = "Document not available";
                        }
                    }
                });
            }
            setupViewButtons();

        } else {
            console.error(data.error);
        }
    })
    .catch(error => console.error("Error fetching application data:", error));
});
