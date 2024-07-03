
<head>
    <!-- ... otros elementos head ... -->
    <style>
        /* Quitar el subrayado de todos los enlaces */
        a {
            text-decoration: none;
        }

        /* Quitar el subrayado de los enlaces en el calendario */
        #calendar a {
            text-decoration: none;
        }

        /* Quitar el subrayado de los enlaces en la barra lateral */
        .sidebar a {
            text-decoration: none;
        }
    </style>
</head>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/home') }}" class="brand-link">
        <span class="brand-text font-weight-light">PRUEBA TECNICA SIMJ</span>
    </a>
    <a href="{{ url('/home') }}" class="brand-link">
        <span class="brand-text font-weight-light">SOLUCIONES INFORMATICAS</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                
            <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
            
            
            <li class="nav-item">
                    <a href="{{ url('/users') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/holidays') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Festivos</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
