<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
 
// Include the template files needed for the page
require_once(FS_TEMPLATES . 'templateEngine.php');
require_once(FS_TEMPLATES . 'postTemplate.php');

class highlightedPostsTemplate extends templateEngine
{

    /**
     * These are the data fields expected for this template. This
     * is a white list of fields.
     *
     * @var array
     */
    protected $whiteList = ['id', 'title', 'content', 'image'];

    public function __construct(){
		
        $temp = <<<HTML

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src={{image}} alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
					<a href="?id={{id}}">{{title}}</a>
                  </h4>
                  <p class="card-text">{{content}}</p>
                </div>
              </div>
            </div>
HTML;

        $this->template = $temp;
    }
}

?>

