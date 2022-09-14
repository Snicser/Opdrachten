<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('rides', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->foreignId('taxi_company_id')->constrained()->cascadeOnDelete();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('rides', function (Blueprint $table) {
            $table->dropConstrainedForeignId('taxi_company_id');
        });
    }
};
