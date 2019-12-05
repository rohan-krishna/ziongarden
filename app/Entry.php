<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;



class Entry extends Model implements HasMedia
{
    //
    use HasMediaTrait;
    
    protected $guarded = ['id'];


    public function path()
    {
        # code...
        return url('entries/'.$this->id);
    }
}
