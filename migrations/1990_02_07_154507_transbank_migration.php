<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransbankMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webpay_log', function($table) {
			$table->increments('id');
			$table->integer('tipo_transaccion');
			$table->integer('monto');
			$table->string('orden_compra');
			$table->string('sesion');
			$table->integer('estado');
			$table->integer('respuesta');
			$table->string('codigo_autorizacion');
			$table->integer('numero_tarjeta');
			$table->datetime('fecha_contable');
			$table->datetime('fecha_transaccion');
			$table->datetime('fecha_inicio_transaccion');
			$table->integer('transaccion');
			$table->string('tipo_pago');
			$table->integer('cuotas');
			$table->string('vci');
			$table->string('mac');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('webpay_log');
	}

}
