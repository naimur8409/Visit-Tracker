<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    protected $fillable = [
        'type_name',
    ];
    public function clients()
    {
        return $this->belongsToMany(Client::class,'client_project');
    }

    public function visitors()
    {
        return $this->belongsToMany(Visitor::class,'project_visitor');
    }
}
