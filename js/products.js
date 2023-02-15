//define variables + get elements
const tableBody = document.querySelector("tbody");
const searchForm = document.querySelector(".search");
const searchInput = document.querySelector(".search-input");
const messageField = document.querySelector(".product-not-found");
let products;
let productToPurchase;
let purchaseProductTimeout;


//Event Listeners
searchForm.addEventListener("submit",(event)=>{
    event.preventDefault();
    let code = searchInput.value;
    let matchProducts;
    if(code != ""){
        matchProducts = products.filter(product =>{
            return product.code.includes(code);
        })
    }else matchProducts = products;   
    fillTable(matchProducts);
})


//Define Functions
async function getProducts(){
    
    const res = await fetch("../MostBrakes/api/utility.php",{
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            api: "getProductsInfo"
        })
    })
    const data = await res.json();
    products = data;
    fillTable(products);

}

function fillTable(newProducts){
    tableBody.innerHTML = "";
    if(newProducts.length == 0){
        messageField.style.display = "block";
        return;
    }
    messageField.style.display = "none";
    newProducts.forEach(element => {
        let newTr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        let td4 = document.createElement("td");
        let td5 = document.createElement("td");
        let td6 = document.createElement("td");
        let td7 = document.createElement("td");
        td1.innerHTML = element.code;
        td2.innerHTML = element.category;
        td3.innerHTML = element.quantity;
        td4.innerHTML = element.wholesale_price+'$';
        td5.innerHTML = element.customer_price+'$';
        td6.innerHTML = `<div class="description">${element.description}</div>`;
        td7.innerHTML = `<button class="purchaseBtn" onclick="handlePurchase(event);">Purchase</button>`;
        
        td1.classList.add("code");
        td2.classList.add("category")
        td3.classList.add("quantity");
        td5.classList.add("cPrice");

        newTr.appendChild(td1);
        newTr.appendChild(td2);
        newTr.appendChild(td3);
        newTr.appendChild(td4);
        newTr.appendChild(td5);
        newTr.appendChild(td6);
        newTr.appendChild(td7);
        tableBody.appendChild(newTr);
        if(element.quantity == 0){
            let btn = td7.querySelector("button");
            btn.disabled = true;
            btn.style.opacity = 0.4;
            btn.style.cursor = "not allowed";
        }
    });

}


const setProductToPurchase = (product) => {
    productToPurchase = product
}


const addProduct = ()=>{
    let category = productToPurchase.querySelector(".category").innerHTML; 
    let price =  productToPurchase.querySelector(".cPrice").innerHTML; 
    fetch('../MostBrakes/api/utility.php',{
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            api: "editQuantity",
            code: productToPurchase.querySelector(".code").innerHTML
        })
    })
    fetch('../MostBrakes/api/utility.php',{
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            api: "addSoldProduct",
            category: category,
            price: parseFloat(price),
            code: productToPurchase.querySelector(".code").innerHTML
        })
        
    })
}
const handlePurchase = (e)=>{
    setProductToPurchase(e.target.parentNode.parentNode);
    const delay = 7000;
    purchaseProductTimeout = setTimeout( addProduct, delay);
    let q = productToPurchase.querySelector(".quantity");
    let code = productToPurchase.querySelector(".code").innerHTML;
    q.innerHTML -= 1;
    if(q.innerHTML == 0){
        let btn = productToPurchase.querySelector(".purchaseBtn");
        btn.disabled = true;
        btn.style.opacity = 0.4;
        btn.style.cursor = "not-allowed";
    }
    Toastify({
        text: `You just purchased a "${code}" <button class="undoBtn" onclick="undoPurchase(event);">UNDO</button>`,
        duration: delay,
        selector: "toast",
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "black",
          color: '#231F20'
        },
        onClose: addProduct
      }).showToast();
}

function undoPurchase(event){
    const q = productToPurchase.querySelector(".quantity");
    q.innerHTML = parseInt(q.innerHTML) + 1;
    if(q.innerHTML == 1){
        let btn = q.parentNode.querySelector(".purchaseBtn");
        btn.disabled = false;
        btn.style.opacity = 1;
        btn.style.cursor = "pointer";
    }
    clearTimeout(purchaseProductTimeout);
    const toast = document.getElementById("toast");
    toast.innerHTML = "";
}
getProducts();