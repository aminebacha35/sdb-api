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
    Schema::create('garage_entries', function (Blueprint $table) {
        $table->id();
        $table->boolean('is_paid')->default(false);
        $table->dateTime('date_entree');
        $table->dateTime('date_sortie')->nullable();
        $table->float('prix')->nullable();
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