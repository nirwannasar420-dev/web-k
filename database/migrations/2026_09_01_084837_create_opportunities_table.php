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
    Schema::create('opportunities', function (Blueprint $table) {
        $table->id();

        $table->string('name');

        $table->foreignId('customer_id')
            ->constrained('customers')
            ->cascadeOnDelete();

        $table->foreignId('stage_id')
            ->constrained('stages')
            ->cascadeOnDelete();

        $table->decimal('expected_revenue', 15, 2)
            ->default(0);

        $table->integer('rating')
            ->default(0);

        $table->date('opportunity_date')
            ->nullable();

        $table->text('notes')
            ->nullable();

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('opportunities');
}
};
