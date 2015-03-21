<?php namespace rotvulpix\transbank\Controllers;
use rotvulpix\romulus\Controllers\Controller;
use rotvulpix\romulus\Models;

class WebPayController extends Controller {
	public function checkout($transaccion) {
		$log = new Models\WebPayLog();
		$log->tipo_transaccion = Models\WebPayLog::TR_NORMAL;
		$log->orden_compra = uniqid();
        $log->sesion = uniqid();
        $log->monto = $transaccion->getTotalTransaccion();
        $log->estado = Models\WebPayLog::EnProceso;
        $log->fecha_inicio_transaccion = new \Datetime();

        // Parámetros para POST
        $parametros['transaccion'] = $transaccion;
        $parametros['tipo'] = WebPayLog::$tipos[WebPayLog::TR_NORMAL];
        $parametros['idSesion'] = $log->sesion;
        $parametros['ordenCompra'] = $log->orden_compra;
	}

	public function exito() {

	}

	public function fracaso() {

	}

	public function cierre() {
		try {

		} catch (\Exception $e) {
			
		}
	}
}