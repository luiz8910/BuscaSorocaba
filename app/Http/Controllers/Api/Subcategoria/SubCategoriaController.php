<?php

namespace BuscaSorocaba\Http\Controllers\Api\Subcategoria;

use BuscaSorocaba\Models\SubCategoria;
use BuscaSorocaba\Repositories\CategoriaRepository;
use BuscaSorocaba\Repositories\SubCategoriaRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        $s = DB::table('subcategorias')->where('categoria_id', 1)->get();

        return $s;
    }

    /**
     * Exibe os estabelecimentos 24h separados por subcategorias
     */
    public function vinteQuatro()
    {
        return DB::table('subcategorias')->where('_24h', 'on')->orderBy('nome')->get();
    }

    public function emergencia()
    {
        return DB::table('subcategorias')->where('emergencia', 'on')->orderBy('nome')->get();
    }
}
