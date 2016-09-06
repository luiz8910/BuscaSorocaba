<?php

namespace BuscaSorocaba\Http\Controllers;

use BuscaSorocaba\Models\Estabelecimentos;
use BuscaSorocaba\Repositories\EstabelecimentosRepository;
use BuscaSorocaba\Repositories\SubCategoriaRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mockery\CountValidator\Exception;
use Symfony\Component\HttpFoundation\Response;

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
        $estab = $this->repository->paginate(5);

        if (!$estab->items())
        {
            $estab = false;
        }

        $i = 0;

        return view('admin.Estabelecimentos.index', compact('estab', 'i'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = $this->subCategoriaRepository->orderBy('nome')->all();

        return view('admin.Estabelecimentos.create', compact('sub'));
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

        $estab = $this->verifExistencia($data);

        if(!$estab)
        {
            $sub = $this->subCategoriaRepository->find($data['subcategorias_id']);

            $s = array($sub);

            if($data['subcategorias_id_2'])
            {
                $sub2 = $this->subCategoriaRepository->find($data['subcategorias_id_2']);
                array_push($s, $sub2);
            }

            if($data['subcategorias_id_3'])
            {
                $sub3 = $this->subCategoriaRepository->find($data['subcategorias_id_3']);
                array_push($s, $sub3);
            }

            if($data['subcategorias_id_4'])
            {
                $sub4 = $this->subCategoriaRepository->find($data['subcategorias_id_4']);
                array_push($s, $sub4);
            }

            if($data['subcategorias_id_5'])
            {
                $sub5 = $this->subCategoriaRepository->find($data['subcategorias_id_5']);
                array_push($s, $sub5);
            }

            $s = array_unique($s);

            $this->repository->create($request->all())->subCategoria()->saveMany($s);

            echo json_encode(['status' => true]);
            //return redirect()->route('admin.estabelecimentos.index');
        }

        else
        {
            echo json_encode(['status' => false]);
        }


    }

    /**
     * Realiza as respectivas atualizações com relacionamentos.
     * Continuação do update
     *
     * @param  int $i
     * @param Request $data
     * @return \Illuminate\Http\Response
     */
    public function show($id, $data)
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
        $estab = $this->repository->find($id);

        if(count($estab->subCategoria) > 0)
        {
            $idCat = $estab->subCategoria->first()->categoria_id;

            $sub = $this->subCategoriaRepository->findWhere(['categoria_id' => $idCat]);

            $subcat = $estab->subCategoria->all();

            $id = array();
            $nome = array();

            foreach($subcat as $s)
            {
                array_push($id, $s->id);
                array_push($nome, $s->nome);
            }

            return view('admin.Estabelecimentos.edit', compact('sub', 'estab', 'id', 'nome'));
        }

        else
        {
            $id = null;
            $nome = null;
            $sub = $this->subCategoriaRepository->all();

            return view('admin.Estabelecimentos.edit', compact('sub', 'estab', 'id', 'nome'));
        }


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

        $estab = $this->verifExistenciaUpdate($data, $id);

        if(!$estab)
        {
            $sub = $this->subCategoriaRepository->find($data['subcategorias_id']);

            $s = array($sub);

            if($data['subcategorias_id_2'])
            {
                $sub2 = $this->subCategoriaRepository->find($data['subcategorias_id_2']);
                array_push($s, $sub2);
            }

            if($data['subcategorias_id_3'])
            {
                $sub3 = $this->subCategoriaRepository->find($data['subcategorias_id_3']);
                array_push($s, $sub3);
            }

            if($data['subcategorias_id_4'])
            {
                $sub4 = $this->subCategoriaRepository->find($data['subcategorias_id_4']);
                array_push($s, $sub4);
            }

            if($data['subcategorias_id_5'])
            {
                $sub5 = $this->subCategoriaRepository->find($data['subcategorias_id_5']);
                array_push($s, $sub5);
            }

            if(!isset($data['_24h']))
            {
                $data['_24h'] = 0;
            }

            if(!isset($data['emergencia']))
            {
                $data['emergencia'] = 0;
            }

            $s = array_unique($s);

            $this->repository->update($data, $id)->subCategoria()->detach();

            $this->repository->update($data, $id)->subCategoria()->saveMany($s);

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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estab = $this->repository->find($id);

        $estab->subCategoria()->detach();

        $this->repository->delete($id);

        echo json_encode(['status' => true]);
    }

    public function VerifExistencia($data)
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

    public function createImage($id)
    {
        $estabelecimento = $this->repository->find($id);

        return view('admin.Estabelecimentos.createImages', compact('estabelecimento'));
    }

    public function uploadImage(Request $request, $id)
    {
        $file = $request->file('img');
        $nome = $this->repository->find($id)->nome;
        $ext = $file->getClientOriginalExtension();

        $fullName = $id.'-'.$nome.'.'.$ext;

        DB::table('estabelecimentos')
            ->where('id', $id)
            ->update(['img' => $fullName]);


        $request->file('img')->move('uploads', $fullName);

        return redirect()->route('admin.estabelecimentos.index');
    }

    public function ajax(Request $request)
    {

        $data = $request->all();

        if($data['name'] == '')
        {
            echo json_encode(['status' => false, 'msg' => 'Fill in a name']);exit;
        }

        if($data['email'] == '')
        {
            echo json_encode(['status' => false, 'msg' => 'Fill in a email']);exit;
        }

        if($data['tel'] == '')
        {
            echo json_encode(['status' => false, 'msg' => 'Fill in a telephone']);exit;
        }

        $id = DB::table('ajax')->insertGetId(
            ['name' => $data['name'], 'email' => $data['email'], 'tel' => $data['tel']]
        );

        $data['id'] = $id;

        echo json_encode(['status' => true, 'msg' => 'Success id = ' . $id, 'contacts' => $data]);exit;


    }

    public function ajaxSelect()
    {
        $ajax = DB::table('ajax')
            ->orderBy('id', 'desc')
            ->get();
        echo json_encode($ajax);
    }

    public function email()
    {
        $data = ['teste'];

        Mail::send('welcome', $data, function($message){
            $message->from('luiz.sanches8910@gmail.com', 'Teste');
            $message->to('')->subject('Welcome to the Laravel 5 App!');
        });
    }
}
