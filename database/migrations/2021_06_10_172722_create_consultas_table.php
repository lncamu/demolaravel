<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("
        CREATE VIEW consultas_report AS
        (
        SELECT  *
        em id AS id_empleado, em nombre AS nombre_empleado,
        em apellido_paterno AS apellido_paterno,  em apellido_materno AS apellido_materno,
        con descripcion_conceptos AS descripcion_conceptos, ege valor_ingreso AS valor_de_ingreso
        FROM egreso_empleados ege
        LEFT JOIN empleados em  ON em.id            = ege.empleado_id
        LEFT JOIN conceptos con ON con.id_conceptos = ege.conceptos_id
      )
        )
      ");
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}
