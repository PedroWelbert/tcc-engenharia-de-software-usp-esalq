<?php 

  require_once(dirname(__DIR__, 1) . '/controllers/Movie.php');

  class MovieView extends BaseView {

    private $controller;
    
    public function __construct() {
      parent::__construct();
      $this->controller = new MovieController();
    }

    public function loadInnerView($view, $subview = null, $contents = null) {
      $contents = $this->controller->getMovies();

      self::load($view, $subview, $contents);
    }
  }
