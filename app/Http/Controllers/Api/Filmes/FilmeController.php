<?php

namespace BuscaSorocaba\Http\Controllers\Api\Filmes;

use BuscaSorocaba\Models\Estabelecimentos;
use BuscaSorocaba\Repositories\EstabelecimentosRepository;
use BuscaSorocaba\Repositories\FilmeRepository;
use BuscaSorocaba\Repositories\ShoppingRepository;
use BuscaSorocaba\Repositories\SubCategoriaRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mockery\CountValidator\Exception;
use Symfony\Component\HttpFoundation\Response;

class FilmeController extends Controller
{
    /**
     * @var FilmeRepository
     */
    private $repository;
    /**
     * @var ShoppingRepository
     */
    private $shoppingRepository;

    public function __construct(FilmeRepository $repository, ShoppingRepository $shoppingRepository)
    {
        $this->repository = $repository;
        $this->shoppingRepository = $shoppingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
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

    public function shoppings()
    {
        return $this->shoppingRepository->all();
    }
}
