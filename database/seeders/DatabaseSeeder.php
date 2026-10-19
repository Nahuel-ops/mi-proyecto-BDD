<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Curso;
// Importaciones de los nuevos modelos
use App\Models\Instructor;
use App\Models\Horario;

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@academia.test'],
            ['name' => 'Administrador', 'password' => bcrypt('password'), 'rol' => User::ROL_ADMIN]
        );

        User::updateOrCreate(
            ['email' => 'user@academia.test'],
            ['name' => 'Usuario de prueba', 'password' => 'password', 'rol' => 
            User::ROL_USUARIO]

        );
    }
    //Datos ALEATORIOS con la fabrica: para probar paginacion y busqueda.
    


}
