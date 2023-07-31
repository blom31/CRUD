document.addEventListener('DOMContentLoaded', function() {
   
    const msj = document.getElementById('contacto'); 

    msj.addEventListener('click', function (event){
        event.preventDefault(); 

        const phoneNumber = '5491123910153';
        const encodedPhoneNumber = encodeURIComponent(phoneNumber);
        //mensaje previo para el whatsapp
        const mensaje = 'Hola, gracias por querer contactarme. ¿En qué puedo ayudarte?';

        const encodeMensaje = encodeURIComponent(mesnaje);

        window.open(`https://wa.me/${encodedPhoneNumber}?text=${encodeMensaje}`, '_blank');
        
    })

    function proyectmodificado(){
        alert("Proyecto modificado exitosamente¡");
    }

})