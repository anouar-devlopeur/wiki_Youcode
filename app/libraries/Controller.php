<?php
  /* 
   *  CORE CONTROLLER CLASS
   *  Loads Models & Views
   */
  class Controller {
    //  load model from controllers
    public function model($model){
      // require model file
      require_once '../app/models/Dao/' . $model . '.php';
      //instant class model
      return new $model();
    }

    //  load view from controllers
    public function view($url, $data = []){
      // Check for view file
      if(file_exists('../app/views/'.$url.'.php')){
        // Require view file
        require_once '../app/views/'.$url.'.php';
      } else {
        // No view exists
        include '../app/views/pages/404.php';
      }
    }
  }