<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_station_id')->constrained('stations')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('to_station_id')->constrained('stations')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedSmallInteger('distance_km');
            $table->unsignedSmallInteger('duration_minutes');
            $table->timestamps();

            $table->unique(['from_station_id', 'to_station_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
