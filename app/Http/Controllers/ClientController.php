<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ClientInterface;
use App\Http\Requests\ClientEditRequest;
use App\Http\Requests\ClientRequest;
use App\Model\Client;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class ClientController extends Controller
{
    private $repository;
    public function __construct(ClientInterface $clientInterface){
        $this->repository = $clientInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->repository->getPaginate(1);
        $links = $clients->render();
        return view('admin.client.index' , compact('clients' , 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $this->repository->store($request->all());

        Flashy::message('client ajouté avec succés');

        return redirect()->route('client.index');
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
    public function edit(Client $client)
    {
        return view('admin.client.edit' , compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientEditRequest $request, $id)
    {
        $this->repository->update($id , $request->all());

        Flashy::message('client modifié avec succés');

        return redirect()->route('client.index');
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

        Flashy::message('client supprimer avec succés');

        return redirect()->route('client.index');
    }
}
