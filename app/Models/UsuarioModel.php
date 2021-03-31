<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nome', 'email', 'senha', 'pergunta', 'resposta', 'data_login', 'hora_login', 'IP'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function loginSP( $dados ){
        
        $sql = 'CALL loginSP ( :nome: , :senha:, :IP:);';

        $res = $this->db->query($sql, $dados);

        return $res->getResult()[0]->res;

    }

    public function alteraSenha($dados){

        $sql = 'CALL alteraSenha( :usuario: , :resposta: , :senha: );';

        $res = $this->db->query($sql, $dados);

        return $res->getResult()[0]->res;
    }
}