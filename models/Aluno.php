<?php

require_once $_SERVER ['DOCUMENT_ROOT'] . "/database/DBConexao.php";

class Alunos{

    protected $db;
    protected $table = "alunos";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    public function Buscar($id){

        try{

            $sql = "SELECT * FROM {$this->table} WHERE id_aluno = :id";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            echo "Consulta bem sucedida!";

        }catch(PDOException $e){

            echo "Erro na preparação da consulta:".$e->getMessage();
    
        }     

    }

    public function Listar(){

        try{

            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e){

            echo "Erro ao listar dados: ".$e->getMessage();
        }

    }

    public function Cadastrar($dados)
    {
        try{

            $sql = "INSERT INTO{$this->table} (nome, cpf, email, telefone, celular, data_nascimento)VALUES(:nome, :cpf, :email, :telefone, :celular, :data_nascimento)";
            $stmt = $this->db->prepare($sql);

        }catch(PDOException $e){

            echo "Erro na preparaçao da consulta:".$e->getMessage();

        }

        $stmt->bindParam(':nome',$dados['nome']);
        $stmt->bindParam(':cpf',$dados['cpf']);
        $stmt->bindParam(':email',$dados['email']);
        $stmt->bindParam(':telefone',$dados['telefone']);
        $stmt->bindParam(':celular',$dados['celular']);
        $stmt->bindParam(':data_nascimento',$dados['data_nascimento']);

        try{

            $stmt->execute();

            echo "Cadastro bem-sucedido!";

        }catch (PDOException $e){

            echo "Erro ao cadastrar:".$e->getMessage();

        }
    }

    public function Editar($id, $dados){
    
        try{

            $sql = "UPDATE {$this->table} set nome = :nome, cpf = :cpf, email = :email,
            telefone = :telefone, celular = :celular, data_nascimento = :data_nascimento WHERE id_aluno = :id";

            $stmt = $this->db->prepare($sql);

        }catch (PDOException $e){

            echo "Erro ao editar dados:".$e->getMessage();

        }

        $stmt->bindparam(':nome',$dados['nome']);
        $stmt->bindparam(':cpf',$dados['cpf']);
        $stmt->bindParam(':email',$dados['email']);
        $stmt->bindParam(':telefone',$dados['telefone']);
        $stmt->bindParam(':celular',$dados['celular']);
        $stmt->bindParam(':data_nascimento',$dados['data_nascimento']);

        try{

            $stmt->execute();

            echo "Atualização bem-sucedida!";

        }catch (PDOException $e){

            echo "Erro ao atualizar:".$e->getMessage();

        }

    }

    public function Excluir($id){

        try{

            $sql = "DELETE FROM {$this->table} WHERE id_aluno = id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':id',$id, PDO:: PARAM_INT);

            $stmt->execute();  

        }catch (PDOException $e){

            echo "Erro ao excluir dados: ".$e->getMessage();

        }

    }
}