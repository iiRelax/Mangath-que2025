<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table ='users';
    protected $primaryKey ='id';
    
    protected $useAutoIncrement = true;
    
    //protected $returnType ='array';
    protected $returnType = '\App\Models\Entities\UserEntity';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['lastname','firstname','email','avatar','id_role','password'];
    
    protected $useTimestamps =false; 
    
    protected $validationRules =[
        'lastname'=> 'required',
        'firstname'=> 'required',
        'email'=> 'required',
        'password' => 'required|min_length[4]',
    ];
    
    protected $validationMessages =[
        'lastname'=> ['required' => ' Le champ de nom est obligatoire'],
        'firstname'=> ['required' => ' Le champ de prénom est obligatoire'],
        'email'=> ['required' => ' Le champ de email est obligatoire'],
        'password'=> ['required' => ' Le champ de password est obligatoire',
            'min_length' => ' Le champ mot de passe doit contenir au moins 4 caractères'],
    ]; 
    
}

