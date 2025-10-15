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
        Schema::table('users', function (Blueprint $table) {
            $table->string('framework_preference')->nullable()->after('password');
            $table->string('theme_preference')->default('light')->after('framework_preference');
            $table->string('language_preference')->default('pt-BR')->after('theme_preference');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['framework_preference', 'theme_preference', 'language_preference']);
        });
    }
};
