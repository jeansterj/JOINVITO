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
        let screenWidth = window.innerWidth;

        if (screenWidth < 960) {
            if (divRegister.style.display === 'block') {
                loginDiv.style.display = 'none'
                divRegister.classList.remove('bg-secondary'); 
                divRegister.classList.remove('col-9'); 
                divRegister.classList.add('col-12'); 
                medForm.style.display = 'grid';
                medForm.style.placeContent = 'center';
            }
        } else if (screenWidth >= 960) {
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

    window.addEventListener('resize', handleResize);

    handleResize();


});
