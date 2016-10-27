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
                <h3>Categoria Nome: {{ $resp->nome }}</h3>

                {!! Form::model($resp, ['route' => ['admin.responsavel.update', $resp->id], 'class' => 'form']) !!}

                <div class="form-group">
                    {!! Form::label('Estabelecimento', 'Estabelecimento:') !!}
                    <select name="estabelecimentos_id" id="estabelecimentos_id" class="form-control" required>
                        <option value="{{ $id or ''}}">{{ $nome or 'Selecione'}}</option>
                        @foreach($estab as $e)
                            @if($e->nome != $nome)
                                <option value="{{ $e->id }}">{{ $e->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label("Nome", "Nome:") !!}
                    {!! Form::text("nome", null, ["class" => "form-control"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("Telefone", "Telefone:") !!}
                    {!! Form::text("telefone", null, ["class" => "form-control numero"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("email", "Email:") !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("cep", "CEP:") !!}
                    {!! Form::text("cep", null, ["class" => "form-control numero"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("logr", "Logradouro:") !!}
                    {!! Form::text("logradouro", null, ["class" => "form-control"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("num", "Numero:") !!}
                    {!! Form::text("numero", null, ["class" => "form-control numero"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("bairro", "Bairro:") !!}
                    {!! Form::text("bairro", null, ["class" => "form-control"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("cpf", "CPF:") !!}
                    {!! Form::text("cpf", null, ["class" => "form-control numero"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("rg", "RG:") !!}
                    {!! Form::text("rg", null, ["class" => "form-control"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("cargo", "Cargo:") !!}
                    {!! Form::text("cargo", null, ["class" => "form-control"]) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit("Alterar", ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('admin.responsavel.index') }}" class="btn btn-default">Voltar</a>
                </div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>
</body>

@section('script')

    <script type="text/javascript">
        $(document).ready(function () {

            $('.numero').bind('keypress', function (event) {
                var regex = new RegExp("^[0-9]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });
        });

    </script>

@endsection

</html>