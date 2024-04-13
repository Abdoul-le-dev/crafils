<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\categorie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = categorie::class;

    public function definition()
    {
        return [
            'categorie' => $this->faker->text(8),
            'description' => $this->faker->text(6),
            // Ajoutez d'autres champs ici selon vos besoins
        ];
    }
}
