const deleteModal = document.querySelector("#request-delete-modal");
var deleteId = document.querySelectorAll(
    "#table-request tbody .delete-request"
);
for (let f = 0; f < deleteId.length; f++) {
    (function () {
        deleteId[f].addEventListener(
            "click",
            function (e) {
                e.preventDefault();
                var deleteReqId = deleteId[f].getAttributeNode("delid").value;
                getDeleteData(deleteReqId);
            },
            false
        );

        async function getDeleteData(id) {
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
            deleteModal.querySelector(".change-req-id").innerHTML =
                getResp.req_id;
            deleteModal.querySelector(".change-req-id-input").value =
                getResp.req_id;
            let formDeleteReq = deleteModal.querySelector(
                ".delete-requests-form"
            );
            formDeleteReq.setAttribute("action", APP_URL + "/requests/" + id);
        }
    })();
}
