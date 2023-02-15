//define variables + get elements
const tableBody = document.querySelector("tbody");
let orders;


//Define Functions
const addListeners = () => {
    const seeProductBtns = document.querySelectorAll(".seeProductsBtn")
    seeProductBtns.forEach(btn=>{
        btn.addEventListener("click", () => {
            const orderNb = btn.parentNode.parentNode.querySelector(".orderNb").innerHTML; 
            fetch("../MostBrakes/api/utility.php",{
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    api: "getOrderId",
                    orderNb: orderNb
                })
            }).then(res=> res.text())
                .then(res=>{
                    console.log(res);
                    fetch("../MostBrakes/api/utility.php",{
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            api: "getProductsOfOrder",
                            orderId: parseInt(res)
                        })
                    }).then(result=>result.json())
                    .then(result=>{openProductsPopup(orderNb, result)});
                })
            })
            
    })
}

const openProductsPopup = async (orderNb, products) => {

    const modal = document.getElementById("modal-container");
    modal.style.display="block";
    const title = modal.querySelector(".modal-title");
    title.innerHTML = "Order "+ orderNb;
    let modaltbody = modal.querySelector("tbody");
    modaltbody.innerHTML = "";
    products.forEach(product=>{
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        td1.innerHTML = product["code"];
        td2.innerHTML = product["category"];
        td3.innerHTML = product["quantity"];
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        modaltbody.appendChild(tr);
    })
    
}




async function fillTable(){
    
    await fetch("../MostBrakes/api/utility.php",{
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            api: "getOrdersInfo"
        })
    }).then(res=>res.json())
    .then(res=>orders=res);
    orders.forEach(order => {
        let newTr = document.createElement("tr");
        let orderNbCell = document.createElement("td");
        orderNbCell.classList.add("orderNb");
        let productsCell = document.createElement("td");
        productsCell.style.textAlign="center"
        let totalCell = document.createElement("td");
        let dateCell = document.createElement("td");
        orderNbCell.innerHTML = order.orderNb;
        productsCell.innerHTML = `<img class="seeProductsBtn" style="cursor: pointer;" src="../MostBrakes/assets/popup-icon.svg" alt="Click to see products"/>`;
        totalCell.innerHTML = order.total+' $';
        dateCell.innerHTML = order.date;
        
        newTr.appendChild(orderNbCell);
        newTr.appendChild(productsCell);
        newTr.appendChild(totalCell);
        newTr.appendChild(dateCell);
        tableBody.appendChild(newTr);

        
    });
    addListeners();


    
}


fillTable();