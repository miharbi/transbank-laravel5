<?php namespace rotvulpix\transbank\Controllers;
use rotvulpix\transbank\Controllers\Controller;
use rotvulpix\transbank\Models;
use rotvulpix\transbank\Services;
use Input;
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
		$input = Input::all();
		if(isset($input['TBK_ID_SESION']) && isset($input['TBK_ORDEN_COMPRA'])) {
            // Entity Manager
            $em = $this->getDoctrine()->getManager();
            // Obtener Log de Transacción
            $paramLog = [
                'sesion' => $input['TBK_ID_SESION'],
                'ordenCompra' => $input['TBK_ORDEN_COMPRA']
                ];

            $logTransaccion = Models\WebPayLog::where($paramLog)->firstOrFail();
            if(!$logTransaccion) { throw new \Exception("No Existe Log de Transacción - " . json_encode($paramLog)); }
            // Nuevo Ítem de Transacción
            $transaccion = new Services\Transaccion();
            // Ítems
            $manzanas = new Services\ItemTransaccion(3990, 'Caja de Manzanas', 4);
            // Agregar Ítems
            $transaccion->addItem($manzanas);
            // Añadimos Transacción al Render
            $parametros['transaccion'] = $transaccion;
            $parametros['logTransaccion'] = $logTransaccion;

        }
	}

	public function fracaso() {

	}

	public function cierre() {
		try {
			$input = Input::all();

		} catch (\Exception $e) {

		}
	}
}