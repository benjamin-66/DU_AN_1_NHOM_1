var apiUrl = 'http://localhost:3000/';
var product = 'product';
var listProduct = [];

async function getValue() {
    await axios.get(apiUrl + product).then(res => {
        listProduct = res.data;
    }).catch(err => console.log(err));

    let html = '';
    listProduct.forEach((item, index) => {
        html += `
            <div class="col-3" id="${index + 1}">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">${item.title}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">${item.subtitle}</h6>
                        <p class="card-text multi-line-truncate">${item.truncate}</p>
                        
                        <a href="./edit.html?id=${item.id}"><button class="btn btn-warning">Update</button></a>
                        <a href="javascript:void(0)" class="tm-social-link" onclick="deleteItem(${item.id})"><button class="btn btn-danger" >Delete</button></a>
                        
                    </div>
                </div>
            </div>
        `;
    });

    document.getElementById('showData').innerHTML = html;
}


function deleteItem(id) {
    if (confirm('Bạn có chắc chắn muốn xóa mục này không?')) {
        axios.delete(apiUrl + product + '/' + id)
            .then(res => {
                if (res.status === 200 || res.status === 204) {
                    alert('Đã xóa thành công');
                    getValue(); // Cập nhật danh sách sau khi xóa
                }
            })
            .catch(err => {
                console.error(err);
                alert('Đã xảy ra lỗi khi xóa');
            });
    }
}


getValue();