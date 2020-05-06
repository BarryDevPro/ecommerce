<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('commandes_id')->unsigned();
            $table->foreign('commandes_id')->references('id')->on('commandes')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->bigInteger('produits_id')->unsigned();
            $table->foreign('produits_id')->references('id')->on('produits')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->double('prixTotal');
            $table->integer('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_commandes' , function (Blueprint $table)   
        {
          $table->dropForeign('detail_commandes_commandes_id_foreign');
          $table->dropForeign('detail_commandes_produits_id_foreign');
        });
    }
}
