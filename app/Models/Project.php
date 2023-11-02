<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'image', 'content', 'type_id'];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getAbstract($testo)
    {
        if (strlen($testo) > 199) {
            $estratto = substr($testo, 0, 196) . '...';
        } else {
            $estratto = $testo;
        }

        return $estratto;
    }
}
