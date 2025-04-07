<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function    adminLogin(){
        $session = session();
        return view('Admin/principal');
    }
    public function    acceuil(){
        $session = session();
        return view('Admin/principal');
    }
    public function    principal(){
        $session = session();
        return view('Admin/principal');
    }
    //diffents onglets avec database
    
    public function allUsers(){
      $session = session();
        
        $usersModel = new \App\Models\UserModel();
        $allUsers = $usersModel->findAll();
        $data['allUsers'] = $allUsers;

        return view('Admin/allUsers', $data);
    }
    
    public function hPAdmin(){
        $session = session();
        
        $hpModel = new \App\Models\HelpPageModel();
        $hPAdmin = $hpModel->findAll();
        $data['hPAdmin'] = $hPAdmin;

        return view('Admin/hPAdmin', $data);

    }
    public function mangas(){
      $session = session();
     
        $mangaModel = new \App\Models\MangasModel();
        $mangas = $mangaModel->findAll();
        $data['mangas'] = $mangas;

        return view('Admin/mangas', $data);
    }
    
    //ajoutmanga
    public function addMangaForm(){
        $session = session();
        $genresmodel=new \App\Models\GenresModel();
        $editionmodel = new \App\Models\EditionsModel();
        $genres= $genresmodel->findAll();
        $editions= $editionmodel->findAll();
        $data['editions']= $editions;
        $data['genres']= $genres;
        return view('Admin/addManga', $data);
    }
   
    public function addManga(){
        $session = session();
        $request = $this->request;
        $mangamodel = new \App\Models\MangasModel();
        
        // Validation des données du formulaire
        $rules = [
            'titre' => 'required|min_length[2]',
            'auteur' => 'required|min_length[2]',
            'nb_tomes' => 'required|numeric',
            'id_genres' => 'required|numeric',
            'id_edition' => 'required|numeric'
        ];
        
        if (!$this->validate($rules)) {
            // En cas d'erreur de validation, afficher les erreurs
            $data['validation'] = $this->validator;
            $genresmodel = new \App\Models\GenresModel();
            $editionmodel = new \App\Models\EditionsModel();
            $data['genres'] = $genresmodel->findAll();
            $data['editions'] = $editionmodel->findAll();
            
            // Log pour débogage
            log_message('debug', 'Erreurs de validation dans addManga: ' . json_encode($this->validator->getErrors()));
            
            // Rediriger vers le formulaire avec les erreurs
            return view('Admin/addManga', $data);
        }
        
        // Préparation des données à insérer
        $titre = $request->getPost('titre');
        $auteur = $request->getPost('auteur');
        $image = $request->getPost('image');
        $nb_tomes = $request->getPost('nb_tomes');
        $id_genres = $request->getPost('id_genres');
        $id_edition = $request->getPost('id_edition');
        $publication = $request->getPost('publication');
        $description = $request->getPost('description');
        
        // Log pour débogage
        log_message('debug', 'Données reçues dans addManga: ' . json_encode([
            'titre' => $titre,
            'auteur' => $auteur,
            'image' => $image,
            'nb_tomes' => $nb_tomes,
            'id_genres' => $id_genres,
            'id_edition' => $id_edition
        ]));
        
        $mangadata = [
            'titre' => $titre,
            'auteur' => $auteur,
            'image' => $image,
            'nb_tomes' => $nb_tomes,
            'id_genres' => $id_genres,
            'id_edition' => $id_edition,
            'publication' => $publication,
            'description' => $description,
        ];
        
        try {
            // Insérer le manga dans la base de données
            $mangamodel->insert($mangadata);
            
            // Log pour débogage
            log_message('debug', 'Manga inséré avec succès: ' . $mangamodel->getInsertID());
            
            // Ajouter un message de succès
            $session->setFlashdata('success', 'Manga ajouté avec succès!');
        } catch (\Exception $e) {
            // Log pour débogage
            log_message('error', 'Erreur lors de l\'insertion du manga: ' . $e->getMessage());
            
            // Ajouter un message d'erreur
            $session->setFlashdata('error', 'Erreur lors de l\'ajout du manga: ' . $e->getMessage());
        }
        
        // Rediriger vers le formulaire d'ajout
        return redirect()->to(base_url('Admin/addMangaForm'));
    }
   
    
    //fct delete
    public function deleteManga($id = null){
        $mangamodel = new \App\Models\MangasModel();
        $request = $this->request;
        $manga=$mangamodel->find($request->getPost('id'));
        $mangamodel->where('id', $request->getPost('id'))->delete();
        return $this->mangas();
        //return redirect()->to( base_url('Admin'));
    }
    
    public function deleteUser($id = null){
        $usersmodel = new \App\Models\UserModel();
        $request = $this->request;
        $user=$usersmodel->find($request->getPost('id'));
        $usersmodel->where('id', $request->getPost('id'))->delete();
        return $this->allUsers();
        //return redirect()->to( base_url('Admin'));
    }
    public function deleteHP($id = null){
        $hpmodel = new \App\Models\HelpPageModel();
        $request = $this->request;
        $hp=$hpmodel->find($request->getPost('id'));
        $hpmodel->where('id', $request->getPost('id'))->delete();
        return $this->hPAdmin();
        //return redirect()->to( base_url('Admin'));
    }


    //fonction update
    public function updateManga($id=null){
        $session = session();
        $request = $this->request;
        $mangamodel = new \App\Models\MangasModel();
        $mangadata=['id'=>$request->getPost('id'),
            'titre'=>$request->getPost('titre'),
            'auteur'=>$request->getPost('auteur'),
            'image'=>$request->getPost('image'),
            'nb_tomes'=>$request->getPost('nb_tomes'),
            'id_genres'=>$request->getPost('id_genres'),
            'id_edition'=>$request->getPost('id_edition'),
            'publication'=>$request->getPost('publication'),
            'description'=>$request->getPost('description')
            ];
                $mangamodel->where('id', $request->getPost('id'))->update($request->getPost('id'),$mangadata);
        return $this->mangas();
    }
    public function updateUser($id=null){
        $session = session();
        $request = $this->request;
        $usersmodel = new \App\Models\UserModel();
        $userdata=['id'=>$request->getPost('id'),
            'lastname'=>$request->getPost('lastname'),
            'firstname'=>$request->getPost('firstname'),
            'email'=>$request->getPost('email'),
            'id_role'=>$request->getPost('id_role'),
            ];
                $usersmodel->where('id', $request->getPost('id'))->update($request->getPost('id'),$userdata);
        return $this->allUsers();
    }
    
}

