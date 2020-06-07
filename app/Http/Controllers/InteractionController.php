<?php


namespace App\Http\Controllers;
use App\DAO\ServiceInteraction;
use App\DAO\ServiceMedicament;
use App\Exceptions\MonException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class InteractionController extends Controller
{
    public function ApiListeInteractions(Request $request)
    {
        try {
            $id = $request->input('id');
            $reponse = array();
            $int = new ServiceInteraction();
            $mesMedicaments = $int->RechercheParId($id);
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

    public function ApiSuppression($id, $idSecMed)
    {
        try{
            $reponse = array();
            $interaction = new ServiceInteraction();
            $interaction->SupprimerInteraction($id,$idSecMed);
            $reponse["message"] = 'OK';
            return $reponse;
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            $reponse["message"] = 'erreur';
            $reponse["erreur"] = $erreur;
            return $reponse;
        }
    }

    public function ApiListMedNonAjout(Request $request)
    {
        try{
            $id = $request->input('id');
            $reponse = array();
            $interaction = new ServiceInteraction();
            $lesMedicaments = $interaction->RechercheParId($id);
            $listeId = array();
            foreach ($lesMedicaments as $unMedicament)
            {
                $listeId[] = $unMedicament->med_id_medicament;
            }
            $lesMedicaments = $interaction->ListMedNonAjout($listeId);
            $reponse["message"] = 'OK';
            $reponse["data"] = $lesMedicaments;
            return $reponse;
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            $reponse["message"] = 'erreur';
            $reponse["erreur"] = $erreur;
            return $reponse;
        }
    }

    public function ApiAjoutInteraction($id, $idSecMed)
    {
        try{
            $reponse = array();
            $interaction = new ServiceInteraction();
            $interaction->ajoutInteraction($id, $idSecMed);
            $reponse["message"] = 'OK';
            return $reponse;
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            $reponse["message"] = 'erreur';
            $reponse["erreur"] = $erreur;
            return $reponse;
        }
    }


}
