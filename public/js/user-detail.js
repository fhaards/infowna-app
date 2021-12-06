const modalDetail = document.querySelector("#user-detail-modal");
var detailUser = document.querySelectorAll("#table-user tbody .detail-user");
for (let i = 0; i < detailUser.length; i++) {
    (function () {
        detailUser[i].addEventListener(
            "click",
            function (e) {
                e.preventDefault();
                var getUuid = detailUser[i].getAttributeNode("uuid").value;
                loadDetailUser(getUuid);
            },
            false
        );

        async function loadDetailUser(id) {
            var tokens = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");
            const responetrans = await fetch(
                "user/" + id + "/json-detail-user",
                {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": tokens,
                    },
                }
            );
            var detailResponse = await responetrans.json();
            modalDetail.querySelector(".detail-name").innerHTML =
                detailResponse[0].name;

            modalDetail.querySelector(".detail-email").innerHTML =
                detailResponse[0].email;

            modalDetail.querySelector(".detail-phone").innerHTML =
                detailResponse[0].phone;

            modalDetail.querySelector(".detail-birth-date").innerHTML =
                detailResponse[0].birth_date;

            modalDetail.querySelector(".detail-birth-place").innerHTML =
                detailResponse[0].birth_place;

            modalDetail.querySelector(".detail-address").innerHTML =
                detailResponse[0].address;

            modalDetail.querySelector(".detail-country").innerHTML =
                detailResponse[0].country;

            modalDetail.querySelector(".detail-districts").innerHTML =
                detailResponse[0].districts;

            modalDetail.querySelector(".detail-postalcode").innerHTML =
                detailResponse[0].postcode;

            var getPhoto = detailResponse[0].photo;
            var photo = APP_URL + "/storage/user/avatars/" + getPhoto;
            var photoImg = modalDetail.querySelector(".detail-photo");
            if (getPhoto !== null) {
                photoImg.innerHTML = `<img class="object-cover w-full h-full rounded-lg" src="${photo}">`;
            } else {
                photoImg.innerHTML = "NO PHOTO";
            }
            // console.log(detailResponse[0].name);
            // var thisIdForChange = detailResponse.data[0].id_transaction;
        }
    })();
}
