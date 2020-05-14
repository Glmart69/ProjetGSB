<?php

namespace App\Http\Controllers;

use App\DAO\ServiceFormulation;
use App\DAO\ServiceMedicament;
use App\Exceptions\MonException;
use Illuminate\Http\Request;

class FormulationController extends Controller
{
    public function AfficherFormulation($id)
    {
        try {
            $formulation = new ServiceFormulation();
            $medicament = new ServiceMedicament();
            $mesFormulations = $formulation->AfficherFormulation($id);
            $monMedicament = $medicament->NomMedicament($id);
            $tabId = array();
            foreach ($mesFormulations as $uneFormulation) {
                $tabId[] = $uneFormulation->id_presentation;
            }
            $autreFormulation = $formulation->AutreFormulation($tabId);
            return view('vues.Formulation', compact("mesFormulations","monMedicament", "autreFormulation", "id"));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function ModificationFormulation($id_medicament,$id_presentation)
    {
        try {
            $formulation = new ServiceFormulation();
            $maFormulation = $formulation->QteFormulation($id_medicament,$id_presentation);
            return view('vues.ModificationFormulation', compact("maFormulation", 'id_medicament' , 'id_presentation'));
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function ValideFormulation(Request $request)
    {
        try {
            $formulation = new ServiceFormulation();
            $id_medicament = $request->input('id_medicament');
            $id_formuler = $request->input('id_formuler');
            $qte_formuler = $request->input('qte');
            $formulation->ModifFormulation($id_medicament,$id_formuler,$qte_formuler);
            return redirect('/formulation/'.$id_medicament);

        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function AjouterFormulation(Request $request)
    {
        try {
            $formulation = new ServiceFormulation();
            $id_medicament = $request->input('id_medicament');
            $id_formuler = $request->input('tableauFormulation');
            $formulation->AjouterFormulation($id_medicament,$id_formuler);
            return redirect('/formulation/'.$id_medicament);

        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

    public function SupprimerFormulation($id_medicament,$id_presentation)
    {
        try {
            $formulation = new ServiceFormulation();
            $formulation->SupprimerFormulation($id_medicament,$id_presentation);
            return redirect('/formulation/'.$id_medicament);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }

}
