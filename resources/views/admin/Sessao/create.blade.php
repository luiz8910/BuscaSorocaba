@extends('app')

@section('content')

    <div class="container">
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
            <select required class="form-control" name="sala_id" id="sala" disabled="true">
                <option value="">Selecione</option>
                {{--@foreach($shopping as $s)--}}
                    {{--<option value="{{ $s->id }}">{{ $s->nome }}</option>--}}
                {{--@endforeach--}}
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
            {!! Form::submit("Salvar", ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>


@endsection