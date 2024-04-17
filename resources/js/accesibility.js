let db = document.getElementById('dislexiaButton')
// console.log(db.value);
let l1 = localStorage.getItem('epilepsiaMode')
if (l1 === 'on') {
    db.checked = true
    dislexiaMode()
}
document.onclick = function (event) {
    let target = event.target
    console.log(db.value);
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
    let content = document.getElementById('content')
    // let body = document.getElementById('bodyMain')
    // let epilepsiaButton = document.getElementById('epilepsiaButton')
    content.style.filter = (content.style.filter === 'sepia()') ? 'none' : 'sepia()'

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
    localStorage.setItem('epilepsiaMode', db.value)

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