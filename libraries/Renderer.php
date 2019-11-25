<?php

class Renderer 
{    
  /**
   * Affiche un template HTML en injectant les $variables
   * 
   * @param string $path
   * @param array $variables
   * @return void
   */
  public static function render(string $path, array $variables = [])
  {
    extract($variables);
    ob_start();
    require('views/' . $path . '.html.php');
    $pageContent = ob_get_clean();
    require('views/layout.html.php');
  }
}