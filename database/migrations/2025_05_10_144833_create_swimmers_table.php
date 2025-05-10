<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('swimmers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('heart_rate')->nullable();
            $table->integer('hydration')->nullable();
            $table->integer('oxygen_level')->nullable();
            $table->float('temperature')->nullable();
            $table->integer('time_in_pool')->default(0); // minutes
            $table->string('status')->default('normal'); // 'normal', 'alert'
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('swimmers');
    }
};
