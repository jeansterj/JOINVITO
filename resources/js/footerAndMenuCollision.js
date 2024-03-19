let footer = document.getElementById('footer')
let menu = document.getElementById('floatingMenu')

let fheight = footer.offsetHeight

let height = menu.offsetHeight

let footerY = footer.offsetTop

let windowHeight = window.innerHeight

let windowNoFooter = windowHeight - fheight

document.onscroll = function () {
    menu.style.bottom = document.height
    menu.style.top = window.height
    update()
}
function update() {
    let windowBottom = (document.body.scrollTop + window.innerHeight) + (height)
    if (windowBottom > (footerY + fheight)) {
        console.log('holi que tal');
        menu.style.animation = 'menuTouchFooter 0.5s'
        menu.onanimationend = function () {
            menu.style.bottom = fheight
        }
    } else {
        menu.style.animation = 'menuDontTouchFooter 0.3s'
        menu.onanimationend = function () {
            menu.style.bottom = 0
        }
    }
}

