window.onload = function() {
    fetchData();
};

function fetchData() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById('dataOutput').innerHTML = xhr.responseText;
            } else {
                console.error('Error:', xhr.statusText);
            }
        }
    };
    xhr.open('GET', 'server.php', true);
    xhr.send();
}
