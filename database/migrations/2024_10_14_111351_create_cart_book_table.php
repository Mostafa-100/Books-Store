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
    Schema::create('cart_book', function (Blueprint $table) {
      $table->foreignId('book_id')->unique()->constrained('books')->cascadeOnDelete();
      $table->foreignId('cart_id')->constrained('carts')->cascadeOnDelete();
      $table->integer('quantity')->default(1);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('cart_book');
  }
};
