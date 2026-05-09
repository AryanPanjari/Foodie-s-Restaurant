console.log(document.querySelectorAll('.quantity').length);
console.log(document.querySelectorAll('.card').length);
function showCounter(button){
    button.parentElement.innerHTML = `
        <div class="quantity-box"><button onclick="decrease(this)">-</button><span class="quantity">1</span><button onclick="increase(this)">+</button></div>`;
}
function increase(btn){
    let span = btn.parentElement.querySelector("span");
    let value = parseInt(span.innerText);
    span.innerText = value + 1;
}
function decrease(btn){
    let quantityBox = btn.parentElement;
    let span = quantityBox.querySelector("span");
    let value = parseInt(span.innerText);
    if(value > 1){
        span.innerText = value - 1;
    }else{
        quantityBox.parentElement.innerHTML = `<button class="buy-btn" onclick="showCounter(this)">Buy Now</button>`;
    }
}
function addToCart(button){
    let cart = [];
    let cards = document.querySelectorAll(".card");
    cards.forEach(card => {
        let quantityElement = card.querySelector(".quantity");
        if(quantityElement){
            let quantity = parseInt(quantityElement.innerText);
            if(quantity > 0){
                let name = card.querySelector(".item_name").innerText;
                let price = parseInt(
                    card.querySelector(".price").innerText
                );
                cart.push({
                    name:name,
                    price:price,
                    quantity:quantity
                });
            }
        }
    });
    fetch("../backend/cart.php", {
        method:"POST",
        headers:{
            "Content-Type":"application/json"
        },
        body:JSON.stringify(cart)
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    });
}