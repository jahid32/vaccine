<?php

use App\Enums\VaccinationStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nid');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->datetime('scheduled_date')->nullable();
            $table->enum('status', VaccinationStatus::toArray())->default(VaccinationStatus::NotScheduled);
            $table->foreignId('center_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
