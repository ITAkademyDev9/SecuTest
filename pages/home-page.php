  <link href="http://getbootstrap.com/docs/4.1/examples/album/album.css" rel="stylesheet">
</head>
<body>

<?php include './nav.php'; ?>

<main role="main">

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <?php 
          $articles_req = $_ELIOT->query('SELECT * FROM articles WHERE actif=1');

        while ($article = $articles_req->fetchObject()){
        ?>
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <div class="card-img-top" style="background-image:url('<?= $article->thumb; ?>');background-repeat:no-repeat;background-position:50%;background-size:cover;width:348px;height:225px;"></div>
              <div class="card-body">
                <p class="card-text"><?= $article->title; ?></p>
                <?php 
                  $iduser_req = $_ELIOT->query('SELECT id, username FROM users WHERE id='.$article->id_users);
                  $iduser_res = $iduser_req->fetchObject();
                ?>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a class="btn btn-sm" href="/profil/view/<?= $iduser_res->id; ?>.html"><?= $iduser_res->username; ?></a>
                    <a class="btn btn-sm btn-outline-secondary" href="/article/view/<?= $article->id; ?>.html">View</a>
                    <?php if($_USER != false && $_USER->id == $article->id_users): ?>
                      <a class="btn btn-sm btn-outline-secondary" href="/article/edit/<?= $article->id; ?>.html">Edit</a>
                    <?php endif; ?>
                  </div>
                  <small class="text-muted"><?= date('d/m/Y H:i', strtotime($article->created)); ?></small>
                </div>
              </div>
            </div>
          </div>
        <?php
        }

        ?>

      </div>
    </div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
  </div>
</footer>