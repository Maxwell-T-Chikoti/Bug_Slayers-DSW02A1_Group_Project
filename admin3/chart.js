var xValues = ["Population", "Registered", "Voted"];
var yValues = [60000000, 40560708, 34406780, 15];
var barColors = ["green", "rgb(102, 199, 88)","skyblue"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: ""
    }
  }
});