

var xValues = [];
var yValues = [70, 30];
var barColors = [
  "#BAF3FF",
  "#00D2FF",
];

new Chart("dataChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: false,
      text: ""
    }
  }
});
















