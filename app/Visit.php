<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{

    public function project_types()
    {
        return $this->belongsToMany(ProjectType::class,'project_visitor');
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'user_visit');
    }
}
