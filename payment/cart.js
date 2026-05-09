document.querySelector('#proceed-btn').addEventListener('click', function() {
  alert('Payment gateway integration coming soon! Order has been saved to database.');
});

fetch("../backend/get_cart.php")
  .then(response => response.json())
  .then(data => {
    let cartItems = document.getElementById("cart-items");
    let grandTotal = 0;
    data.forEach(item => {
      let total = item.price * item.quantity;
      grandTotal += total;
      cartItems.innerHTML += `
        <tr>
          <td>${item.item_name}</td>
          <td>Rs ${item.price}</td>
          <td>${item.quantity}</td>
          <td>Rs ${total}</td>
        </tr>`;
    });
    document.getElementById("grand-total").innerText = grandTotal;
  })
  .catch(function() {
    document.getElementById("cart-items").innerHTML = 
      '<tr><td colspan="4" style="text-align:center; color:#888; padding:1rem;">Run on a live server to view cart items</td></tr>';
  });