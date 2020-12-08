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
        $adminUrl = env('ADMIN_URL');

        if (isset($imagePath)) $this->image = "{$adminUrl}/storage/{$imagePath}";
        else $this->image = null;

        unset($this->image_path);
    }
}
