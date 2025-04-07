<?php
namespace App\Models;

use CodeIgniter\Model;

class MangasModel extends Model{
    protected $table ='mangas';
    protected $primaryKey ='id';
    
    protected $useAutoIncrement = true;
    
    //protected $returnType ='array';
    protected $returnType = '\App\Models\Entities\MangasEntity';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['titre','auteur','image','nb_tomes','id_genres','id_edition','publication','description'];
    
    protected $useTimestamps =false;
    
    protected $validationRules =[];
    protected $validationMessages =[];
    protected $skipValidation = false;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

