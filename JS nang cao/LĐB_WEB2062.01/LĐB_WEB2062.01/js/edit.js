// var apiUrl = 'http://localhost:3000/';
// var person = 'person';

// // Lấy URL hiện tại
// const url = new URL(window.location.href);

// // Sử dụng URLSearchParams để lấy tham số
// const params = new URLSearchParams(url.search); // new URLSearchParams(location.search)
// const id = params.get('id'); // Lấy giá trị của tham số 'id'
// console.log(id);

// axios.get(apiUrl + person + '?id=' + id)
//     .then(res => {
//         document.getElementById('first').value = res.data[0].first;
//         document.getElementById('last').value = res.data[0].last;
//         document.getElementById('handle').value = res.data[0].handle;
//     }).catch(err => console.error(err));


// function getData() {
//     let frm = document.getElementById('frm').elements;
//     let obj = {
//         "first": frm['first'].value,
//         "last": frm['last'].value,
//         "handle": frm['handle'].value
//     }
//     // console.log(obj);
//     return obj;
// }


// function edit(){
//     //kiểm tra form có hợp lệ hay không
//     axios.patch(apiUrl+person+'/'+id, getData()).then(res => {
//         if(res.status == 200 || res.status == 201){
//             location.href = '../index.html';
//             alert("sua thanh cong");    
//         }
//     }).catch(err => console.error(err));











// }
var apiUrl = 'http://localhost:3000/';
var person = 'person';

// Lấy URL hiện tại và tham số id từ URL
const url = new URL(window.location.href);
const params = new URLSearchParams(url.search);
const id = params.get('id');

axios.get(apiUrl + person + '?id=' + id)
    .then(res => {
        document.getElementById('first').value = res.data[0].first;
        document.getElementById('last').value = res.data[0].last;
        document.getElementById('handle').value = res.data[0].handle;
    }).catch(err => console.error(err));

// Hàm lấy dữ liệu từ form
function getData() {
    return {
        first: document.getElementById('first').value,
        last: document.getElementById('last').value,
        handle: document.getElementById('handle').value
    };
}

// Hàm kiểm tra tính hợp lệ của form
function validateForm() {
    let isValid = true;

    // Kiểm tra các input có trống hay không
    const first = document.getElementById('first');
    const last = document.getElementById('last');
    const handle = document.getElementById('handle');

    // Hiển thị hoặc ẩn thông báo lỗi cho từng input
    if (!first.value.trim()) {
        document.getElementById('inval-first').style.display = 'inline';
        isValid = false;
    } else {
        document.getElementById('inval-first').style.display = 'none';
    }

    if (!last.value.trim()) {
        document.getElementById('inval-last').style.display = 'inline';
        isValid = false;
    } else {
        document.getElementById('inval-last').style.display = 'none';
    }

    if (!handle.value.trim()) {
        document.getElementById('inval-handle').style.display = 'inline';
        isValid = false;
    } else {
        document.getElementById('inval-handle').style.display = 'none';
    }

    return isValid;
}

// Hàm xử lý cập nhật dữ liệu
function edit() {
    // Kiểm tra form có hợp lệ không
    if (validateForm()) {
        // Nếu hợp lệ, thực hiện cập nhật
        axios.patch(apiUrl + person + '/' + id, getData())
            .then(res => {
                if (res.status === 200 || res.status === 201) {
                    location.href = '../index.html'; // Chuyển về trang index sau khi sửa thành công
                    alert("Cập nhật thành công!");
                }
            })
            .catch(err => {
                console.error(err);
                alert("Đã xảy ra lỗi khi cập nhật!");
            });
    } else {
        alert("Vui lòng điền đầy đủ thông tin vào form!");
    }
}

// Thêm sự kiện lắng nghe cho nút "Edit"
// document.querySelector('button.btn-success').addEventListener('click', edit);
