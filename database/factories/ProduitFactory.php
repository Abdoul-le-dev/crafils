<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(1),
            'categorie_id' => $this->faker->randomNumber(1),
            
            'marque' => $this->faker->word(6),
            'reference' => $this->faker->randomNumber(7),
            'nom' => $this->faker->word,
            'prix' => $this->faker->randomNumber(2),
            'quantite' => $this->faker->randomNumber(2),
        ];
    }
}
