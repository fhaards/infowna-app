const requestModalChange = document.querySelector("#request-change-modal");
var changeStatusId = document.querySelectorAll(
    "#table-request tbody .change-request"
);
for (let i = 0; i < changeStatusId.length; i++) {
    (function () {
        changeStatusId[i].addEventListener(
            "click",
            function (e) {
                e.preventDefault();
                var changeReqId =
                    changeStatusId[i].getAttributeNode("reqid").value;
                loadChangeStatus(changeReqId);
            },
            false
        );

        async function loadChangeStatus(id) {
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

            var getResp = await responses.json();

            requestModalChange.querySelector(".change-req-id").innerHTML =
                getResp.req_id;

            requestModalChange.querySelector(".change-req-id-input").value =
                getResp.req_id;

            requestModalChange.querySelector(".change-req-status").value =
                getResp.req_status;

            requestModalChange.querySelector(".change-req-name").innerHTML =
                getResp.name;

            let formChangeStatus = requestModalChange.querySelector(
                ".change-status-form"
            );
            formChangeStatus.setAttribute(
                "action",
                APP_URL + "/requests/" + id
            );
        }
    })();
}
