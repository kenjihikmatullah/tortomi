<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['views'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Transform every file paths into URL
     * 
     * @return void
     */
    public function transformPath()
    {
        $imagePath = $this->image_path;

        if (isset($imagePath)) $this->image = asset($image_path);
        else $this->image = null;

        unset($this->image_path);
    }
}
