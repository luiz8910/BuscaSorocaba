<?php

namespace BuscaSorocaba\Http\Controllers;

use BuscaSorocaba\Repositories\FilmeRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    /**
     * @var FilmeRepository
     */
    private $repository;

    public function __construct(FilmeRepository $repository)
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
        $filme = $this->repository->paginate();

        if (!$filme->items()) {
            $filme = null;
        }

        return view('admin.Filme.index', compact('filme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Filme.create');
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

        $filme = $this->verifExistencia($data);

        if (!$filme) {
            $this->repository->create($data);

            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todos = $this->repository->all();
        $filme = $this->repository->find($id);

        return view('admin.Filme.edit', compact('filme', 'todos'));
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

        $filme = $this->verifExistenciaUpdate($data, $id);

        if (!$filme) {
            $this->repository->update($data, $id);

            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filme = $this->repository->find($id);

        if (file_exists(public_path()."uploads/" . $filme->img)) {
            unlink('uploads/'.$filme->img);
        }

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

        if ($up->nome == $data['nome']) {
            return false;
        } else {
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

    public function createImage($id)
    {
        $filme = $this->repository->find($id);

        return view('admin.Filme.createImages', compact('filme'));
    }

    public function uploadImage(Request $request, $id)
    {
        $file = $request->file('img');
        $nome = $this->repository->find($id)->nome;
        $ext = $file->getClientOriginalExtension();

        $fullName = $id.'-'.$nome.'.'.$ext;

        DB::table('filmes')
            ->where('id', $id)
            ->update(['img' => $fullName]);


        $request->file('img')->move('uploads', $fullName);

        return redirect()->route('admin.filme.index');
    }

}