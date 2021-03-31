$(document).ready( function(){

    
    $('#formRecuperacao1').submit( function(e){
        e.preventDefault();
        if( $("#nomeUsuario").val().length < 5 ){
            bootbox.alert("Informe um nome de usuário válido! (min: 5 caracteres)");
            $('#nomeUsuario').focus();
            return false; 
        }

        else if( $("#nomeUsuario").val().indexOf(" ") > 0 ){
            bootbox.alert("Não utilize espaços no nome de usuário.");
            $('#nomeUsuario').focus();
            return false;
        }

        else if($("#email").val().indexOf(".") < 0){
            bootbox.alert("Insira um email válido.");
            $('#email').focus();
            return false;
        }

        else if( $("#email").val().indexOf(" ") > 0 ){
            bootbox.alert("Insira um email válido.");
            $('#email').focus();
            return false;
        }

        else{
            
            var nomeUsuario = $('#nomeUsuario').val();
            var emailUsuario = $('#email').val();

            var ajaxReq = $.ajax({

                url: "recuperacao/recuperasenha",
                method: "POST",
                datatype: "json",
                data : {
                    nomeUsuario: nomeUsuario,
                    email: emailUsuario
                }

            });

            ajaxReq.done(function(result){
                var validade = result[0].validade;
                var texto = result[0].texto;
                if(validade == 1){
                    $('#formRecuperacao2').removeAttr("hidden");
                    $('#perguntaUsuario').prepend(texto);
                }
                else{
                    bootbox.alert(texto);
                }

            });

            ajaxReq.fail(function(jqXHR, textStatus){
                console.log("FALHA");
                console.log(jqXHR);
                console.log(textStatus);

            });
             
        }

   } );

    $('#formRecuperacao2').submit( function(e){
        e.preventDefault();
        if( $("#resposta").val().length < 3 ){
            bootbox.alert("Informe uma resposta válida!");
            $('#resposta').focus();
            return false; 
        }
        else{
            
            var nomeUsuario2 = $('#nomeUsuario').val();
            var emailUsuario2 = $('#email').val();
            var respostaUsuario = $('#resposta').val();

            var ajaxReq = $.ajax({

                url: "recuperacao/gerasenha",
                method: "POST",
                datatype: "json",
                data : {
                    nomeUsuario: nomeUsuario2,
                    email: emailUsuario2,
                    resposta: respostaUsuario
                }

            });

            ajaxReq.done(function(result){

                var validade = result[0].validade;
                var texto = result[0].texto;
                var senha = result[0].senha;
                
                if(validade == 1){
                    $('#sucesso').removeAttr("hidden");
                    $('#botoes').removeAttr("hidden");
                    $('#sucesso').prepend(texto);
                    $('#botaocopiar').click(function(){
                        navigator.clipboard.writeText(senha);
                        $('#botaocopiar').replaceWith('Senha Copiada');
                    });
                }
                else{
                    $('#falha').removeAttr("hidden");
                    $('#botaofalha').removeAttr("hidden");
                    $('#falha').prepend(texto);
                }

            });

            ajaxReq.fail(function(jqXHR, textStatus){
                console.log("FALHA");
                console.log(jqXHR);
                console.log(textStatus);

            });
             
        }

   });
} );
