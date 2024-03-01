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

    function getLocation(callback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                lat  = position.coords.latitude;
                lng  = position.coords.longitude;
                callback();
            })
        }
    }


      function printLocation() {

        //lng - 2.1745089
        //lat - 41.3907285
        // 'coordinates': [2.1745089, 41.3907285]
        mapboxgl.accessToken = 'pk.eyJ1IjoiZnJhbmdhYXIiLCJhIjoiY2x0M2o1bG51MXl1djJycGxoOTMxOWM2cyJ9.OvUbOSJo5uD6WNRmhBcujQ';

        async function fetchPuntos() {

            fetch('puntos')
                .then(function(response){
                    response.json()
                    .then(function(response) {

                        let arrayPuntos = new Array();
                        response.forEach((item) => {

                            let jsonDataPunto = {
                                'type': 'Feature',
                                'geometry': {
                                'type': 'Point',
                                'coordinates': [item.longitud,item.latitud]
                                },
                                'properties': {
                                'title': item.nombre,
                                'description': [
                                    `<span>Agua</span>
                                    <span>Ensalada</span>
                                    <span>Jamon</span>`
                                ]
                                }
                            }

                            arrayPuntos.push(jsonDataPunto);

                        });

                        const geojson = {
                            'type': 'FeatureCollection',
                            'features': arrayPuntos
                        };



                        const map = new mapboxgl.Map({
                            container: 'map', // container ID
                            center: [lng, lat], // starting position [lng, lat]
                            zoom: 14 // starting zoom
                        });


                        // add markers to map
                        for (const feature of geojson.features) {
                            // create a HTML element for each feature
                            const el = document.createElement('div');
                            el.className = 'marker';

                            // make a marker for each feature and add it to the map
                            new mapboxgl.Marker(el)
                            .setLngLat(feature.geometry.coordinates)
                            .setPopup(
                            new mapboxgl.Popup({ offset: 25 }) // add popups
                            .setHTML(
                            `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
                            )
                            )
                            .addTo(map);
                            }
                    })
                    .catch(function(e){
                        console.log(e);
                    });
                })
                .catch(function(e){
                    console.log(e);
                });

        }

        fetchPuntos()


      }



      // Call the getLocation() function with printLocation() as a callback
      getLocation(printLocation);



});

