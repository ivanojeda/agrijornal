<li class="nav-item">
    <a href="{{url('usuarios')}}"
        class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Usuarios
            <?php $users_count = DB::table('users')->count(); ?>

            <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
        </p>
    </a>
</li>