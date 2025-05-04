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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->date("start_date");
            $table->date('end_date');
            $table->text('reason');
            // $table->foreign('type_leave')->references('id')->on('leave_types')->onDelete('cascade');
            $table->foreignId('type_leave')->constrained('leave_types')->casclcadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
