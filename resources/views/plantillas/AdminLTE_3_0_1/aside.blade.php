<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{asset("plantillas/$theme/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset("plantillas/$theme/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                                 <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                 Ventas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('venta.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Ventas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('cliente.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Clientes</p>
                                </a>
                            </li>                          
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-store-alt"></i>
                            <p>
                                Almacén
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('producto.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Productos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categoria.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Categorias</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('marca.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Marcas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('medida.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Unidades de Medida</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-truck"></i>
                            <p>
                                Compras
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('proveedor.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Proveedores</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('compra.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Compras</p>
                                </a>
                            </li>                          
                        </ul>
                    </li>
                    
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                 Acceso al Sistema
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('usuario.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Usarios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categoria.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Compras</p>
                                </a>
                            </li>                          
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Reporte de Ventas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('proveedor.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Proveedores</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categoria.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Compras</p>
                                </a>
                            </li>                          
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Reporte de Compras
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('proveedor.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Proveedores</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categoria.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Compras</p>
                                </a>
                            </li>                          
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Maestro
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('proveedor.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Proveedores</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categoria.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-primary"></i>
                                    <p>Compras</p>
                                </a>
                            </li> 
                                                    
                        </ul>
                    </li>
                   
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>