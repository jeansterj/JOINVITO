// import { setLanguage, getSelectedLanguage } from './translations.js';
// document.addEventListener ('DOMContentLoaded', function () {

// const selectedLanguage = getSelectedLanguage();

// setLanguage(selectedLanguage);
// })


import axios from "axios";
let modal_body = document.getElementById('modal_body_qr')
let qr = document.getElementById('showQrModal')
qr.onclick = function (Event) {
    let target = Event.target
    // if(qr != null){
        if (target.id === qr.id) {
            let id = qr.getAttribute('data-url')
            axios
            .get("http://localhost:8080/joinvito/public/api/qrCode/" + id)
            .then(function (response) {
              console.log(response.data);
                let qrCode = response.data
                modal_body.innerHTML = qrCode
            });
        } 
    // }

}
