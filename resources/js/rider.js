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
        mapboxgl.accessToken = 'pk.eyJ1IjoiZnJhbmdhYXIiLCJhIjoiY2x0M2o1bG51MXl1djJycGxoOTMxOWM2cyJ9.OvUbOSJo5uD6WNRmhBcujQ';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            center: [lng, lat], // starting position [lng, lat]
            zoom: 16 // starting zoom
        });
      }
      
      // Call the getLocation() function with printLocation() as a callback
      getLocation(printLocation);

    

});

