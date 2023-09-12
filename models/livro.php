<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBconexao.php";

   // require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Aluno.php";
class Livro{

    protected $db;
    protected $table = "livros";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    /**
     * Buscar registro unico
     * @param int $id
     * @return livro|null
     */
    public function buscar($id){
        try{
            $sql = "SELECT * FROM {$this->table} WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);            
        }catch(PDOException $e)
        {
            echo "Erro ao Buscar: ".$e->getMessage();
            return null;
        }
        
    }

    /**
     * Listar todos os registros da tabela alunos
     */
    public function listar(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);            
        }catch(PDOException $e){
            echo "Erro ao listar: ".$e->getMessage();
            return null;
        }
    }
     /**
     * Cadastrar usuário
     * @param array $dados
     * @return bool
     */
    public function Cadastrar($dados){
        try{
            $query = "INSERT INTO {$this->table} (titulo,autor,numero_pagina,preco,ano_publicacao,isbn) VALUES (:titulo,:autor,:numero_pagina,:preco,:ano_publicacao,:isbn)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':titulo', $dados['titulo']);
            $stmt->bindParam(':autor', $dados['autor']);
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
            $stmt->bindParam(':preco', $dados['preco']);
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
            $stmt->bindParam(':isbn', $dados['isbn']);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: ".$e->getMessage();
            return false;
        }
    }
    /**
     * Editar Usuário
     * 
     * @param int $id
     * @param array $dados
     * @return bool
     */

     public function editar($id, $dados){
        try {
            $sql = "UPDATE {$this->table} SET titulo = :titulo, autor = autor, numero_pagina = :numero_pagina, preco = :preco, ano_publicacao = :ano_publicacao, :isbn = isbn WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':titulo', $dados['titulo']);
            $stmt->bindParam(':autor', $dados['autor']);
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
            $stmt->bindParam(':preco', $dados['preco']);
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
            $stmt->bindParam(':isbn', $dados['isbn']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao editar: ".$e->getMessage();
            return false;
        }
    }

    //Excluir usuário
    public function excluir($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir: ".$e->getMessage();
            return false;
        }
    }
}