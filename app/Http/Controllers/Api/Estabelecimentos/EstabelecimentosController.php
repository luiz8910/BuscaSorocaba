<?php

namespace BuscaSorocaba\Http\Controllers\Api\Estabelecimentos;

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
    public function index($id)
    {
        $sub = $this->subCategoriaRepository->find($id);
        $estab = $sub->estabelecimentos->all();

        return $estab;
    }

    /**
     * Exibe os estabelecimentos 24h separados por subcategorias
     * @param $id
     */
    public function vinteQuatro($id)
    {
        $sub = $this->subCategoriaRepository->find($id);
        $estab = $sub->estabelecimentos->all();
        $_24h = [];

        foreach ($estab as $item)
        {
            if($item->_24h == 'on')
            {
                array_push($_24h, $item);
            }
        }

        $_24h = array_unique($_24h);

        return $_24h;
    }

    /**
     * Exibe os estabelecimentos 24h separados por subcategorias
     * @param $id
     */
    public function emergencia($id)
    {
        $sub = $this->subCategoriaRepository->find($id);
        $estab = $sub->estabelecimentos->all();
        $emergencia = [];

        foreach ($estab as $item)
        {
            if($item->emergencia == 'on')
            {
                array_push($emergencia, $item);
            }
        }

        $emergencia = array_unique($emergencia);

        return $emergencia;
    }

    /**
     *
     * @param  int $i
     * @param Request $data
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estab = $this->repository->find($id);

        return $estab;
    }
}
