// function sendOTP() {
//     const email = document.getElementById("email");
//     const id_number = document.getElementById("id_number");
//     const password = document.getElementById("password");
//     if(email.value === "" || id_number.value === "" || password.value === ""){

//       // Show the button
//       document.getElementById("sendOtpBtn").style.display = "block";
//       // Hide the OTP input div
//       document.getElementById("otpContainer").style.display = "none";

//     }
//     else if(email.value != "" || id_number.value != "" || password.value != ""){

//       // Hide the button
//       document.getElementById("sendOtpBtn").style.display = "none";
//       // Show the OTP input div
//       document.getElementById("otpContainer").style.display = "block";

//     }


// }


function login() {
    // Redirect to the new page after login
    window.location.href = "new_page.html"; // Replace "new_page.html" with the URL of your new page
}

