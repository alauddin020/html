<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                {{--<div class="links">
                    <form action="{{url('/')}}" method="POST">
                        @csrf
                        <label>
                            <input type="text" name="name" value="Alauddin F-a">
                        </label>
                        <input type="submit" value="Submit">
                    </form>
                </div>--}}
            </div>
        </div>
        <script src="/js/echo.js"></script>
        <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
        <?php $id = 1;?>
        <script>
            var i = 0;
            Pusher.logToConsole = true;

            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: '6204921d95f764016ce1',
                cluster: 'ap2',
                encrypted: true,
                logToConsole: true,
            });

            Echo.channel('user')
                .listen('ChatEvent', (e) => {
                    console.log(e);
                });

        </script>
    </body>
</html>
