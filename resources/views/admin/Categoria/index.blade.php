<!DOCTYPE html>
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
                    <h3>Categorias</h3>
                    <a href="{{ route('admin.categoria.create') }}" class="btn btn-default">Nova Categoria</a>
                </div>
            </div>


            <div class="container espacamento">
                <div class="row">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <thead>
                            <th>ID</th>
                            <th>Categoria</th>
                            </thead>
                        </tr>

                        <tbody>
                        @foreach($categoria as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->nome }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                    {!! $categoria->render() !!}
                </div>
            </div>
        </div>

        </body>
    </html>