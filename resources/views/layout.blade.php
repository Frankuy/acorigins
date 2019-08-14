<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AC Origins Checklist</title>
    <link rel='shortcut icon' href='{{asset('favicon.ico')}}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="hero-head">
        <nav class="navbar is-fixed-top is-warning">
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
                        <a href="{{route('weapons', 'melee')}}" class="navbar-item {{ $section == "Weapons" ? 'is-active has-text-weight-bold' : ''}}">
                            Weapons
                        </a>
                        <a href="{{route('outfits')}}" class="navbar-item {{ $section == "Outfits" ? 'is-active has-text-weight-bold' : ''}}">
                            Outfits
                        </a>
                        <a href="{{route('mounts')}}" class="navbar-item {{ $section == "Mounts" ? 'is-active has-text-weight-bold' : ''}}">
                            Mounts
                        </a>
                        <a href="{{url('/logout')}}" class="navbar-item has-text-danger has-text-weight-bold">
                            LOGOUT
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="hero-body">
        <div class="modal">
            <div class="modal-background"></div>
            <div class="modal-content">    
                <div class="modal-progress is-size-7-touch" style="margin: 0px 50px"></div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
        <a class="button is-success is-medium is-hidden-tablet progressIcon">
            <span class="icon is-medium">
                <i class="fas fa-chart-line"></i>
            </span>
        </a>
        <div class="container" style="margin-top : 20px">
            @if ($title !== 'Outfits' && $title !== 'Mounts')
                <div class="buttons">
                    <a href="melee" class="button is-warning {{ $title == "Melee Weapons" ? 'is-active has-text-weight-bold' : ''}}">
                        Melee Weapons
                    </a>
                    <a href="ranged" class="button is-warning {{ $title == "Ranged Weapons" ? 'is-active has-text-weight-bold' : ''}}">
                        Ranged Weapons
                    </a>
                    <a href="shield" class="button is-warning {{ $title == "Shields" ? 'is-active has-text-weight-bold' : ''}}">
                        Shields
                    </a>
                </div>
            @endif
            <div class="columns">
                <div class="column is-three-quarters">
                    <h1 class="title has-text-warning" id='judul'>{{$title}}</h1>
                    <div class="field has-addons is-marginless">
                        <div class="control has-icons-right is-expanded">
                            <input id="searchBox" class="input is-warning" autocomplete=off type="text" placeholder="Search...">
                            <span class="icon has-text-warning is-medium is-right" id='loading'><i class="fas fa-lg fa-circle-notch fa-spin"></i></span>
                        </div>
                        <div class="control">
                            <a class="button is-warning buttonfilter">
                                <i class="fas fa-filter"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box has-background-warning filterBox" style="display : none">
                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <div class="select is-small is-success is-fullwidth">
                                    <select id="rarity">
                                        <option selected value="">Select Rarity</option>
                                        <option value="Legendary">Legendary</option>
                                        <option value="Rare">Rare</option>
                                        <option value="Common">Common</option>
                                    </select>
                                </div>
                            </div>
                            @if (count($category) > 0)
                            <div class="control is-expanded">
                                <div class="select is-small is-success is-fullwidth">
                                    <select id="category">
                                        <option selected value="">Select Category</option>
                                        @foreach ($category as $c)
                                            <option value="{{$c}}">{{$c}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="control is-expanded">
                                <div class="select is-small is-success is-fullwidth">
                                    <select id="owned">
                                        <option selected value="">Select Owned</option>
                                        <option value="true">&#10004;</option>
                                        <option value="false">&#215;</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="container-table" class="has-text-centered"></div>
                </div>
                <div class="column container-progress is-hidden-touch"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript" charset="utf8" src="{{asset('js/ajax.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('js/navbar.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('js/stats.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('js/filter.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('js/data.js')}}"></script>
</body>

</html>