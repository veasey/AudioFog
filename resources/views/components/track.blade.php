<div class="track">
  <div class="playtrack my-2 title"
    data-filepath="{{ $track->getFilepath() }}"
    data-trackid="{{ $track->id }}"
    data-album="{{ $track->album }}"
    data-artist="{{ $track->artist }}"
    data-year="{{ $track->year }}"
    data-desc="{{ $track->desc }}">

      {{ $track->title }}
  </div>
</div>
