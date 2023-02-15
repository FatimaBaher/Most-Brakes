
// defining variables
const total = document.querySelector(".total") 
const batteryNb = document.querySelector(".battery-nb") 
const batteryTotal = document.querySelector(".battery-total") 
const oilNb = document.querySelector(".oil-nb") 
const oilTotal = document.querySelector(".oil-total") 
const beltNb = document.querySelector(".belt-nb") 
const beltTotal = document.querySelector(".belt-total") 
const brakePadNb = document.querySelector(".brakepad-nb") 
const brakePadTotal = document.querySelector(".brakepad-total") 


//defining functions
function fillCards(){
    fetch("../MostBrakes/api/cards.php",{
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            api: "getDailyStat"
        })
    })
    .then(res=>res.json())
    .then(res=>{
        let batteryInfo = res["battery"].split(",");
        batteryNb.innerHTML = batteryInfo[0];
        batteryTotal.innerHTML = batteryInfo[1];
        let oilInfo = res["oil"].split(",");
        oilNb.innerHTML = oilInfo[0];
        oilTotal.innerHTML = oilInfo[1];
        let beltInfo = res["belt"].split(",");
        beltNb.innerHTML = beltInfo[0];
        beltTotal.innerHTML = beltInfo[1];
        let brakePadInfo = res["brakePad"].split(",");
        brakePadNb.innerHTML = brakePadInfo[0];
        brakePadTotal.innerHTML = brakePadInfo[1];
    });
}


fillCards();