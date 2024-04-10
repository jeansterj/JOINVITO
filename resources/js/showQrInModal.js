
import axios from "axios";
let modal_body = document.getElementById('modal_body')
document.onclick = function (Event) {
    let target = Event.target
    let qr = document.getElementById('showQrModal')

    if(qr != null){
        if (target.id === qr.id) {
            let id = qr.getAttribute('data-url')
            axios
            .get("http://localhost:8080/joinvito/public/api/qrCode/" + id)
            .then(function (response) {
            //   console.log(response.data);
                let qrCode = response.data
                modal_body.innerHTML = qrCode
            });
        }
    }

}
