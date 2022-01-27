<?php

use App\Comic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_comics = config('comics');

        foreach ($array_comics as $comic) {

            $new_comic = new Comic();
            $new_comic->title = $comic['title'];
            $new_comic->slug = Str::slug($new_comic->title, '-');
            $new_comic->description = $comic['description'];
            $new_comic->type = $comic['type'];
            $new_comic->thumb = $comic['thumb'];
            $new_comic->series = $comic['series'];
            $new_comic->price = $comic['price'];
            $new_comic->sale_date = $comic['sale_date'];

            // dump($comic);

            $new_comic->save();

        }
    }
}
