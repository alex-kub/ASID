<?php

namespace App\MyClasses\Socket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class DataSocket implements MessageComponentInterface
{
  
  protected $clients;
  public function __construct() {
    $this->clients = new \SplObjectStorage;
  }

	public function onOpen(ConnectionInterface $conn) {
  // Store the new connection to send messages to later
    $this->clients->attach($conn);

    echo "New client: (" . $conn->resourceId . ")\n";
    echo "------------------\n";
    echo "Count client:(" . $this->clients->count()  .")\n";

    foreach($this->clients as $client)
    echo "List client:(" . $client->resourceId  .")\n";
    echo "------------------\n";

  }
  public function onMessage(ConnectionInterface $from, $msg) {
    foreach ($this->clients as $client) {
      //if ($from !== $client) {
        $client->send($msg);
      //}
    }
  }
  public function onClose(ConnectionInterface $conn) {
  // The connection is closed, remove it, as we can no longer send it messages
  	$this->clients->detach($conn);
  }
  public function onError(ConnectionInterface $conn, \Exception $e) {
    trigger_error("An error has occurred: {$e->getMessage()}\n", E_USER_WARNING);
    $conn->close();
  }
}