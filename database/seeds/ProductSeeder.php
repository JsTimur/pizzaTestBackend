<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryPizza = Category::where('name', 'Pizza')->first();
        $categoryOther = Category::where('name', 'Other')->first();
        $created_at = Carbon::now()->format('Y-m-d H:i:s');
        $pizzas = [
            [
                'name' => 'Salami Supreme',
                'description' => 'mit extra viel Salami[2,3].',
                'price' => 10.10,
                'image' => '1.jpg',
                'category_id' => $categoryPizza->id,
                'created_at' => $created_at
            ],
            [
                'name' => 'Dutchman',
                'description' => 'mit Prosciutto Cotto[2,3,9,17], Tomaten, Broccoli-Röschen und Sa...',
                'price' => 11.10,
                'image' => '2.jpg',
                'category_id' => $categoryPizza->id,
                'created_at' => $created_at
            ],
            [
                'name' => 'Cheeseburger Pizza',
                'description' => 'mit Rinderhack[19], frischen Tomaten, eingelegten Gurken, roten ...',
                'price' => 12.10,
                'image' => '3.jpg',
                'category_id' => $categoryPizza->id,
                'created_at' => $created_at
            ],
            [
                'name' => 'Waikiki',
                'description' => 'mit Prosciutto Cotto[2,3,9,17], fruchtiger Ananas und extra viel...',
                'price' => 13.10,
                'image' => '4.jpg',
                'category_id' => $categoryPizza->id,
                'created_at' => $created_at
            ],
            [
                'name' => 'Tuna',
                'description' => 'mit extra viel Thunfisch und roten Zwiebeln. Zusatzstoffe siehe ...',
                'price' => 14.10,
                'image' => '5.jpg',
                'category_id' => $categoryPizza->id,
                'created_at' => $created_at
            ],
            [
                'name' => 'Bombay',
                'description' => 'mit Hähnchenbrustfilet, Ananas und Currysauce[14,18]. Zusatzstof...',
                'price' => 15.10,
                'image' => '6.jpg',
                'category_id' => $categoryPizza->id,
                'created_at' => $created_at
            ],
            [
                'name' => 'Lucifer',
                'description' => 'mit Chilisalami[2,3], frischen Champignons und feurigen Jalapeño...',
                'price' => 16.10,
                'image' => '7.jpg',
                'category_id' => $categoryPizza->id,
                'created_at' => $created_at
            ],
            [
                'name' => 'Lucca',
                'description' => 'mit Prosciutto Cotto[2,3,9,17], Salami[2,3] und frischen Champig...',
                'price' => 17.10,
                'image' => '8.jpg',
                'category_id' => $categoryPizza->id,
                'created_at' => $created_at
            ],
            [
                'name' => 'Salat Deluxe',
                'description' => 'gemischter Salat mit Rucola, Cherrytomaten, Gurken, Prosciutto C...',
                'price' => 5.10,
                'image' => 's1.jpg',
                'category_id' => $categoryOther->id,
                'created_at' => $created_at
            ],
            [
                'name' => 'Salat Caesar\'s Chicken ',
                'description' => 'Römersalat mit Cherrytomaten, Hähnchenbrustfilet, italienischem ...',
                'price' => 6.10,
                'image' => 's2.jpg',
                'category_id' => $categoryOther->id,
                'created_at' => $created_at
            ],

        ];
        DB::table('products')->insert($pizzas);
    }
}
