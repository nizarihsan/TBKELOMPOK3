<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('auction_items', function (Blueprint $table) {
            if (!Schema::hasColumn('auction_items', 'status')) {
                $table->string('status')->default('active');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('auction_items', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
