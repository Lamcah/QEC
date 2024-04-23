<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelas', function (Blueprint $table) {
            // Hapus kolom instruktur_id
            $table->dropColumn('instruktur_id');

            // Tambahkan kolom kelas_id sebagai foreign key ke tabel instruktur
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kelas', function (Blueprint $table) {
            // Kembalikan kolom instruktur_id
            $table->unsignedBigInteger('instruktur_id');
            $table->foreign('instruktur_id')->references('id')->on('instruktur')->onDelete('cascade');

            // Hapus kolom kelas_id
            $table->dropColumn('kelas_id');
        });
    }
}
