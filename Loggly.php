<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/* Loggly logging */
require_once(APPPATH."lib/Pimple.php");
require_once(APPPATH."lib/HasInputInterface.php");
require_once(APPPATH."lib/LogglyInterface.php");
require_once(APPPATH."lib/Input/InputInterface.php");
require_once(APPPATH."lib/Input/HttpInputInterface.php");
require_once(APPPATH."lib/Input/HttpInput.php");
require_once(APPPATH."lib/Http/ClientInterface.php");
require_once(APPPATH."lib/Http/AbstractClient.php");
require_once(APPPATH."lib/Http/AsyncClient.php");
require_once(APPPATH."lib/Http/BufferedAsyncClient.php");
require_once(APPPATH."lib/ApiLogger.php");

class Loggly {
  $this->logger = null;
  $this->CI = null;

  public function __construct()
  {
    $this->CI =& get_instance();
    $loggly_key = $this->CI->config('loggly_key');
    $this->logger = new Cowlby\Loggly\ApiLogger($loggly_key);
  }

  public function send($msg)
  {
    $this->logger->send($msg);
  }
}
