document.addEventListener('DOMContentLoaded', function() {

    let card = document.querySelector('.card');
    
    if(card != null){
        card.querySelector('.decrement').addEventListener('click',() => {

            let cantidad = parseInt(card.querySelector('.quantity').innerHTML);
        
            (cantidad > 0) ? cantidad-- : cantidad = 0;
        
            card.querySelector('#cantidad').value = cantidad;
            card.querySelector('.quantity').innerHTML = cantidad;

            if(cantidad == 0){
                disablePedir();
            }
        })
        
        card.querySelector('.increment').addEventListener('click',() => {
        
            let total = parseInt(document.getElementById('total').value);
            let cantidad = parseInt(card.querySelector('.quantity').innerHTML);
        
            (cantidad < total) ? cantidad++ : total;
        
            card.querySelector('#cantidad').value = cantidad;
            card.querySelector('.quantity').innerHTML = cantidad;

            if(cantidad > 0){
                enablePedir();
            }
        })

        disablePedir();

        function enablePedir(){
            let pedir = document.getElementById('pedir');

            pedir.removeAttribute('disabled');
        }

        function disablePedir(){
            let pedir = document.getElementById('pedir');

            pedir.setAttribute('disabled','true');
        }
    }
    
    
});