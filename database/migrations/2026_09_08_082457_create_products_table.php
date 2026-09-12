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
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | PRODUCT CODE
            |--------------------------------------------------------------------------
            | Kode unik produk.
            | Contoh: PY001, CY001, FAB001
            */
            $table->string('product_code')->unique();

            /*
            |--------------------------------------------------------------------------
            | PRODUCT NAME
            |--------------------------------------------------------------------------
            */
            $table->string('product_name');

            /*
            |--------------------------------------------------------------------------
            | UNIT
            |--------------------------------------------------------------------------
            | Contoh:
            | Kg
            | Meter
            | Roll
            | Pcs
            */
            $table->string('unit')->nullable();

            /*
            |--------------------------------------------------------------------------
            | DEFAULT PRICE
            |--------------------------------------------------------------------------
            | Harga default produk.
            | Harga aktual transaksi nanti tetap akan disimpan
            | di opportunity_items.unit_price.
            */
            $table->decimal('price', 15, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};