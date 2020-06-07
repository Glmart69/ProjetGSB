<?php

namespace App\Http\Controllers;

use App\DAO\ServiceMedicament;
use App\Exceptions\MonException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class MedicamentController extends Controller
{
    public function ListeMedicaments()
    {
        try {
            $med = new ServiceMedicament();
            $mesMedicaments = $med->InfoMedicament();
            return view('vues.Medicaments', compact('mesMedicaments'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function ApiListeMedicaments()
    {
        try {
            $JSON = file_get_contents("php://input");
            $data = json_decode($JSON);
            $nom = $data->lib_med;
            $nomFamille = $data->lib_fam;
            $reponse = array();
            $med = new ServiceMedicament();
            $mesMedicaments = $med->RechercheParNom($nom, $nomFamille);
            $reponse["message"] = 'OK';
            $reponse['data'] = $mesMedicaments;
            return $reponse;
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            $reponse["message"] = 'erreur';
            $reponse["erreur"] = $erreur;
            return $reponse;
        }
    }

    public function RechercheMedicament(Request $request)
    {
        try {
            $med = new ServiceMedicament();
            $nom = $request->input('nom');
            $nomFamille = $request->input('nomFamille');
            $mesMedicaments = $med->RechercheParNom($nom, $nomFamille);
            return view('vues.Medicaments', compact('mesMedicaments'));
        }
        catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function ApiRecupererNom($id)
    {
        try {

            $reponse = array();
            $nomMed = new ServiceMedicament();
            $mesNomMedicaments = $nomMed->NomMedicament($id);
            $reponse["message"] = 'OK';
            $reponse['data'] = $mesNomMedicaments;
            return $reponse;
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            $reponse["message"] = 'erreur';
            $reponse["erreur"] = $erreur;
            return $reponse;
        }
    }

}
