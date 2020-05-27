<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Track as TrackModel;

class Track extends Component
{

    public $id;
    public $filepath;
    public $title;
    public $plays;
    public $artist;
    public $year;
    public $album;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trackid)
    {

        $track = TrackModel::findOrFail($trackid);
        $this->id = $track->id;
        $this->filepath = $track->getFilepath();
        $this->title = $track->title;
        $this->plays = $track->plays;
        $this->year = $track->year;
        $this->album = $track->album;
        $this->artist = $track->artist;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.track');
    }
}
