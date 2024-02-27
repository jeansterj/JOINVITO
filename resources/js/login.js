document.addEventListener('DOMContentLoaded', function() {
    const dontHaveAccount = document.querySelector('.dontHaveAccount');
    const col3Container = document.querySelector('.col-12');
    const divRegister = document.getElementById('register');

    dontHaveAccount.addEventListener('click', function(event) {
        event.preventDefault();
        let loginDiv = document.getElementById('loginDiv')
        if (document.documentElement.clientWidth) {
            loginDiv.style.display = 'none'
        }
        divRegister.style.display = 'block';

        col3Container.classList.remove('col-12'); 
        col3Container.classList.add('col-3');
    });
});