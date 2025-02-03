document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("submitBtn").addEventListener("click", function () {
        let nic = document.getElementById("nicInput").value.trim();

        if (nic === "") {
            alert("Please enter a NIC number.");
            return;
        }

        fetch(`resetPasswordNIC_to_db.php?nic=${nic}`, { credentials: 'include' })
            .then(response => response.text()) // First, get the response as text
            .then(text => {
                try {
                    return JSON.parse(text); // Try parsing JSON
                } catch (error) {
                    console.error("Invalid JSON response:", text);
                    throw new Error("Invalid JSON received from server.");
                }
            })
            .then(data => {
                if (data.success) {
                    document.getElementById("userName").innerText = data.name;
                    document.getElementById("userEmail").innerText = data.email;
                    document.getElementById("userDetails").style.display = "block";
                    document.getElementById("nic").style.display = "none";
                    document.getElementById("submitBtn").style.display = "none";
                } else {
                    alert(data.error || "No user found with this NIC!");
                    document.getElementById("userDetails").style.display = "none";
                }
            })
            .catch(error => {
                console.error("Error fetching user details:", error);
                alert("Error fetching user details. Please try again.");
            });
    });

    document.getElementById("backBtn").addEventListener("click", function () {
        location.reload();
    });
});
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("veriCodeBtn").addEventListener("click", function () {
        let veriCodeBtn = document.getElementById("veriCodeBtn");
        let userEmail = document.getElementById("userEmail").innerText.trim();

        if (userEmail === "") {
            alert("No email found for this NIC. Please try again.");
            return;
        }

        // Show loading text and disable button
        veriCodeBtn.innerHTML = 'Sending... <span class="spinner-border spinner-border-sm"></span>';
        veriCodeBtn.disabled = true;

        fetch('resetPasswordSendOTP.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `email=${encodeURIComponent(userEmail)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Verification code sent successfully!");
                // Redirect to OTP page
                window.location.href = data.redirect;
            } else {
                alert("Failed to send verification code. Please try again.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Network error. Please check your connection and try again.");
        })
        .finally(() => {
            // Reset button after request completion
            veriCodeBtn.innerHTML = 'Get Verification Code';
            veriCodeBtn.disabled = false;
        });
    });
});

