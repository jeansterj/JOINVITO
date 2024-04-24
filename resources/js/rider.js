document.addEventListener('DOMContentLoaded',function(){

    const tabs = document.querySelectorAll('.nav-tabs .nav-item .nav-link');

    tabs.forEach(tab =>{

        hideContent(tab)

        tab.addEventListener('click',function() {

            removeActiveTabs(tabs);
            setActive(tab);
            showSelection(tab);
        });
    })

    function removeActiveTabs() {

        tabs.forEach(tab =>{

            tab.classList.remove('active');
        })
    }

    function setActive(tab){

        tab.classList.add('active');
    }

    function showSelection(tab){

        let restTab = document.getElementById('restaurants');
        let favsTab = document.getElementById('favorites')

        if(tab.getAttribute('data-type') == 'favorites'){
            restTab.classList.add('hidden')
            favsTab.classList.remove('hidden')
        }else{
            favsTab.classList.add('hidden')
            restTab.classList.remove('hidden')
        }
    }

    function hideContent(tab){

        let restTab = document.getElementById('restaurants');
        let favsTab = document.getElementById('favorites')

        if(tab.classList.contains('active') && tab.getAttribute('data-type') == 'favorites'){
            restTab.classList.add('hidden')
            favsTab.classList.remove('hidden')
        }else{
            favsTab.classList.add('hidden')
            restTab.classList.remove('hidden')
        }
    }

    var lat;
    var lng;

    let cards = document.querySelectorAll('.card .carousel-item');

    cards.forEach((card) => {

        let total = parseInt(card.querySelector('#total').value);

        card.querySelector('.decrement').addEventListener('click',() => {

            let cantidad = parseInt(card.querySelector('.quantity').innerHTML);

            (cantidad > 0) ? cantidad-- : cantidad = 0;

            card.querySelector('#cantidad').value = cantidad;
            card.querySelector('.quantity').innerHTML = cantidad;

            if(cantidad == 0){
                disablePedir(card);
            }
        })

        card.querySelector('.increment').addEventListener('click',() => {

            let cantidad = parseInt(card.querySelector('.quantity').innerHTML);

            (cantidad < total) ? cantidad++ : total;

            card.querySelector('#cantidad').value = cantidad;
            card.querySelector('.quantity').innerHTML = cantidad;

            if(cantidad > 0){
                enablePedir(card);
            }
        })
    });


    function enablePedir(card){


        card.querySelector('.enviar').removeAttribute('disabled');
    }

    function disablePedir(card){

        card.querySelector('.enviar').setAttribute('disabled','true');
    }

    // if (navigator.geolocation) {
    //     navigator.geolocation.getCurrentPosition((position) => {
    //         lat  = position.coords.latitude;
    //         lng  = position.coords.longitude;
    //         const ordenarAhora = document.querySelector('#ordernow > a');
    //         if(ordenarAhora != null){
    //             ordenarAhora.setAttribute('href',`rider-menu-selection/${lat}/${lng}`);
    //         }
    //     })
    // }
});

