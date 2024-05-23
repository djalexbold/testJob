<?php
class Main extends controller
{

    public function index()
    {
        //sessionManager::createSession(["UserId" => '']); // U can use CreateSession for session
        //helper::redirect('/'); // user helper class and u can modify for new unspesific methods
        //$this->sessionManager->isLogged(); // is logged in control u can use is logged if u used create session which session name is UserId
        //$simple_imported_class = $this->importClass('basic_class/test','test'); // u can import a third party or your own class with file path and class name not: your class should be in classes folder
        //$simple_imported_class->testMethod(); // run an example method from the called class after calling a third party class
        //$simpledata = $this->model('MainModel')->getSimpleData(); // get simple data
        $simpledata = $this->model('JsonModel')->readJSONFile();
        $this->render("partition/header"); // render header html
        $this->render("partition/sidebar"); // render sidebar html
        $this->render("/home",['data'=>$simpledata]); // render home page with parameters. U can use  $params['data'] on views/home.php
        $this->render("partition/footer"); // render footer html
    }

}
