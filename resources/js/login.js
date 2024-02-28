document.addEventListener('DOMContentLoaded', function() {
    const dontHaveAccount = document.querySelector('.dontHaveAccount');
    const col3Container = document.querySelector('.col-12');
    const divRegister = document.getElementById('register');
    let loginDiv = document.getElementById('loginDiv')
    const medForm = document.getElementById('medForm');


    dontHaveAccount.addEventListener('click', function(event) {
        event.preventDefault();
        divRegister.style.display = 'block';
        if (document.documentElement.clientWidth < 1200) 
        
        {
            loginDiv.style.display = 'none'
            
        divRegister.classList.remove('bg-secondary'); 
        divRegister.classList.remove('col-9'); 
        divRegister.classList.add('col-12'); 
        medForm.style.display = 'grid';
        medForm.style.placeContent = 'center';

        } 

        else

        {
            col3Container.classList.remove('col-12'); 
            col3Container.classList.add('col-3');

        }

     });

     function handleResize() {
        // Obtén el ancho de la ventana
        var screenWidth = window.innerWidth;

        // Puedes ajustar estos valores según tus necesidades
        if (screenWidth < 960) {
            console.log("Pantalla pequeña");
            if (divRegister.style.display === 'block') {
                loginDiv.style.display = 'none'
                divRegister.classList.remove('bg-secondary'); 
                divRegister.classList.remove('col-9'); 
                divRegister.classList.add('col-12'); 
                medForm.style.display = 'grid';
                medForm.style.placeContent = 'center';
            }
            // Aquí puedes realizar acciones específicas para pantallas pequeñas
        } else if (screenWidth >= 960) {
            console.log("Pantalla mediana");
            if (divRegister.style.display === 'block') {
                col3Container.classList.remove('col-12');
                col3Container.classList.add('col-3');
                loginDiv.style.display = 'block'
                medForm.style.display = 'flex';
                divRegister.classList.remove('col-12'); 
                divRegister.classList.add('col-9'); 
                divRegister.classList.add('bg-secondary'); 

            }


        } 
    }

    // Agrega un event listener para el evento de cambio de tamaño
    window.addEventListener('resize', handleResize);

    // Llama a la función inicialmente para manejar el tamaño de la pantalla al cargar la página
    handleResize();


});