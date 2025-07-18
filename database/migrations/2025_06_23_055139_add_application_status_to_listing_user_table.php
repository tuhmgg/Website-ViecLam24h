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
        Schema::table('listing_user', function (Blueprint $table) {
            $table->enum('application_status', ['pending', 'approved', 'rejected'])
                  ->default('pending')
                  ->after('shortlisted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listing_user', function (Blueprint $table) {
            $table->dropColumn('application_status');
        });
    }
};
