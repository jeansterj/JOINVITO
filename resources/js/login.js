document.addEventListener("DOMContentLoaded", function () {
    const dontHaveAccount = document.querySelector(".dontHaveAccount");
    const col3Container = document.querySelector(".col-3");
    const divRegister = document.getElementById("register");
    let loginDiv = document.getElementById("loginDiv");
    const medForm = document.getElementById("medForm");
    const accountQuestion = document.getElementById("divAccountQuestion");
    const loginRegistroNavbar = document.getElementById('loginRegistroNavbar');


    if (dontHaveAccount != null) {
        dontHaveAccount.addEventListener("click", function (event) {
            event.preventDefault();
            divRegister.style.display = "block";

            if (document.documentElement.clientWidth < 1200) {
                loginDiv.style.display = "none";

                divRegister.classList.remove("bg-secondary");
                divRegister.classList.remove("col-9");
                divRegister.classList.add("col-12");
                medForm.style.display = "grid";
                medForm.style.placeContent = "center";
            } else {
                col3Container.classList.remove("col-12");
                col3Container.classList.add("col-3");
            }
        });

    }

    function handleResize() {
        let screenWidth = window.innerWidth;

        if (screenWidth < 960) {
            accountQuestion.style.display = "block";
            divRegister.style.display = "block";

            if (divRegister.style.display === "block") {

                loginDiv.style.display = "none";
                divRegister.classList.remove("bg-secondary");
                divRegister.classList.remove("col-9");
                divRegister.classList.add("col-12");
                medForm.style.display = "grid";
                medForm.style.placeContent = "center";
                loginRegistroNavbar.classList.add('ocultar')
            }
        } else if (screenWidth >= 992) {
            if (divRegister.style.display === "block") {

                col3Container.classList.remove("col-12");
                col3Container.classList.add("col-3");
                loginDiv.style.display = "block";
                medForm.style.display = "flex";
                divRegister.classList.remove("col-12");
                divRegister.classList.add("col-9");
                divRegister.classList.add("bg-secondary");
                accountQuestion.style.display = "none";
                loginRegistroNavbar.classList.remove('ocultar')
             }
        }
    }

    window.addEventListener("resize", handleResize);

    handleResize();
   
   
    

});
