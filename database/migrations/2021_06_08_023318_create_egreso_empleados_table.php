<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEgresoEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egreso_empleados', function (Blueprint $table) {
            $table->id('id_egreso');
            // ALTER TABLE `egreso_empleados`
            //  ADD FOREIGN KEY (`empleado_id`) REFERENCES `empleados`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `egreso_empleados`
            //  ADD FOREIGN KEY (`conceptos_id`) REFERENCES `conceptos`(`id_conceptos`) ON DELETE CASCADE ON UPDATE CASCADE;

            $table->bigInteger('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('conceptos_id')->unsigned();
            $table->foreign('conceptos_id')->references('id_conceptos')->on('conceptos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->decimal('valor_egreso', 10, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egreso_empleados');
    }
}
