<div class="track playtrack mb-1"
    data-filepath="{{ $track->getFilepath() }}"
    data-trackid="{{ $track->id }}"
    data-album="{{ $track->album }}"
    data-artist="{{ $track->artist }}"
    data-year="{{ $track->year }}"
    data-desc="{{ $track->desc }}">
      <div class="title">
        @if ($track->album)
          <a href="/album?artist={{ $track->artist }}&album={{ $track->album }}">{{ $track->album }}</a> - 
        @endif
        {{ $track->title }}
      </div>
  </div>
