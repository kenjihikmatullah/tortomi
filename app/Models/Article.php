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
        $adminUrl = env('ADMIN_URL');

        if (isset($imagePath)) $this->image = "{$adminUrl}/storage/{$imagePath}";
        else $this->image = null;

        unset($this->image_path);
    }
}
