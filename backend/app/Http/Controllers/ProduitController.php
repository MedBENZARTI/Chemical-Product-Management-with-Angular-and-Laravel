<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProduitRepositoryInterface;

class ProduitController extends Controller
{


    var $produitRepository;

    public function __construct(ProduitRepositoryInterface $produitRepository)
    {
        $this->produitRepository = $produitRepository;
    }

    public function validateRequest($request)
    {
        $request->validate([
            'Nom' => 'required|max:90',
            'StructureChimique' => 'required|max:60',
            'DateDeValidite' => 'required|max:20',
            'pH' => 'required|max:2',
            'ConditionsDeUilisations' => 'required|max:1000',
            'imageUrl' => 'required|max:255'


        ]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = $this->produitRepository->all();
        return response()->json($produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $validateData = $this->validateRequest($request);

        $produit = new Produit([
            "nom" => $request->get("nom"),
            'StructureChimique' => $request->get('StructureChimique'),
            'DateDeValidite' => $request->get('DateDeValidite'),
            'pH' => $request->get('pH'),
            'ConditionsDeUtilisations' => $request->get('ConditionsDeUtilisations'),
            'imageUrl' => $request->get('imageUrl')
        ]);
        $this->produitRepository->save($produit);
        return response()->json($produit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validateData = $this->validateRequest($request);

        $produit = new Produit([
            "nom" => $request->get("nom"),
            'StructureChimique' => $request->get('StructureChimique'),
            'DateDeValidite' => $request->get('DateDeValidite'),
            'pH' => $request->get('pH'),
            'ConditionsDeUtilisations' => $request->get('ConditionsDeUtilisations'),
            'imageUrl' => $request->get('imageUrl')
        ]);

        $this->produitRepository->update($produit);
        return response()->json($this->produitRepository->getById($request->get('id')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function delete($id)


    {
        if ($this->produitRepository->delete($id)) {
            return response()->json(["status" => 'deleted '], 200);
        }
        return response()->json(["status" => "error  "], 500);
    }

    /**recherche produit par id  */
    public function getProduit($id)
    {
        $produit = $this->produitRepository->getById($id);
        return response()->json($produit);
    }
}
