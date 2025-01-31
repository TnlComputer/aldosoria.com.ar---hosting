<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'title',
    'videos_curso_cantidad',
    'video_demo_Uri',
    'coast',
    'image_curso',
    'moneda_id',
    'tipo_curso_id'
  ];
}
