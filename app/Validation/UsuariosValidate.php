<?php
namespace App\Validation;
use App\Models\UsuariosModel;
class UsuariosValidate
{
    private $usuariosModel;

    public function __construct()
    {
        $this->usuariosModel = new UsuariosModel();
    }

    public function validationUser($nombre)
    {
        $user = $this->usuariosModel->find_by_name($nombre);
        return ($user !== null);
    }

    public function validationPassword($password){
        
        $users = $this->usuariosModel->findAll();
        $valid = false;
        foreach($users as $user){
            if(password_verify($password, $user['contrasenia'])){
                $valid = true;
            }
        }
        return $valid;
    }
}