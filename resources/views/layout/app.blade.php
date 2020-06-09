@include('layout.include.topo')

@hasSection('conteudo')
    @yield('conteudo')
@endif

@hasSection('javascript')
    @yield('javascript')
@endif

@include('layout.include.footer')