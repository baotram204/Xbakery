
// when click search send data
document.getElementById('searchInput').addEventListener('keypress', function(event) {
    var searchTerm = document.getElementById('searchInput').value;

    if (event.key === 'Enter') {
        event.preventDefault();
        performSearch(searchTerm);
    }
});

// search by ajax
function performSearch(searchTerm) {
    var rootUrl = window.location.protocol + "//" + window.location.host + "/";

    fetch(`${rootUrl}Search/showProduct?searchTerm=${searchTerm}`, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            id = (data.arrayData == -1) ? 'null' : data.arrayData[0]['id'];
            window.location = `${rootUrl}detailProduct/showProduct/${id}?searchTerm=${searchTerm}`;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

