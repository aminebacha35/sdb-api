<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GarageEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void 
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('appointment_id')->constrained('appointments')->onDelete('cascade');
        $table->dateTime('date_entree');
        $table->dateTime('date_sortie')->nullable();
        $table->string('statut');
        $table->text('commentaires')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('garage_entries');
    }
};