<?php
class SingleController extends Controller
{
    private $tags_Wiki;
    public function __construct()
    {
        // $this->tags_Wiki=$this->model('Tags_WikiDao');

    }
    public function index()
    {
        $data = [
            'title' => 'Post',
            // 'post'=>$this->tags_Wiki->getAllAFFiche()
        ];

        $this->view('pages/users/SingleWiki', $data);
    }
    public function Single()
    {
        if (isset($_GET['id'])) {
            echo $_GET['id'];

            redirect('SingleController/SingleWiki');
        }

    }

}