
 <?php
include_once("model/model.php");
include_once("view/view.php");

class Controller{
  public $model=null;
  public $view=null;

  function __construct(){

    $this->model = new Model("localhost", "animal_sanctuary", "root", "");
    $this->model->connect();
    $this->view = new View($this->model);
  }

  function invoke(){
    //displays the menu page
    $this->view->display();

  }
}

 ?>
