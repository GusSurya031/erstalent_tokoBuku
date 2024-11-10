<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

