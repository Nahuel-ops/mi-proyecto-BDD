<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// 💡 Importamos las relaciones de Eloquent
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{
    /** @use HasFactory<\Database\Factories\CursoFactory> */
    use HasFactory;
       // 🔗 NUEVA RELACIÓN: Un curso pertenece a una Categoría (Evita el error actual)
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    // Un curso pertenece a un Instructor 
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }

    // Un curso pertenece a un Horario
    public function horario(): BelongsTo
    {
        return $this->belongsTo(Horario::class);
    }
}
