<?php

namespace App\Http\Controllers;

use App\DAO\ServiceConnexion;
use App\Exceptions\MonException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ConnexionController extends Controller
{
    public function Connexion(Request $request) {
        try {
            $login = $request->input('Login');
            $password = $request->input('Password');
            $log = new ServiceConnexion();
            $visiteur = $log->InfoConnexion($login);
                if ($visiteur != null) {
                    if (Hash::check($password , $visiteur->pwd_visiteur)) {
                        Session::put('id' , $login);
                        return redirect('/');
                    }
                    else {
                        $erreur = "Mot de passe incorrect";
                        return view('vues.login' , compact("erreur"));
                    }
                }
                else {
                    $erreur = "Identifiant incorrect ou non existant";
                    return view('vues.login' , compact("erreur"));
                }
        }
        catch(MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function Deconnexion() {
        Session::forget('id');
        return redirect('/');
    }
}
