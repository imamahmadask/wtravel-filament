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
        Schema::table('travel_packages', function (Blueprint $table) {
            $table->string('min_pax', 50)->nullable();
            $table->string('disc')->nullable();
            $table->integer('disc_price')->nullable();
            $table->string('group_package')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_packages', function (Blueprint $table) {
            $table->dropColumn('min_pax');
            $table->dropColumn('disc');
            $table->dropColumn('disc_price');
            $table->dropColumn('group_package');
        });
    }
};
