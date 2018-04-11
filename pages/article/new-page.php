<main role="main">
	<div class="py-5 bg-light">
		<style>.form-group.required .control-label:after {content:"*";color:red;}</style>
		<div class="container">
			<div class="row">
				<h1>Nouvel article</h1>
				<div class="col col-md-12">
					<form enctype="multipart/form-data" style="overflow: auto;" method="POST" action="/post/article/add">
						<div class="form-group required">
							<label for="titre" class='control-label'>Titre</label>
							<input type="text" class="form-control" name="titre" id="titre" placeholder="Mon Super Article">
						</div>
						<div class="form-group required">
							<label for="texte" class='control-label'>Texte</label>
							<textarea class="form-control" id="texte" name="texte" rows="3" placeholder="Votre texte"></textarea>
						</div>
						<div class="form-group">
							<label for="image" style="width:100%;padding:15px 20px;border:2px #343a40 dashed;font-weight:700;text-align:center;cursor:pointer;">Image</label>
							<input type="file" class="form-control-file" id="image" name="image" style="display:none;">
						</div>
						<button type="submit" class="btn btn-primary float-right">Publier</button>
					</form>
				</div>
			</div>
		</div>

	</div>
</main>