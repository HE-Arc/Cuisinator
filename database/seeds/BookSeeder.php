<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b1  = new Book();
        $b1->name = 'MyBook1';
        $b1->pages = 1000;
        $b1->save();
    }
}
