<?php

use App\Models\Genre;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGfieldsToGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('genres', function (Blueprint $table) {
            $genres = [
                [
                    "code" => "fantasy",
                    "name" => "Fantasy"
                ],
                [
                    "code" => "novel",
                    "name" => "Romanzo"
                ],
                [
                    "code" => "crime",
                    "name" => "Giallo"
                ],
                [
                    "code" => "historical",
                    "name" => "Storico"
                ],
                [
                    "code" => "comic",
                    "name" => "Fumetto"
                ],
            ];

            foreach($genres as $genreData){
                $genre = new Genre($genreData);
                $genre->save();

            };
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genres', function (Blueprint $table) {
            //
        });
    }
}
