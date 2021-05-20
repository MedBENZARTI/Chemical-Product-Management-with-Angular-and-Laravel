<?php
namespace App\Repositories\Eloquent;

use App\Models\Produit;
use App\Repositories\Interfaces\ProduitRepositoryInterface;
class EloquentProduitRepository implements ProduitRepositoryInterface {

    public function all(){
        return Produit ::all();
    }

    public function getById(int $id){
        return Produit ::where('id',$id)->first();
    }

    public function save(Produit $produit){
        return $produit->save();
    }

    public function update(Produit $produit)
    {return Produit ::find($produit->get('id'))
        ->update([
            'nom'=>$produit->get('nom'),
            'StructureChimique'=>$produit->get('StructureChimique'),
            'DateDeValidite'=>$produit->get('DateDeValidte'),
            'pH'=>$produit->get('pH'),
            'CondtitionsDeUtilisations'=>$produit->get('ConditionsDeUtilisations'),
            'imageUrl' => $produit->get('imageUrl')
        ]);


    }
    public function delete(int $id)
        {
            return Produit::where('id',$id)->delete();

        }

}
