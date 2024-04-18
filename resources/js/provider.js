

document.addEventListener("DOMContentLoaded", function () {

    const divMenuList = document.getElementById('divMenuList');
 
    // if (divMenuList != null) {
    //     divMenuList.addEventListener("click", function (event) {
    //         event.preventDefault();
    //         divRegister.style.display = "block";

    //         if (document.documentElement.clientWidth < 1200) {
    //             loginDiv.style.display = "none";

    //             divRegister.classList.remove("bg-secondary");
    //             divRegister.classList.remove("col-9");
    //             divRegister.classList.add("col-12");
    //             medForm.style.display = "grid";
    //             medForm.style.placeContent = "center";
    //         } else {
    //             col3Container.classList.remove("col-12");
    //             col3Container.classList.add("col-3");
    //         }
    //     });

    function handleResize() {
        let screenWidth = window.innerWidth;

        if (divMenuList != null) {


        if (screenWidth < 960) {

            divMenuList.classList.remove("centerSpace");
            divMenuList.classList.add("centerSpaceBlock");


          
        } else if (screenWidth >= 960) {
        
           
            divMenuList.classList.remove("centerSpaceBlock");
            divMenuList.classList.add("centerSpace");

        }
    }
    }
    

    window.addEventListener("resize", handleResize);

    handleResize();


    
   
   
});
