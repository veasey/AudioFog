<li class="playtrack"
  data-filepath="{{ $track->getFilepath() }}"
  data-trackid="{{ $track->id }}"
  data-album="{{ $track->album }}"
  data-artist="{{ $track->artist }}"
  data-year="{{ $track->year }}"
  data-desc="{{ $track->desc }}">

  <span class="title">
    @if($track->artist)
      {{ $track->artist }} -
    @endif
    {{ $track->title }}
  </span>

</li>
