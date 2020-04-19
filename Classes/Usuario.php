<?php

namespace Classes;

require 'Conexao.php';
use Classes\Conexao;

class Usuario {
    
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }
    
    public function listar() {
        
        $sql = "select * from usuario;";       
        $q = $this->conexao->prepare($sql);
        $q->execute();
        return $q;
        
    }
    
    
    //FUNÇÃO INSERT
    //Insere os dados na tabela
    public function inserir($nome, $email, $login, $senha) {
        
        $sql = "insert into usuario (nome, email, login, senha) values (?, ?, ?, ?);";
        $q = $this->conexao->prepare($sql);
        
        
        $q->bindParam(1, $nome);
        $q->bindParam(2, $email);
        $q->bindParam(3, $login);
        $q->bindParam(4, md5($senha));
        
        $q->execute(); 
    }
    
    public function listagem($codigo) {
        
        $sql = "select * from usuario where codigo = :codigo;";       
        $q = $this->conexao->prepare($sql);
        $q->bindparam(1, $codigo);
        $q->execute();
        return $q;
    }
   
    //FUNÇÃO UPDATE
    //Edita os dados da tabela
    public function editar($codigo, $nome, $email, $login) {
       
        $sql = "update usuario set nome = ?, email = ?, login = ? where codigo = ?;";
        $q = $this->conexao->prepare($sql);
        
        $q->bindParam(1, $codigo);
        $q->bindParam(2, $nome);
        $q->bindParam(3, $email);
        $q->bindParam(4, $login);
       
        $q->execute();
    }
    
    //FUNÇÃO DELETE
    //Apaga o usuário da tabela
    public function eliminar($codigo) {
        $sql = "delete from usuario where codigo = :codigo;";
        $q = $this->conexao->prepare($sql);
        $q->bindParam(1, $codigo);
        
        $q->execute();
    }
}
?>