<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('montant');
            $table->boolean('statut')->default(false);
            $table->date('dateCommande')->default(now());
            $table->date('dateLivraison')->nullable();
            $table->bigInteger('clients_id')->unsigned();
            $table->foreign('clients_id')->references('id')->on('clients')
            ->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('commandes' , function (Blueprint $table)   
        {
          $table->dropForeign('commandes_clients_id_foreign');
        });
    }
}
