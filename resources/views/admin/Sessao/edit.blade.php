@extends('app')

@section('content')

    <div class="container">

        @if(session('nome') != null)
            <div class="alert alert-danger">
                <h5>Esta Subcategoria já existe</h5>
            </div>
            {{ session()->forget('nome') }}
        @endif

        <h3>Sessão: {{ $sessao->id }}</h3>

        {!! Form::model($sessao, ['route' => ['admin.sessao.update', $sessao->id], 'class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label("Nome", "Nome do Filme:") !!}
                <select required name="filme_id" class="form-control">
                    @foreach($filme as $f)
                        @if($sessao->filme->id == $f->id)
                            <option selected value="{{ $f->id }}">{{ $f->nome }}</option>
                        @else
                            <option value="{{ $f->id }}">{{ $f->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Shopping:") !!}
                <select required class="form-control" name="shopping_id" id="shopping">
                    @foreach($shopping as $s)
                        @if($sessao->salas->shopping->id == $s->id)
                            <option selected value="{{ $s->id }}">{{ $s->nome }}</option>
                        @else
                            <option value="{{ $s->id }}">{{ $s->nome }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group" id="AjaxSalas">
                {!! Form::label("Nome", "Salas:") !!}
                <select required class="form-control" name="salas_id" id="sala">
                    @foreach($salas as $s)
                        @if($sessao->salas->id == $s->id)
                            <option selected value="{{ $s->id }}">{{ $s->numero }}</option>
                        @else
                            <option value="{{ $s->id }}">{{ $s->numero }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Horário:") !!}
                {!! Form::text('horario', null, ['class' => 'form-control', 'placeholder' => 'Ex.: 22:30, 14:00', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Audio:") !!}
                <select required name="audio" id="" class="form-control">
                    @if($sessao->audio == 'Dublado')
                        <option selected value="Dublado">Dublado</option>
                        <option value="Legendado">Legendado</option>
                    @else
                        <option selected value="Legendado">Legendado</option>
                        <option value="Dublado">Dublado</option>
                    @endif
                </select>
            </div>

            <div class="form-group">
                {!! Form::label("Nome", "Qualidade:") !!}
                <select required name="qualidade" id="" class="form-control">
                    @if($sessao->qualidade == '3D')
                        <option selected value="3D">3D</option>
                        <option value="Macro XE">Macro XE</option>
                        <option value="IMAX">IMAX</option>
                        <option value="Digital">Digital</option>
                    @elseif($sessao->qualidade == 'Macro XE')
                        <option value="3D">3D</option>
                        <option selected value="Macro XE">Macro XE</option>
                        <option value="IMAX">IMAX</option>
                        <option value="Digital">Digital</option>
                    @elseif($sessao->qualidade == 'IMAX')
                        <option value="3D">3D</option>
                        <option value="Macro XE">Macro XE</option>
                        <option selected value="IMAX">IMAX</option>
                        <option value="Digital">Digital</option>
                    @else
                        <option value="3D">3D</option>
                        <option value="Macro XE">Macro XE</option>
                        <option value="IMAX">IMAX</option>
                        <option selected value="Digital">Digital</option>
                    @endif
                </select>
            </div>

        <div class="form-group">
            {!! Form::submit("Alterar", ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection