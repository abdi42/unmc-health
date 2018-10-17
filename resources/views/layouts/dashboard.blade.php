<!doctype html>
<html lang="en">
<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">



  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>


  <div id="wrapper" class="toggled">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class='sidebar-shadow'>
      <ul class="sidebar-nav">

        <li class='text-center sidebar-brand'>
          <div class="clearfix">
            <img class="w-25 p-1 mr-2" src="/img/logo.png" alt="">
            <span class="align-middle text-white">MHealth</span>
          </div>
        </li>
        <li class="active text-center nav-item">
          <a href="{{ url("/subjects") }}">
            <div class='link-text'>
              <i data-feather="users" class="icon"></i><br>
              Subjects
            </div>
          </a>
        </li>
        <li class="text-center nav-item">
          <a href="{{ url("/contents") }}" class="text-center">
            <div class='link-text'>
              <i data-feather="book-open" class="icon"></i><br>
              Education
            </div>
          </a>
        </li>
      </ul>
    </div>
    <div id="page-content-wrapper">
      <div class="nav-container row">
        <ol class="breadcrumb col" id="navbar">
          @if (isset($breadcrumbs))
            @foreach ($breadcrumbs as $crumb => $link)
              @if ($link !== null)
                <li class="breadcrumb-item"><a href="{{$link}}">{{$crumb}}</a></li>
              @else
                <li class="breadcrumb-item active" aria-current="page">{{$crumb}}</li>
              @endif
            @endforeach
          @endif
        </ol>
      </div>

      <div class="container">
        <div id="page-content-body" class="p-3">
          @yield('content')
        </div>
      </div>
    </div>

    {{-- @include('layouts.nav')
    <div class="container-fluid">
    @yield('content')
  </div> --}}
</div>


<script>
feather.replace()
</script>

<!-- jQuery CDN - Slim version (=without AJAX) -->
  <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
  <!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script>
//$("#wrapper").toggleClass("toggled");

$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>

@stack('scripts')
</body>
</html>
