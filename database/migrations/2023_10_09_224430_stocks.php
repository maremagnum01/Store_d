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
        Schema::create('stocks', function (Blueprint $stock) {
            $stock->id();
            $stock->string('marca');
            $stock->string('modelo');
            $stock->string('memoria');
            $stock->string('estado');
            $stock->string('color');
            $stock->integer('stock');
            $stock->string('img')->nullable();
            $stock->text('descripcion')->nullable();
            $stock->float('precio');
            
            $stock->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
