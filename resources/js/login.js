document.addEventListener ('DOMContentLoaded', function () {
  const dontHaveAccount = document.querySelector ('.dontHaveAccount');
  const col3Container = document.querySelector ('.col-3');
  const divRegister = document.getElementById ('register');
  let loginDiv = document.getElementById ('loginDiv');
  const medForm = document.getElementById ('medForm');
  const accountQuestion = document.getElementById ('divAccountQuestion');
  const loginRegistroNavbar = document.getElementById ('loginRegistroNavbar');
  let help = false;

  if (dontHaveAccount != null) {
    dontHaveAccount.addEventListener ('click', function (event) {
      event.preventDefault ();
      divRegister.classList.add ('d-block');
      help = true;

      if (document.documentElement.clientWidth < 1200) {
        loginDiv.classList.add ('d-none');

        divRegister.classList.remove ('bg-secondary');
        divRegister.classList.remove ('col-9');
        divRegister.classList.add ('col-12');
        medForm.classList.add ('medFormClass');
      } else {
        col3Container.classList.remove ('col-12');
        col3Container.classList.add ('col-3');
      }
    });
  }

  function handleResize () {
    let screenWidth = window.innerWidth;

    if (screenWidth < 992) {
      if (accountQuestion != null) {
        accountQuestion.classList.remove ('d-none');
        accountQuestion.classList.add ('d-block');
      }

      if(help === false){
        divRegister.classList.remove ('d-block');

        divRegister.classList.add ('d-none');

      }

      if (divRegister != null) {
        if (divRegister.classList.contains ('d-block')) {
            loginDiv.classList.add ('d-none');

          divRegister.classList.remove ('bg-secondary');
          divRegister.classList.remove ('col-9');
          divRegister.classList.add ('col-12');
          medForm.classList.add ('medFormClass');
        }
      }
      loginRegistroNavbar.classList.add ('ocultar');
    } else if (screenWidth >= 992) {
      if (accountQuestion != null) {
        accountQuestion.classList.remove ('d-block');
        accountQuestion.classList.add ('d-none');
      }

      if(help === false){
        divRegister.classList.remove ('d-none');

        divRegister.classList.add ('d-block');

      }


      if (divRegister != null) {
        if (divRegister.classList.contains ('d-block')) {
          col3Container.classList.remove ('col-12');
          col3Container.classList.add ('col-3');
          loginDiv.classList.add ('d-block');
          medForm.classList.add ('d-flex');
          divRegister.classList.remove ('col-12');
          divRegister.classList.add ('col-9');
          divRegister.classList.add ('bg-secondary');
        }
      }

      loginRegistroNavbar.classList.remove ('ocultar');
    }
  }

  window.addEventListener ('resize', handleResize);

  handleResize ();
});
