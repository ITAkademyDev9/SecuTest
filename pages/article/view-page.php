<?php
	if(isset($_GET['id']) && is_numeric(intval($_GET['id']))){
		$id = intval($_GET['id']);
		$article_req = $_ELIOT->query('SELECT * FROM articles WHERE id='.$id);
	}else{
		$article_req = $_ELIOT->query('SELECT * FROM articles ORDER BY created DESC limit 0,1');
	}

	$article_res = $article_req->fetchObject();
	if( empty($article_res) ){
		header('location: /');
	}

	$iduser_req = $_ELIOT->query('SELECT id, username FROM users WHERE id='.$article_res->id_users);
	$iduser_res = $iduser_req->fetchObject();
?>

<style class="cp-pen-styles">
	input, textarea {
	  outline: none;
	  border: none;
	  display: block;
	  margin: 0;
	  padding: 0;
	  -webkit-font-smoothing: antialiased;
	  font-family: "PT Sans", "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
	  font-size: 1rem;
	  color: #555f77;
	}
	input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {
	  color: #ced2db;
	}
	input::-moz-placeholder, textarea::-moz-placeholder {
	  color: #ced2db;
	}
	input:-moz-placeholder, textarea:-moz-placeholder {
	  color: #ced2db;
	}
	input:-ms-input-placeholder, textarea:-ms-input-placeholder {
	  color: #ced2db;
	}

	p {
	  line-height: 1.3125rem;
	}

	.comments {
	  margin: 20px auto 0;
	  max-width: 100%;
	  padding: 0 0;
	}

	.comment-wrap {
	  margin-bottom: 1.25rem;
	  display: table;
	  width: 100%;
	  min-height: 5.3125rem;
	}

	.photo {
	  padding-top: 0.625rem;
	  display: table-cell;
	  width: 3.5rem;
	}
	.photo .avatar {
	  height: 2.25rem;
	  width: 2.25rem;
	  border-radius: 50%;
	  background-size: contain;
	}

	.comment-block {
	  padding: 1rem;
	  background-color: #fff;
	  display: table-cell;
	  vertical-align: top;
	  border-radius: 0.1875rem;
	  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.08);
	}
	.comment-block textarea {
	  width: 100%;
	  resize: none;
	}

	.comment-text {
	  margin-bottom: 1.25rem;
	}

	.bottom-comment {
	  color: #acb4c2;
	  font-size: 0.875rem;
	}

	.comment-date {
	  float: left;
	}

	.comment-actions {
	  float: right;
	}
	.comment-actions li {
	  display: inline;
	  margin: -2px;
	  cursor: pointer;
	}
	.comment-actions li.complain {
	  padding-right: 0.75rem;
	  border-right: 1px solid #e1e5eb;
	}
	.comment-actions li.reply {
	  padding-left: 0.75rem;
	  padding-right: 0.125rem;
	}
	.comment-actions li:hover {
	  color: #0095ff;
	}
</style>

<main role="main" class="container">
  <h1 class="mt-5"><?= $article_res->title; ?></h1>
  <a class="btn btn-sm" href="/profil/view/<?= $iduser_res->id; ?>.html"><?= $iduser_res->username; ?></a>
  <div class="card-img-top mb-3" style="background-image:url('<?= $article_res->thumb; ?>');background-repeat:no-repeat;background-position:50%;background-size:auto 100%;width:100%;height:300px;"></div>

	
  <p class="lead" style="border:1px solid #e1e5eb; border-radius:3px;padding:10px;"><?= nl2br(htmlspecialchars($article_res->content)); ?></p>
  <hr>
  <h2>Commentaires : </h2>
<div class="comments">

  	<?php 
  		$comment_req = $_ELIOT->query('SELECT * FROM comments WHERE id_articles='.$article_res->id);
  		while ($comment = $comment_req->fetchObject()) {
  	?>
	<div class="comment-wrap">
		<div class="comment-block">
			<p class="comment-text"><?= nl2br(htmlspecialchars($comment->content)); ?></p>
			<div class="bottom-comment">
				<div class="comment-date"><?= date('d/m/Y H:i', strtotime($comment->created)); ?></div>	
				<ul class="comment-actions">
					<li class="complain"><?= $comment->name; ?></li>
				</ul>
			</div>
		</div>
	</div>

  	<?php
  		}
  	?>
</div>


  <div class="comment">
	<form action="/post/comment/add/<?= $article_res->id; ?>" method="POST" style="padding:20px;border:1px solid #292929;overflow:auto;margin-bottom:20px;">
		<div class="form-group">
			<label for="pseudo">Pseudo</label>
			<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo">
		</div>
		<div class="form-group">
			<label for="comment">Commentaire</label>
			<input type="hidden" value="<?= $article_res->id; ?>" name="id">
			<textarea class="form-control" id="comment" name="comment" placeholder="Votre commentaire" rows="3"></textarea>
		</div>
		<button type="submit" class="btn btn-primary float-right">Commenter</button>
	</form>
  </div>
</main>