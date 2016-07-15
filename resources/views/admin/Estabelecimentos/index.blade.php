@extends('app')

@section('content')

    <h3>Estabelecimentos</h3>
    <a href="{{ route('admin.estabelecimentos.create') }}" class="btn btn-default">Novo Estabelecimento</a>
    @if(!$estab)
        {{ 'Não há dados a serem exibidos' }}
    @else
        <div class="container">
            <div class="row">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <thead>
                            <th>ID</th>
                            <th>Estabelecimento</th>
                            <th>Sub-Categorias</th>
                            <th>Categoria</th>
                            <th>Responsável</th>
                            <th>Ação</th>
                        </thead>
                    </tr>

                    <tbody>

                    @foreach($estab as $e) <!-- Popula toda a table -->
                        <tr>
                            <td>{{ $e->id }}</td>
                            <td>{{ $e->nome }}</td>
                            <td>
                                <ul> <!-- Exibe a lista de subcategorias -->
                                    @foreach($e->subCategoria as $est)
                                        <li>{{ $est->nome }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td> <!-- Exibe a lista de Categorias -->
                                @foreach($e->subCategoria as $est) <!-- Varíavel $i passado pelo controller -->
                                    @if($i == 0) <!-- If utilizado para imprimir a categoria apenas uma vez -->
                                        {{ $est->categoria->nome }}
                                        <?php $i++; ?><!-- Incrementando i garante que a categoria será impressa apenas uma vez -->
                                    @endif
                                @endforeach  <?php $i = 0; ?><!-- Isso garante que os próximos estabelecimentos tambem terão suas categorias impressas -->
                            </td>
                            <td>
                                {{ $e->responsavel->first()->nome or 'Não há Responsáveis'}}
                            </td>
                            <td>
                                <a href="{{ route('admin.estabelecimentos.edit', [$e->id]) }}">
                                    <span title="Editar Estabelecimento" class="glyphicon glyphicon-edit"></span>
                                </a>
                                |
                                <a href="{{ route('admin.estabelecimentos.destroy', [$e->id]) }}">
                                    <span title="Excluir Estabelecimento" class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

                {!! $estab->render() !!} <!-- Esta linha garante a paginação -->
            </div>
        </div>

    @endif
@endsection