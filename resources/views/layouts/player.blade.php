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

              <div class="player">

                <svg class="player-btn-back bi bi-skip-start" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.5 3.5A.5.5 0 0 0 4 4v8a.5.5 0 0 0 1 0V4a.5.5 0 0 0-.5-.5z"/>
                  <path fill-rule="evenodd" d="M5.696 8L11.5 4.633v6.734L5.696 8zm-.792-.696a.802.802 0 0 0 0 1.392l6.363 3.692c.52.302 1.233-.043 1.233-.696V4.308c0-.653-.713-.998-1.233-.696L4.904 7.304z"/>
                </svg>

                <svg class="player-btn-play bi bi-play" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                </svg>

                <svg class="player-btn-pause bi bi-pause" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
                </svg>

                <svg class="player-btn-next bi bi-skip-end" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M12 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
                  <path fill-rule="evenodd" d="M10.804 8L5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                </svg>

                <svg class="player-btn-shuffle bi bi-shuffle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M12.646 1.146a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.793 4l-2.147-2.146a.5.5 0 0 1 0-.708zm0 8a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.793 12l-2.147-2.146a.5.5 0 0 1 0-.708z"/>
                  <path fill-rule="evenodd" d="M0 4a.5.5 0 0 1 .5-.5h2c3.053 0 4.564 2.258 5.856 4.226l.08.123c.636.97 1.224 1.865 1.932 2.539.718.682 1.538 1.112 2.632 1.112h2a.5.5 0 0 1 0 1h-2c-1.406 0-2.461-.57-3.321-1.388-.795-.755-1.441-1.742-2.055-2.679l-.105-.159C6.186 6.242 4.947 4.5 2.5 4.5h-2A.5.5 0 0 1 0 4z"/>
                  <path fill-rule="evenodd" d="M0 12a.5.5 0 0 0 .5.5h2c3.053 0 4.564-2.258 5.856-4.226l.08-.123c.636-.97 1.224-1.865 1.932-2.539C11.086 4.93 11.906 4.5 13 4.5h2a.5.5 0 0 0 0-1h-2c-1.406 0-2.461.57-3.321 1.388-.795.755-1.441 1.742-2.055 2.679l-.105.159C6.186 9.758 4.947 11.5 2.5 11.5h-2a.5.5 0 0 0-.5.5z"/>
                </svg>

                <svg class="player-btn-repeat bi bi-arrow-clockwise" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3.17 6.706a5 5 0 0 1 7.103-3.16.5.5 0 1 0 .454-.892A6 6 0 1 0 13.455 5.5a.5.5 0 0 0-.91.417 5 5 0 1 1-9.375.789z"/>
                  <path fill-rule="evenodd" d="M8.147.146a.5.5 0 0 1 .707 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 1 1-.707-.708L10.293 3 8.147.854a.5.5 0 0 1 0-.708z"/>
                </svg>

                <svg class="player-btn-download bi bi-download" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8z"/>
                  <path fill-rule="evenodd" d="M5 7.5a.5.5 0 0 1 .707 0L8 9.793 10.293 7.5a.5.5 0 1 1 .707.707l-2.646 2.647a.5.5 0 0 1-.708 0L5 8.207A.5.5 0 0 1 5 7.5z"/>
                  <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 1z"/>
                </svg>

              </div>


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
