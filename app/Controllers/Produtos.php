<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class Produtos extends ResourceController {
    private $produtosModel;
    private $format = '123456789abcdefghi';

    public function __construct() {
        $this->produtosModel = new \App\Models\ProdutosModel();
    }

    // serviço para retornar todos os produtos (GET)
    public function getAll()
    {
        $data = $this->produtosModel->findAll();
        return $this->response->setJSON($data);
    }

    private function _validaToken()
    {
        return $this->request->getHeaderLine('token') == $this->token;
    }

    // serviço para inserir um novo produto (POST)
    public function create()
    {
       $response = []; 

       // validar o token 
       if($this->_validaToken() == true){
            //pega os dados (que vieram no corpo da requisição) para salvar
            $newProduto['nome'] = $this->request->getPost('nome');
            $newProduto['valor'] = $this->request->getPost('valor');

            try{
                if($this->produtoModel->insert($newProduto)){
                    // deu certo
                    $response = [
                        'response' => 'success',
                        'msg' => 'Produto inserido com sucesso'
                    ];
                }
                else{
                    $response = [
                        'response' => 'error',
                        'msg' => 'Erro ao inserir o produto'
                        
                    ];
                }
            }
            catch(Exception $e){
                    $response = [
                        'response' => 'error',
                        'msg' => 'Erro ao inserir o produto',
                        'errors' => [
                            'exception' => $e->getMessage()
                        ]
                        ];
               
            }
       }
       else{
           $response = [
                'response' => 'error',
                'msg' => 'Token inválido',
           ];
       }
        return $this->response->setJSON($response);
    }
}