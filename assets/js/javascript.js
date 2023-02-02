$(document).ready(function(){
    $('#tirage').click(function(){
        compteRebours();
    });
});
function compteRebours()
{
    let dom_element = $('#comptearebours');
    let secondes = 10;
    dom_element.html(secondes);
    secondes--;
    let interval = setInterval(function(){
        dom_element.html(secondes);
        secondes--;
        if(secondes<0){
            // traitement de la requete ajax
            clearInterval(interval);
            let audio = document.createElemment("audio");
            audio.src="assets/son/son.mp3";
            audio.play();
        }
    },1000);
}