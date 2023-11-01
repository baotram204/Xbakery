// input current
let quantityInputs = [];
let orderArrayProduct = [];

function toggleChecked(element) {
    element.classList.toggle("checked");
}

function handleOrderCheckoutClick(element) {
    const btnOptions = document.querySelectorAll(".btn-options");
    const orderCartButton = document.querySelector(".order-cart");

    function setActiveOption(optionElement) {
        btnOptions.forEach(btn => btn.classList.remove("active"));
        optionElement.classList.add("active");
    }

    function displayOption(option1Visible) {
        document.querySelector(".order").style.display = option1Visible ? "unset" : "none";
        document.querySelector(".checkout").style.display = option1Visible ? "none" : "unset";
    }

    btnOptions.forEach(element => {
        element.addEventListener("click", () => {
            setActiveOption(element);
            displayOption(element.classList.contains("option1"));
        });
    });

    orderCartButton.addEventListener("click", () => {
        setActiveOption(document.querySelector('.option2'));
        displayOption(false);
    });
}

function handleValueInput() {
    const quantityProduct = document.querySelectorAll('.js-quantity');

    quantityProduct.forEach(function (input) {
        input.addEventListener('input', function () {
            let inputValue = input.value;

            if (inputValue < 0) {
                inputValue = Math.abs(inputValue);
                input.value = inputValue.toString();
            }

            if (inputValue === "0" ){
                input.value = "";
                updateTotal();
            }

        });
    });
}


// get element input on Resize
function handleGetInputs() {
    const windowWidth = window.innerWidth;

    if (windowWidth < 546) {
        quantityInputs = document.querySelectorAll('tr.fix-row2 .js-quantity');
    } else {
        quantityInputs = document.querySelectorAll('tr.fix-row .js-quantity');
    }

}

function handleChangeOnInput() {
    quantityInputs.forEach(function (input) {
        input.addEventListener('change', function () {
            const productId = this.closest('tr').getAttribute('data-product-id');
            let newQuantity = (this.value === "") ? 1 : parseInt(this.value);
            updateQuantityProduct(productId, newQuantity);
        });
    });
}

function updateQuantityProduct(productId, newQuantity) {
    fetch(`/Xbakery/ajax/Cart.php`, {
        method: 'POST',
        body: JSON.stringify({ productId: productId, quantity: newQuantity, status: "update" }),
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                console.log(data.message);
                updateTotal();
            } else {
                console.log(data.message);
            }
        })
        .catch(error => {
            console.error(error);
        });
}

function updateTotal() {
    let total = 0;

    quantityInputs.forEach(function(input) {
        let quantity = (input.value === "") ? 1 : parseInt(input.value);


        let price = input.closest('tr').querySelector('#price').textContent;
        let match =price.match(/[\d.]+/);

        if (match) {
            let numberString = match[0];
            let number = parseFloat(numberString);
            let lineTotal = quantity * number;
            total += lineTotal;

            let lineTotalElement = input.closest('tr').querySelector('#total');
            if (lineTotalElement) {
                lineTotalElement.textContent = `$${lineTotal.toFixed(2)}`;
            }
        }
    });
    let totalElement = document.querySelector('.js-total');
    totalElement.textContent = `$${total.toFixed(2)}`;
}

function handleImageClick() {
    const elementDetailProducts = document.querySelectorAll('tr > td  .image');

    elementDetailProducts.forEach(function (element) {
        element.addEventListener('click', function () {
            const rootUrl = window.location.protocol + "//" + window.location.host + "/xbakery/";
            const productId = this.closest('tr').getAttribute('data-product-id');
            window.location = `${rootUrl}detailProduct/showProduct/${productId}`;
        });
    });
}

function handleDeleteProduct() {
    const elmentDeleteProducts = document.querySelectorAll('tr td.delete');

    elmentDeleteProducts.forEach(function (element){
        element.addEventListener("click", function (){
            const productId = element.closest('tr').getAttribute('data-product-id');
            deleteProduct(productId);

            //remove from DOM
            const rows = document.querySelectorAll(`tr[data-product-id="${productId}"]`);
            rows.forEach(function (row) {
                row.parentNode.removeChild(row);
                handleGetInputs();
                updateTotal();
            });
        });
    });
}

function deleteProduct(productId) {
    fetch(`/Xbakery/ajax/Cart.php`, {
        method: 'POST',
        body: JSON.stringify({ productId: productId, status: "delete" }),
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                console.log(data.message);
                updateTotal("delete");
            } else {
                console.log(data.message);
            }
        })
        .catch(error => {
            console.error(error);
        });
}

function handleChooseProducts() {
    let productsChoosed = document.querySelectorAll('tr .custom-checkbox');

    const subTotal = document.querySelector(".subTotal");
    const total = document.querySelector(".total");
    let delivery = document.querySelector(".delivery");


    let totalValue = 0;
    productsChoosed.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const totalElement = checkbox.closest('tr').querySelector('#total');
            let productId = checkbox.closest('tr').getAttribute('data-product-id');
            if (checkbox.checked) {
                totalValue += parseFloat(totalElement.textContent.replace('$', ''));
                quantity = checkbox.closest('tr').querySelector('.js-quantity').value;

                orderArrayProduct.push({productId: productId, quantity: quantity});
                delivery.textContent = "2.7 $";

            } else {
                totalValue -= parseFloat(totalElement.textContent.replace('$', ''));
                orderArrayProduct = orderArrayProduct.filter(item => item.productId !== productId);
            }

            subTotal.innerHTML = totalValue.toFixed(2) + " $";
            total.innerHTML =  (totalValue + parseFloat(delivery.textContent)).toFixed(2)+ ' $';
        });
    });

}

function getInformationOfUser() {
    const name = document.getElementById('name').value;
    const phone = document.getElementById("phone").value;
    const delivery = document.getElementById("dropdown").value;

    const timeArray = delivery.split(':');

    const hours = timeArray[0];
    const minutes = timeArray[1];
    const deliveryTime = new Date();
    deliveryTime.setHours(hours);
    deliveryTime.setMinutes(minutes);
    const time = deliveryTime.toTimeString();

    const address = document.getElementById("address").value;
    const cardName = document.getElementById("cardName").value;
    const cardNumber = document.getElementById("cardNumber").value;
    const cardDate = document.getElementById("cardDate").value;
    const comment = document.getElementById("comment").value;
    const total = parseFloat(document.querySelector(".total").textContent.replace('$', ''));
    let cash = 0;
    if (cardName === "") cash = 1;

    return [
        {
            "inforUser": {
                "name": name,
                "phone": phone,
                "delivery": time,
                "address": address,
                "comment": comment
            },
            "payment": {
                "card_number": cardNumber,
                "card_fullname": cardName,
                "birthday": cardDate,
                "total_money": total
            },
            "orderArrayProduct": orderArrayProduct
        }
    ];
}


// send data to server about data-product-id
function handleCompleteOrder() {
    const btnOrder = document.querySelector(".submitOrder");
    btnOrder.addEventListener("click", function (){
        let inforOrder = getInformationOfUser();
         purchased(inforOrder);
    });
}

function purchased(inforOrder) {
    var rootUrl = window.location.protocol + "//" + window.location.host + "/xbakery/";

    fetch(`${rootUrl}shoppingCart/pushData`, {
        method: 'POST',
        body: JSON.stringify({ informationOrder: inforOrder }),
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                console.log(data.message);
                alert("Order Success");
            } else {
                console.log(data.message);
            }
        })
        .catch(error => {
            console.error(error);
        });
}

document.addEventListener('DOMContentLoaded', function() {
    handleValueInput();
    handleGetInputs();
    handleOrderCheckoutClick();
    handleChangeOnInput();
    handleImageClick();
    handleDeleteProduct();
    handleChooseProducts();
    handleCompleteOrder();
});
