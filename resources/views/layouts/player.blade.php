<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{!! csrf_token() !!}">

        <title>Audio Fog | Clint Veasey</title>

        <!-- Styles -->
        <link href="{{ asset('css/player.css') }}" rel="stylesheet">

    </head>
    <body>
      <div id="app">

        <!-- header -->
        <header>
          <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
              <x-track-info />
            </div>
          </div>
          <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">

              <audio id="player" controls>
      					<source src="" type="audio/mpeg">
      						Your browser does not support the audio element.
      				</audio>

              <a href="/" class="navbar-brand d-flex align-items-center">
                <p class="song-title"></p>
              </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
           </div>
         </div>
       </header>

       <!-- tracks -->
       <div class="container mt-4">
         @yield('content')
       </div>

       <!-- info -->
       <div class="container">
         <div class="row">
           <div class="col-sm-8 col-md-7 py-4">
             <h4>About</h4>
             <p class="text-muted">AudioFog is a free alterative for sharing and playing tracks.
               It is maintained by <a href="https://clintveasey.co.uk">Clint Veasey</a> if you require any
               assitance getting up and running.
             </p>
             <p class="text-muted">I threw this together to share my own music without any nonsense adverts or
               limitations. It can easily support multiple artists and genres.</p>
             <p class="text-muted">Otherwise, feel free to fork from
               <a href="https://github.com/veasey/AudioFog">https://github.com/veasey/AudioFog</a>.
             </p>
           </div>
           <div class="col-sm-4 offset-md-1 py-4">
             <h4>Legal</h4>
             <p class="text-muted">All tracks here are composed by myself and are free to download
               and listen to.</p>
           </div>
         </div>
       </div>

       <!-- footer -->
       <footer class="footer bg-dark">
         <div class="container">
           <a href="/" class="navbar-brand d-flex align-items-center">
             <svg class="bi bi-soundwave" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
               <path stroke="#fff" stroke-linecap="round" d="M2.5 7v2m12-2v2m-2-3v4m-8-4v4m4-7.5v11m-2-9v7m4-7v7"/>
             </svg>
             <strong class="text-white">AudioFog</strong>
             &nbsp;<span class="text-muted"> Clint Veasey</span>
           </a>
          </div>
        </footer >
      </div>

      </div>
    </div>
    <script src="{{ asset('js/trackshare.js') }}"></script>
    </body>
</html>
