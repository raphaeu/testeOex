<?php

namespace App\Controller;

use App\Model\User;
use App\Model\UserRepository;
use Core\Controller;

class UserController extends Controller {

    public function index() {
        $users = UserRepository::listAll();
        return $this->view('/user/index', ['users' => $users]);
    }

    public function create() {
        return $this->view('/user/create', []);
    }

    public function store() {

        $user = new User();

        $user->setId($_REQUEST['id']);
        $user->setPassword($_REQUEST['password']);
        $user->setDescricao($_REQUEST['descricao']);
        $user->setDesvio($_REQUEST['desvio']);
        $user->setFalha($_REQUEST['falha']);
        $user->setTransbordo($_REQUEST['transbordo']);

        //Validando campos obrigatorios
        if (empty($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) $erros['id'] = 'O campo ID e obrigatorio e numerico.';
        if (empty($_REQUEST['password'])) $erros['password'] = 'O campo password e obrigatorio.';

        //Verifica se ocorreu algum erro
        if ($erros) {
            //Retorna para o formulario com os erros
            return $this->view('/user/create', ['user' => $user, 'erros'=>$erros]);
        }else{
            //grava dados do usuario
            $user = UserRepository::save($user, $id);
            $this->redirect('/users');
        }
    }

    public function edit($id) {
        $user = UserRepository::find($id);

        return $this->view('/user/edit', ['user' => $user]);
    }

    public function update($id) {

        //Criando instancia da classe usuario
        $user = new User();

        $user->setId($_REQUEST['id']);
        $user->setPassword($_REQUEST['password']);
        $user->setDescricao($_REQUEST['descricao']);
        $user->setDesvio($_REQUEST['desvio']);
        $user->setFalha($_REQUEST['falha']);
        $user->setTransbordo($_REQUEST['transbordo']);

        //Validando campos obrigatorios
        if (empty($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) $erros['id'] = 'O campo ID e obrigatorio e numerico.';
        if (empty($_REQUEST['password'])) $erros['password'] = 'O campo password e obrigatorio.';

        //Verifica se ocorreu algum erro
        if ($erros) {
            //Retorna para o formulario com os erros
            return $this->view('/user/edit', ['user' => $user, 'erros'=>$erros]);
        }else{
            //grava dados do usuario
            $user = UserRepository::save($user, $id);
            $this->redirect('/users');
        }

    }

    public function destroy($id) {

        UserRepository::delete($id);

        $this->redirect('/users');
    }

}
