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
            $form = $formulation->AfficherFormulation($id);
            return view('vues.Formulation');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view("vues.erreur", compact('erreur'));
        }
    }
}
