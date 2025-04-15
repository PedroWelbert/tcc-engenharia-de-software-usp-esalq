<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filmes</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 2rem;
      background: #f4f4f4;
    }

    .container {
      max-width: 900px;
      margin: auto;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .movie-card {
      display: flex;
      background: #fff;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    .poster {
      width: 150px;
      height: 100%;
      object-fit: cover;
    }

    .movie-info {
      padding: 1rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .movie-info h2 {
      margin: 0;
      font-size: 1.4rem;
      color: #333;
    }

    .movie-info p {
      margin: 6px 0;
      color: #555;
      font-size: 0.95rem;
    }

    .footer {
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #999;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php foreach ($contents as $movie): ?>
      <div class="movie-card">
        <img class="poster" src="<?= htmlspecialchars($movie['poster']) ?>" alt="Poster do filme">
        <div class="movie-info">
          <h2><?= htmlspecialchars($movie['name']) ?></h2>
          <p><strong>Sinopse:</strong> <?= nl2br(htmlspecialchars($movie['plot'])) ?></p>
          <p><strong>Gênero:</strong> <?= htmlspecialchars($movie['genre']) ?></p>
          <p><strong>Diretor:</strong> <?= htmlspecialchars($movie['director']) ?></p>
          <p><strong>Duração:</strong> <?= htmlspecialchars($movie['duration']) ?></p>
          <p><strong>Avaliação:</strong> <?= htmlspecialchars($movie['rating']) ?></p>
          <p><strong>ID:</strong> <?= htmlspecialchars($movie['id']) ?></p>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="footer">
      <p>Microframework</p>
      <?= 'System Load Average: ' . sys_getloadavg()[0] ?><br>
      <?= 'Memory: ' . round(memory_get_usage() / 1024, 2) . ' KB' ?><br>
      <?php 
        $executionTime = microtime(true) - KUARASY_START_TIME;
        echo("Tempo de execução: " . round($executionTime, 4) . " segundos");
      ?>
    </div>
  </div>
</body>
</html>
