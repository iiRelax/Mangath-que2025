<?php
namespace App\Models;

use CodeIgniter\Model;

class EnviesModel extends Model{
    protected $table ='envies';
    protected $primaryKey ='ID';
    
    protected $useAutoIncrement = true;
    
    //protected $returnType ='array';
    protected $returnType = '\App\Models\Entities\EnviesEntity';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['id_users','id_mangas'];
    
    protected $useTimestamps =false;
    
    protected $validationRules =[];
    protected $validationMessages =[];
    protected $skipValidation = false;
}

