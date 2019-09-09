<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">

    </head>

    <body>
        <div id="app">
            {{-- <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
mdl-layout--fixed-header">
                <header class="mdl-layout__header">
                    <div class="mdl-layout__header-row">
                        <div class="mdl-layout-spacer"></div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
      mdl-textfield--floating-label mdl-textfield--align-right">
                            <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
                                <i class="material-icons">search</i>
                            </label>
                            <div class="mdl-textfield__expandable-holder">
                                <input class="mdl-textfield__input" type="text" name="sample"
                                    id="fixed-header-drawer-exp">
                            </div>
                        </div>
                    </div>
                </header>
                <div class="mdl-layout__drawer">
                    <span class="mdl-layout-title">MOVIE&STUFFS</span>
                    <nav class="mdl-navigation">
                        <router-link :to="{name: 'home'}" class="mdl-navigation__link">Home</router-link>
                        <router-link :to="{name: 'home'}" class="mdl-navigation__link">Top Rated</router-link>
                        <router-link :to="{name: 'home'}" class="mdl-navigation__link">Popular Movies</router-link>
                        <router-link :to="{name: 'home'}" class="mdl-navigation__link">Latest Movies</router-link>
                    </nav>
                </div>
                <main class="mdl-layout__content">
                    <div class="page-content">
                        <div class="container">
                            <div class="d-flex justify-content-center">

                                <router-view></router-view>
                            </div>
                        </div>
                    </div>
                </main>
            </div> --}}
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </body>

</html>

<style>
    body{
        background: lightgray;
    }
</style>