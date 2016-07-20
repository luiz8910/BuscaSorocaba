<?php

namespace BuscaSorocaba\Http\Controllers;

use BuscaSorocaba\Repositories\ShoppingRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;

class ShoppingController extends Controller
{
    /**
     * @var ShoppingRepository
     */
    private $repository;

    public function __construct(ShoppingRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopping = $this->repository->paginate();

        if(!$shopping->items())
        {
            $shopping = null;
        }

        return view('admin.shopping.index', compact('shopping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shopping.create');
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

        $shop = $this->verifExistencia($data);

        if(!$shop)
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
        $shopping = $this->repository->find($id);

        return view('admin.shopping.edit', compact('shopping'));
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

        $shop = $this->verifExistenciaUpdate($data, $id);

        if(!$shop)
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

    public function verifExistencia($data)
    {
        $nome = $this->repository->all();
        $var = true;

        foreach ($nome as $n) {
            if ($data['nome'] == $n->nome) {
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

        $nome = $this->repository->all();
        $var = true;

        if($up->nome == $data['nome'])
        {
            return false;
        }
        else
        {
            foreach ($nome as $n) {
                if ($data['nome'] == $n->nome) {
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
