<?php namespace rotvulpix\transbank\Models;
use Illuminate\Database\Eloquent\Model;

class WebPayLog extends Model {

	const EnProceso = 1;
	const Aceptado = 2;
	const AceptadoPagado= 3;
	const Rechazado = 4;
	const TR_NORMAL = 1;

	public static $tipos = Array(1 => 'TR_NORMAL');
	public static $estados = Array(1 => 'En Proceso', 2 => 'Aceptado', 3 => 'Aceptado-Pagado', 4 => 'Rechazado');

    protected $table = 'webpay_log';
    public $timestamps = false;

}
