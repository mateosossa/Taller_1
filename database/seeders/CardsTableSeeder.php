<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Card;

class CardsTableSeeder extends Seeder
{
    public function run()
    {
        $images = [
            'cards/Eren.jpg',
            'cards/Gojo.jpg',
            'cards/mikasa.jpg',
            'cards/Yuta.jpg',
            'cards/fushiguro.jpg',
            'cards/itadori.jpg',
            'cards/kakashi.jpg',
            'cards/tanjiro.jpg',
        ];

        foreach ($images as $image) {
            Card::create(['image_path' => $image]);
        }
    }
}
