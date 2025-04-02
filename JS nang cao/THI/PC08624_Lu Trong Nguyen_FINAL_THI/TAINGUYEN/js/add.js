var apiUrl = 'http://localhost:3000/';
var product = 'product';

function getData() {
    let frm = document.getElementById('contact-form').elements;
    let obj = {
        "title": frm['title'].value,
        "subtitle": frm['subtitle'].value,
        "truncate": frm['truncate'].value
    };
    return obj;
}

function validator() {
    let data = getData();
    if (!data.title || !data.subtitle || !data.truncate) {
        alert("Vui lòng nhập đầy đủ thông tin");
        return false;
    }
    return true;
}

function add(event) {
    event.preventDefault(); // Ngăn chặn hành vi gửi form mặc định
    if (validator()) {
        axios.post(apiUrl + product, getData())
            .then(res => {
                if (res.status === 200 || res.status === 201) {
                    location.href = '../index.html'; 
                }
            })
            .catch(err => console.error(err));
    }
}
