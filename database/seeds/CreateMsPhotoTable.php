<?php

use Illuminate\Database\Seeder;
use App\MsPhoto;

class CreateMsPhotoTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MsPhoto::create(['title' => 'Jiwo', 'caption' => 'hehe', 'image' => 'MsPhoto/wkwk.jpg', 'price' => 2000, 'category' => 'test', 'user_id' => 1]);
    }
}
