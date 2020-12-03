<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    public function treatmentTasks()
    {
        return $this->hasMany('App\Models\TreatmentTask');
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
