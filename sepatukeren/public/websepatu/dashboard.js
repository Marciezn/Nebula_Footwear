// Chart.js setup
const ctx2 = document.getElementById("salesChart").getContext("2d");

new Chart(ctx2, {
    type: "line",
    data: {
        labels:["22 Jul","23 Jul","24 Jul","25 Jul","26 Jul","27 Jul","28 Jul","29 Jul"],
        datasets: [{
            label:"Sales",
            data:[5000,12000,9000,20000,15000,30000,25000,40000],
            borderColor:"#00c4a5",
            backgroundColor:"rgba(0,196,165,0.15)",
            fill:true,
            tension:0.4,
            borderWidth:3
        }]
    },
    options:{
        plugins:{
            legend:{ display:true }
        },
        scales:{
            y:{ grid:{ color:"#eee" }},
            x:{ grid:{ display:false }}
        },
        responsive:true
    }
});
