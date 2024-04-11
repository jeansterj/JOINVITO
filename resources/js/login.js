import { setLanguage, getSelectedLanguage } from './translations.js';

document.addEventListener ('DOMContentLoaded', function () {

//    Traducciones


const selectedLanguage = getSelectedLanguage();

setLanguage(selectedLanguage);





  const dontHaveAccount = document.querySelector ('.dontHaveAccount');
  const col3Container = document.querySelector ('.col-4');
  const divRegister = document.getElementById ('register');
  let loginDiv = document.getElementById ('loginDiv');
  const medForm = document.getElementById ('medForm');
  const accountQuestion = document.getElementById ('divAccountQuestion');
  const loginRegistroNavbar = document.getElementById ('loginRegistroNavbar');
  let help = false;
  const btnLoginMobile = document.getElementById ('login');
  const btnLogoutMobile = document.getElementById ('logout');

  if (dontHaveAccount != null) {
    dontHaveAccount.addEventListener ('click', function (event) {
      event.preventDefault ();
      divRegister.classList.remove ('d-none');

      divRegister.classList.add ('d-block');
      help = true;

      if (document.documentElement.clientWidth < 1200) {
        loginDiv.classList.add ('d-none');

        divRegister.classList.remove ('bg-secondary');
        divRegister.classList.remove ('col-8');
        divRegister.classList.add ('col-12');
        // medForm.classList.add ('medFormClass','py-4');
      } else {
        col3Container.classList.remove ('col-12');
        col3Container.classList.add ('col-4');


      }
      handleResize ();

    });
  }

  function handleResize () {
    let screenWidth = window.innerWidth;

    if (screenWidth < 992) {
      if (accountQuestion != null) {
        accountQuestion.classList.remove ('d-none');
        accountQuestion.classList.add ('d-block');
      }

      if (help === false) {
        if (divRegister != null) {
          divRegister.classList.remove ('d-block');
          divRegister.classList.add ('d-none');
          col3Container.classList.remove ('col-4');
          col3Container.classList.add ('col-12');
        }
    }   

    if (divRegister != null) {
      if (divRegister.classList.contains ('d-block')) {
        loginDiv.classList.add ('d-none');
        divRegister.classList.remove ('bg-secondary');
        divRegister.classList.remove ('col-8');
        divRegister.classList.add ('col-12');
        medForm.classList.remove ('d-flex');

        medForm.classList.add ('medFormClass');
      }
    }



      loginRegistroNavbar.classList.add ('ocultar');

      if (btnLoginMobile != null) {
        btnLoginMobile.classList.remove ('ocultar');
      }

      if (btnLogoutMobile != null) {
        btnLogoutMobile.classList.remove ('ocultar');
      }
    } else if (screenWidth >= 992) {
      if (accountQuestion != null) {
        accountQuestion.classList.remove ('d-block');
        accountQuestion.classList.add ('d-none');
      }

      if (help === false) {
        if (divRegister != null) {
          divRegister.classList.remove ('d-none');
          divRegister.classList.add ('d-block');
        }
      }

      if (divRegister != null) {
        if (divRegister.classList.contains ('d-block')) {

          loginDiv.classList.remove ('d-none');
          loginDiv.classList.add ('d-block');
          col3Container.classList.remove ('col-12');
          col3Container.classList.add ('col-4');
          medForm.classList.add ('d-flex');
          divRegister.classList.remove ('col-12');
          divRegister.classList.add ('col-8');
          divRegister.classList.add ('bg-secondary');
        }
      }

      loginRegistroNavbar.classList.remove ('ocultar');

      if (btnLoginMobile != null) {
        btnLoginMobile.classList.add ('ocultar');
      }

      if (btnLogoutMobile != null) {
        btnLogoutMobile.classList.add ('ocultar');
      }
    }
  }

  window.addEventListener ('resize', handleResize);

  handleResize ();

  function LoadingSpinner (form, spinnerHTML) {
    form = form || document;

    //Keep track of button & spinner, so there's only one automatic spinner per form
    var button;
    var spinner = document.createElement ('div');
    spinner.innerHTML = spinnerHTML;
    spinner = spinner.firstChild;

    //Delegate events to a root element, so you don't need to attach a spinner to each individual button.
    form.addEventListener ('click', start);

    //Stop automatic spinner if validation prevents submitting the form
    //Invalid event doesn't bubble, so use capture
    form.addEventListener ('invalid', stop, true);

    //Start spinning only when you click a submit button
    function start (event) {
      if (button) stop ();
      button = event.target;
      if (button.type === 'submit') {
        LoadingSpinner.start (button, spinner);
      }
    }

    function stop () {
      LoadingSpinner.stop (button, spinner);
    }

    function destroy () {
      stop ();
      form.removeEventListener ('click', start);
      form.removeEventListener ('invalid', stop, true);
    }

    return {start: start, stop: stop, destroy: destroy};
  }

  //I guess these would be called class methods. They're useable without instantianing a new LoadingSpinner so you can start & stop spinners manually on any elements, for ajax and stuff.
  LoadingSpinner.start = function (element, spinner) {
    element.classList.add ('loading');
    return element.appendChild (spinner);
  };

  LoadingSpinner.stop = function (element, spinner) {
    element.classList.remove ('loading');
    return spinner.remove ();
  };

  //Example on how to use LoadingSpinner

  //Bring your own spinner. You can use any html as the spinner. You can find lots of cool spinners for example here on Codepen. I'm using just plain text. Maybe technically not a spinner, but this is more about the script than graphics.
  var exampleForm = document.querySelector ('#example');
  var exampleLoader = new LoadingSpinner (exampleForm, 'Sending...');
  //Delay submit so you can see the spinner spinning, then stop the loading spinner instead of submitting because we're on Codepen.
  if (exampleForm != null) {
    exampleForm.addEventListener ('submit', function (event) {
      event.preventDefault ();
      setTimeout (function () {
        exampleLoader.stop ();
      }, 2000);
    });
  }
});
