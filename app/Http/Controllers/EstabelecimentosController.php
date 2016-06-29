<?php

namespace BuscaSorocaba\Http\Controllers;

use BuscaSorocaba\Models\Estabelecimentos;
use BuscaSorocaba\Repositories\EstabelecimentosRepository;
use BuscaSorocaba\Repositories\SubCategoriaRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EstabelecimentosController extends Controller
{
    /**
     * @var EstabelecimentosRepository
     */
    private $repository;
    /**
     * @var SubCategoriaRepository
     */
    private $subCategoriaRepository;

    public function __construct(EstabelecimentosRepository $repository, SubCategoriaRepository $subCategoriaRepository)
    {
        $this->repository = $repository;
        $this->subCategoriaRepository = $subCategoriaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estab = $this->repository->paginate();

        if (!$estab->items()) {
            $estab = false;
        }

        return view('admin.estabelecimentos.index', compact('estab'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = $this->subCategoriaRepository->lists('nome', 'id');

        return view('admin.estabelecimentos.create', compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $sub = $this->subCategoriaRepository->find($data['subcategorias_id']);
        $sub2 = $this->subCategoriaRepository->find($data['subcategorias_id_2']);

        $s = array($sub, $sub2);

        $this->repository->create($data)->subCategoria()->saveMany($s);

        return redirect()->route('admin.estabelecimentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = $this->subCategoriaRepository->lists('nome', 'id');
        $estab = $this->repository->find($id);

        return view('admin.estabelecimentos.edit', compact('sub', 'estab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->repository->update($data, $id);

        $estab = $this->repository->find($id);

        $estab->subCategoria()->attach([1, 2]);

        return redirect()->route('admin.estabelecimentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('admin.estabelecimentos.index');
    }
}
