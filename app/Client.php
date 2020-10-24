<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    public function project_types()
    {
        return $this->belongsToMany(ProjectType::class,'client_project');
    }
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
