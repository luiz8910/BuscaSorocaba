<html>
<head>
    @include('admin.include.head')
</head>

<body>

<header>
    @include('admin.include.header')
</header>

<div id="wrapper">

    @include('admin.include.menu-lateral')

    <div class="container espacamento">
        <div class="row">
    <h3>Responsáveis</h3>
    <a href="{{ route('admin.responsavel.create') }}" class="btn btn-default">Novo Responsável</a>
    </div></div>
    @if(!$resp) {{ 'Não há dados para exibir' }}

    @else
        <div class="container espacamento">
            <div class="row">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <thead>
                        <th>ID</th>
                        <th>Responsável</th>
                        <th>Empresa</th>
                        <th>Cargo</th>
                        <th>Ação</th>
                        </thead>
                    </tr>

                    <tbody>
                    @foreach($resp as $r) <!-- Popula toda a table -->
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->nome }}</td>
                        <td>{{ $r->estabelecimentos->nome or '' }}</td>
                        <td>{{ $r->cargo }}</td>
                        <td>
                            <a href="{{ route('admin.responsavel.edit', [$r->id]) }}" title="Editar Responsável">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            |
                            <a class="excluir" id="{{ $r->id }}" href="{{ route('admin.responsavel.destroy', [$r->id]) }}" title="Excluir Responsável">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>


    {!! $resp->render() !!} <!-- Esta linha garante a paginação -->

    <div hidden id="dialog-confirm" title="Você está certo disto?">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
            Deseja Excluir este Responsável?
        </p>
    </div>
    @endif


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
                    url: '/responsaveis/excluir/'+id,
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

                        window.location = '/responsaveis';
                    }
                });
            }

        });
    </script>
@endsection