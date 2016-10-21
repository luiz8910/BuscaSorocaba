
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <!-- logo cliente -->
            <li>
                <img class="img-cliente-sidebar" src="assets/img/logo-cliente.png" alt="image">
            </li>
            <!-- end logo cliente -->

            <!-- menu -->
            {{--<li class="active">--}}
                {{--<a class="border-a-menu" href="{{ route('admin.dashboard.index') }}">--}}
                    {{--<i class="fa fa-dashboard i-ajuste" aria-hidden="true"></i>--}}
                    {{--<span class="margin-font">Dashboard</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            <!--Drop menu -->
            <li>
                <a href="#drop1" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-rss i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Categorias</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop1" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.categoria.index') }}">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span class="margin-font">Listar Categorias</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.categoria.create') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="margin-font">Nova Categoria</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- fim Drop menu -->

            <!--Drop menu -->
            <li>
                <a href="#drop2" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                    <i class="fa fa-steam-square fa-lg i-ajuste" aria-hidden="true"></i>
                    <span class="margin-font">Subcategorias</span>
                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                </a>
                <ul class="list-group collapse ul-dropdown-color" id="drop2" style="margin-bottom: 0px !important;">
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.subcategoria.index') }}">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span class="margin-font">Listar Subcategorias</span>
                        </a>
                    </li>
                    <li>
                        <a class="border-a-menu" href="{{ route('admin.subcategoria.create') }}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="margin-font">Nova Subcategoria</span>
                        </a>
                    </li>
                </ul>
                    <!--Drop menu -->
                    <li>
                        <a href="#drop3" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                            <i class="fa fa-users i-ajuste" aria-hidden="true"></i>
                            <span class="margin-font">Estabelecimentos</span>
                            <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                        </a>
                        <ul class="list-group collapse ul-dropdown-color" id="drop3" style="margin-bottom: 0px !important;">
                            <li>
                                <a class="border-a-menu" href="{{ route('admin.estabelecimentos.index') }}">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    <span class="margin-font">Listar Estabelecimentos</span>
                                </a>
                            </li>
                            <li>
                                <a class="border-a-menu" href="{{ route('admin.estabelecimentos.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    <span class="margin-font">Novo Estabelecimento</span>
                                </a>
                            </li>
                            <li>
                                <a class="border-a-menu" href="{{ route('admin.responsavel.create') }}">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    <span class="margin-font">Responsáveis</span>
                                </a>
                            </li>
                            <li>
                                <a class="border-a-menu" href="{{ route('admin.responsavel.create') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    <span class="margin-font">Novo Responsável</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- fim Drop menu -->


                    <!--Drop menu -->
                    <li>
                        <a href="#drop4" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                            <i class="fa fa-users i-ajuste" aria-hidden="true"></i>
                            <span class="margin-font">Cinema</span>
                            <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                        </a>
                        <ul class="list-group collapse ul-dropdown-color" id="drop4" style="margin-bottom: 0px !important;">
                            <li>
                                <a href="#drop5" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                                    <i class="fa fa-shopping-cart i-ajuste" aria-hidden="true"></i>
                                    <span class="margin-font">Shopping</span>
                                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                                </a>

                                <ul class="list-group collapse ul-dropdown-color" id="drop5" style="margin-bottom: 0px !important;">
                                    <li>
                                        <a class="border-a-menu" href="{{ route('admin.estabelecimentos.index') }}">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            <span class="margin-font">Listar Estabelecimentos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="border-a-menu" href="{{ route('admin.estabelecimentos.create') }}">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            <span class="margin-font">Novo Estabelecimento</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#drop6" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                                    <i class="fa fa-film i-ajuste" aria-hidden="true"></i>
                                    <span class="margin-font">Filmes</span>
                                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                                </a>

                                <ul class="list-group collapse ul-dropdown-color" id="drop6" style="margin-bottom: 0px !important;">
                                    <li>
                                        <a class="border-a-menu" href="{{ route('admin.filme.index') }}">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            <span class="margin-font">Listar Filmes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="border-a-menu" href="{{ route('admin.filme.create') }}">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            <span class="margin-font">Novo Filme</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#drop7" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                                    <i class="fa fa-map-marker i-ajuste" aria-hidden="true"></i>
                                    <span class="margin-font">Sala</span>
                                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                                </a>

                                <ul class="list-group collapse ul-dropdown-color" id="drop7" style="margin-bottom: 0px !important;">
                                    <li>
                                        <a class="border-a-menu" href="{{ route('admin.sala.index') }}">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            <span class="margin-font">Listar Salas</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="border-a-menu" href="{{ route('admin.sala.create') }}">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            <span class="margin-font">Novo Sala</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#drop8" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                                    <i class="fa fa-clock-o i-ajuste" aria-hidden="true"></i>
                                    <span class="margin-font">Sessões</span>
                                    <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                                </a>

                                <ul class="list-group collapse ul-dropdown-color" id="drop8" style="margin-bottom: 0px !important;">
                                    <li>
                                        <a class="border-a-menu" href="{{ route('admin.sessao.index') }}">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            <span class="margin-font">Listar Sessões</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="border-a-menu" href="{{ route('admin.sessao.create') }}">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            <span class="margin-font">Nova Sessão</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </li>
                    <!-- fim Drop menu -->


                    <!--Drop menu -->
                    <li>
                        <a href="#drop9" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                            <i class="fa fa-envelope i-ajuste" aria-hidden="true"></i>
                            <span class="margin-font">Pagina Contato</span>
                            <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                        </a>
                        <ul class="list-group collapse ul-dropdown-color" id="drop9" style="margin-bottom: 0px !important;">
                            <li>
                                <a class="border-a-menu" href="#">
                                    <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="margin-font">Descrição</span>
                                </a>
                            </li>
                            <li>
                                <a class="border-a-menu" href="#">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span class="margin-font">Lista de Contatos</span>
                                </a>
                            </li>
                            <li>
                                <a class="border-a-menu" href="#">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span class="margin-font">Configuração de Email</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- fim Drop menu -->


            <!-- fim Drop menu -->


            @if(Auth::user()->role == 'admin')
                <!--Drop menu -->
                <li>
                    <a href="#drop10" class="list-group border-a-menu" data-toggle="collapse" data-parent="#MainMenu" style="margin-bottom: 0px !important;">
                        <i class="fa fa-key i-ajuste" aria-hidden="true"></i>
                        <span class="margin-font">Usuários do Admin</span>
                        <i class="fa fa-sort-desc i-ajuste-right" aria-hidden="true"></i>
                    </a>
                    <ul class="list-group collapse ul-dropdown-color" id="drop10" style="margin-bottom: 0px !important;">
                        <li>
                            <a class="border-a-menu" href="{{ route('admin.usuarios.index') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="margin-font">Listar Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a class="border-a-menu" href="{{ route('admin.usuarios.create') }}">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                <span class="margin-font">Add Usuarios</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- fim Drop menu -->
            @endif
            {{--<li>--}}
                {{--<a class="border-a-menu" href="page-social-midia.html">--}}
                    {{--<i class="fa fa-user i-ajuste" aria-hidden="true"></i>--}}
                    {{--<span class="margin-font">Midia Social</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a class="border-a-menu" href="dashboard.html">--}}
                    {{--<i class="fa fa-cogs i-ajuste" aria-hidden="true"></i>--}}
                    {{--<span class="margin-font">Configurações</span>--}}
                {{--</a>--}}
            {{--</li>--}}


        </ul> <!-- fim ul .sidebar-nav -->
    </div><!-- fim div #sidebar-wrapper -->