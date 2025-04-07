<?php namespace App\Controllers;

class Home extends BaseController
{
    //protected $session =session();
    public function index()
    {
        helper(["form", "url"]);
        $session =session();
        $data = [];
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM users');
            foreach ($query->GetResult() as $row){
                $data['userEmail'] = $row->email;
            }
            $db->close();
            $data['user']= "Nana";
    $mangamodel = new \App\Models\MangasModel();
    $mangas = $mangamodel->findAll();
    $data['mangas']=$mangas;
        return $this->welcome_message();;
    }
    public function welcome_message(){
    $session =session();
    $mangamodel = new \App\Models\MangasModel();
    $mangas = $mangamodel->findAll();
    $data['mangas']=$mangas;
    return view('welcome_message',$data);
}
    public function login()
    {
        $session = session();
        $request = $this->request;
        $user = \App\Models\Authenticator::authenticate($request->getPost('email'), $request->getPost('password'));
        
        // Vérifier si l'authentification a réussi
        if ($user) {
            // Ajouter information de débogage
            log_message('debug', 'Utilisateur trouvé: ' . json_encode($user));
            log_message('debug', 'Role: ' . json_encode($user->getRole()));
            
            $session->set('user', $user);
            
            // Vérifier que la session a bien été définie
            log_message('debug', 'Session après login: ' . json_encode(session()->get('user')));
            
            return redirect()->to(base_url());
        } else {
            // Ajouter un message d'erreur
            $session->setFlashdata('error', 'Email ou mot de passe incorrect');
            return redirect()->to(base_url());
        }
    }
    public function inscription(){
$request = $this->request;
$usermodel = new \App\Models\UserModel();
$data =$usermodel;
$passwordHashed = password_hash($request->getPost('password'), PASSWORD_BCRYPT);
$added=$data->insert(['lastname'=> $request->getPost('lastname'),
'firstname'=> $request->getPost('firstname'),
'email'=> $request->getPost('email'),
'password'=>$passwordHashed,
'id_role'=>1
        ]);
if($added){
    return redirect()->to('Home/inscriptionErreurOuNon')->with('success',"Yeaaah! Le compte a bien été créé");
}else{
    return redirect()->to('Home/inscriptionErreurOuNon')->with('errors',$data->errors());
}
//$usermodel->insert($userdata);
//return $this->index();
}
public function inscriptionErreurOuNon(){
    return view('inscriptionErreurOuNon');
}
public function logout(){
    $session = session();
    // Ne pas utiliser session_unset() car ce n'est pas compatible avec le système de session de CodeIgniter
    $session->remove('user');
    $session->destroy();
    return redirect()->to(base_url());
}
//helppage
public function helpPageForm(){
    $session = session();
    return view ('helpPage');
}
public function helpPage(){    
    $session = session();
        $request = $this->request;
        $hpmodel = new \App\Models\HelpPageModel();
        $email = 'default';
if(null != $request->getPost('email')){
   $email = $request->getPost('email');
}
$sujet = 'default';
if(null != $request->getPost('sujet')){
   $sujet = $request->getPost('sujet');
}
$requete = 'default';
if(null != $request->getPost('requete')){
   $requete = $request->getPost('requete');
}
        $hpdata=['email'=>$email,
            'sujet'=>$sujet,
            'requete'=>$requete,
            ];
        $hpmodel->insert($hpdata);
return view ('merciHP',$hpdata);   
}

public function merciHP(){
    $session =session();
    return view ('merciHP');
}
//fonction searchbar
public function searchManga(){
    
$session =session();
$k =$this->request->getVar('k');
    $mangamodel = new \App\Models\MangasModel();
    $bt = $mangamodel->where("titre like '".$k . "%'")->findAll();
    
    $data['bt']= $bt;
    return view ('bt', $data);
}

public function chaqueManga($id){
    $session =session();
    $user =session('user');
    $mangamodel = new \App\Models\MangasModel();
    $mangas = $mangamodel->find($id);
    $data['mangas']=$mangas;
    $data['user']=$user;
        return view('chaqueManga',$data);
}

//differents onglets
public function nouveautés(){           
    $session =session();
     $mangamodel = new \App\Models\MangasModel();
    $mangas = $mangamodel->find([5,4,24,21,8,23]);
    $data['mangas']=$mangas;
  return view('nouveautés',$data);
}
public function recommandation(){
    $session =session();
    $mangamodel = new \App\Models\MangasModel();
    $mangas = $mangamodel->find([9,1,2,21,4,5,7,25,6,12,28,20]);
    $data['mangas']=$mangas;
        return view('recommandation',$data);
   
}
public function eachManga($id){
    $session =session();
    $user =session('user');
    $mangamodel = new \App\Models\MangasModel();
    $mangas = $mangamodel->find($id);
    $data['mangas']=$mangas;
    $data['user']=$user;
        return view('eachManga',$data);
}

public function genres(){
    $session =session();
    
    
    $genresmodel = new \App\Models\GenresModel();
    $genres = $genresmodel->findAll();
   
   $data['genres']=$genres; 
   return view('genres',$data); 
     
}

public function editions(){
    $session =session();
    $editionsmodel = new \App\Models\EditionsModel();
    $editions = $editionsmodel->findAll();
    $data['editions']=$editions; 
   return view('editions',$data); 
    
}


//collection
public function envoyerCollection($id_mangas){
    $session = session();
    $user = $session->get('user');
    
    if (!$user) {
        return redirect()->to(base_url());
    }
    
    $ecmodel = new \App\Models\CollectionModel();
    $data = [
        'id_users' => $user->id,
        'id_mangas' => $id_mangas,
    ];
    $ecmodel->insert($data);
    return $this->welcome_message();
}


public function maCollection(){
    $session = session();
    $user = $session->get('user');
    
    if ($user != NULL) {
        $collection = $user->getCollection();
    } else {
        $collectionmodel = new \App\Models\CollectionModel();
        $collection = $collectionmodel->findAll();
    }
    $data['collection'] = $collection; 
    return view('maCollection', $data);
}

//envies
public function envoyerEnvies($id_mangas){
    $session = session();
    $user = $session->get('user');
    
    if (!$user) {
        return redirect()->to(base_url());
    }
    
    $eemodel = new \App\Models\EnviesModel();
    $data = [
        'id_users' => $user->id,
        'id_mangas' => $id_mangas,
    ];
    $eemodel->insert($data);
    return $this->welcome_message();
}


public function mesEnvies(){
    $session = session();
    $user = $session->get('user');
    
    if ($user != NULL) {
        $envie = $user->getEnvies();
    } else {
        $enviesmodel = new \App\Models\EnviesModel();
        $envie = $enviesmodel->findAll();
    }
    $data['envie'] = $envie; 
    return view('mesEnvies', $data);
}

//profil


public function monProfil(){
        $session = session();
        
        return view('monProfil');
}

public function changeAvatar(){
    $session = session();
    $user = $session->get('user');
    
    if (!$user) {
        return redirect()->to(base_url());
    }
    
    $file = $this->request->getFile('userfile');
    if ($file->isValid() && !$file->hasMoved()) {
        $name = $file->getRandomName();
        
    try{
        $file->move('./assets/uploads/',$name);
    }
    catch(Exception $ex){
        echo $ex;
    }
        $usermodel= new \App\Models\UserModel();
        $userdb = $usermodel->find($user->id);
        $updated = ['avatar'=>$name];
        $usermodel->update($userdb->id, $updated);
        
        // Récupérer l'utilisateur mis à jour et mettre à jour la session
        $user = $usermodel->find($user->id);
        $session->set('user',$user);
        return $this->monProfil();
    }
    
    // Si aucun fichier n'a été téléchargé ou s'il y a eu une erreur
    return redirect()->to(base_url('Home/monProfil'));
}

public function update($id = null)
    {
        $session = session();
        $user =session('user');
        $request = $this->request;
        $usermodel = new \App\Models\UserModel();
        $userdata = [
            'id' => $request->getPost('id'),
            'firstname' => $request->getPost('firstname'),
            'lastname' => $request->getPost('lastname'),
            'email' => $request->getPost('email'),
        ];
        $usermodel->where('id', $request->getPost('id'))->update($request->getPost('id'), $userdata);
        unset($_SESSION['user']);
        $user = $usermodel->find($user->id);
        $session->set('user',$user);
        return $this->monProfil();
    }
    
    
    public function users()
    {
        $usermodel = new \App\Models\UserModel();
        $userArray = $usermodel->findAll();
        $data['users'] = $userArray;
        return view('users',$data);
    }
}
