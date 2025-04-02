var apiUrl = 'http://localhost:3000/';
var person = 'product';

// Lấy ID từ URL
const url = new URL(window.location.href);
const params = new URLSearchParams(url.search);
const id = params.get('id');

// Lấy dữ liệu hiện tại từ API và đổ vào form
axios.get(apiUrl + person + '?id=' + id)
    .then(res => {
        if (res.data.length > 0) {
            document.getElementById('title').value = res.data[0].title;
            document.getElementById('subtitle').value = res.data[0].subtitle;
            document.getElementById('truncate').value = res.data[0].truncate;
        }
    })
    .catch(err => console.error(err));

// Hàm lấy dữ liệu từ form
function getData() {
    return {
        title: document.getElementById('title').value,
        subtitle: document.getElementById('subtitle').value,
        truncate: document.getElementById('truncate').value
    };
}

// Hàm kiểm tra tính hợp lệ của form
function validateForm() {
    const title = document.getElementById('title');
    const subtitle = document.getElementById('subtitle');
    const truncate = document.getElementById('truncate');

    // Kiểm tra các input có trống hay không
    return title.value.trim() !== '' && 
           subtitle.value.trim() !== '' && 
           truncate.value.trim() !== '';
}

// Hàm xử lý cập nhật dữ liệu
function edit() {
    // Kiểm tra form có hợp lệ không
    if (validateForm()) {
        // Nếu hợp lệ, thực hiện cập nhật
        axios.patch(apiUrl + person + '/' + id, getData())
            .then(res => {
                if (res.status === 200 || res.status === 201) {
                    location.href = '../index.html';
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
