function send_OTP() {
    const email = document.getElementById("email");
    const id_number = document.getElementById("id_number");
    const password = document.getElementById("password");
    if(email.value === "" || id_number.value === "" || password.value === ""){

      // Show the button
      document.getElementById("sendOtpBtn").style.display = "block";
      // Hide the OTP input div
      document.getElementById("otpContainer").style.display = "none";

    }
    else if(email.value != "" || id_number.value != "" || password.value != ""){

      // Hide the button
      document.getElementById("sendOtpBtn").style.display = "none";
      // Show the OTP input div
      document.getElementById("otpContainer").style.display = "block";

    }



  }



const inputs = document.querySelectorAll(".otp_input");
inputs.forEach((input, index)=>{

  input.addEventListener("keyup", function(e){
    const currentInput = input,
    nextInput = input.nextElementSibling,
    prevInput = input.previousElementSibling;

    if(nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== ""){
      nextInput.removeAttribute("disabled", true);
      nextInput.focus(); 
    }

    if(e.key == "Backspace"){
      inputs.forEach((input, index1)=>{
        if(index<=index1 && prevInput){
          input.setAttribute("disabled", true);
          prevInput.focus();
          prevInput.value = "";
        }
      })
    }

  })

})



function login() {
    // Redirect to the new page after login
    window.location.href = "LandingPage.html"; // Replace "new_page.html" with the URL of your new page
}

