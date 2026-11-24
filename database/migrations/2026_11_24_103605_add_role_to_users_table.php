<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    /**
     * Dijalankan saat: php artisan migrate
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'user'])   // hanya boleh berisi admin atau user
                  ->default('user')                    // pendaftar baru otomatis menjadi user
                  ->after('email');                    // letak kolom: setelah email
        });
    }
 
    /**
     * Dijalankan saat: php artisan migrate:rollback
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
