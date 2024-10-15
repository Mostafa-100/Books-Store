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
    Schema::create('books', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('isbn');
      $table->string('numberOfPages');
      $table->date('publishDate');
      $table->string('dimensions');
      $table->float('price');
      $table->text('excerpt');
      $table->text('about');
      $table->string('coverUrl');
      $table->foreignId('publisher_id')->constrained('publishers');
      $table->foreignId('author_id')->constrained('authors');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('books');
  }
};
