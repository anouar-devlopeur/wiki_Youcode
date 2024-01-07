<?php

  class Controller404 extends Controller {
    public function __construct(){
     
    }
    public function index() {
        $this->view('pages/404');
    }
}
  