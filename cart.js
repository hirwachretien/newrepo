document.addEventListener('DOMContentLoaded', () => {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');

    fetch('http://localhost:3000/api/cart')
        .then(response => response.json())
        .then(data => {
            const cart = data.cart;
            let total = 0;

            cart.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.name}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td>${item.quantity}</td>
                    <td>$${(item.price * item.quantity).toFixed(2)}</td>
                `;
                cartItems.appendChild(row);
                total += item.price * item.quantity;
            });

            cartTotal.textContent = total.toFixed(2);
        })
        .catch(error => console.error('Error fetching cart data:', error));
});
