<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_empleados', function (Blueprint $table) {
            $table->id('id_ingreso');

            $table->bigInteger('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('conceptos_id')->unsigned();
            $table->foreign('conceptos_id')->references('id_conceptos')->on('conceptos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->decimal('valor_ingreso', 10, 4);
            $table->primary(['empleado_id', 'conceptos_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso_empleados');
    }
}
