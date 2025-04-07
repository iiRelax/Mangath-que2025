<?php
namespace App\Models;

use CodeIgniter\Model;

class EditionsModel extends Model{
    protected $table ='edition';
    protected $primaryKey ='ID';
    
    protected $useAutoIncrement = true;
    
    //protected $returnType ='array';
    protected $returnType = '\App\Models\Entities\EditionsEntity';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['nom_edition','pays','annee_creation'];
    
    protected $useTimestamps =false;
    
    protected $validationRules =[];
    protected $validationMessages =[];
    protected $skipValidation = false;
}