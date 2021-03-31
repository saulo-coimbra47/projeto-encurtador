$(document).ready( function(){
    
    $('#formCadastro').submit( function(){
        
        if( $("#nomeUsuario").val().length < 5 ){
            bootbox.alert("Informe um nome de usuário válido! (min: 5 caracteres)");
            $('#nomeUsuario').focus();
            return false; 
        }

        if( $("#nomeUsuario").val().indexOf(" ") > 0 ){
            bootbox.alert("Não utilize espaços no nome de usuário.");
            $('#nomeUsuario').focus();
            return false;
        }

        if($("#email").val().indexOf(".") < 0){
            bootbox.alert("Insira um email válido.");
            $('email').focus();
            return false;
        }

        if( $("#senha").val().length < 8 ){
            bootbox.alert("A senha deve possuir no mínimo 8 caracteres.");
            $('#senha').focus();
            return false; 
        }

        if( $("#senha").val() != $("#confirmaSenha").val() ){
            bootbox.alert("As senhas informadas são diferentes.");
            $('#senha').focus();
            return false; 
        }

        if( $("#opt").val() == null ){
            bootbox.alert("Selecione uma pergunta de segurança.");
            console.log($("#opt").val());
            $('#opt').focus();
            return false; 
        }

        if( $("#resposta").val().length < 3 ){
            bootbox.alert("Resposta muito curta.");
            $('#resposta').focus();
            return false; 
        }

   } );

} );
