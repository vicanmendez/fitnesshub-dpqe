<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title> @yield('title', 'Gestión de entrenamiento') </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Gestión de entrenamiento</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <span class="font-weight-bold text-white"> Hola, {{ $currentUser->name }} </span>
          <form id="logout" action="{{ route('logout') }}" method="POST">
              <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">Cerrar sesión </a>
              @csrf
           </form>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">

                <a class="nav-link" href="{{ route('home') }}">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only"> </span>
                </a>
              </li>
             
              @if($currentUser->is_admin === 1)
              <li class="nav-item">
                <a class="nav-link" href=" {{ route('gyms') }}">
                  <span data-feather="align-center"></span>
                  Gimnasios <span class="aperture"> </span>
                </a>
              </li>
             @endif
              
              <li class="nav-item">
                <a class="nav-link" href="{{ route('users') }}">
                  <span data-feather="users">  </span>
                  Usuarios
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="{{ route('clients') }}">
                  <span data-feather="users">  </span>
                  Clientes
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="{{ route('exercises') }}">
                  <span data-feather="zap">  </span>
                  Ejercicios
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('programs') }}">
                  <span data-feather="list">  </span>
                  Programas y rutinas

                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('assignments') }}">
                  <span data-feather="list">  </span>
                 Planificacones
                </a>
              </li>

              
         
            </ul>
          </div>
        </nav>
      

        @yield('content')

        
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-slim.min.js') }}"><\/script>')</script>
    <script src="{{ asset('js/vendor/popper.min.js') }} "></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-')}}"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                eginAtZero: false              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
