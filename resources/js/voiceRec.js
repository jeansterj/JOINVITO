let btnStart = document.getElementById('btnStart')
let btnStop = document.getElementById('btnStop')

let text
const recognition = new webkitSpeechRecognition()
// Para que se detenga cuando el usuario deje de hablar.
recognition.continuous = true

recognition.lang = 'es-ES'

// Para devolver frases que estan acabadas.
recognition.interimResult = false

document.onclick = function (event){
    let target = event.target

    if (target.id ==='btnStart') recognition.start()
    else if (target.id === 'btnStop') recognition.abort()
}

document.addEventListener('mouseenter', function (event) {
    let target = event.target
    // if (target.id === 'scan-button') {
        readText(target.value)
    // }
}, true)

recognition.onresult = (event) => {
    text = event.results[event.results.length - 1][0].transcript
    console.log(text)
    readText(text)
    if (text === 'pedidos') {
        // console.log('has dicho color');
    }
}

function readText(t) {
    const speech = new SpeechSynthesisUtterance(t)
    speech.volume = 1
    speech.rate = 1.3
    // 0.4
    speech.pitch = 0.4
    speech.lang = 'es-ES'

    console.log(speech);
    window.speechSynthesis.speak(speech)
}