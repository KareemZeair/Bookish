<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('books', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('title');
            $table->string('isbn')->unique();
            $table->string('author_name');
            $table->string('publish_date');
            $table->string('key');
            $table->string('img')->nullable();
            $table->text('plot')->nullable();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('img')->nullable();
            $table->text('fav_quote')->nullable();
            $table->string('fav_quote_teller')->nullable();
            $table->integer('book_id')->unsigned()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->string('content');
            $table->integer('rating');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('wish_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('past_reads', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('books');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('wish_lists');
        Schema::dropIfExists('past_reads');
    }
};
