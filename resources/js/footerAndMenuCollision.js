let footer = document.getElementById('footer')
let menu = document.getElementById('floatingMenu')
let x
let y
let width = menu.offsetWidth
let height = menu.offsetHeight
let fwidth = footer.offsetWidth
let fheight = footer.offsetHeight
let fx = footer.offsetLeft
let footerY = footer.offsetTop
let windowHeight = window.innerHeight
let windowNoFooter = windowHeight - fheight
let tocado = false
// function draw() {
//     x = menu.offsetLeft
//     y = menu.offsetTop
// }
document.onscroll = function () {
    menu.style.bottom = document.height
    menu.style.top = window.height
    // if (tocado) {
    //     // document.height
    //     menu.style.bottom = 0
    // } else {
    //     update()
    // }
    update()
}
function update() {
    let windowBottom = (document.body.scrollTop + window.innerHeight) + (height)

    // draw()
    // console.log(document.body.scrollTop +
        // window.innerHeight)
    // console.log(footerY)
    // console.log(windowBottom + height);
    // console.log(footerY);
    if (windowBottom > (footerY + fheight)) {
        console.log('holi que tal');
        menu.style.animation = 'menuTouchFooter 0.5s'
        menu.onanimationend = function () {
            menu.style.bottom = fheight
            tocado = true
        }
    } else {
        menu.style.animation = 'menuDontTouchFooter 0.3s'
        menu.onanimationend = function () {
            tocado = false
            menu.style.bottom = 0
        }
    }
    // menu.style.animation = ''
    // if (windowNoFooter >= menu) {

    // }
    // if (y < footerY + fheight
    //     && y + height > footerY)
    // {
    //     console.log('hola');
    // }

    // if (y + height <= fy
    //     && y >= fy + fheight
    //     )
    // {
    //     console.log('HOla');
    // }
}

// function animate() {
//     update()
//     requestAnimationFrame(animate)
// }

// animate()
