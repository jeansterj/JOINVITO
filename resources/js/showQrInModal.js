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
            let idRider = qr.getAttribute('data-url')
            // let idProv = document.querySelector('meta[name="userId"]').content
            console.log(idRider);
            axios
            .get(`qrCode/${idRider}`)
            .then(function (response) {
              console.log(response.data);
                let qrCode = response.data
                modal_body.innerHTML = qrCode
            });
        } 
    // }

}
