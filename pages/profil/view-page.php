<?php 
  if( isset($_GET['id']) && is_int(intval($_GET['id'])) ){
    $id = intval($_GET['id']);
    $user_req = $_ELIOT->query('SELECT * FROM users WHERE id='.$id);
  }else{
    if( isset($_USER->id) ){
      $user_req = $_ELIOT->query('SELECT * FROM users WHERE id='.$_USER->id);
    }else{
      $user_req = $_ELIOT->query('SELECT * FROM users ORDER BY id DESC limit 0,1');
    }
  }

  $user_res = $user_req->fetchObject();
  $id = $user_res->id;
?>

<main role="main">
  <div class="py-5 bg-light">
    <div class="container">
      <?php 
        if(isset($_USER->id) && ($_USER->id == $id || $_USER->admin == 1)){
      ?>
        <form class="form-signin float-right" action="/post/profile/edit" method="POST">
          <input type="hidden" value="<?= $user_res->id ?>" name="id">
          <button type="submit" style="padding-left: 0;" class="btn btn-link text-blue">Editer</button>
        </form>
      <?php
        }

        if( isset($_USER->id) && $id == $_USER->id){
      ?>
        <a href="/article/new.html" class="btn btn-link text-blue float-right">Nouvel article</a>
      <?php
        }
      ?>
      <h1>Liste des articles de <strong><?= ucfirst($user_res->username); ?></strong></h1>
      <div class="row">
        <?php 
        $articles_req = $_ELIOT->query('SELECT * FROM articles WHERE actif=1 AND id_users='.$_GET['id']);

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
                  if( $iduser_res ){
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
                <?php } ?>
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