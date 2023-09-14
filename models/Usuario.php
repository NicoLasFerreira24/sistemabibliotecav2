
<?php

session_start();
 
require_once $_SERVER ['DOCUMENT_ROOT'] . "/database/DBConexao.php";

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
    public function Buscar($id_usuario){

        try{

            $sql = "SELECT * FROM {$this->table} WHERE id_usuario = :id_usuario";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);
          

        }catch(PDOException $e){

            echo "Erro na preparação da consulta:".$e->getMessage();
    
        }     

    }
    /**
     * Listar todos os registros da tabela usuário
     */
    public function Listar(){

        try{

            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e){

            echo "Erro ao listar dados: ".$e->getMessage();
            return null;
        }

    }
    /**
     * Cadastrar Usuário
     * @param array $dados
     * @return bool
     */
    public function Cadastrar($dados)
    {
        try{

            $sql = "INSERT INTO {$this->table} (nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)";
          
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':nome',$dados['nome']);
            $stmt->bindParam(':email',$dados['email']);
            $stmt->bindParam(':senha',$dados['senha']);
            $stmt->bindParam(':perfil',$dados['perfil']);

            $stmt->execute();
            $_SESSION['sucesso'] = "Cadastro realizado com sucesso!";

            return true;

        }catch (PDOException $e){

            echo"erro na insercao:".$e->getMessage();
            $_SESSION['erro'] = "Erro ao cadastar!";

            return false;

        }
    }

        /*
        * Editar usuário
        *@param int $id
        *$param array @dados
        *@return bool
        */
        public function Editar($id_usuario, $dados){
    
        try{

            $sql = "UPDATE {$this->table} set nome = :nome, email = :email,

            senha = :senha, perfil = :perfil WHERE id_usuario = :id_usuario";

            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':nome',$dados['nome']);
            $stmt->bindParam(':email',$dados['email']);
            $stmt->bindParam(':senha',$dados['senha']);
            $stmt->bindParam(':perfil',$dados['perfil']);
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['sucesso'] = "Usuário editado com sucesso!";
            return true;
        }catch (PDOException $e){

            echo "Erro ao editar:".$e->getMessage();
            return false;

        }    

        
    }
    //Excluir usuário
    public function Excluir($id_usuario){

        try{

            $sql = "DELETE FROM {$this->table} WHERE id_usuario = :id_usuario";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':id_usuario',$id_usuario, PDO:: PARAM_INT);
            $stmt->execute();
            $_SESSION['sucesso'] = "Usuário excluido com sucesso!";
            return true;

        }catch (PDOException $e){

            echo "Erro ao excluir: ".$e->getMessage();
            return false;

        }

    }

 
}




