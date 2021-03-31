$(document).ready( function(){
    
    $('#formAlteracao').submit( function(){

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

        if( $("#resposta").val().length < 3 ){
            bootbox.alert("Resposta muito curta.");
            $('#resposta').focus();
            return false; 
        }

   } );

} );
