const videoRider = document.getElementById('videoRider');
const divRiderV = document.getElementById('divRiderV');

// Botones con las diferentes opciones 
const opcion1 =  document.getElementById('option1');
const opcion2 =  document.getElementById('option2');
const opcion3 =  document.getElementById('option3');
const opcion4 =  document.getElementById('option4');
const opcion5 =  document.getElementById('option5');
const opcion6 =  document.getElementById('option6');



// Video Rider

videoRider?.addEventListener('seeked', function () {

    ocultar()


})


videoRider?.addEventListener('timeupdate', function () {

    opcion1.innerText = 'Edit Profile'
    opcion2.innerText = 'Stats'
    opcion3.innerText = 'make delivery'
    opcion4.innerText = 'Translations'
    opcion5.innerText = 'Make an order'

  
    if (videoRider.currentTime >= 0 && videoRider.currentTime <= 8) {

        showEleccion()
        eleccion(videoRider,49,160,9,127,84)

    }

    else if (videoRider.currentTime >= 40 && videoRider.currentTime <= 48) {

        showEleccion()
        eleccion(videoRider,49,160,9,127,84)

    }

    else if (videoRider.currentTime >= 75 && videoRider.currentTime <= 83) {

        showEleccion()
        eleccion(videoRider,49,160,9,127,84)

    }

    else if (videoRider.currentTime >= 118 && videoRider.currentTime <= 126) {

        showEleccion()
        eleccion(videoRider,49,160,9,127,84)

    }
    else if (videoRider.currentTime >= 151 && videoRider.currentTime <= 159) {

        showEleccion()
        eleccion(videoRider,49,160,9,127,84)


    } else {
        ocultar()
    }

})



// Video Provider
const videoProvider = document.getElementById('videoProvider');
const divProvV = document.getElementById('divProvV');

videoProvider?.addEventListener('seeked', function () {

    ocultar()

})

videoProvider?.addEventListener('timeupdate', function () {

    opcion1.innerText = 'Edit Profile'
    opcion2.innerText = 'Create Menu'
    opcion3.innerText = 'Check orders'
    opcion4.innerText = 'Translations'
    opcion5.innerText = 'List Menu'
    opcion6.innerText = 'Statistics'

    if (videoProvider.currentTime >= 0 && videoProvider.currentTime <= 8) {

        showEleccion()
        eleccion(videoProvider,52,9,147,186,80,125)

    }

    else if (videoProvider.currentTime >= 43 && videoProvider.currentTime <= 51) {

        showEleccion()
        eleccion(videoProvider,52,9,147,186,80,125)

    }

    else if (videoProvider.currentTime >= 69 && videoProvider.currentTime <= 77) {

        showEleccion()
        eleccion(videoProvider,52,9,147,186,80,125)

    }

    else if (videoProvider.currentTime >= 116 && videoProvider.currentTime <= 124) {

        showEleccion()
        eleccion(videoProvider,52,9,147,186,80,125)

    }
    else if (videoProvider.currentTime >= 138 && videoProvider.currentTime <= 146) {

        showEleccion()
        eleccion(videoProvider,52,9,147,186,80,125)


    }
    else if (videoProvider.currentTime >= 177 && videoProvider.currentTime <= 185) {
      
        showEleccion()
        eleccion(videoProvider,52,9,147,186,80,125)

    } else {

        ocultar()
    }


})

function ocultar(){

    divProvV?.classList.remove('d-block')
    divProvV?.classList.add('d-none')
    divRiderV?.classList.remove('d-block')
    divRiderV?.classList.add('d-none')

}

function showEleccion(){

    divProvV?.classList.remove('d-none')
    divProvV?.classList.add('d-block')

    divRiderV?.classList.remove('d-none')
    divRiderV?.classList.add('d-block')


}

function eleccion(video,eleccion1,eleccion2,eleccion3,eleccion4,eleccion5,eleccion6) {



    opcion1.addEventListener('click', function () {

        video.currentTime = eleccion1
        ocultar();

    })
    opcion2.addEventListener('click', function () {

        video.currentTime = eleccion2
        ocultar();

    })
    opcion3.addEventListener('click', function () {

        video.currentTime = eleccion3
        ocultar();

    })
    opcion4.addEventListener('click', function () {

        video.currentTime = eleccion4
        ocultar();

    })
    opcion5.addEventListener('click', function () {

        video.currentTime = eleccion5
        ocultar();

    })
    opcion6.addEventListener('click', function () {

        video.currentTime = eleccion6
        ocultar();

    })

}