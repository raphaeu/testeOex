<?php
namespace App\Model;


class User 
{
    private $id;
    private $password;
    private $descricao;
    private $desvio;
    private $transbordo;
    private $falha;

    function __construct($id, $password, $descricao, $desvio, $transbordo, $falha) {
        $this->id = $id;
        $this->password = $password;
        $this->descricao = $descricao;
        $this->desvio = $desvio;
        $this->transbordo = $transbordo;
        $this->falha = $falha;
    }

    function getId() {
        return $this->id;
    }

    function getPassword() {
        return $this->password;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDesvio() {
        return $this->desvio;
    }

    function getTransbordo() {
        return $this->transbordo;
    }

    function getFalha() {
        return $this->falha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDesvio($desvio) {
        $this->desvio = $desvio;
    }

    function setTransbordo($transbordo) {
        $this->transbordo = $transbordo;
    }

    function setFalha($falha) {
        $this->falha = $falha;
    }


}
