<?php

namespace App\Console\Commands;

use App\MyClasses\Socket\DataSocket;
use Illuminate\Console\Command;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class DataServer extends Command
{
  protected $signature = 'dataserver:serve';
  protected $description = 'DataServer';

  public function __construct() {
    parent::__construct();
  }

  public function handle()  {
    $this->info('Start DataServer');
    $server = IoServer::factory(
      new HttpServer(
        new WsServer(
          new DataSocket()
        )
      ),
      8080
    );
    $server->run();
  }
}
