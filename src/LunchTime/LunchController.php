<?php
namespace LunchTime;
 
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
 
class LunchController {
  protected $currentDate;
  protected $ingredients;
  protected $recipes;
  protected $availableRecipes;

  public function lunch() {
    $this->ingredients = json_decode(file_get_contents(__DIR__ . '/../../data/ingredients.json'), true);
    $this->recipes = json_decode(file_get_contents(__DIR__ . '/../../data/recipes.json'), true);
  
    $this->currentDate = new \DateTime();
    
    $this->getValidIngredients();
    $this->availableRecipes = $this->getAvailableRecipes();

    print_r($this->availableRecipes);
    //return print_r(array_column($this->ingredients, 'title'));
  }

  protected function getValidIngredients() {
    $this->ingredients = array_filter($this->ingredients['ingredients'], 
        function($ingredient) {
            $ingredientDate = \DateTime::createFromFormat('Y-m-d', $ingredient['use-by']);

            return $ingredientDate > $this->currentDate;
        }
    );
  }

  protected function getAvailableRecipes() {
    $availableRecipes = [];
    foreach ($this->recipes['recipes'] as $recipe) {
        if (!empty(array_diff($recipe['ingredients'], array_column($this->ingredients, 'title')))) {
            $availableRecipes[] = $recipe;
        } 
    }

    return $availableRecipes;
  }
}