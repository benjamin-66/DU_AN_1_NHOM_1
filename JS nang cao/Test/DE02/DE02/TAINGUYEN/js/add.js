var apiUrl = 'http://localhost:3000/';
var schema = 'schema';


function getData() {
    let frm = document.getElementById('frm').elements;
    let obj = {
        "image": frm['image'].value,
        "name": frm['name'].value,
        "img": frm['img'].value,
        "test": frm['test'].value,
        "private": frm['private'].value,
        "describe": frm['describe'].value,
        "music": frm['music'].value,
        "heart": frm['heart'].value,
        "comment": frm['comment'].value
    }

    return obj;
}


async function add() {
    await axios.get(apiUrl + schema).then(res => {
        const listSchema = res.data;
        let maxId = listSchema.length > 0 ? Math.max(...listSchema.map(item => item.id)) : 0;
        let newData = getData();
        newData.id = maxId + 1;
        axios.post(apiUrl + schema, newData).then(res => {
            if (res.status == 200 || res.status == 201) {
                location.href = './index.html';
            }
        })
            .catch(err => console.error(err));
    }).catch(err => console.error(err));
}