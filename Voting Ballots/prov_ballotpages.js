document.addEventListener('DOMContentLoaded', () => {
  // Select all radio buttons with the class 'Xchecked'
  const radioButtons = document.querySelectorAll('.Xchecked');

  radioButtons.forEach((radio) => {
      radio.addEventListener('change', handleRadioChange);
  });

  // Function to handle radio button change event
  function handleRadioChange(event) {
      const target = event.target;
      const parent = target.closest('.parties');
      const Ximg = parent.querySelector('.X');

      // Hide all X images
      document.querySelectorAll('.X').forEach(img => {
          img.style.display = 'none';
      });

      // Show the X image for the selected radio button
      if (target.checked) {
          Ximg.style.display = 'block';
      } else {
          Ximg.style.display = 'none';
      }

      // Ensure only one radio button is checked at a time
      radioButtons.forEach((otherRadio) => {
          if (otherRadio !== target) {
              otherRadio.checked = false;
          }
      });
  }
});








// // Function to handle radio button change event
// function handleRadioChange(event) {
//     const target = event.target;
//     const parent = target.closest('.parties');
//     const Ximg = parent.querySelector('.X');
    
//     // Hide all X images
//     document.querySelectorAll('.X').forEach(img => {
//       img.style.display = 'none';
//     });

//     if (target.checked) {
//       Ximg.style.display = 'block'; // Show the X image
//     } else {
//       Ximg.style.display = 'none'; // Hide the X image
//     }
//   }

//   // Add event listeners to all radio buttons
//   const radioButtons = document.querySelectorAll('input[name="Select"]');
//   radioButtons.forEach(radio => {
//     radio.addEventListener('change', handleRadioChange);
//   });
  
  