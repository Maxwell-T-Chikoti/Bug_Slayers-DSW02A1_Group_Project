// Function to generate random numbers between 0 and max
function getRandomNumber(max) {
  return Math.floor(Math.random() * max);
}

// Labels and colors
var xValues2 = ["Eastern Cape", "Free State", "Gauteng", "KwaZulu-Natal", "Limpopo", "Mpumalanga", "Northern Cape", "North West", "Western Cape"];
var barColors2 = ["green", "rgb(102, 199, 88)", "#48C97E", "skyblue", "#0077B6", "#7C95FF", "#632D5E", "#F27B68", "#F1AA60"];

// Generate random data
var yValues2 = [];
var maxNumber = 40560708;
var numberOfValues = 9;

for (let i = 0; i < numberOfValues; i++) {
  yValues2.push(getRandomNumber(maxNumber));
}

// Initialize the chart
new Chart(document.getElementById("provinceChart"), {
type: "bar",
data: {
  labels: xValues2,
  datasets: [{
    backgroundColor: barColors2,
    data: yValues2
  }]
},
options: {
  legend: { display: false },
  title: {
    display: true,
    text: "Provinces"
  }
}
});