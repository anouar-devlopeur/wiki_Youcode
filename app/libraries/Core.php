<?php
/* 
 *  APP CORE CLASS
 *  Creates URL & Loads Core Controller
 *  URL Format - /controller/method/param1/param2
 */
class Core
{
  // Set Defaults
  protected $currentController = 'Pages'; // Default controller
  protected $currentMethod = 'index'; // Default method
  protected $params = []; // Set initializy empty params array 

  public function __construct()
  {
    $url = $this->getUrl();

    // Look in controllers folder for controller
    if (isset($url[0])) {
      if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 index
        unset($url[0]);
      } else {
        $this->currentController = 'Controller404';
      }
    }

    // Require the current controller
    require_once('../app/controllers/' . $this->currentController . '.php');

    // Instantiate the current controller
    $this->currentController = new $this->currentController;

    // Check if second part of url is set (method)
    if (isset($url[1])) {
      // Check if method/function exists in current controller class
      if (method_exists($this->currentController, $url[1])) {
        // Set current method if it exsists
        $this->currentMethod = $url[1];
        // Unset 1 index
        unset($url[1]);
      }
    }

    // Get params - 
    $this->params = $url ? array_values($url) : [];
    // call a callback with an array of parameters
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  // Construct URL From $_GET['url']
  public function getUrl()
  {
    // htacces url index.php?url=$1
    if (isset($_GET["url"])) {
      // Annuler espace chenge /
      $url = rtrim($_GET["url"], '/');
      //supprimer les slach  "/"final
      $url = filter_var($url, FILTER_SANITIZE_URL);
      //Array 
      $url = explode('/', $url);
      return $url;
    }
  }
}