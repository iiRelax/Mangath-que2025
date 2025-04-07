<?php

namespace App\Models\Entities; 

use CodeIgniter\Entity\Entity;

class UserEntity extends Entity
{
    public function getFullName(){
        return $this->lastname.' '.$this->firstname;
    }
    public function getRole(){
        $roleModel = new \App\Models\RoleModel();
        return $roleModel->find($this->id_role); 
    }
    
    public function getCollection(){
        $collecModel = new \App\Models\CollectionModel();
        return $collecModel->where('id_users', $this->id)->findAll();
    }
    public function getEnvies(){
        $envieModel = new \App\Models\EnviesModel();
        return $envieModel->where('id_users', $this->id)->findAll();
    }
}

