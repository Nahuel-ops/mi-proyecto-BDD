<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// 💡 Importamos la relación HasMany
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;
        // Añade esto dentro de tu Categoria.php si no lo tenías:
    protected $fillable = ['nombre'];


    // 🔗 DEFINICIÓN DE LA RELACIÓN: Una categoría tiene muchos cursos
    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class);
    }
}

