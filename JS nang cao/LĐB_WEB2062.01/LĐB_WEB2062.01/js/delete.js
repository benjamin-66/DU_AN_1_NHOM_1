var apiUrl = 'http://localhost:3000/';
var person = 'person';



function deletePerson(id) {
    if (confirm('Bạn có chắc chắn muốn xóa người này không?')) {
        // Không cần chuyển đổi id, vì id đã là chuỗi
        // Gửi yêu cầu DELETE tới API
        axios.delete(`${apiUrl}${person}/${id}`)
            .then(res => {
                if (res.status === 200) {
                    alert('Xóa người thành công!');
                    // Cập nhật danh sách sau khi xóa
                    getValue();
                }
            })
            .catch(err => {
                console.error('Lỗi khi xóa người:', err);
                alert('Có lỗi xảy ra khi xóa người. Vui lòng kiểm tra lại.');
            });
    }
}
