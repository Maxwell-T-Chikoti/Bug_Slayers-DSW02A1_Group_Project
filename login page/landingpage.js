  // Set the target date and time for the countdown
  const targetDate = new Date("May 01, 2024 15:00:00").getTime(); // Replace with your target date and time

  // Update the countdown every 1 second
  const countdownElement = document.getElementById('countdown');
  const messageElement = document.getElementById('message');

  const interval = setInterval(() => {
      // Get current date and time
      const now = new Date().getTime();
      
      // Calculate the distance between now and the target date
      const distance = targetDate - now;

      // Time calculations for days, hours, minutes, and seconds
      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the countdown element
      countdownElement.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;

      // If the countdown is over, redirect to the voting page

      if (distance < 0) {
          clearInterval(interval);
          countdownElement.style.fontSize = "35px";
          countdownElement.style.fontWeight = "bold";

          countdownElement.textContent = "READY TO VOTE?";
          document.getElementById("proceed").style.display = "block";  
          document.getElementById("message").style.display = "none";
          document.getElementById("question").style.display = "none";
          document.getElementById("answer_true").style.display = "none";
          document.getElementById("answer_false").style.display = "none";
          document.getElementById("down_arrow").style.display = "block";
          document.getElementById("intruction").style.display = "block";
          

          //hide the count down too
          //hide the paragraph
          //hide the questions
      }
  }, 1000);

  const questions = [
      { question: "Nelson Mandela was the first black president of South Africa.", answer: true },
      { question: "Apartheid ended in 1994.", answer: true },
      { question: "Cape Town is the capital of South Africa.", answer: false },
      { question: "South Africa has three capital cities.", answer: true },
      { question: "The Boer War was fought between the British and the Dutch settlers in South Africa.", answer: true },
      { question: "EFF Won the last elections ", answer: false },
      { question: "South Africa Was under oppressiong for 80 yers ", answer: false },




  ];

  let currentQuestionIndex = 0;
  let score = 0;

  function showQuestion() {
      if (currentQuestionIndex < questions.length) {
          document.getElementById('question').textContent = questions[currentQuestionIndex].question;
          document.getElementById('score').textContent = '';
      } else {
          document.getElementById('question').textContent = "Quiz complete! Your score: " + score + " out of " + questions.length;
          document.querySelectorAll('.button').forEach(button => button.style.display = 'none');
      }
  }

  function checkAnswer(answer) {
      if (answer === questions[currentQuestionIndex].answer) {
          score++;
      }
      currentQuestionIndex++;
      showQuestion();
  }

  showQuestion();
