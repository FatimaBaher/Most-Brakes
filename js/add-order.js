const fieldArray = document.getElementById("field-array");
const addFieldButton = document.getElementById("add-field");
const tableBody = document.querySelector("#table tbody");
const saveBtn = document.getElementById("save-order");
const orderNbInput = document.getElementById("order-nb");
const orderDateInput = document.getElementById("order-date");
const totalValue = document.getElementById("total");
const saveProductBtn = document.querySelector(".saveProductBtn");
const select = document.querySelector(".form-control");
let field;

let orderInfo={};
let total=0;


// getting the data from DB
let productsList;
fetch("../MostBrakes/api/utility.php",{
    method: "POST",
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        api: "get_products"
    })
}).then(res=>res.json())
.then(res=>{
    if(Array.isArray(res)) productsList = res;
    else productsList = [];
});





// Add event listener for the "add field" button
addFieldButton.addEventListener("click", function (event) {
    event.preventDefault();
    addFieldButton.disabled = true;
    saveBtn.disabled = true;
    // Create a new field element
    field = document.createElement("div");
    field.classList.add("form-group");
    setFieldValues();
    // Append the new field to the field array
    fieldArray.appendChild(field);
    $("#code-dropdown").selectstyle({
        width: 600,
        height: 800,
    });
});

fieldArray.addEventListener("click", function (event) {
    if (event.target.classList.contains("cancel-field")) {
        event.preventDefault();
        addFieldButton.disabled = false;
        saveBtn.disabled = false;
        // Remove the field element that was clicked
        fieldArray.removeChild(event.target.parentNode.parentNode);
    } else if (event.target.classList.contains("confirm-field")) {
        event.preventDefault();
        addFieldButton.disabled = false; 
        saveBtn.disabled = false;
        // Get the field element and its values
        const field = event.target.parentNode.parentNode;
        const selectDropdown = field.querySelector("#code-dropdown");
        const code = selectDropdown.value;
        const price = selectDropdown.options[selectDropdown.selectedIndex].dataset.price;
        const id = selectDropdown.options[selectDropdown.selectedIndex].dataset.id;
        const quantity = field.querySelector("#quantity-input").value;
        // Add a row to the table with the field values
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${code}</td>
            <td class="quantity">${quantity}</td>
            <td class="price hidden">${price}</td>
            <td class="product-id hidden">${id}</td>
            <td>
                <img src="assets/delete.svg" class="delete-row" alt="delete" width=31px style="cursor: pointer">
            </td>
        `;
        setTotal(total+(parseInt(quantity)*parseFloat(price)))
        tableBody.appendChild(row);

        // Remove the field element
        fieldArray.removeChild(field);
    }
});

tableBody.addEventListener("click", function (event) {   
    if (event.target.classList.contains("delete-row")) {
        let rowParent = event.target.parentNode.parentNode;
        let price = parseFloat(rowParent.querySelector(".price").innerHTML);
        let quantity = parseInt(rowParent.querySelector(".quantity").innerHTML);
        setTotal(total-quantity*price);
        tableBody.removeChild(rowParent);
    }
});

saveBtn.addEventListener("click",()=>{
    let rows = tableBody.getElementsByTagName("tr");
    let products = [];
    // Loop through the rows and print the data in each cell
    for (let i = 0; i < rows.length; i++) {
      let cells = rows[i].getElementsByTagName("td");
      let obj;
      obj={code: cells[0].innerHTML, quantity: parseInt(cells[1].innerHTML), id: parseInt(cells[3].innerHTML)};
      products.push(obj);
    }
    orderInfo["orderNb"]=orderNbInput.value;
    orderInfo["date"]=orderDateInput.value;
    orderInfo["products"]=products;
    orderInfo["total"]=total;
    addOrderProduct(orderInfo);
    orderNbInput.value = "";
    orderDateInput.value = ""; 
    tableBody.innerHTML="";
    setTotal(0);
    
});

const addProductSuccessToast = Toastify({
    text: `Product added Successfully!`,
    duration: 2000,
    selector: "toast",
    newWindow: true,
    close: true,
    gravity: "top", // `top` or `bottom`
    position: "center", // `left`, `center` or `right`
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
      color: 'green'
    },
    onClick: function(){} // Callback after click
  });

saveProductBtn.addEventListener("click",()=>{
    const code = document.querySelector(".code");
    const category = document.querySelector(".category");
    const whPrice = document.querySelector(".whPrice");
    const cPrice = document.querySelector(".cPrice");
    const description = document.querySelector(".description");
    let productId;
    modal.style.display= "none";
    async function addProduct() {
        try {
            const response = await fetch("../MostBrakes/api/addProduct.php", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    code: code.value,
                    category: category.value,
                    cPrice: parseFloat(cPrice.value),
                    wPrice: parseFloat(whPrice.value),
                    quantity: 0,
                    descr: description.value,
                })
            });
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            else{
                addProductSuccessToast.showToast();
            }
            const response2 = await fetch("../MostBrakes/api/utility.php", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    api: "getProductId",
                    code: code.value
                })
            });
            if (!response2.ok) {
                throw new Error(response2.statusText);
            }
            productId = await response2.text();
            let idVal = parseInt(productId);
            productsList.push({code: code.value ,id: idVal ,wholesale_price: whPrice.value});
            setFieldValues();
            $("#code-dropdown").selectstyle({
                width: 600,
                height: 800,
            });
            code.value="";
            category.value="oil";
            whPrice.value=1;
            cPrice.value=1;
            description.value="";
        } catch (e) {
            console.error(e);
        }

    }
    
    addProduct();
    
    
})
function handleAddNewProduct(){
    modal.style.display = "block";

}

function setTotal(newTotal){
    total=newTotal;
    totalValue.innerHTML = total;
}


const orderSuccessToast = Toastify({
    text: `Order Submitted Successfully!`,
    duration: 2000,
    selector: "toast",
    newWindow: true,
    close: true,
    gravity: "top", // `top` or `bottom`
    position: "center", // `left`, `center` or `right`
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
      color: 'green'
    },
    onClick: function(){} // Callback after click
  });


async function addOrderProduct(bodyObj){
    fetch("./api/add order_product.php",{
        method: "POST",
        body: JSON.stringify(bodyObj)
    }).then(res=>res.text())
    .then(res=>{
        
        if(res=="Success"){    
            orderSuccessToast.showToast();
        }

    });
         
}


function setFieldValues(){
    let html = `<select sid="code-dropdown" class="form-control" id="code-dropdown" placeholder="Select Product Code" data-search=true>`;
    if(Array.isArray(productsList)){
        productsList.forEach(product=>{
            html += `<option value="${product.code}" data-price="${product.wholesale_price}" data-id="${product.id}">${product.code}</option>`;
        })
    }
    else{
        return alert("please try again in few seconds")
    }
    
    html += `</select>
        <input class="form-control" id="quantity-input" type="number" value="1" min="1" style="font-size: 18px">
        <div class="form-group-btns">
            <img src="assets/confirm.svg" class="confirm-field">
            <img src="assets/cancel.svg" class="cancel-field">
        </div>`;
    
    field.innerHTML = html;
}




//add product popup

