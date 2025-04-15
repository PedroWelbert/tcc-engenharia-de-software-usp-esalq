<?php

require_once('Base.php');

class Movie extends BaseModel {
  private $id;
  private $name;
  private $plot;
  private $genre;
  private $duration;
  private $director;
  private $rating;
  private $poster;

  public function __construct(
    $id = null,
    $name = null,
    $plot = null,
    $genre = null,
    $duration = null,
    $director = null,
    $rating = null,
    $poster = null
  ) {
    parent::__construct();

    $this->tableName = 'movie';

    $this->id = $id;   
    $this->name = $name;
    $this->plot = $plot;
    $this->genre = $genre;
    $this->duration = $duration;
    $this->director = $director;
    $this->rating = $rating;
    $this->poster = $poster;
  }

  public function getId() { return $this->id; }
  public function setId($id) { $this->id = $id; }

  public function getName() { return $this->name; }
  public function setName($name) { $this->name = $name; }

  public function getPlot() { return $this->plot; }
  public function setPlot($plot) { $this->plot = $plot; }

  public function getGenre() { return $this->genre; }
  public function setGenre($genre) { $this->genre = $genre; }

  public function getDuration() { return $this->duration; }
  public function setDuration($duration) { $this->duration = $duration; }

  public function getDirector() { return $this->director; }
  public function setDirector($director) { $this->director = $director; }

  public function getRating() { return $this->rating; }
  public function setRating($rating) { $this->rating = $rating; }

  public function getPoster() { return $this->poster; }
  public function setPoster($poster) { $this->poster = $poster; }

  public function getAllMovies() {
    $fields = ['id', 'name', 'plot', 'genre', 'duration', 'director', 'rating', 'poster'];
    return $this->get($fields);
  }

  public static function getBy($field, $value) {
    $movie = new self;

    $fields = ['id', 'name', 'plot', 'genre', 'duration', 'director', 'rating', 'poster'];

    if (!empty($field) && !empty($value)) {
      $where = [
        [
          'field' => $field,
          'operator' => '=',
          'value' => $value   
        ]
      ];
    }

    $result = $movie->get($fields, $where ?? null, true);

    return (!empty($result)) ?     
      new Movie(
        $result['id'],
        $result['name'],
        $result['plot'],
        $result['genre'],
        $result['duration'],
        $result['director'],
        $result['rating'],
        $result['poster']
      ) : 
      $result;  
  }

  public function saveMovie() {
    $fields = [
      'name' => $this->name,
      'plot' => $this->plot,
      'genre' => $this->genre,
      'duration' => $this->duration,
      'director' => $this->director,
      'rating' => $this->rating,
      'poster' => $this->poster
    ];

    if (!empty($this->id)) {
      $where = [
        [
          'field' => 'id',
          'operator' => '=',
          'value' => $this->id     
        ]
      ];
    }

    return $this->save($fields, $where ?? null);
  }

  public function deleteMovie() {
    return $this->delete($this->id);
  }
}
