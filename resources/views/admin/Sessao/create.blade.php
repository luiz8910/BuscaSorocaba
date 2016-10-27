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
            <h3>Nova Sessão</h3>

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $item)
                        {{ $item }}
                    @endforeach
                </div>
            @endif

            {!! Form::open(['route' => 'admin.sessao.store', 'class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label("Nome", "Nome do Filme:") !!}
                <select required name="filme_id" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($filme as $f)
                        <option value="{{ $f->id }}">{{ $f->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Shopping:") !!}
                <select required class="form-control" name="shopping_id" id="shopping">
                    <option value="">Selecione</option>
                    @foreach($shopping as $s)
                        <option value="{{ $s->id }}">{{ $s->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" id="AjaxSalas">
                {!! Form::label("Nome", "Salas:") !!}
                <select required class="form-control" name="salas_id" id="sala" disabled="true">
                    <option value="">Selecione</option>
                    <!-- O resto das informações será inserido por ajax -->
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Horário:") !!}
                {!! Form::text('horario', null, ['class' => 'form-control', 'placeholder' => 'Ex.: 22:30, 14:00', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Audio:") !!}
                <select required name="audio" id="" class="form-control">
                    <option value="">Selecione</option>
                    <option value="Dublado">Dublado</option>
                    <option value="Legendado">Legendado</option>
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Qualidade:") !!}
                <select required name="qualidade" id="" class="form-control">
                    <option value="">Selecione</option>
                    <option value="3D">3D</option>
                    <option value="Macro XE">Macro XE</option>
                    <option value="IMAX">IMAX</option>
                    <option value="Digital">Digital</option>
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Preço:") !!}
                {!! Form::text('preco', null, ['class' => 'form-control', 'placeholder' => 'Ex.: 15,00, 14,00',
                'required' => 'required', 'id' => 'preco']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit("Salvar", ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>


    </div>
</div>
</body>
</html>

@section('script')
    <script>
        $(function () {
            $('#preco').bind('keypress', function (event) {
                var regex = new RegExp("[0-9,]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
@endsection