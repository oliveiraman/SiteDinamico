<!doctype html>
<!--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">-->
<html lang="pt-br">
<head>
    <meta charset="utf-8">
        <!-- controla o tamanho do site em telas menores -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}</title>

    <!-- google vai ler essa meta -->
    <meta name="description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}">

    <!-- Twitter vai ler essa meta -->
    <meta name="twitter:card" value="summary">

    <!-- Facebook Meta -->
    <meta property="og:title" content="{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : config('app.url') }}" />
    <meta property="og:image" content="{{ isset($seo['imagem']) ? $seo['imagem'] : config('seo.imagem') }}" />
    <meta property="og:description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">







    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
</head>
<body id="app-layout">
  <header>
      @include('layouts._site._nav')
  </header>  
  

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
            <h5 class="white-text">Footer Content</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="{{ route('site.home')}}">Home</a></li>
              <li><a class="grey-text text-lighten-3" href="{{ route('site.sobre')}}">Sobre</a></li>
              <li><a class="grey-text text-lighten-3" href="{{ route('site.contato')}}">Contato</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2019 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
</footer>


    
    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>

</body>
</html>
