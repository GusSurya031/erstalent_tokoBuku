<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title',);
            $table->string('author',);
            $table->string('publisher',);
            $table->text('summary');
            $table->decimal('price', 10, 2);
            $table->text('image_url')->nullable();
            $table->unsignedInteger('stock');
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
