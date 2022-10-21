<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Track as TrackModel;

class TrackFull extends Component
{
    public $track;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trackid)
    {
        $this->track = TrackModel::findOrFail($trackid);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.trackfull')->with('track', $this->track);;
    }
}
