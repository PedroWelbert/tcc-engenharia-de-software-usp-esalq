<?php

require_once('./views/Console.php');
require_once('./controllers/Log.php');

class Helper {

  public $log;
  public $console;
  public $encryption;

  public function __construct() {
    $this->log = new Log();
    $this->console = new Console();
  }

  public function response($status, $content = null, $message = null) {

    $response = (object) [
      'status' => $status,
      'content' => $content,
      'message' => $message
    ];

    header('Content-Type: application/json; charset=utf-8');
    return json_encode((object) $response);
  }

  /**
  * returns a string from a loaded template file, located in /templates
  * @param string $type String file template name (located in /templates)
  * @param array $where Array template args
  * @return string
  */
  public function renderPhp($template, array $args) {

    $basePath = '';
    if (str_contains($template, '/')) {
      $templateData = explode('/', $template);
      $template = $templateData[count($templateData) - 1];
      $templateData[count($templateData) - 1] = '';

      $basePath = implode('/', $templateData);
    }

    $path = './templates/' . $basePath;
    if ($path) {

      $files = scandir($path);
      foreach ($files as $key => $value) {
        if (str_contains($value, $template)) {

          ob_start();
          include_once($path . $value);
          $content = ob_get_contents();
          ob_end_clean();

          return $content;
        }
      }
    }
  }

  public function sendMail($email, $subject, $message) {
    $server = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $to = $email;
    $from = 'planejamentoestrategico@haoc.com.br';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $sent = (bool) mail($to, $subject, $message, $headers);

    return $sent;
  }
}