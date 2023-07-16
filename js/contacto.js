
document.addEventListener('DOMContentLoaded', function() {
    
  
    const msj = document.getElementById('contacto'); 

    msj.addEventListener('click', function (event){
        event.preventDefault(); 

        const phoneNumber = '5491123910153';
        const encodedPhoneNumber = encodeURIComponent(phoneNumber);

        window.open(`https://web.whatsapp.com/send?phone=${encodedPhoneNumber}`, '_blank');
        
    })

})