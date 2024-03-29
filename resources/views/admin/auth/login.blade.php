
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>{{ config('app.name', 'Book Ur Doctor') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{asset('public/assets/js/require.min.js')}}"></script>
    <script>
      requirejs.config({
          baseUrl: "{{asset('/')}}"
      });
    </script>
    <!-- Dashboard Core -->
    <link href="{{asset('public/assets/css/dashboard.css')}}" rel="stylesheet" />
    <script src="{{asset('public/assets/js/dashboard.js')}}"></script>
    <!-- c3.js Charts Plugin -->
    <link href="{{asset('public/assets/plugins/charts-c3/plugin.css')}}" rel="stylesheet" />
    <script src="{{asset('public/assets/plugins/charts-c3/plugin.js')}}"></script>
    <!-- Google Maps Plugin -->
    <link href="{{asset('public/assets/plugins/maps-google/plugin.css')}}" rel="stylesheet" />
    <script src="{{asset('public/assets/plugins/maps-google/plugin.js')}}"></script>
    <!-- Input Mask Plugin -->
    <script src="{{asset('public/assets/plugins/input-mask/plugin.js')}}"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="{{asset('public/vendor/images/logo.png')}}" class="h-6" alt="">
              </div>
             <form class="card" role="form" method="POST" action="{{ url('/admin/login') }}">
                        {{ csrf_field() }}
                <div class="card-body p-6">
                  <div class="card-title">Login to your account</div>
                  <div class="form-group">
                    <label class="form-label">Username</label>
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group">

                    <input id="password" type="password" class="form-control" name="password">
                     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                     @endif
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" />
                      <span class="custom-control-label">Remember me</span>
                    </label>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
