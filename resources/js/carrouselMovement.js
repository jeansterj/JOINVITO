/** 1. Attr */
let supplierDiv = document.getElementById('supplierDiv')
let riderDiv = document.getElementById('riderDiv')
let sCenterDiv = document.getElementById('sCenterDiv')
/** 2. Event */
document.addEventListener('click', function (Event) {
    let target = Event.target
    const carrouselClass = target.classList.contains('carousel-control-next-icon') ? 'carousel-item-next carousel-item-start' : 'carousel-item-prev carousel-item-end';

    const carrouselActive = document.getElementsByClassName(carrouselClass);
    activeForm(carrouselActive);
})
function activeForm(carrouselActive) {
    for (const icons of carrouselActive) {
        // const algo = icons.id === 'riderIcon'
        if (icons.id === 'riderIcon') 
        {
            riderDiv.style.display = 'block';
            supplierDiv.style.display = sCenterDiv.style.display = 'none';

        } else if (icons.id === 'supplierIcon') 
        {
            supplierDiv.style.display = 'block';
            riderDiv.style.display = sCenterDiv.style.display = 'none';
        } else {
            sCenterDiv.style.display = 'block';
            supplierDiv.style.display = riderDiv.style.display = 'none';
        }

    }
}