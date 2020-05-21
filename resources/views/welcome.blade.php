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

        <div align="center">
          <h1>AudioFog</h1>
          <p class="text-info">A free, opensource alternative to share and play music.</p>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-md">
              <!-- tracks -->
              <ul class="tracks">
                @foreach ($tracks as $track)
                  <li class="playtrack" data-filepath="{{ $track->getFilepath() }}">{{ $track->title }}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-md-4">
              <!-- tracks -->
              <ul>
                @foreach ($tags as $tag)
                  <li class="tag">{{ $tag->name }}</li>
                @endforeach
              </ul>
            </div>
          </div>
      </div>


      <footer class="footer">
        <div class="container">

          <audio id="player" controls>
  					<source src="" type="audio/mpeg">
  						Your browser does not support the audio element.
  				</audio>

        </div>
      </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
