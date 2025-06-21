document.addEventListener("DOMContentLoaded", () => {
  const addToCartButtons = document.querySelectorAll(".add-to-cart");
  const cartItemCount = document.querySelector(".cart-icon span");
  const cartItemsList = document.querySelector(".cart-items");
  const cartTotal = document.querySelector(".cart-total");
  const cartIcon = document.querySelector(".cart-icon");
  const sidebar = document.getElementById("sidebar");
  const closeButton = document.querySelector(".sidebar-close");
  const checkoutButton = document.querySelector(".checkout-button");

  //  Load from PHP session
  let cartItems = initialCartItems;
  let totalAmount = initialTotalAmount;

  updateCartUI();

  function updateCartUI() {
    updateCartItemCount();
    updateCartItemList();
    updateCartTotal();

    //  Always sync cart with PHP session
    fetch("update_cart.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        items: cartItems,
        total: totalAmount,
      }),
    });
  }

  function updateCartItemCount() {
    let totalCount = cartItems.reduce((sum, item) => sum + item.quantity, 0);
    cartItemCount.textContent = totalCount;
  }

  function updateCartItemList() {
    cartItemsList.innerHTML = "";
    cartItems.forEach((item, index) => {
      const cartItem = document.createElement("div");
      cartItem.classList.add("cart-item", "individual-cart-item");
      cartItem.innerHTML = `
          <span>(${item.quantity}x) ${item.name}</span>
          <span class="cart-item-price">₹${(item.price * item.quantity).toFixed(
            2
          )}
            <button class="remove-item" data-index="${index}">
              <i class="fa-solid fa-times"></i>
            </button>
          </span>
        `;
      cartItemsList.appendChild(cartItem);
    });

    const removeButtons = document.querySelectorAll(".remove-item");
    removeButtons.forEach((button) => {
      button.addEventListener("click", (event) => {
        const index = event.target.closest(".remove-item").dataset.index;
        removeItemFromCart(index);
      });
    });
  }

  function removeItemFromCart(index) {
    index = parseInt(index);
    if (cartItems[index].quantity > 1) {
      cartItems[index].quantity--;
      totalAmount -= cartItems[index].price;
    } else {
      const removed = cartItems.splice(index, 1)[0];
      totalAmount -= removed.price * removed.quantity;
    }
    updateCartUI();
  }

  function updateCartTotal() {
    cartTotal.textContent = `₹${totalAmount.toFixed(2)}`;
  }

  addToCartButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
      const item = {
        name: document.querySelectorAll(".card .card--title")[index]
          .textContent,
        price: parseFloat(
          document.querySelectorAll(".price")[index].textContent.slice(1)
        ),
        quantity: 1,
      };

      const existingItem = cartItems.find(
        (cartItem) => cartItem.name === item.name
      );
      if (existingItem) {
        existingItem.quantity++;
      } else {
        cartItems.push(item);
      }
      totalAmount += item.price;
      updateCartUI();
    });
  });

  cartIcon.addEventListener("click", () => {
    sidebar.classList.toggle("open");
  });

  closeButton.addEventListener("click", () => {
    sidebar.classList.remove("open");
  });

  checkoutButton.addEventListener("click", () => {
    if (cartItems.length === 0) {
      alert("Your cart is empty.");
      return;
    }

    fetch("checkout.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        items: cartItems,
        total: totalAmount,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          alert(`Order placed successfully! Payment method: Cash on Delivery. Total: ₹${totalAmount.toFixed(2)}`);
          cartItems = [];
          totalAmount = 0;
          updateCartUI();
          sidebar.classList.remove("open");
        } else {
          alert("Order failed: " + (data.message || "Unknown error"));
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("An error occurred while placing the order.");
      });
  });
});
