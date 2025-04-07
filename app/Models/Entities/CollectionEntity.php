<?php

namespace App\Models\Entities; 

use CodeIgniter\Entity\Entity;

class CollectionEntity extends Entity
{
    function getMangas(){
        $mangamodel = new \App\Models\MangasModel();
        return $mangamodel->where('id', $this->id_mangas)->findAll();
        }
    function getUsers(){
        $usermodel = new \App\Models\UserModel();
        return $usermodel->where('id', $this->id_users)->findAll();
    }    
}