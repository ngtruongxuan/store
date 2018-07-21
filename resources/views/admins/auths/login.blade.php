<html>
    <header>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{module_path()}}/bootstrap/dist/css/bootstrap.min.css">
    </header>
    <body>
        <div class="wrapper">
            <form class="form-signin" method="post" action="{{route('admin.auth.login')}}" style="text-align: center">
                {{ csrf_field() }}
                <h2 class="form-signin-heading">Login</h2>
                <br>
                <input style="margin-bottom: 10px" type="text" class="form-control" name="username" placeholder="Account" required="" autofocus="" />
                <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
                <label class="checkbox" style="margin-left: 20px;float: left;">
                    <input type="checkbox" value="remember-me" id="rememberMe" name="remember"> Remember me
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>
    </body>
    <style>
        body {
            background: #eee !important;
        }

        .wrapper {
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .form-signin {
            max-width: 380px;
            padding: 15px 35px 45px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .form-signin-heading,
        .checkbox {
            margin-bottom: 30px;
        }

        .checkbox {
            font-weight: normal;
        }

        .form-control {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
        {{--@include box-sizing(border-box);--}}

            &:focus {
                 z-index: 2;
             }
        }

        input[type="text"] {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        input[type="password"] {
            margin-bottom: 20px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>
</html>