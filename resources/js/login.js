document.addEventListener('DOMContentLoaded', function() {
    const dontHaveAccount = document.querySelector('.dontHaveAccount');
    const col3Container = document.querySelector('.col-12');
    const divRegister = document.getElementById('register');
    let loginDiv = document.getElementById('loginDiv')
    const medForm = document.getElementById('medForm');




    dontHaveAccount.addEventListener('click', function(event) {
        event.preventDefault();
        if (document.documentElement.clientWidth < 1200) {
            loginDiv.style.display = 'none'
            
        divRegister.classList.remove('bg-secondary'); 
        divRegister.classList.remove('col-9'); 
        divRegister.classList.add('col-12'); 
        medForm.style.display = 'block';

        }
        divRegister.style.display = 'block';

        col3Container.classList.remove('col-12'); 
        col3Container.classList.add('col-3');

        

     });
});