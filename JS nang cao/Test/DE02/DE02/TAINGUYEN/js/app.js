var apiUrl = 'http://localhost:3000/';
var schema = 'schema';
var listSchema = [];

async function getValue() {
    await axios.get(apiUrl + schema).then(res => {
        listSchema = res.data;
    }).catch(err => console.log(err));
    let html = '';
    listSchema.forEach((item) => {
        html += `
            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block custom-block-full">
                    <div class="custom-block-image-wrap">
                        <a href="detail-page.html">
                            <img src="images/podcast/${item.image}" class="custom-block-image img-fluid"
                                alt="">
                        </a>
                    </div>
                    <div class="custom-block-info">
                        <h5 class="mb-2">
                            <a href="detail-page.html">
                                ${item.name}
                            </a>
                        </h5>
                        <div class="profile-block d-flex">
                            <img src="images/profile/${item.img}"
                                class="profile-block-image img-fluid" alt="">

                            <p>${item.test}
                                <strong>${item.private}</strong>
                            </p>
                        </div>

                        <p class="mb-0">${item.describe}</p>

                        <div class="custom-block-bottom d-flex justify-content-between mt-3">
                            <a href="#" class="bi-headphones me-1">
                                <span>${item.music}k</span>
                            </a>

                            <a href="#" class="bi-heart me-1">
                                <span>${item.heart}k</span>
                            </a>

                            <a href="#" class="bi-chat me-1">
                                <span>${item.comment}k</span>
                            </a>
                        </div>
                    </div>
                    <div class="social-share d-flex flex-column ms-auto">
                        <a href="#" class="badge ms-auto">
                            <i class="bi-pencil"></i>
                        </a>
                        <a href="#" class="badge ms-auto">
                            <i class="bi-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        `;
    });
    document.getElementById('showData').innerHTML = html;
}


getValue();