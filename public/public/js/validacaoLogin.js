$(document).ready( function(){
    
    $('#formLogin').submit( function(){
        
        if( $("#usuario").val().length == 0 ){
            bootbox.alert("Informe o nome do usuário!");
            $('#nomeUsuario').focus();
            return false; 
        }

        if( $("#senha").val().length == 0 ){
            bootbox.alert("Informe a senha!");
            $('#senha').focus();
            return false; 
        }

   } );

} );
