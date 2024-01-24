<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Produtos extends ResourceController {
    private $produtosModel;

    public function __construct() {
        $this->produtosModel = new \App\Models\ProdutosModel();
    }

    // serviço para retornar todos os produtos (GET)
    public function getAll()
    {
        $data = $this->produtosModel->findAll();
        return $this->response->setJSON($data);
    }
}