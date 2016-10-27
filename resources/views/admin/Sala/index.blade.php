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
            <h3>Sala</h3>
            <a href="{{ route('admin.sala.create') }}" class="btn btn-default">Nova Sala</a><br><br>
        </div>
    </div>

    @if(!$sala)
        {{ 'Não há dados a serem exibidos' }}

    @else

        <div class="container espacamento">
            <div class="row">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <thead>
                        <th>ID</th>
                        <th>Número</th>
                        <th>Tipo</th>
                        <th>Shopping</th>
                        <th>Ação</th>
                        </thead>
                    </tr>

                    <tbody>
                    @foreach($sala as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->numero }}</td>
                            <td>{{ $s->tipo }}</td>
                            <td>{{ $s->shopping->nome }}</td>
                            <td>
                                <a title="Editar Sala" href="{{ route('admin.sala.edit', [$s->id]) }}">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                |
                                <a title="Excluir Sala" id="{{ $s->id }}" class="excluir"
                                   href="{{ route('admin.sala.destroy', [$s->id]) }}">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                {!! $sala->render() !!}

                <div hidden id="dialog-confirm" title="Você está certo disto?">
                    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                        Deseja Excluir esta Sala?
                    </p>
                </div>

            </div>
        </div>

    @endif
</div>
</body>
</html>
@section('script')
    <script>
        $(function () {
            $('.excluir').click(function () {
                var id = $(this).attr('id');

                $("#dialog-confirm").dialog({
                    resizable: false,
                    height: "auto",
                    width: 400,
                    modal: true,
                    buttons: {
                        "Excluir": function () {
                            excluir(id);
                            $(this).dialog("close");
                        },
                        Cancelar: function () {
                            $(this).dialog("close");
                        }
                    }
                });

                return false;
            });

            function excluir(id) {
                var request = $.ajax({
                    method: 'GET',
                    url: '/sala/excluir/' + id,
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

                        window.location = '/sala';
                    }
                });
            }

        });
    </script>
@endsection