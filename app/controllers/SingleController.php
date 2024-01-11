<?php
class SingleController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        $data = [
            'title' => 'Post',

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