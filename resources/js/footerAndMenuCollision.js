import { setLanguage, getSelectedLanguage } from './translations.js';
document.addEventListener ('DOMContentLoaded', function () {

const selectedLanguage = getSelectedLanguage();

setLanguage(selectedLanguage);
})


let footer = document.getElementById('footer')
let menu = document.getElementById('floatingMenu')

let fheight = footer.offsetHeight

window.onscroll = function() {
    if(menu != null){
        update()
    }
};

function update() {
    if ((window.innerHeight + document.body.scrollTop) >= document.body.offsetHeight) {
        menu.style.animation = 'menuTouchFooter 0.5s'
        menu.onanimationend = function () {
            menu.style.bottom = fheight
        }
    } else {
        menu.style.animation = 'menuDontTouchFooter 0.3s ease-in-out'
        menu.onanimationend = function () {
            menu.style.bottom = 0
        }
    }
}

