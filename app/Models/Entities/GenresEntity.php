<?php

namespace App\Models\Entities; 

use CodeIgniter\Entity\Entity;

class GenresEntity extends Entity
{
    function getMangas(){
        $mangamodel = new \App\Models\MangasModel();
        return $mangamodel->where('id_genres', $this->ID)->findAll();
        }
}