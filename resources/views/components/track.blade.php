<li class="playtrack my-2"
  data-filepath="{{ $track->getFilepath() }}"
  data-trackid="{{ $track->id }}"
  data-album="{{ $track->album }}"
  data-artist="{{ $track->artist }}"
  data-year="{{ $track->year }}"
  data-desc="{{ $track->desc }}">

  <span class="title">
    {{ $track->title }}
  </span>

</li>
