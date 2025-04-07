<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table ='roles';
    protected $primaryKey ='id';
    
    protected $useAutoIncrement = true;
    
    //protected $returnType ='array';
    protected $returnType = '\App\Models\Entities\RoleEntity';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['name','comment'];
    
    protected $useTimestamps =false; 
    
    
}