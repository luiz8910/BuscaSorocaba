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
        <div class="row"><h3>Sessões</h3>
            <a href="{{ route('admin.sessao.create') }}" class="btn btn-default">Nova Sessão</a></div>
    </div>


    @if(!$sessao)
        {{ 'Não há dados a serem exibidos' }}

    @else

        <div class="container espacamento">
            <div class="row">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <thead>
                        <th>ID</th>
                        <th>Filme</th>
                        <th>Num Sala</th>
                        <th>Horário</th>
                        <th>Tipo</th>
                        <th>Qualidade</th>
                        <th>Shopping</th>
                        <th>Audio</th>
                        <th>Preço</th>
                        <th>Ação</th>
                        </thead>
                    </tr>

                    <tbody>
                    @foreach($sessao as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td>{{ $s->filme->nome }}</td>
                            <td>{{ $s->salas->numero }}</td>
                            <td>{{ $s->horario }}</td>
                            <td>{{ $s->salas->tipo }}</td>
                            <td>{{ $s->qualidade }}</td>
                            <td>{{ $s->salas->shopping->nome }}</td>
                            <td>{{ $s->audio }}</td>
                            <td>R$ {{ $s->preco }}</td>
                            <td>
                                <a href="{{ route('admin.sessao.edit', [$s->id]) }}"><span
                                            class="glyphicon glyphicon-edit"></span> </a>
                                |
                                <a href="{{ route('admin.sessao.destroy', [$s->id]) }}"><span
                                            class="glyphicon glyphicon-trash"></span> </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                {!! $sessao->render() !!}

            </div>
        </div>
    @endif
</div>
</body>
</html>