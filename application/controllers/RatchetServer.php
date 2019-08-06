<?php
//  echo APPPATH.'controllers/Ratchet.php';
// // echo dirname(__DIR__);
// // //echo APPPATH.'/../vendor/autoload.php';
//  exit();
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
//use Ratchet\Ratchet;
//use Application\Controllers\Ratchet\Ratchet;

require APPPATH.'controllers/Ratchet.php';
require APPPATH.'/../vendor/autoload.php';


class RatchetServer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $CI =& get_instance();

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Ratchet($CI)
                )
            ),
            8080
        );

        $server->run();
    }
}