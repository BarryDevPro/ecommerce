<?php

namespace App\Http\Controllers;

use App\Gestion\PhotoInterface;
use App\Http\Requests\ProduitRequest;
use App\Model\Categorie;
use App\Http\Repositories\ProduitInterface;
use App\Http\Requests\ProduitEditRequest;
use App\Model\Produit;
use MercurySeries\Flashy\Flashy;

class ProduitController extends Controller
{
    private $photo;
    private $repository;
    public function __construct(ProduitInterface  $produitInterface , PhotoInterface $photoInterface)
    {
        $this->repository = $produitInterface;
        $this->photo = $photoInterface;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = $this->repository->getPaginate(1);
        $links = $produits->render();
        return view('admin.produit.index' , compact('produits' , 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = Categorie::pluck('libelle','id');
        
        return view('admin.produit.create',['categories'=>$categorie]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitRequest $request)
    {
        $upload = $this->photo->upload($request->file('image'));
        $nom = $request->file('image')->getClientOriginalName();
        if ($upload) {
            $array = [
                'categories_id' => $request->get('categories_id'),'name'=>$request->get('name'),
                'quantite' => $request->get('quantite'),'prixUnitaire'=> $request->get('prixUnitaire'),
                'image' => $nom];

                $this->repository->store($array);

            Flashy::message('Produit ajouté avec succés');
        }else {
            Flashy::error('Photo non uploadé ');
            return redirect()->route('produit.create'); 
        }

        return redirect()->route('produit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::pluck('libelle','id');
       return view('admin.produit.edit', compact('produit','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitEditRequest $request, $id)
    {
        $upload = $this->photo->upload($request->file('image'));
        $nom = $request->file('image')->getClientOriginalName();
        if ($upload) {
            $array = [
                'categories_id' => $request->get('categories_id'),'name'=>$request->get('name'),
                'quantite' => $request->get('quantite'),'prixUnitaire'=> $request->get('prixUnitaire'),
                'image' => $nom];
            $this->repository->update($id ,$array);

            Flashy::message('Produit modifié avec succés');
        }else {
            Flashy::error('Photo non uploadé ');
            $categories = Categorie::pluck('libelle','id');
            $produit = $this->repository->findById($id);
            return view('admin.produit.edit', compact('produit','categories')); 
        }

        

        return redirect()->route('produit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        Flashy::error('Produit supprimé avec succés');

        return redirect()->route('produit.index');
    }
}
