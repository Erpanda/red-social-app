<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Rutinas',     'slug' => Str::slug('Rutinas')],
            ['nombre' => 'Reflexiones', 'slug' => Str::slug('Reflexiones')],
            ['nombre' => 'Metas',       'slug' => Str::slug('Metas')],
            ['nombre' => 'Salud',       'slug' => Str::slug('Salud')],
            ['nombre' => 'Finanzas',    'slug' => Str::slug('Finanzas')],
            ['nombre' => 'Aprendizaje', 'slug' => Str::slug('Aprendizaje')],
            ['nombre' => 'Trabajo',     'slug' => Str::slug('Trabajo')],
            ['nombre' => 'Relaciones',  'slug' => Str::slug('Relaciones')],
            ['nombre' => 'Ocio',        'slug' => Str::slug('Ocio')],
            ['nombre' => 'Gratitud',    'slug' => Str::slug('Gratitud')],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}