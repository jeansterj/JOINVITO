let chatbot = document.getElementById('chatbot-icon')
let modal_body = document.getElementById('modal_body')

document.onclick = function (event) {
    let target = event.target
    if (target.id === chatbot.id) {
        callApiChatBot()
    }
}


// import axios from "axios";
function callApiChatBot() {
    // let headers = new Headers();

    // const options = {        
    //     headers: {
    //         'Access-Control-Allow-Origin':'*',
    //         'Access-Control-Allow-Methods': 'GET',
    //         'Access-Control-Allow-Headers':'*',
    //         'cache-control': 'no-cache'
    //     }
    // }
    // axios
    //     .get("https://mediafiles.botpress.cloud/e2ad7870-c28f-4c3e-8ab8-86109bc93443/webchat/bot.html", options)
    //     .then(function (response){
        	
    //         console.log(response.data);
    //     })

    // fetch("https://mediafiles.botpress.cloud/e2ad7870-c28f-4c3e-8ab8-86109bc93443/webchat/bot.html")
    // .then(response => {
    //     if (!response.ok) {
    //         throw new Error('Network response was not ok');
    //     }
    //     return response.text();
    // })
    // .then(data => {
    //     // modal_body.textContent = data
    //     console.log(data);
    // })
    // .catch(error => {
    //     console.error('There was a problem with the fetch operation:', error);
    // });

    // Realizar la solicitud a la API para obtener el HTML
    // $.get("https://mediafiles.botpress.cloud/e2ad7870-c28f-4c3e-8ab8-86109bc93443/webchat/bot.html", function(data) {
    //     // Insertar el HTML obtenido dentro del cuerpo del modal
    //     $("#modal_body").html(data);
    //     // Mostrar el modal
    //     $("#chat").modal("show");
    // });
    var isLoading = false;
    fetch("https://mediafiles.botpress.cloud/e2ad7870-c28f-4c3e-8ab8-86109bc93443/webchat/bot.html")
    .then(function(response) {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        if (response) {
            isLoading = true
        }
        return response.text();
        
    })
    .then(function(data) {
        if (isLoading) {
         // Extraer la parte del chat del HTML
        var chatHtml = extractChatFromHtml(data);
        // Insertar el chat en el cuerpo del modal
        var modalContent = document.getElementById("modalContent");
        modalContent.innerHTML = chatHtml;
        // Mostrar el modal
        var modal = new bootstrap.Modal(document.getElementById("exampleModal"));
        modal.show();   
        }
        
    })
    .catch(function(error) {
        console.error('There was a problem with the fetch operation:', error);
    });
}
function extractChatFromHtml(html) {
    // Analizar el HTML y extraer la parte del chat
    // Esto es un ejemplo simplificado y necesitará ser adaptado según la estructura real del HTML del chat
    // Supongamos que el chat está contenido dentro de un elemento con ID "chat-container"
    var parser = new DOMParser();
    var doc = parser.parseFromString(html, 'text/html');
    // console.log(doc);
    if (doc) {
        var chatContainer = doc.querySelectorAll(".bpw-chat-container");
            if (chatContainer[index]) {
                return chatContainer[index].outerHTML  ;
            } else {
                return "No se encontró el chat.";
            }        
    
    }
   
    // console.log(chatContainer);
    
}