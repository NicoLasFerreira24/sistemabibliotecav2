<?php 

class Emprestimos{

    protected $db;
    protected $table = "emprestimos";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    public function Buscar($id){

        try{

            $sql = "SELECT * FROM {$this->table} WHERE id_livro = :id";

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

            $sql = "INSERT INTO{$this->table} (titulo, autor, numero_pagina, preco, ano_publicacao, isbn)VALUES(:titulo, :autor, :numero_pagina, :preco, :ano_publicacao, :isbn)";
            $stmt = $this->db->prepare($sql);

        }catch(PDOException $e){

            echo "Erro na preparaçao da consulta:".$e->getMessage();

        }

        $stmt->bindParam(':titulo',$dados['titulo']);
        $stmt->bindParam(':autor',$dados['autor']);
        $stmt->bindParam(':numero_pagina',$dados['numero_pagina']);
        $stmt->bindParam(':preco',$dados['preco']);
        $stmt->bindParam(':ano_publicacao',$dados['ano_publicacao']);
        $stmt->bindParam(':isbn',$dados['isbn']);

        try{

            $stmt->execute();

            echo "Cadastro bem-sucedido!";

        }catch (PDOException $e){

            echo "Erro ao cadastrar:".$e->getMessage();

        }
    }

    public function Editar($id, $dados){
    
        try{

            $sql = "UPDATE {$this->table} set titulo = :titulo, autor = :autor, numero_pagina = :numero_pagina,
            preco = :preco, ano_publicacao = :ano_publicacao, isbn = :isbn WHERE id_livro = :id";

            $stmt = $this->db->prepare($sql);

        }catch (PDOException $e){

            echo "Erro ao editar dados:".$e->getMessage();

        }

        $stmt->bindparam(':titulo',$dados['titulo']);
        $stmt->bindparam(':autor',$dados['autor']);
        $stmt->bindParam(':numero_pagina',$dados['numero_pagina']);
        $stmt->bindParam(':preco',$dados['preco']);
        $stmt->bindParam(':ano_publicacao',$dados['ano_publicacao']);
        $stmt->bindParam(':isbn',$dados['isbn']);

        try{

            $stmt->execute();

            echo "Atualização bem-sucedida!";

        }catch (PDOException $e){

            echo "Erro ao atualizar:".$e->getMessage();

        }

    }

    public function Excluir($id){

        try{

            $sql = "DELETE FROM {$this->table} WHERE id_livro = :id";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':id',$id, PDO:: PARAM_INT);

            $stmt->execute();  

        }catch (PDOException $e){

            echo "Erro ao excluir dados: ".$e->getMessage();

        }

    }
}