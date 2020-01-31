<!doctype html>
<!--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">-->
<html lang="pt-br">
<head>
    <meta charset="utf-8">
        <!-- controla o tamanho do site em telas menores -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <title>{{ config('app.name', 'Laravel') }}</title>






    

    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
</head>
<body id="app-layout">
    
  @include('layouts._admin._nav')

  <ul class="sidenav" id="mobile-demo">
        <li><a href="#">Home</a></li>
  </ul>
          <main>
            @if(Session::has('mensagem'))<!--verificar se existe a sessão-->
              <div class="container">
                <div class="row">
                  <div class="card {{ Session::get('mensagem')['class'] }}">
                    <div align="center" class="card-content">
                      {{ Session::get('mensagem')['msg'] }} <!-- chaves duplas equivale ao echo do php-->
                    </div>
                  </div>
                </div>

              </div>
            @endif
            @yield('content')
          </main>  

<footer class="page-footer blue">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">SisAdmin</h5>
            <p class="grey-text text-lighten-4">Sistema de Administração</p>

          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="{{ route('admin.principal')}}">Início</a></li>
              </li>
              <li><a class="grey-text text-lighten-3" href="{{ route('site.home')}}">Site</a></li>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2019 Copyright SisAdmin
        <a class="grey-text text-lighten-4 right" href="#!">André Tadeu de Oliveira</a>
        </div>
      </div>
</footer>


    
    <!-- <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script> -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
    
    <script src="{{asset('js/init.js')}}"></script>

</body>
</html>
