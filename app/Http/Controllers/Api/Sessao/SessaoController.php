<?php

namespace BuscaSorocaba\Http\Controllers\Api\Sessao;

use BuscaSorocaba\Models\Filme;
use BuscaSorocaba\Models\Sala;
use BuscaSorocaba\Models\Shopping;
use BuscaSorocaba\Repositories\FilmeRepository;
use BuscaSorocaba\Repositories\SalaRepository;
use BuscaSorocaba\Repositories\SessaoRepository;
use BuscaSorocaba\Repositories\ShoppingRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SessaoController extends Controller
{
    /**
     * @var SessaoRepository
     */
    private $repository;
    /**
     * @var ShoppingRepository
     */
    private $shoppingRepository;
    /**
     * @var SalaRepository
     */
    private $salaRepository;
    /**
     * @var FilmeRepository
     */
    private $filmeRepository;

    public function __construct(SessaoRepository $repository, ShoppingRepository $shoppingRepository, SalaRepository $salaRepository, FilmeRepository $filmeRepository)
    {
        $this->repository = $repository;
        $this->shoppingRepository = $shoppingRepository;
        $this->salaRepository = $salaRepository;
        $this->filmeRepository = $filmeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessao = DB::table('filme_sala')
            ->where('filme_id', '=', 1)
            ->get();

        return $sessao;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filme = $this->filmeRepository->all();
        $shopping = $this->shoppingRepository->all();

        return view('admin.Sessao.create', compact('filme', 'shopping'));
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

        $filme = new Filme([
           'filme_id' => $data['filme_id']
        ]);

        $sala = new Sala([
           'salas_id' => $data['salas_id']
        ]);

        $this->repository->create($data);

        return redirect()->route('admin.sessao.index');
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
        $sessao = $this->repository->find($id);

        $filme = $this->filmeRepository->all();
        $shopping = $this->shoppingRepository->all();
        $salas = $this->salaRepository->findWhere(['shopping_id' => $sessao->salas->shopping->id]);

        return view('admin.Sessao.edit', compact('sessao', 'filme', 'shopping', 'salas'));
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

        $filme = new Filme([
            'filme_id' => $data['filme_id']
        ]);

        $sala = new Sala([
            'salas_id' => $data['salas_id']
        ]);

        $this->repository->update($data, $id);

        return redirect()->route('admin.sessao.index');
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

        return redirect()->route('admin.sessao.index');
    }

    /**
     * @param $id -- Id do Shopping
     */
    public function exibirSalasShoppings($id)
    {
        $shopping = $this->shoppingRepository->find($id);

        $salas = $shopping->salas->all();

        echo json_encode($salas);
    }
}
