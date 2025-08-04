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
        Schema::create('skincare_tips', function (Blueprint $table) {
            $table->id();
            $table->string('author_name'); // e.g., Ms. Hing Sophally
            $table->text('tip_content');   // e.g., Yes -- the correct order is: Cleanser -> Toner -> Serum -> Moisturizer -> Sunscreen (AM only). This ensures each product works effectively
            $table->date('date');          // e.g., February 02, 2025
            $table->string('title');       // e.g., Tips
            $table->string('question');    // e.g., Are you using a right sun screen?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skincare_tips');
    }
};
