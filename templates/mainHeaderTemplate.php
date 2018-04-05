<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
 
// Include the template files needed for the page
require_once(FS_TEMPLATES . 'templateEngine.php');

	
class mainHeaderTemplate extends templateEngine
{
	
	public function setContent($content)
	{
		$this->template = $content;
	}
	
    /**
     * This is the html code that makes up the template.  This will
     * be unique to and set in each instance of the class
     *
     * @var null
     */
    public function addHeader()
    {
        $temp = <<<HTML
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Newspaper</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">The Newspaper</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
HTML;
	return $temp;
    }
	
	public function addContent()
	{
		$temp = <<<HTML
		    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Top Stories</h1>
          <div class="list-group">
            <a href="#" class="list-group-item">Article 1</a>
            <a href="#" class="list-group-item">Article 2</a>
            <a href="#" class="list-group-item">Article 3</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="assets/header.jpg" alt="First slide">
              </div>
            </div>
		</div>
HTML;
	return $temp;
	}
}
?>