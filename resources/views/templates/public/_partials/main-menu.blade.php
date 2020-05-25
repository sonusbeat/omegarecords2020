<nav>
	<h2 class="hidden-title">Menu Principal</h2>
	<ul class="sf-menu header_menu">
        <li>
            <a href="{{ url('/') }}">HOME</a>
        </li>
        <li>
            <a href="{{ url('estudio') }}">ESTUDIO</a>
        </li>
        <li>
            <a href="{{ url('equipo') }}">EQUIPO</a>
        </li>
        <li>
            <a href="{{ url('servicios') }}">SERVICIOS</a>
        </li>
        @if($coursesCount)
        <li>
            <a href="{{ url('cursos') }}">CURSOS</a>
        </li>
        @endif
        <li>
            <a href="{{ url('contacto') }}">CONTACTO</a>
        </li>
	</ul>
</nav>
