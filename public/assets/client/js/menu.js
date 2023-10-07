currOccasionOptions = [];
currDietaryOptions = [];
currSortOptions = [];

// handle click check box
document.querySelectorAll(".option").forEach(function(item) {
  item?.addEventListener("click", function(event) {
    event.stopPropagation();
  });
});


// get selection
function applySelection(key) {
  var selectedOptions = [];
  var checkboxes = document.querySelectorAll(".dropdown-menu input[type='checkbox']");

  checkboxes.forEach(function(checkbox) {
    if (checkbox.checked) {
      selectedOptions.push(checkbox.parentElement.parentElement.querySelector(".col-10").textContent.trim());
    }
  });

  switch (key) {
    case "occasion":
      currOccasionOptions = selectedOptions;
      break;
    case "dietary":
      currDietaryOptions = selectedOptions;
      break;
    case "sort":
      currSortOptions = selectedOptions;
      break;
    default:
      break;
  }


}


// clear selection
function clearSelection(key) {
  var checkboxes = document.querySelectorAll(".dropdown-menu input[type='checkbox']");
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = false;
  });
  switch (key) {
    case "occasion":
      currOccasionOptions = [];
      break;
    case "dietary":
      currDietaryOptions = [];
      break;
    case "sort":
      currSortOptions = [];
      break;
    default:
      break;
  }
}


// clear full filters
function clearFilters() {
  clearSelection('occasion');
  clearSelection('dietary');
  clearSelection('sort');
}


document.addEventListener('DOMContentLoaded', function () {
  const cards = document.querySelectorAll('.card');
  cards.forEach(function (card) {
    card.addEventListener('click', function (event) {
      const clickedElement = event.target;

      //when click button add to cart
      if (clickedElement.classList.contains('menu-add-cart')) {
        const productId = card.getAttribute('data-product-id');
        const quantity = document.querySelector("#item" + productId + "_quantity").value;
        alert("Products added");
        addToCart(productId, quantity);
      } else if (
          !clickedElement.classList.contains('card') &&  // not card
          !clickedElement.classList.contains('menu-add-cart') &&  // not "Add to Cart"
          !clickedElement.classList.contains('form-control')  // not input
      ) {
        // when click element card without click element input and button add to cart
        const productId = card.getAttribute('data-product-id');
        showDetail(productId);
      }
    });
  });

  const product = document.querySelector('.js-detailProduct');
  product.addEventListener('click', function (e){
    const productId = product.getAttribute('data-product-id');
    const quantity = document.querySelector("#item" + productId + "_quantity").value;
    alert("Products added");
    addToCart(productId, quantity);
  });
});




function showDetail(productId) {
  // Gửi productId cho server
  var rootUrl = window.location.protocol + "//" + window.location.host + "/xbakery/";

  fetch(`/Xbakery/ajax/DetailProduct.php`, {
    "method": 'POST',
    "body": JSON.stringify({ productId: productId }),
    "headers": {
      'Content-Type': 'application/json',
    },
  })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          console.log(data.message);
          window.location = `${rootUrl}detailProduct/showProduct/${data.productId}`;
        } else {
          console.log(data.message);
        }
      })
      .catch(error => {
        console.error(error);
      });
}

function addToCart(productId, quantity) {
  var rootUrl = window.location.protocol + "//" + window.location.host + "/xbakery/";

  // Gửi productId cho server
  fetch(`/Xbakery/ajax/AddToCart.php`, {
    method: 'POST',
    body: JSON.stringify({ productId: productId, quantity: quantity}),
    headers: {
      'Content-Type': 'application/json',
    },
  })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          console.log(data.message);
        } else {
          console.log(data.message);
        }
      })
      .catch(error => {
        console.error(error);
      });
}
