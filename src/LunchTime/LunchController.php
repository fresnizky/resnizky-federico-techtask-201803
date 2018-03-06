<?php
namespace LunchTime;
 
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
 
class LunchController {
  protected $currentDate;

  public function lunch() {
    $ingredients = json_decode(file_get_contents(__DIR__ . '/../../data/ingredients.json'), true);
    $recipes = json_decode(file_get_contents(__DIR__ . '/../../data/recipes.json'), true);
  
    $this->currentDate = new \DateTime();
    $ingredients = array_filter($ingredients['ingredients'], function($ingredient) {
        $ingredientDate = \DateTime::createFromFormat('Y-m-d', $ingredient['use-by']);

        return $ingredientDate > $this->currentDate;
    });

    return print_r($ingredients);
  }
}