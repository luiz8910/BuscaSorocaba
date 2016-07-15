<?php

namespace BuscaSorocaba\Http\Controllers;

use BuscaSorocaba\Models\Shopping;
use BuscaSorocaba\Repositories\FilmeRepository;
use BuscaSorocaba\Repositories\SalaRepository;
use BuscaSorocaba\Repositories\ShoppingRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;

class SalaController extends Controller
{
    /**
     * @var SalaRepository
     */
    private $repository;
    /**
     * @var ShoppingRepository
     */
    private $shoppingRepository;
    /**
     * @var FilmeRepository
     */
    private $filmeRepository;

    public function __construct(SalaRepository $repository, ShoppingRepository $shoppingRepository, FilmeRepository $filmeRepository)
    {

        $this->repository = $repository;
        $this->shoppingRepository = $shoppingRepository;
        $this->filmeRepository = $filmeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sala = $this->repository->paginate();

        if(!$sala->items())
        {
            $sala = null;
        }

        return view('admin.sala.index', compact('sala'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shopping = $this->shoppingRepository->all();

        return view('admin.sala.create', compact('shopping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $shopping = new Shopping([
            'shopping_id' => $data['shopping_id']
        ]);

        $this->repository->create($data);

        return redirect()->route('admin.sala.index');
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
    public function edit($id)
    {
        $shopping = $this->shoppingRepository->all();

        $sala = $this->repository->find($id);

        return view('admin.sala.edit', compact('sala', 'shopping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $shopping = new Shopping([
            'shopping_id' => $data['shopping_id']
        ]);

        $this->repository->update($data, $id);

        return redirect()->route('admin.sala.index');
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

        return redirect()->route('admin.sala.index');
    }


    public function ajaxSala($id)
    {
        $shopping = $this->shoppingRepository->find($id);

        $salas = $shopping->salas;

        echo json_encode($salas);
    }
}
