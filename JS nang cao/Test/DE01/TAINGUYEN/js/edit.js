var apiUrl = 'http://localhost:3000/';
var topic = 'topics';


const url = new URL(window.location.href);
const params = new URLSearchParams(url.search);
const id = params.get('id');

axios.get(apiUrl + topic + '?id=' + id)
    .then(res => {
        document.getElementById('name').value = res.data[0].name;
        // document.getElementById('image').value = res.data[0].image;
        document.getElementById('episodes').value = res.data[0].episodes;
        document.getElementById('date').value = res.data[0].date;
    }).catch(err => console.error(err));


function getData() {
    return {
        name: document.getElementById('name').value,
        image: document.getElementById('image').value,
        episodes: document.getElementById('episodes').value,
        date: document.getElementById('date').value
    };
}

function edit() {
    axios.patch(apiUrl + topic + '/' + id, getData())
    .then(res => {
        if (res.status === 200 || res.status === 201) {
            location.href = './index.html';
            alert("True");
        }
    }).catch(err => {
        console.error(err);
        alert("False");
    });
}