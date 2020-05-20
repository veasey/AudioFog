<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Audio Fog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>

      <div class="container">

        <h1>AudioFog</h1>

        <ul class="list-group">
          @foreach ($tracks as $track)
            <li class="playtrack list-group-item" data-filepath="{{ $track->getFilepath() }}">{{ $track->title }}</li>
          @endforeach
        </ul>
      </div>

      <div class="footer">
        <div class="container">
          <audio id="player" controls>
  					<source src="" type="audio/mpeg">
  						Your browser does not support the audio element.
  				</audio>
        </div>
      </div>

    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
