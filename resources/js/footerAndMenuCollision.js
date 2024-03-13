let footer = document.getElementById('footer')
let menu = document.getElementById('floatingMenu')
let x
let y
let width = menu.offsetWidth
let height = menu.offsetHeight
let fwidth = footer.offsetWidth
let fheight = footer.offsetHeight
let fx = footer.offsetLeft
let fy = footer.offsetTop
function draw() {
    x = menu.offsetLeft
    y = menu.offsetTop
}
// object_1.left < object_2.left + object_2.width  && object_1.left + object_1.width  > object_2.left &&
// 		object_1.top < object_2.top + object_2.height && object_1.top + object_1.height > object_2.top
function update() {
    draw()
    if (x < fx + fwidth
        && x + width > fx
        && y < fy + fheight 
        && y + height > fy) 
    {
        // console.log('hola');
    }

    // if (y + height <= fy
    //     && y >= fy + fheight
    //     ) 
    // {
    //     console.log('HOla'); 
    // }
}

function animate() {
    update()
    requestAnimationFrame(animate)
}

animate()
