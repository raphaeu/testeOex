<?php

namespace App\Controller;

use App\Model\User;
use App\Model\UserRepository;
use Core\Controller;
use Core\Session;
use Core\View;


class UserController {

    public function index() {
        $users = UserRepository::listAll();
        return View::render('/user/index', ['users' => $users]);
    }

    public function create() {
        return View::render('/user/create', []);
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
        if (empty($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) $erros['id'] = 'O campo ID é obrigatório e deve ser numérico.';
        if (empty($_REQUEST['password'])) $erros['password'] = 'O campo senha é obrigatório.';
        if (empty($_REQUEST['descricao'])) $erros['descricao'] = 'O campo descricao é obrigatório.';
        if (empty($_REQUEST['desvio']) || !is_numeric($_REQUEST['desvio'])) $erros['desvio'] = 'O campo desvio é obrigatório e deve ser numérico.';
        if (empty($_REQUEST['falha']) || !is_numeric($_REQUEST['falha'])) $erros['falha'] = 'O campo falha é obrigatório e deve ser numérico.';
        if (empty($_REQUEST['transbordo']) || !is_numeric($_REQUEST['transbordo'])) $erros['transbordo'] = 'O campo transbordo é obrigatório e deve ser numérico.';
        if (UserRepository::find($_REQUEST['id'])) $erros['id'] = 'O ID '.$_REQUEST['id'].' ja esta em uso.';
        
        //Verifica se ocorreu algum erro
        if ($erros) {
            //Retorna para o formulario com os erros
            Session::setFlashMessenger('Ops! Existem alguns erros no formalário, favor verificar!', 'danger');
            return View::render('/user/create', ['user' => $user, 'erros'=>$erros]);
        }else{
            //grava dados do usuario
            Session::setFlashMessenger('Usuário adicionado com sucesso', 'success');
            $user = UserRepository::save($user, $id);
            View::redirect('/users');
        }
    }

    public function edit($id) {
        $user = UserRepository::find($id);

        return View::render('/user/edit', ['user' => $user]);
    }

    public function update($id) {



        //Validando campos obrigatorios
        if (empty($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) $erros['id'] = 'O campo ID é obrigatório e deve ser numérico.';
        if (empty($_REQUEST['password'])) $erros['password'] = 'O campo senha é obrigatório.';
        if (empty($_REQUEST['descricao'])) $erros['descricao'] = 'O campo descricao é obrigatório.';
        if (empty($_REQUEST['desvio']) || !is_numeric($_REQUEST['desvio'])) $erros['desvio'] = 'O campo desvio é obrigatório e deve ser numérico.';
        if (empty($_REQUEST['falha']) || !is_numeric($_REQUEST['falha'])) $erros['falha'] = 'O campo falha é obrigatório e deve ser numérico.';
        if (empty($_REQUEST['transbordo']) || !is_numeric($_REQUEST['transbordo'])) $erros['transbordo'] = 'O campo transbordo é obrigatório e deve ser numérico.';
        if ($id != $_REQUEST['id'] && UserRepository::find($_REQUEST['id'])) $erros['id'] = 'O ID '.$_REQUEST['id'].' ja esta em uso.';

        //Criando instancia da classe usuario
        $user = new User();

        $user->setId($_REQUEST['id']);
        $user->setPassword($_REQUEST['password']);
        $user->setDescricao($_REQUEST['descricao']);
        $user->setDesvio($_REQUEST['desvio']);
        $user->setFalha($_REQUEST['falha']);
        $user->setTransbordo($_REQUEST['transbordo']);
        
        //Verifica se ocorreu algum erro
        if ($erros) {
            //Retorna para o formulario com os erros
            Session::setFlashMessenger('Ops! Existem alguns erros no formulário, verifique!', 'danger');
            return View::render('/user/edit', ['user' => $user, 'erros'=>$erros]);
        }else{
            //grava dados do usuario
            Session::setFlashMessenger('Usuário alterado com sucesso', 'success');
            $user = UserRepository::save($user, $id);
            View::redirect('/users');
        }

    }

    public function destroy($id) {

        UserRepository::delete($id);

        Session::setFlashMessenger('Usuário excluido com sucesso', 'success');

        View::redirect('/users');
    }

}
