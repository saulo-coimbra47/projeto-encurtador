$(document).ready( function(){
    
    $('#formURL').submit( function(e){
        e.preventDefault();

        if( $("#urlOriginal").val().length < 5 ){
            bootbox.alert("Insira uma URL válida!");
            $('#url').focus();
            return false; 
        }

        else if($("#urlOriginal").val().indexOf(".") < 0){
            bootbox.alert("Insira uma URL válida.");
            $('#url').focus();
            return false;
        }

        else if($("#urlOriginal").val().indexOf("/") < 0){
            bootbox.alert("Insira uma URL válida.");
            $('#url').focus();
            return false;
        }

        else{

            var urlOriginal = $('#urlOriginal').val();

           
            var ajaxReq = $.ajax({

                url: "url/encurtar",
                method: "POST",
                datatype: "json",
                data : {
                    urlOriginal: urlOriginal
                }

            });

            ajaxReq.done(function(result){
                var urlCurta = result[0].urlCurta;
                var validade = result[0].validade;
                
                if(validade == 1){
                    $('#mostraurl').removeAttr("hidden");
                    $('#urlcurta').prepend('<strong>'+urlCurta+'</strong><br>');
                    $('#copiaurl').click(function(){
                        navigator.clipboard.writeText(urlCurta);
                        $('#copiaurl').replaceWith('URL Copiada');
                    });
                    $('#botaoencurtar').click(function(){
                        bootbox.alert('Recarregue a página para encurtar novamente!');
                        return false;
                    });
                }
                else{
                    $('#erro').removeAttr("hidden");
                    $('#erro').prepend('Não foi possível encurtar a URL!');
                }

            });

            ajaxReq.fail(function(jqXHR, textStatus){
                console.log("FALHA");
                console.log(jqXHR);
                console.log(textStatus);

            });
            
             
        }

   } );

} );
