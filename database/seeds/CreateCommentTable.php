<?php

use Illuminate\Database\Seeder;
use App\MsComment;


class CreateCommentTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MsComment::create(['comment' => 'hehe', 'photo_id' => '1', 'user_id' => '1']);
    }
}
