<?php namespace App\Models;

use CodeIgniter\Model;

class CadastroModel extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nome', 'email', 'senha', 'pergunta', 'resposta', 'IP'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'nome' => 'required|is_unique[usuarios.nome]',
        'email' => 'required|is_unique[usuarios.email]'
    ];
    protected $validationMessages = [
        'nome'        => [
            'is_unique' => 'O nome inserido não está disponível.'
        ],
        'email'        => [
            'is_unique' => 'O e-mail inserido não está disponível.'
        ]
    ];
    protected $skipValidation  = false;
}