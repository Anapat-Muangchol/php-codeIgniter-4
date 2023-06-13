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

    public function create() {
        $model = new NewsModel();
        if (
            $this->request->getMethod() === 'post' && 
            $this->validate([
                'title' => 'required|min_length[3]|max_length[255]',
                'body' => 'required'
                ])
        ) {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug' => url_title($this->request->getPost('title'), '-', TRUE),
                'body' => $this->request->getPost('body'),
            ]);
            echo view('news/create_success');
        } else {
            echo view('templetes/header', ['title' => 'Create a news item']);
            echo view('news/create');
            echo view('templetes/footer');
        }
    }

}

?>