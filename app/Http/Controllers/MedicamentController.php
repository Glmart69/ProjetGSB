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
}
