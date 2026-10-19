<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// 💡 IMPORTANTE: Importamos la relación HasMany arriba
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instructor extends Model
{
    use HasFactory;

    // Obligamos a Laravel a usar la tabla en español
    protected $table = 'instructores';

    // 🔗 RELACIÓN INVERSA: Un instructor tiene muchos cursos (Evita el error actual)
    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class);
    }
}
