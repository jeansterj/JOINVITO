// script.js
document.addEventListener("DOMContentLoaded", function () {
    // ...

    // Obtén referencias a los enlaces de idioma
    const esLink = document.getElementById('esLink');
    const catLink = document.getElementById('catLink');
    const engLink = document.getElementById('engLink');

    // Agrega eventos de clic a los enlaces
    esLink.addEventListener('click', function (event) {
        event.preventDefault(); // Evita que el enlace recargue la página
        setLanguage('es');
    });

    catLink.addEventListener('click', function (event) {
        event.preventDefault();
        setLanguage('cat');
    });

    engLink.addEventListener('click', function (event) {
        event.preventDefault();
        setLanguage('en');
    });

});


export function setLanguage(language) {
    // Guardar el idioma seleccionado en localStorage
    localStorage.setItem('language', language);


    // Cargar las traducciones según el idioma seleccionado
    fetch('./translations.json')
        .then(response => response.json())

        .then(translations => {
            // Aplicar las traducciones a los elementos con el atributo 'data-translate'
            document.querySelectorAll('[data-translate]').forEach(element => {

                const translationKey = element.getAttribute('data-translate');

                const defaultLanguage = 'en';
                const translationText = translations[translationKey][language] || translations[translationKey][defaultLanguage];

                element.innerHTML = translationText;
            });
        })
        .catch(error => console.error('Error loading translations:', error));
}

// Función para obtener el idioma seleccionado
export function getSelectedLanguage() {
    return localStorage.getItem('language') || 'en'; // Devuelve 'en' como idioma predeterminado si no se ha seleccionado uno
}