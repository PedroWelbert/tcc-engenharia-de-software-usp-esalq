<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kûarasy v<?= KUARASY_VERSION ?></title>

    <link rel="stylesheet" href="<?= SITE_URL ?>/_assets/css/main.css">
  </head>
  <body>
    <section id="kuarasy">
        <div class="decoration">
          <div class="lines">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
          <div class="lines">
            <div class="small"></div>
            <div class="small"></div>
            <div class="small"></div>
            <div class="small"></div>
          </div>
        </div>
        <div class="container">
          <h2>Kûarasy</h2>
          <h4><small>v</small><?= KUARASY_VERSION ?></h4>
          <p>
            You are seeing a <b>view</b>. It's located in <code>/views/example/index.php</code>.<br>
            As this <b>view</b> is setted as <i>DEFAULT_VIEW</i> in <code>/config.php</code> you can access it through <a href="<?= SITE_URL ?>/example/"><?= SITE_URL ?>/<u>example</u>/</a> or just <a href="<?= SITE_URL ?>"><?= SITE_URL ?></a>
          </p>
          <a class="btn" href="<?= SITE_URL ?>/example/subview/">
            Access the subview
          </a>
        </div>
      </section>
  </body>
</html>
