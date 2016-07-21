<?php

namespace BuscaSorocaba\Http\Controllers;

use BuscaSorocaba\Models\Estabelecimentos;
use BuscaSorocaba\Models\Responsavel;
use BuscaSorocaba\Repositories\EstabelecimentosRepository;
use BuscaSorocaba\Repositories\ResponsavelRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;

class ResponsavelController extends Controller
{
    /**
     * @var ResponsavelRepository
     */
    private $repository;
    /**
     * @var EstabelecimentosRepository
     */
    private $estabelecimentosRepository;

    public function __construct(ResponsavelRepository $repository, EstabelecimentosRepository $estabelecimentosRepository)
    {
        $this->repository = $repository;
        $this->estabelecimentosRepository = $estabelecimentosRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resp = $this->repository->paginate();

        if(!$resp->items())
        {
            $resp = null;
        }

        return view('admin.Responsavel.index', compact('resp'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estab = $this->estabelecimentosRepository->all();

        return view('admin.Responsavel.create', compact('estab'));
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

        $estab = new Estabelecimentos([
            'estabelecimentos_id' => $data['estabelecimentos_id']
        ]);

        $this->repository->create($data);

        return redirect()->route('admin.responsavel.index');
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
        $resp = $this->repository->find($id);

        $estab = $this->estabelecimentosRepository->all();

        if($resp->estabelecimentos)
        {
            $nomeEstab = $resp->estabelecimentos->first();

            $id = $nomeEstab->id;

            $nome = $nomeEstab->nome;

            return view('admin.Responsavel.edit', compact('resp', 'estab', 'id', 'nome'));
        }

        $id = null;
        $nome = null;

        return view('admin.Responsavel.edit', compact('resp', 'estab', 'id', 'nome'));
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

        $this->repository->update($data, $id);

        return redirect()->route('admin.responsavel.index');
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
}
