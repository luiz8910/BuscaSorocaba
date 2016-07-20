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
                                <a href="{{ route('admin.estabelecimentos.destroy', [$e->id]) }}" class="excluir" id="{{ $e->id }}">
                                    <span title="Excluir Estabelecimento" class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

                {!! $estab->render() !!} <!-- Esta linha garante a paginação -->

                <div hidden id="dialog-confirm" title="Você está certo disto?">
                    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                        Deseja Excluir este Estabelecimento?
                    </p>
                </div>
            </div>
        </div>

    @endif
@endsection

@section('script')
    <script>
        $(function () {
            $('.excluir').click(function () {
                var id = $(this).attr('id');

                $( "#dialog-confirm" ).dialog({
                    resizable: false,
                    height: "auto",
                    width: 400,
                    modal: true,
                    buttons: {
                        "Excluir": function() {
                            excluir(id);
                            $( this ).dialog( "close" );
                        },
                        Cancelar: function() {
                            $( this ).dialog( "close" );
                        }
                    }
                });

                return false;
            });

            function excluir(id)
            {
                var request = $.ajax({
                    method: 'GET',
                    url: '/estabelecimentos/excluir/'+id,
                    data: id,
                    dataType: 'json'
                });

                request.done(function (e) {
                    console.log('done');
                    console.log(e);

                    if (e.status == false) {
                        console.log(e.status);

                    }
                    else {

                        window.location = '/estabelecimentos';
                    }
                });
            }

        });
    </script>
@endsection