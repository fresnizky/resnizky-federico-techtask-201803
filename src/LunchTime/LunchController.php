<?php
namespace LunchTime;
 
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
 
class LunchController {

  public function lunch() {
    $ingredients = json_decode(file_get_contents(__DIR__ . '/../../data/ingredients.json'), true);
    $recipes = json_decode(file_get_contents(__DIR__ . '/../../data/recipes.json'), true);
  
    return print_r($recipes);
  }

}