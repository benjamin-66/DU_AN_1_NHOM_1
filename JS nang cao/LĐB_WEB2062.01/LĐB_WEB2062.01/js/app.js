var apiUrl = 'http://localhost:3000/';
var person = 'person';
var listPerson = [];


async function getValue() {
    await axios.get(apiUrl + person).then(res => {
        // console.log(res.data);
        listPerson = res.data;
    }).catch(err => console.log(err));
    let html = '';
    listPerson.forEach((item) => {
        html += `
                <tr>
                    <th scope="row">${item.id}</th>
                    <td>${item.first}</td>
                    <td>${item.last}</td>
                    <td>@${item.handle}</td>
                    <td>
                        <a href="./pages/edit.html?id=${item.id}" class="btn btn-warning me-md-2">edit</a>
                        <button onclick="deletePerson(${item.id})" class="btn btn-danger"> Delete </button>   
                    </td>            
                </tr>
        `;
    });

    document.getElementById('showData').innerHTML = html;
}

getValue();




