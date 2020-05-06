<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategorieInterface;
use App\Http\Requests\CategorieEditRequest;
use App\Http\Requests\CategorieRequest;
use App\Model\Categorie;
use MercurySeries\Flashy\Flashy;

class CategorieController extends Controller
{
    private $categorie;
    public function __construct(CategorieInterface $categorieInterface)
    {
        $this->categorie = $categorieInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categorie->getPaginate(2);
        $links = $categories->render();
        return view('admin.categorie.index' , compact('categories' , 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieRequest $request)
    {
        $this->categorie->store(['libelle'=>$request->input('libelle')]);

        Flashy::message('categorie ajouté avec succés');
        return $this->index();
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
    public function edit(Categorie $categorie)
    {
        return view('admin.categorie.edit',compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieEditRequest $request, $id)
    {
        $this->categorie->update($id, $request->all());

        Flashy::message('categorie modifié avec succés');

        return redirect()->route('categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categorie->delete($id);

        Flashy::error('categorie supprimé avec succés');

        return redirect()->route('categorie.index');
    }
}
