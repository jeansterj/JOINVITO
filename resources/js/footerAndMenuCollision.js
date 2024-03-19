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
    if (tocado) {
        menu.style.bottom = document.height
    } else {
        update()
    }
}
function update() {
    let windowBottom = (document.body.scrollTop + window.innerHeight) + (height)

    // draw()
    // console.log(document.body.scrollTop +
        // window.innerHeight)
    // console.log(footerY)
    // console.log(windowBottom + height);
    // console.log(footerY);
    if (windowBottom >= footerY) {
        console.log('holi que tal');
        menu.style.bottom = fheight
        tocado = true
    } else {
        tocado = false
    }
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
