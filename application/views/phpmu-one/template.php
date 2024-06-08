<!DOCTYPE html>
<html lang="id-ID">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <title><?php echo $title; ?></title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no'/>
  <meta name="robots" content="index, follow">
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="keywords" content="<?php echo $keywords; ?>">
  <meta name="author" content="Frelance">
  <meta http-equiv="imagetoolbar" content="no">
  <meta name="language" content="Indonesia">
  <meta name="revisit-after" content="7">
  <meta name="webcrawlers" content="all">
  <meta name="rating" content="general">
  <meta name="spiders" content="all">
  
  <link rel="shortcut icon" href="<?php echo base_url()?>asset/images/favicon.png" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />
  <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/functions.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/agenda.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/lowongan.css">
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=524488270912102";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  $(document).ready(function(){
        $("#hilang").click(function(){ $("#pageshare").hide(); });
        $("#tutupchat").click(function(){ $("#pageshare").show(); });
        $("#closed").click(function(){ $("#notifhide").hide(); });
    });
  </script>
</head>

<body class="home blog">
    <?php include "menu-atas.php"; ?>
    <div style="clear:both"></div>
      <div style='margin-bottom:-20px;' id="head" class="wrap">  
          <a href="index.php"><img class="brand-image img-circle elevation-1"style="opacity: .8;" src="<?php echo base_url(); ?>asset/logo/logo_header.png" id="logo"></a>
          
      </div>
    <div style="clear:both"></div>

    <?php echo $contents; ?>
    <?php $this->model_main->kunjungan(); ?>
</body>
</html>