<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'data_inicio',
        'data_final',
        'integrantes',
        'curso_id',
        'professor_orientador_id',
        'link_github',
        'user_id', // ID do usuário que fez a solicitação
    ];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento para quando a solicitação for aprovada e se tornar um Project
    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
