@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Filmes</h3>
            <a href="{{ route('admin.filme.create') }}" class="btn btn-default">Novo Filme</a>

            @if(!$filme)
                {{ 'Não há dados a serem exibidos' }}

            @else


                <table class="table table-bordered table-responsive">
                    <tr>
                        <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Duração</th>
                        <th>Classificação</th>
                        <th>Ação</th>
                        </thead>
                    </tr>

                    <tbody>
                    @foreach($filme as $f)
                        <tr>
                            <td>{{ $f->id }}</td>
                            <td>{{ $f->nome }}</td>
                            <td>{{ $f->duracao }}
                            <td>{{ $f->classificacao }}</td>
                            <td>
                                <a href="{{ route('admin.filme.edit', [$f->id]) }}" title="Editar Filme">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                |
                                <a class="excluir" id="{{ $f->id }}" title="Excluir Filme" href="{{ route('admin.filme.destroy', [$f->id]) }}">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                {!! $filme->render() !!}

                <div hidden id="dialog-confirm" title="Você está certo disto?">
                    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                        Deseja Excluir este Filme?
                    </p>
                </div>

            @endif
        </div>
    </div>

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
                    url: '/filme/excluir/'+id,
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

                        window.location = '/filme';
                    }
                });
            }

        });
    </script>
@endsection