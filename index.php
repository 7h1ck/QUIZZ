<?php
   define("URL_ASSETS","http://localhost/bases/quizz/assets");

  require_once('./libs/Router.php');
   $router=new Router();
   //controller/methode=>UC
   $router->getRoute();
   /*
   $sec=new Security();
   $sec->showPage();
   $obj->{$method}()
   */
?>