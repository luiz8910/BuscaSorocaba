<?php

namespace BuscaSorocaba\Http\Controllers;

use BuscaSorocaba\Models\SubCategoria;
use BuscaSorocaba\Repositories\CategoriaRepository;
use BuscaSorocaba\Repositories\SubCategoriaRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;

class SubCategoriaController extends Controller
{
    /**
     * @var SubCategoriaRepository
     */
    private $repository;
    /**
     * @var CategoriaRepository
     */
    private $categoriaRepository;

    public function __construct(SubCategoriaRepository $repository, CategoriaRepository $categoriaRepository)
    {
        $this->repository = $repository;
        $this->categoriaRepository = $categoriaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = $this->repository->paginate();

        if(!$sub->items())
            $sub = false;

        return view('admin.subcategoria.index', compact('sub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = $this->categoriaRepository->lists('nome', 'id');

        return view('admin.subcategoria.create', compact('categoria'));
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

        $sub = new SubCategoria([
            'categoria_id' => $data['categoria_id']
        ]);

        $cat = $this->verifExistencia($data);

        if (!$cat)
        {
            $this->repository->create($data);
            echo json_encode(['status' => true]);

        } else {
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
        $sub = $this->repository->find($id);
        $categoria = $this->categoriaRepository->lists('nome', 'id');

        return view('admin.subcategoria.edit', compact('sub', 'categoria'));
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

        $sub = new SubCategoria([
            'categoria_id' => $data['categoria_id']
        ]);

        $cat = $this->verifExistenciaUpdate($data, $id);

        if (!$cat)
        {
            $this->repository->update($data, $id);
            echo json_encode(['status' => true]);

        } else {
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

        echo json_encode(['status' => 'false']);

        //return redirect()->route('admin.subcategoria.index');
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
