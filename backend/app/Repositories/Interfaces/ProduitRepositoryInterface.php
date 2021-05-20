<?php
namespace App\Repositories\Interfaces;
use App\Models\Produit;


interface ProduitRepositoryInterface {

    public function all();
    public function getById(int $id);
    public function save(Produit $produit);
    public function update(Produit $produit);
    public function delete(int $id);
}

?>
