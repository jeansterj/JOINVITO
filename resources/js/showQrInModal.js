// import { setLanguage, getSelectedLanguage } from './translations.js';
// document.addEventListener ('DOMContentLoaded', function () {

// const selectedLanguage = getSelectedLanguage();

// setLanguage(selectedLanguage);
// })


import axios from "axios";
let modal_body = document.getElementById('modal_body_qr')
let qr = document.getElementById('showQrModal')
let epilepsiaAlert = document.getElementById('alertEpilepsia')
qr.onclick = function (Event) {
    let target = Event.target
    let epilepsiaMode = localStorage.getItem('epilepsia')
    if (epilepsiaMode === 'off') {
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
    } else {
        epilepsiaAlert.style.display = 'block'
        setTimeout(() => {
            epilepsiaAlert.style.display = 'none'
        }, 4000);
    }
}

