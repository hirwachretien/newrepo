// Fetch products and display on the products page
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.product-grid')) {
        fetch('http://localhost:3000/api/products')
            .then(response => response.json())
            .then(data => {
                const productGrid = document.querySelector('.product-grid');
                data.products.forEach(product => {
                    const productCard = document.createElement('div');
                    productCard.className = 'product-card';
                    productCard.innerHTML = `
                        <img src="${product.imageUrl}" alt="${product.name}">
                        <h3>${product.name}</h3>
                        <p>$${product.price}</p>
                        <a href="product-detail.html?id=${product.id}" class="btn-secondary">View Details</a>
                    `;
                    productGrid.appendChild(productCard);
                });
            })
            .catch(error => console.error('Error fetching products:', error));
    }
});
