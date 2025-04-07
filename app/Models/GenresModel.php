<?php
namespace App\Models;

use CodeIgniter\Model;

class GenresModel extends Model{
    protected $table ='genres';
    protected $primaryKey ='ID';
    
    protected $useAutoIncrement = true;
    
    //protected $returnType ='array';
    protected $returnType = '\App\Models\Entities\GenresEntity';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['nom_genre','description'];
    
    protected $useTimestamps =false;
    
    protected $validationRules =[];
    protected $validationMessages =[];
    protected $skipValidation = false;
}

