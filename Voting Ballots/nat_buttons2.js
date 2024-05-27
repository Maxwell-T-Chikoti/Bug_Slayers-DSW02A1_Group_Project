document.addEventListener('DOMContentLoaded', () => {
  // Select all radio buttons with the class 'Xchecked'
  const radioButtons = document.querySelectorAll('.Xchecked');

  radioButtons.forEach((radio) => {
      radio.addEventListener('change', handleRadioChange);
  });

  // Function to handle radio button change event
  function handleRadioChange(event) {
      const target = event.target;
      const parent = target.closest('.Parti');
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
