<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/* Resolve path */
$dir = dirname(realpath(__FILE__));

/* Loggly logging */
require_once("$dir/lib/Pimple.php");
require_once("$dir/lib/HasInputInterface.php");
require_once("$dir/lib/LogglyInterface.php");
require_once("$dir/lib/Input/InputInterface.php");
require_once("$dir/lib/Input/HttpInputInterface.php");
require_once("$dir/lib/Input/HttpInput.php");
require_once("$dir/lib/Http/ClientInterface.php");
require_once("$dir/lib/Http/AbstractClient.php");
require_once("$dir/lib/Http/AsyncClient.php");
require_once("$dir/lib/Http/BufferedAsyncClient.php");
require_once("$dir/lib/ApiLogger.php");

class Loggly {
  private $logger = null;
  private $CI = null;

  public function __construct()
  {
    $this->CI =& get_instance();
    $loggly_key = $this->CI->config->item('loggly_key');
    $this->logger = new Cowlby\Loggly\ApiLogger($loggly_key);
  }

  public function send($msg)
  {
    $this->logger->send($msg);
  }
}
