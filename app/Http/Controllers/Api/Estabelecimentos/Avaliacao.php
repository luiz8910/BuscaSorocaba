<?php

namespace BuscaSorocaba\Http\Controllers\Api\Estabelecimentos;

use BuscaSorocaba\Models\Estabelecimentos;
use BuscaSorocaba\Repositories\AvaliacaoRepository;
use BuscaSorocaba\Repositories\EstabelecimentosRepository;
use Illuminate\Http\Request;

use BuscaSorocaba\Http\Requests;
use BuscaSorocaba\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Avaliacao extends Controller
{
    /**
     * @var AvaliacaoRepository
     */
    private $repository;
    /**
     * @var EstabelecimentosRepository
     */
    private $estabelecimentosRepository;

    public function __construct(AvaliacaoRepository $repository, EstabelecimentosRepository $estabelecimentosRepository)
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $avaliacao = DB::table('avaliacaos')
            ->where('estabelecimentos_id', $id)
            ->count();

        if($avaliacao > 0)
        {
            $request['estrela_5'] = true;

            if($request['estrela_5'])
            {
                DB::table('avaliacaos')
                    ->where('estabelecimentos_id', $id)
                    ->increment('estrela_5');
            }

            $estrela_1 = DB::table('avaliacaos')
                ->where('estabelecimentos_id', $id)
                ->value('estrela_1');

            $estrela_2 = DB::table('avaliacaos')
                ->where('estabelecimentos_id', $id)
                ->value('estrela_2');

            $estrela_3 = DB::table('avaliacaos')
                ->where('estabelecimentos_id', $id)
                ->value('estrela_3');

            $estrela_4 = DB::table('avaliacaos')
                ->where('estabelecimentos_id', $id)
                ->value('estrela_4');

            $estrela_5 = DB::table('avaliacaos')
                ->where('estabelecimentos_id', $id)
                ->value('estrela_5');

            $total = $estrela_1 + $estrela_2 + $estrela_3 + $estrela_4 + $estrela_5;

            if($total > 5)
            {
                $pontuacao = ($estrela_1 * 1) + ($estrela_2 * 2) + ($estrela_3 * 3) + ($estrela_4 * 4) + ($estrela_5 * 5);

                $pontuacao = $pontuacao / $total;

                return $pontuacao . ' pontuação';
            }

        }
        else
        {
            DB::table('avaliacaos')
                ->insert([
                    'estabelecimentos_id' => $id, 'estrela_5' => 1
                ]);
        }

        $total = DB::table('avaliacaos')->where('estabelecimentos_id', $id)->count();

        return $total;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
