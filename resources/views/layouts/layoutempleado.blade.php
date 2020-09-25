 <html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prospera Free - New Amazing HTML5 Template</title>
    <link rel="stylesheet" href="{{ asset('cssadmin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('cssadmin/css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('cssadmin/css/responsee.css') }}">
    <link rel="stylesheet" href="{{ asset('cssadmin/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('cssadmin/owl-carousel/owl.theme.css') }}">
    
    <!-- CUSTOM STYLE -->
   
    <link rel="stylesheet" href="{{ asset('cssadmin/css/template-style.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="{{ asset('cssadmin/js/jquery-1.8.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cssadmin/js/jquery-ui.min.js') }}"></script>    
    
  </head>  
  
  <body class="size-1140">
  	<!-- HEADER -->
    <header role="banner">    
      <!-- Top Bar -->
      <div class="top-bar background-white">
        <div class="line">
          <div class="s-12 m-6 l-6">
            <div class="top-bar-contact">
              
            </div>
          </div>
         
        </div>
      </div>
      
      <!-- Top Navigation -->
      <nav class="background-white background-primary-hightlight">
        <div class="line">
          <div class="s-12 l-2">
         
            <a href="/empleado" class="logo"><img src=" {{ asset('cssadmin/img/logo-free.png') }}" alt=""></a>
          </div>
          <div class="top-nav s-12 l-10">
            <p class="nav-text"></p>
            <ul class="right chevron">
              <li><a href="/empleado">Inicio</a></li>
              <li><a>Servicios</a>
                <ul>
                  <li><a href="{{ url('vistaalquiler')}}">Alquilar Bicicleta</a></li>
                  
                </ul>
              </li>
              <li><a>Reportes</a>
                <ul>
                  <li><a href="{{ url('/clientes') }}">Lista Clientes</a></li>
                  <li><a href="{{ url('/clientes/create') }}">Nuevo Cliente</a></li>
                  <li><a></a></li>
                </ul>
            
              </li>
               <li><a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
               Salir</a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
              
                </form>
               </li>
               
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
   
    @yield('contenido')
      
      <!-- Bottom Footer -->
      <section class="padding background-dark">
        <div class="line">
          <div class="s-12 l-6">
           </div>
          <div class="s-12 l-6">
             </div>
        </div>
      </section>
    </footer> 
    
    <script type="text/javascript" src="{{ asset('cssadmin/js/responsee.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cssadmin/owl-carousel/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('cssadmin/js/template-scripts.js') }}"></script>   
   </body>
</html>