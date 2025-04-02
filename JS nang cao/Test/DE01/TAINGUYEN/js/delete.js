var apiUrl = 'http://localhost:3000/';
var topic = 'topics';


function deleteTopic(id) {
    if(confirm('Bạn có muốn xóa không!')){
        axios.delete(`${apiUrl}${topic}/${id}`).then(res=>{
            if(res.status === 200){
                alert('Xóa thành công!');
                getValue();
            }
        })
        .catch(err=>{
                console.error('False',err);
                alert('Lỗi khi xóa');
        });
    }
}