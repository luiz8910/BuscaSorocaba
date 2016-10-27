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
                <h3>Shoppings</h3>
                <a href="{{ route('admin.shoppings.create') }}" class="btn btn-default">Novo Shopping</a>

                @if(!$shopping)
                    {{ 'Não há dados a serem exibidos' }}

                @else


                    <table class="table table-bordered table-responsive">
                        <tr>
                            <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Cinema</th>
                            <th>Ação</th>
                            </thead>
                        </tr>

                        <tbody>
                        @foreach($shopping as $s)
                            <tr>
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->nome }}</td>
                                <td>{{ $s->logradouro }}, {{ $s->numero }}</td>
                                <td>{{ $s->cinema }}</td>
                                <td>
                                    <a href="{{ route('admin.shoppings.edit', [$s->id]) }}" title="Excluir Shopping">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    |
                                    <a class="excluir" id="{{ $s->id }}" title="Excluir Shopping"
                                       href="{{ route('admin.shoppings.destroy', [$s->id]) }}">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                    {!! $shopping->render() !!}

                    <div hidden id="dialog-confirm" title="Você está certo disto?">
                        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                            Deseja Excluir este Shopping?
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>


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
                    url: '/shoppings/excluir/' + id,
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

                        window.location = '/shoppings';
                    }
                });
            }

        });
    </script>
@endsection
</html>