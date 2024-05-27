var xValuesVotes = [
    "ANC", "EFF", "DA", "MK", "IFP", 
    "ADC", "FFP", "BOSA", "ASA", "ACDP", 
    "RISE", "PAC", "UDM", "GOOD", "PA", 
    "ICOSA", "APC", "UIM", "ABC", "NCC", 
    "FSD", "UCDP"
];
var yValuesVotes = [
    22.0,33.4, 15.0, 2.1, 1.1, 1.5, 1.4, 1.8, 1.3, 
    1.2, 1.6, 0.9, 1.3, 1.1, 1.5, 1.6, 1.0, 1.1, 
    1.2, 1.0, 1.2, 1.1
];
var barColorsVotes = [
    "Gold", "red", "#3357FF", "green", "Black", 
    "skyblue", "orange", "darkblue", "lime", "skyblue",
    "gold", "green", "red", "orange", "black", 
    "red", "green", "yellow", "green", "black", "brown", "orange"
];

// Calculate total votes
var totalVotes = yValuesVotes.reduce((a, b) => a + b, 0);

// Normalize the values to percentages
var yValuesPercentages = yValuesVotes.map(value => (value / totalVotes) * 100);

new Chart(document.getElementById("votesChart"), {
    type: "bar",
    data: {
        labels: xValuesVotes,
        datasets: [{
            backgroundColor: barColorsVotes,
            data: yValuesPercentages
        }]
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            text: "Votes by Party"
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: 100,
                    callback: function(value) {
                        return value + '%';
                    }
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Percentage of Total Votes'
                }
            }]
        }
    }
});
