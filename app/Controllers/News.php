<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NewsModel;

class News extends Controller{

    public function index() {
        $model = new NewsModel();
        $data = [
            'news' => $model->getNews(),
            'title' => 'New archive'
        ];

        echo view('templetes/header', $data);
        echo view('news/overview', $data);
        echo view('templetes/footer', $data);
    }

    public function viewBySlug($slug) {
        $model = new NewsModel();
        $data['news'] = $model->getNews($slug);
        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
        }
        
        $data['title'] = $data['news']['title'];
        echo view('templetes/header', $data);
        echo view('news/view', $data);
        echo view('templetes/footer', $data);
    }

}

?>