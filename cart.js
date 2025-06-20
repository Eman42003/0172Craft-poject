
const addToCartButtons = document.querySelectorAll('.add-to-cart');
const cartStatus = document.querySelector('.cart-status');
let cartItems = [];


function addToCart(event) {
    const productElement = event.target.closest('.product');
    const productName = productElement.querySelector('p').textContent;
    const productPrice = productElement.querySelectorAll('p')[1].textContent;
    
    const product = {
        name: productName,
        price: productPrice
    };
    
    cartItems.push(product);
    updateCart();
}


function updateCart() {
    const cartContent = cartStatus.querySelector('h1');
    
    if (cartItems.length > 0) {
        cartContent.textContent = `You have ${cartItems.length} items in your cart.`;
        displayCartItems();
    } else {
        cartContent.textContent = 'Your Home Made shopping cart is empty.';
    }
}


function displayCartItems() {
    const cartItemsList = cartStatus.querySelector('ul') || document.createElement('ul');
    
    if (!cartStatus.contains(cartItemsList)) {
        cartStatus.appendChild(cartItemsList);
    }
    
    cartItemsList.innerHTML = '';
    
    cartItems.forEach(item => {
        const listItem = document.createElement('li');
        listItem.textContent = `${item.name} - ${item.price}`;
        cartItemsList.appendChild(listItem);
    });
}


addToCartButtons.forEach(button => {
    button.addEventListener('click', addToCart);
});
