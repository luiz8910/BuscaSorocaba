<?php

namespace BuscaSorocaba\Http\Controllers\Api\AutoComplete;

use BuscaSorocaba\Repositories\EstabelecimentosRepository;
use BuscaSorocaba\Repositories\SubCategoriaRepository;
use Illuminate\Http\Request;
use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AutoCompleteController extends Controller
{
    /**
     * @var EstabelecimentosRepository
     */
    private $estabelecimentosRepository;
    /**
     * @var SubCategoriaRepository
     */
    private $subCategoriaRepository;

    public function __construct(EstabelecimentosRepository $estabelecimentosRepository, SubCategoriaRepository $subCategoriaRepository)
    {
        $this->estabelecimentosRepository = $estabelecimentosRepository;
        $this->subCategoriaRepository = $subCategoriaRepository;
    }

    public function search($input)
    {
        $result = [];

        $sub = DB::table('subcategorias')
            ->where('nome', 'like', $input . '%')
            ->get();

        $estab = DB::table('estabelecimentos')
            ->where('nome', 'like', $input . '%')
            ->get();


        foreach ($sub as $item) {
            $result[] = $item->nome;
        }

        foreach ($estab as $item) {
            $result[] = $item->nome;
        }

        sort($result);

        return $result;
    }

    public function result($input)
    {
        $estab = DB::table('estabelecimentos')
            ->where('nome', $input)
            ->get();


        if(count($estab) > 0)
        {
            return $estab;
        }
        else{
            $id = DB::table('subcategorias')
                ->where('nome', $input)
                ->value('id');

            $sub = $this->subCategoriaRepository->find($id);

            return $sub->estabelecimentos->all();
        }
    }
}