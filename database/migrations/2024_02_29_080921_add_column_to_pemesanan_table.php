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
    public function up()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->string('no_resi')->default(0)->after('supir_id');
            $table->string('upload_ktm')->after('no_resi')->nullable();
            $table->string('upload_kmd')->after('upload_ktm')->nullable();
            $table->string('upload_kk')->after('upload_kmd')->nullable();
            $table->string('upload_ktp')->after('upload_kk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanan', function (Blueprint $table) {
            //
        });
    }
};
