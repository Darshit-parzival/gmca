<html lang="en" data-bs-theme="auto">

<head>
  <script src="{{ asset('/js/color-modes.js')}}"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Gmca admin</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex justify-content-center flex-column align-items-center vh-100" style="background: url({{url("/resources")}}/images/about_bg.jpg) center center / cover no-repeat;">
    <div>
      <h1 class="card-title text-center mb-4 text-primary">Government MCA College</h1>
    </div>
    <div class="card shadow-sm p-4" style="width: 450px">
      <h3 class="card-title text-center mb-4">Admin Login</h3>
      <form class="form p-4" method="POST" action="{{url("/")}}/admin/login">
        @csrf
        <div class="mb-3">
          <input type="text" class="form-control" name="email" placeholder="Email" id="username" aria-describedby="usernameHelp" value="{{old("email")}}">
          <span class="text-danger">
            @error("email")
                {{$message}}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <span class="text-danger">
            @error("password")
                {{$message}}
            @enderror
          </span>
        </div>
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
          <a href="#" class="text-sm-left d-block mt-3">Forgot Password?</a>
          
        @if(session('error'))
              <div class="alert alert-danger">
                  {{session('error') }}
              </div>
        @endif
      </form>
    </div>
  </div>
</body>
</html>