<?php namespace App\Models;

use CodeIgniter\Model;

class UrlModel extends Model
{
    protected $table      = 'urls';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['codigo', 'url_original', 'url_curta', 'id_usuario', 'acessos'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

}