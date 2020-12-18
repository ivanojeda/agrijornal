<li class="nav-item">
    <a href="{{url('usuarios')}}"
        class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Agricultores
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('jornadas')}}"
        class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Jornadas
            
        </p>
    </a>
</li>