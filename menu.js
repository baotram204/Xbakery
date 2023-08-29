currOccasionOptions = [];
currDietaryOptions = [];
currSortOptions = [];

document.querySelectorAll(".option").forEach(function(item) {
  item.addEventListener("click", function(event) {
    event.stopPropagation(); // Ngăn chặn sự kiện click lan sang dropdown và đóng nó

    var checkbox = this.querySelector(".checkbox");
    if (checkbox) {
      checkbox.click();
    }
  });

});

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

function clearFilters() {
  clearSelection('occasion');
  clearSelection('dietary');
  clearSelection('sort');
}


// add cart
const addToCartButtons = document.querySelectorAll('.menu-add-cart');

  addToCartButtons.forEach(button => {
    button.addEventListener('click', () => {
      const itemId = button.getAttribute('data-item-id');
      const quantity = document.getElementById(`${itemId}_quantity`).value;

      // Gửi dữ liệu lên máy chủ, ví dụ: sử dụng Fetch API hoặc XMLHttpRequest
      fetch('/path-to-server-endpoint', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          itemId: itemId,
          quantity: quantity
        })
      })
      .then(response => response.json())
      .then(data => {
        // Xử lý kết quả từ máy chủ (nếu cần)
        console.log(data);
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  });