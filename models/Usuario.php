<?php

class Usuario
{

    protected $db;
    protected $table = "usuarios";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    /**
     * Buscar registro unico
     * @param int $id
     * @return
     */
    public function buscar($id)
    {
    }

    /**
     * Listar todos os registros da tabela usuários
     */
    public function listar()
    {
    }

    /**
     * Cadastrar usuário
     * @param array $dados
     * @return bool
     */
    public function Cadastrar($dados)
    {
    }

    /*
    * Editar usuário
    *@param int $id
    *$param array @dados
    *@return bool
    */
    public function editar($id, $dados)
    {
    }

    //Excluir usuário
    public function excluir($id)
    {
    }
}
