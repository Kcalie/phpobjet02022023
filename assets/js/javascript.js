$(document).ready(function(){
    $('#tirage').click(function(){
        compteRebours();
        let audio = document.createElement("audio");
        audio.src="assets/son/son.mp3";
        audio.play();
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
            audio.stop();
            // POUR QUE LE SON SE JOUE PARES LE COMPTE A REBOURS // let audio = document.createElement("audio"); //audio.src="assets/son/son.mp3"; // audio.play();
            // requete ajax pour le tirage au sors
            $.ajax({
                url: 'ajax.php',
                method:'GET',
                success: function(response){
                    let tirage = jQuery.ParseJSON(response);
                    // on parcours les tableau tirage
                    let num_groupe = 1;
                    for(let i=0;i<tirage.length;i++)
                    {
                        // si le nbre de personne est impair
                        if(tirage.length%2 == 1)
                        {
                            if(i == 0 || i == 3 || i == 7 || i == 9 || i == 11 || i == 13){
                                $('#resultat').append('<h3>Groupe '+num_groupe+'</h3>');
                                num_groupe++;
                            }
                            $('#resultat').append('<li>'+tirage[i]+'</li>');
                        }
                        else
                        {
                            if(i == 0 || i == 2 || i == 4 || i == 6 || i == 8 || i == 12 || i == 14){
                                $('#resultat').append('<h3>Groupe '+num_groupe+'</h3>');
                                num_groupe++;
                            }
                            $('#resultat').append('<li>'+tirage[i]+'</li>');
                        }
                    }
                }
            });
        }
    },1000);
}