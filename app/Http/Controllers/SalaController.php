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
        $sala = $this->repository
            ->orderBy('shopping_id')
            ->paginate();

        if(!$sala->items())
        {
            $sala = null;
        }

        return view('admin.Sala.index', compact('sala'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shopping = $this->shoppingRepository->all();

        return view('admin.Sala.create', compact('shopping'));
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

        $sala = $this->verifExistencia($data);

        if(!$sala)
        {
            $this->repository->create($data);

            echo json_encode(['status' => true]);
        }
        else{
            echo json_encode(['status' => false]);
        }
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

        return view('admin.Sala.edit', compact('sala', 'shopping'));
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

        $sala = $this->verifExistenciaUpdate($data, $id);

        if(!$sala)
        {
            $this->repository->update($data, $id);

            echo json_encode(['status' => true]);
        }
        else
        {
            echo json_encode(['status' => false]);
        }
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

        echo json_encode(['status' => true]);
    }


    public function ajaxSala($id)
    {
        $shopping = $this->shoppingRepository->find($id);

        $salas = $shopping->salas;

        echo json_encode($salas);
    }

    public function verifExistencia($data)
    {
        $shop = $this->shoppingRepository->all();

        $numero = $this->repository->findByField('shopping_id', $data['shopping_id']);

        $var = true;

        foreach ($numero as $n) {
            if ($data['numero'] == $n->numero) {
                $var = false;
            }
        }

        if (!$var) {
            return true;
        }

        return false;
    }

    public function verifExistenciaUpdate($data, $id)
    {
        $up = $this->repository->find($id);

        $numero = $this->repository->findByField('shopping_id', $data['shopping_id']);

        $var = true;

        if($up->numero == $data['numero'] && $up->shopping_id == $data['shopping_id'])
        {
            return false;
        }
        elseif($up->numero == $data['numero'] && $up->shopping_id != $data['shopping_id'])
        {
            return true;
        }
        else
        {
            foreach ($numero as $n) {
                if ($data['numero'] == $n->numero) {
                    $var = false;
                }
            }

            if (!$var) {
                return true;
            }
        }

        return false;
    }
}
