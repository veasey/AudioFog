<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;
use \Spatie\Tags\HasTags;
use \Spatie\Tags\Tag;

class Track extends Model
{
    use HasTags;

    protected $table = 'track';

    protected $fillable = ['title', 'desc', 'tags'];

    protected $attributes = [
        'plays' => 0,
    ];

    public function updateTags($tagString) {
      preg_match_all('/#(\w+)/', $tagString, $matches);
      return $this->syncTags(Tag::findOrCreate($matches[1]));
    }

    public function getTags(): string {

      $tags = array();
      foreach($this->tags()->get() as $tag) {
        if ($tag) {
          $tags[] = "#$tag->name";
        }
      }
      return implode(' ', $tags);
    }
}
