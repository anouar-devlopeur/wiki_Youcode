<?php
  // Simple page redirect
  function redirect($page){
    header('location: '.URLROOT.'/'.$page);
  }
  function isAdmin(){
    if(isset($_SESSION['userRole'])){
      if($_SESSION['userRole']==2){
        return true;
      }
    }
    return false;
  }