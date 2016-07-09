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

        return view('admin.estabelecimentos.index', compact('estab', 'i'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub = $this->subCategoriaRepository->all();

        return view('admin.estabelecimentos.create', compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\EstabelecimentosRequest $request)
    {

        $data = $request->all();//dd($data);

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


        return redirect()->route('admin.estabelecimentos.index');
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

        $this->repository->update($data, $id)->subCategoria()->detach();

        $this->repository->update($data, $id)->subCategoria()->saveMany($s);
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

        $_24h = 0;

        if($estab->_24h == 1)
        {
            $_24h = 1;
        }

        //dd($_24h);

        return view('admin.estabelecimentos.edit', compact('sub', 'estab', 'id', 'nome'));
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

        session(['nome' => $data['nome']]);

        $nomeEstab = $this->repository->find($id);

        if ($nomeEstab->nome == $data['nome'])
        {
            $this->show($id, $data);
        }

        else
        {
            $nome = $this->repository->all();
            $var = true;

            foreach($nome as $n)
            {
                if($data['nome'] == $n->nome)
                {
                    $var = false;
                }
            }

            if($var)
            {
                $this->show($id, $data);
            }
            else{
                return $this->edit($id);
            }
        }

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
        $estab = $this->repository->find($id);

        $estab->subCategoria()->detach();

        $this->repository->delete($id);

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
