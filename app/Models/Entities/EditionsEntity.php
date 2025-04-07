<?php

namespace App\Models\Entities; 

use CodeIgniter\Entity\Entity;

class EditionsEntity extends Entity
{
    function getMangas(){
        $mangamodel = new \App\Models\MangasModel();
        return $mangamodel->where('id_edition', $this->ID)->findAll();
        }
}