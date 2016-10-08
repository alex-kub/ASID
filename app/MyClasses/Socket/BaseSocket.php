<?php

namespace App\MyClasses\Socket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class BaseSocket implements MessageComponentInterface
{
	public function onOpen(ConnectionInterface $conn) {
  // Store the new connection to send messages to later
    $this->clients->attach($conn);
  }
  public function onMessage(ConnectionInterface $from, $msg) {
    foreach ($this->clients as $client) {
      if ($from !== $client) {
        $client->send($msg);
      }
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