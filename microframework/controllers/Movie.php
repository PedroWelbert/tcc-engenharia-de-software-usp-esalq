<?php

require_once(dirname(__DIR__, 1) . '/models/Movie.php');
require_once(dirname(__DIR__, 1) . '/controllers/Base.php');

class MovieController extends BaseController {  
  private $model;
  
  public function __construct() {    
    parent::__construct();
    $this->model = new Movie();
  }

  public function saveMovie() {
    if (
      isset($_POST['id']) ||
      (isset($_POST['name']) && isset($_POST['director']) && isset($_POST['plot']) && isset($_POST['genre']) && isset($_POST['duration']))
    ) {
      if (isset($_POST['id'])) {
        $movie = Movie::getBy('id', $_POST['id']);
        if (empty($movie)) {
          return $this->helper->response(false, null, 'Movie not found.');
        }
      } else {
        $movie = Movie::getBy('name', $_POST['name']);
        if (!empty($movie)) {
          return $this->helper->response(false, null, 'Movie with this name already exists.');
        }

        $movie = new Movie();  
      }

      if (isset($_POST['name']))     $movie->setName($_POST['name']);
      if (isset($_POST['plot']))     $movie->setPlot($_POST['plot']);
      if (isset($_POST['genre']))    $movie->setGenre($_POST['genre']);
      if (isset($_POST['duration'])) $movie->setDuration($_POST['duration']);
      if (isset($_POST['director'])) $movie->setDirector($_POST['director']);
      if (isset($_POST['rating']))   $movie->setRating($_POST['rating']);
      if (isset($_POST['poster']))   $movie->setPoster($_POST['poster']);

      $saved = (bool) $movie->saveMovie();
      return $this->helper->response($saved);
    } else {
      return $this->helper->response(false, null, 'Missing required parameters.');
    }
  }

  public function deleteMovie() {
    if (isset($_POST['id'])) {
      $movie = Movie::getBy('id', $_POST['id']);

      if (!empty($movie)) {
        return $this->helper->response((bool) $movie->deleteMovie()); 
      } else {
        return $this->helper->response(false, null, 'Movie not found.');
      } 
    } else {
      return $this->helper->response(false, null, 'Missing movie ID.');
    }
  }

  public function getMoviesApi() {
    return $this->helper->response(true, $this->model->getAllMovies());
  }

  public function getMovies() {
    return $this->model->getAllMovies();
  }
}
