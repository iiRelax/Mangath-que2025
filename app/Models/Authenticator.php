<?php
namespace App\Models;

use CodeIgniter\Model;

class Authenticator {
    //put your code here
    public static function authenticate($email, $password){
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('email', $email);
        $query = $builder->get();
        $results = $query->getResult();
        
        $user = null;
        
        if (count($results) > 0) {
            $row = $results[0];
            if (password_verify($password, $row->password)) {
                $userModel = new \App\Models\UserModel();
                $user = $userModel->find($row->id);
            }
        }
        
        return $user;
    }
}