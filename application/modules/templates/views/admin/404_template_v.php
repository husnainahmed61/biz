<div class="row">
    <div class="col-md-12 page-404">
        <div class="number font-green"> <?= isset($error_code ) ?  $error_code : 404 ?> </div>
        <div class="details">
            <h3>Oops! You're lost.</h3>
            <p> We can not find the page you're looking for.</p>
            <a href="<?= base_url('admin')?>" class="btn green"> Return home </a>
        </div>
    </div>
</div>