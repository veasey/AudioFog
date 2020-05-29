<?php

namespace App\View\Components;

use Illuminate\View\Component;

class trackInfo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<div class="jumbotron mt-3 info">
  <div class="row">
    <div class="col-md">
      <p class="lead song-title"></p>
      <p class="song-album"></p>
      <p class="song-year"></p>
    </div>
    <div class="col-md">
      <p class="song-desc"></p>
    </div>
  </div>
</div>
blade;
    }
}
