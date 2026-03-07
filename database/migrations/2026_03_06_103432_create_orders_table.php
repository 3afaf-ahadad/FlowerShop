<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id(); // ID dial la commande
        $table->string('full_name'); // Smit l-client kamla
        $table->string('address'); // L-adresse fin ghadi n-siftou l-fleurs
        $table->string('city'); // L-mdina
        $table->string('phone'); // Nemra d tlf
        $table->decimal('total_amount', 8, 2); // L-prix total (ex: 150.00)
        $table->timestamps(); // Fin t-dar l-achat (Created_at)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
