<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->boolean('tos')->nullable();
            $table->boolean('notification')->nullable();
            $table->string('title')->nullable();
            $table->string('experience')->nullable();
            $table->string('university')->nullable();
            $table->date('graduated_at')->nullable();
            $table->float('average')->nullable();
            $table->text('speech')->nullable();
            $table->string('available')->nullable();
            $table->string('preference')->nullable();
            $table->json('skills')->nullable();
            $table->text('courses')->nullable();
            $table->text('hobbies')->nullable();
            $table->string('website')->nullable();
            $table->date('birthdate')->nullable();
            $table->json('completed')->nullable();
            $table->foreignId('subcategory_id')->nullable()->constrained();
            $table->foreignId('city_id')->nullable()->constrained();
           // $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
