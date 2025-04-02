var apiUrl = 'http://localhost:3000/';
var topic = 'topics';
var listTopic = [];

async function getValue() {
    await axios.get(apiUrl + topic).then(res => {
        listTopic = res.data;
    }).catch(err => console.log(err));
    let html = '';
    listTopic.forEach((item) => {
        html += `
                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <a href="detail-page.html" class="custom-block-image-wrap">
                                <img src="images/topics/${item.image}"
                                    class="custom-block-image img-fluid" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a href="listing-page.html">
                                    ${item.name}
                                    </a>
                                </h5>

                                <p class="badge mb-0">${item.episodes} Episodes</p>
                                <p class="badge mb-0">${item.date}</p>
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="./edit.html?id=${item.id}"><button class="btn btn-warning">Edit</button></a>
                                    <button onclick="deleteTopic(${item.id})" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
        `;
    });
    document.getElementById('showData').innerHTML = html;
}

getValue();