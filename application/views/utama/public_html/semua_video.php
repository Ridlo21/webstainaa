<div class="main">
    <section id="blog" class="blog">
        <div class="container">
            <div class="row">
                <?php foreach ($video->result_array() as $value) { ?>
                    <div class="col-md-4 mt-4" data-aos="fade-left">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?= $value['youtube'] ?>" allowfullscreen></iframe>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="blog-pagination mt-4">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </section>
</div>