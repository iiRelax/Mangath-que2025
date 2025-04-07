<?php

namespace App\Models;

use CodeIgniter\Model;

class HelpPageModel extends Model
{
    protected $table ='helppage';
    protected $primaryKey ='id';
    
    protected $useAutoIncrement = true;
    
    //protected $returnType ='array';
    protected $returnType = '\App\Models\Entities\HelpPageEntity';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['email','sujet','requete'];
    
    protected $useTimestamps =false; 
    
    function getAll(){
        return $this->findAll();
    }
}