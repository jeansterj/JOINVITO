var leng
document.onclick = function (event) {
    let target = event.target
    console.log(target.id);
    if (target.id === 'sp' || target.id === 'cat' || target.id === 'eng'  ) {
        leng = target.id
        let flags = document.getElementsByClassName('flags')
        for (const i of flags) {
            i.style.filter = (i.style.filter !== 'grayscale()') ? 'grayscale()' : i.style.filter;
        }
        let flag = document.getElementById(target.id)
        flag.style.filter = 'none';

    }
}