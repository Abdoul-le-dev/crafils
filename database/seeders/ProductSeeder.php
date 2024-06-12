<?php

namespace Database\Seeders;

use App\Models\categorie;
use App\Models\produit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        User::create([
            'name'  => 'Abdoul',
            'email' => 'abdoul51@gmail.com',
            'password' => Hash::make('Abdoul51')
           ]);
       categorie::create([
       
        'user_id'  => 1,
        'categorie'  => 'Filtre a huile',

       ]);

        
        $products = [
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand A', 'reference' => 'REF0011', 'nom' => 'Product 1', 'prix' => 100.50, 'quantite' => 10],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand B', 'reference' => 'REF0012', 'nom' => 'Product 2', 'prix' => 200.75, 'quantite' => 20],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand C', 'reference' => 'REF0013', 'nom' => 'Product 3', 'prix' => 150.00, 'quantite' => 30],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand D', 'reference' => 'REF0014', 'nom' => 'Product 4', 'prix' => 300.00, 'quantite' => 40],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand E', 'reference' => 'REF0015', 'nom' => 'Product 5', 'prix' => 250.25, 'quantite' => 50],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand F', 'reference' => 'REF0016', 'nom' => 'Product 6', 'prix' => 350.75, 'quantite' => 60],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand G', 'reference' => 'REF0017', 'nom' => 'Product 7', 'prix' => 400.50, 'quantite' => 70],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand H', 'reference' => 'REF0018', 'nom' => 'Product 8', 'prix' => 450.00, 'quantite' => 80],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand I', 'reference' => 'REF0019', 'nom' => 'Product 9', 'prix' => 500.75, 'quantite' => 90],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand J', 'reference' => 'REF020', 'nom' => 'Product 10', 'prix' => 550.25, 'quantite' => 100],
      
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand A', 'reference' => 'REF001', 'nom' => 'Product 1', 'prix' => 100.50, 'quantite' => 10],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand B', 'reference' => 'REF002', 'nom' => 'Product 2', 'prix' => 200.75, 'quantite' => 20],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand C', 'reference' => 'REF003', 'nom' => 'Product 3', 'prix' => 150.00, 'quantite' => 30],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand D', 'reference' => 'REF004', 'nom' => 'Product 4', 'prix' => 300.00, 'quantite' => 40],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand E', 'reference' => 'REF005', 'nom' => 'Product 5', 'prix' => 250.25, 'quantite' => 50],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand F', 'reference' => 'REF006', 'nom' => 'Product 6', 'prix' => 350.75, 'quantite' => 60],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand G', 'reference' => 'REF007', 'nom' => 'Product 7', 'prix' => 400.50, 'quantite' => 70],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand H', 'reference' => 'REF008', 'nom' => 'Product 8', 'prix' => 450.00, 'quantite' => 80],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand I', 'reference' => 'REF009', 'nom' => 'Product 9', 'prix' => 500.75, 'quantite' => 90],
            ['user_id' => 1, 'categorie_id' => 1, 'marque' => 'Brand J', 'reference' => 'REF021', 'nom' => 'Product 10', 'prix' => 550.25, 'quantite' => 100],
        ];

        foreach ($products as $product) {
            produit::create($product);
        }

    }

    
}
