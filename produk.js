// Wishlist Toggle
document.querySelectorAll('.wishlist').forEach(item => {
    item.addEventListener('click', () => {
        item.classList.toggle('active');
    });
});

// Add To Cart Notification
document.querySelectorAll('.btn-cart').forEach(btn =>{
    btn.addEventListener('click', () =>{
        alert("Produk ditambahkan ke keranjang 🛒");
    });
});
