<?php

namespace App\Listeners;

use App\Track;
use App\Events\TrackDestroyed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class CleanUpTrackData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TrackDestroyed  $event
     * @return void
     */
    public function handle(TrackDestroyed $event)
    {
      $tags = $event->track->tags()->get();

      // delete from disk
      $id = auth()->user()->id;
      $filepath = "/audiofiles/$id/$event->track->filename";
      Storage::delete($filepath);

      // delete from DB
      $event->track->delete();

      // remove orphaned tags
      foreach($tags as $tag) {
        if (!Track::withAnyTags($tag->name)->count()) {
          $tag->delete();
        }
      }
    }
}
