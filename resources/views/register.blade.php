<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AC Origins Checklist</title>
    <link rel='shortcut icon' href='{{asset('images/logo.png')}}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <section class="hero is-fullheight">
        <div class="hero-head">
            <nav class="navbar is-fixed-top has-background-warning">
                <div class="container">
                    <div class="navbar-brand">
                        <div class="navbar-item">
                            <img src="{{asset('images/logo.png')}}" width="28" height="28">
                        </div>
                        <span class="navbar-burger" data-target="navbarMenuHeroA">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                            <a href="{{url('/login')}}" class="navbar-item">
                                LOGIN
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns is-centered">
                    <div class="column is-two-thirds">
                        @if (session('status'))
                        <div class="message is-small is-danger">
                            <div class="message-header">
                                <p>{{ session('status') }}</p>
                                <button class="delete is-small" aria-label="delete"></button>
                            </div>
                        </div>
                        @endif
                        <h1 class="title has-text-warning">
                            REGISTER
                        </h1>
                        <form action={{url('/register')}} method="POST">
                            @csrf
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label has-text-warning">Username</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input required class="input" type="text" name="username" placeholder="Username">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label has-text-warning">Password</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input required class="input" type="password" name="password" placeholder="Password">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <p class="control has-text-right">
                                    <input class="button is-warning" type="submit" name="login" value="Register">
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('js/navbar.js')}}"></script>
    </section>
</body>
</html>