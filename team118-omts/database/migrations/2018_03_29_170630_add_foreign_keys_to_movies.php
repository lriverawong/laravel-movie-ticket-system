<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToMovies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->foreign('director_id')->references('id')->on('directors');
            $table->foreign('prod_comp_id')->references('id')->on('production_companies');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign('movies_director_id_foreign');
            $table->dropForeign('movies_prod_comp_id_foreign');
            $table->dropForeign('movies_supplier_id_foreign');

            $table->dropColumn('director_id');
            $table->dropColumn('prod_comp_id');
            $table->dropColumn('supplier_id');
        });
    }
}
