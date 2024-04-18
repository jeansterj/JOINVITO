document.addEventListener ('DOMContentLoaded', function () {

    handleResize();    
    
});

window.addEventListener ('resize', handleResize);

function handleResize () {

    let medForm = document.querySelector('#medForm');

    let screenWidth = window.innerWidth;

    if(medForm != null){
        if (screenWidth < 950) {
            medForm.classList.add('d-block');
        }else{
            medForm.classList.remove('d-block');
        }
    }
    
}