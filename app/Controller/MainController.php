<?php
namespace App\Controller;

class MainController {
    protected $conn;

    public function __construct($conn){
        $this->conn=$conn;
    }

    public function render(string $view ,array $data =[]){
        extract($data);
        require_once  __DIR__ . '/../../views/layout.php';
    }
}

