let db = document.getElementById('dislexiaButton')
let eb = document.getElementById('epilepsiaButton')
// console.log(db.value);
let l1 = localStorage.getItem('dislexia')
let l2 = localStorage.getItem('epilepsia')
if (l1 === 'on') {
    db.checked = true
    dislexiaMode()
} else if (l2 === 'on') {
    eb.checked = true
    epilepsiaMode()
}
document.onclick = function (event) {
    let target = event.target
    // console.log(db.value);
    if (target.id === 'dislexiaButton') {
        // console.log('hola');
        dislexiaMode()
    } else if (target.id === 'epilepsiaButton') {
        // console.log('hola');
        epilepsiaMode()
    } else if (target.id === 'sp' || target.id === 'cat' || target.id === 'eng'  ) {
        // leng = target.id
        let flags = document.getElementsByClassName('flags')
        for (const i of flags) {
            i.style.filter = (i.style.filter !== 'grayscale()') ? 'grayscale()' : i.style.filter;
        }
        let flag = document.getElementById(target.id)
        flag.style.filter = 'none';
    }
}


function epilepsiaMode() {
    let page = document.getElementById('page')
    // page.style.filter = (page.style.filter == 'sepia()') ? 'none' : 'sepia()'
    if (page.style.filter === 'sepia()'){page.style.filter = 'none'; eb.value = 'off'}
    else{page.style.filter = 'sepia()'; eb.value = 'on'}

    localStorage.setItem('epilepsia', eb.value)
}

function dislexiaMode() {

    let containerDivUnderLiner = document.getElementById('containerDivSubrayador')
    // containerDivUnderLiner.style.display = (containerDivUnderLiner.style.display === 'block') ? 'none' : 'block'
    if (containerDivUnderLiner.style.display === 'block' ) {
        containerDivUnderLiner.style.display = 'none'
        db.value = 'off'
    } else {
        containerDivUnderLiner.style.display = 'block'
        db.value = 'on'
    }
    localStorage.setItem('dislexia', db.value)

    document.addEventListener('mousemove', function (event) {
        moveDiv(event, containerDivUnderLiner)
    })

}

function moveDiv(event, containerDivUnderLiner) {
    // let divX = event.clientX
    let divY = event.clientY
    containerDivUnderLiner.style.top = divY + window.scrollY + 'px'
    // containerDivUnderLiner.style.left = divX + 'px'
}
