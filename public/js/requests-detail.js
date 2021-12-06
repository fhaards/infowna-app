const requestModalDetail = document.querySelector("#request-detail-modal");
var detailUser = document.querySelectorAll(
    "#table-request tbody .detail-request"
);
for (let i = 0; i < detailUser.length; i++) {
    (function () {
        detailUser[i].addEventListener(
            "click",
            function (e) {
                e.preventDefault();
                var getReqid = detailUser[i].getAttributeNode("reqid").value;
                loadDetailRequests(getReqid);
            },
            false
        );

        async function loadDetailRequests(id) {
            var tokens = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");

            const responses = await fetch(
                "requests/" + id + "/json-detail-requests",
                {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": tokens,
                    },
                }
            );

            var detailResponse = await responses.json();

            requestModalDetail.querySelector(".detail-reqid").innerHTML =
                detailResponse.req_id;

            requestModalDetail.querySelector(".detail-name").innerHTML =
                detailResponse.name;

            requestModalDetail.querySelector(".detail-email").innerHTML =
                detailResponse.email;

            requestModalDetail.querySelector(".detail-phone").innerHTML =
                detailResponse.phone;

            requestModalDetail.querySelector(".detail-gender").innerHTML =
                detailResponse.gender;

            requestModalDetail.querySelector(".detail-nationality").innerHTML =
                detailResponse.nationality;

            requestModalDetail.querySelector(".detail-passport").innerHTML =
                detailResponse.passport_id;

            requestModalDetail.querySelector(".detail-address").innerHTML =
                detailResponse.address_indonesia;

            var getStatus = detailResponse.req_status;
            var statCol = "";
            if (getStatus === "Waiting") {
                statCol = "yellow";
            } else {
                statCol = "green";
            }
            requestModalDetail.querySelector(".detail-status").innerHTML =
                `<span class="bg-` +
                statCol +
                `-100 text-` +
                statCol +
                `-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">` +
                getStatus +
                `</span>`;
        }
    })();
}