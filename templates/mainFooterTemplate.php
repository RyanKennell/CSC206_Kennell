<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
 
// Include the template files needed for the page
require_once(FS_TEMPLATES . 'templateEngine.php');

class mainFooterTemplate extends templateEngine
{
    public function __construct(){

        $temp = <<<HTML
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; The Paper 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
HTML;

        $this->template = $temp;
    }
}

?>