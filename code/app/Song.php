<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'songs';
  public $timestamps = false;
  protected $fillable = ['id', 'url', 'songname', 'artistid', 'artistname', 'albumid', 'albumname'];
}
