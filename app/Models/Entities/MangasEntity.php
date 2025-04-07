<?php
namespace App\Models\Entities; 

use CodeIgniter\Entity\Entity;

class MangasEntity extends Entity
{
    function getGenre(){
        $genremodel = new \App\Models\GenresModel();
        return $genremodel->find($this->id_genres);
        }
    function getEdition(){
        $editionmodel = new \App\Models\EditionsModel();
        return $editionmodel->find($this->id_edition);
        }    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

