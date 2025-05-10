<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('swimmer_id');
            $table->string('type'); // e.g. "High BPM", "Low Oxygen"
            $table->text('message');
            $table->boolean('resolved')->default(false);
            $table->timestamps();

            $table->foreign('swimmer_id')->references('id')->on('swimmers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alerts');
    }
};
