var apiUrl = 'http://localhost:3000/';
var person = 'person';

function getData(){
    //var, let, const

    let frm = document.getElementById('frm').elements;
    let obj={
        "first": frm['first'].value,
        "last": frm['last'].value,
        "handle": frm['handle'].value
    }
    // console.log(obj);

    return obj;
}

function validator(){
    console.log(getData().first);
    if (getData().first === '') {
        //!getData giống với === ''
        // console.log('Không có dữ liệu');
        document.getElementById('inval-first').style.display = 'block';
        document.getElementById('first').classList.add('border-danger');
    } else {
        // console.log(getData().username);
        document.getElementById('inval-first').style.display = 'none';
        document.getElementById('first').classList.remove('border-danger');
    }

    console.log(getData().first);
    if (getData().last === '') {
        //!getData giống với === ''
        // console.log('Không có dữ liệu');
        document.getElementById('inval-last').style.display = 'block';
        document.getElementById('last').classList.add('border-danger');
    } else {
        // console.log(getData().username);
        document.getElementById('inval-last').style.display = 'none';
        document.getElementById('last').classList.remove('border-danger');
    }

    console.log(getData().last);
    if (getData().handle === '') {
        //!getData giống với === ''
        // console.log('Không có dữ liệu');
        document.getElementById('inval-handle').style.display = 'block';
        document.getElementById('handle').classList.add('border-danger');
    } else {
        // console.log(getData().username);
        document.getElementById('inval-handle').style.display = 'none';
        document.getElementById('handle').classList.remove('border-danger');
    }


    if(getData().first && getData().last && getData().handle){
        return true;
    }
    return false;
}

async function add() {
    if (validator()) {
        // Lấy danh sách person hiện tại để tìm id lớn nhất
        await axios.get(apiUrl + person).then(res => {
            const listPerson = res.data;

            // Tìm id lớn nhất trong danh sách hiện tại
            let maxId = listPerson.length > 0 ? Math.max(...listPerson.map(item => item.id)) : 0;

            // Tạo dữ liệu mới và gán id mới (tăng 1)
            let newData = getData(); // Lấy dữ liệu từ form
            newData.id = maxId + 1; // Gán id mới là số nguyên

            // Gửi yêu cầu POST với dữ liệu mới
            axios.post(apiUrl + person, newData)
                .then(res => {
                    if (res.status == 200 || res.status == 201) {
                        location.href = '../index.html'; // Quay lại trang danh sách
                    }
                })
                .catch(err => console.error(err));
        }).catch(err => console.error(err));
    }
}




