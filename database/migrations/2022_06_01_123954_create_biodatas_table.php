<?php

use App\Models\User;
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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('profile_image')->nullable()->default('profile-images/defaultProfile.png');
            $table->string('cover_image')->nullable()->default('cover-images/defaultCover.jpg');
            $table->enum('genre', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->date('birthday')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodatas');
    }
};
