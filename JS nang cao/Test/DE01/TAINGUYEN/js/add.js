var apiUrl = 'http://localhost:3000/';
var topic = 'topics';

function getData() {
    let frm = document.getElementById('frm').elements;
    let obj = {
        "name": frm['name'].value,
        "image": frm['image'].value,
        "episodes": frm['episodes'].value,
        "date": frm['date'].value
    }
    // console.log(obj);
    return obj;
}


async function add() {
    // if (validator()) {
        await axios.get(apiUrl + topic).then(res => {
            const listTopic = res.data;
            let maxId = listTopic.length > 0 ? Math.max(...listTopic.map(item => item.id)) : 0;
            let newData = getData();
            newData.id = maxId + 1;
            axios.post(apiUrl + topic, newData).then(res => {
                if (res.status == 200 || res.status == 201) {
                    location.href = './index.html';
                }
            })
                .catch(err => console.error(err));
        }).catch(err => console.error(err));
    // }
}