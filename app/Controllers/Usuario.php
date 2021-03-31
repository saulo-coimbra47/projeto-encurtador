<?php namespace App\Controllers;



class Usuario extends BaseController
{
	public function index()
	{
		if( $this->isLoggedIn() ){
			return redirect()->to(base_url());
		}
		else{
			$msgSucesso = $this->session->getFlashData('msgSucessoCadastro');
			$msgErro = $this->session->getFlashData('msgErroLogin');
			$dados = [
				'titulo' => 'Login',
				'msgSucesso' => $msgSucesso,
				'msgErro' => $msgErro
			];
			return view('login.php', $dados);
		}

	}

	public function Entrar()
	{
		$nome = $this->request->getPost('nome');
		$senha = $this->request->getPost('senha');
		$IP = $_SERVER['REMOTE_ADDR'];

		$dados = [
			'nome' => $nome,
			'senha' => $senha,
			'IP' => $IP
		];

		$loginModel = new \App\Models\UsuarioModel();
		$res = $loginModel->loginSP( $dados );
		$consultaUsuario = $loginModel->where('nome' , $nome)->find();
		

		$dadosUsuario = [
			'usuario' => $nome,
			'logado' => 1
		];
		
		if( $res == 1 ){
			$usuario_id = $consultaUsuario[0]->usuario_id;
			$this->session->set('usuario_id', $usuario_id);
			$this->session->set($dadosUsuario);
			return redirect()->to(base_url());
		}
		else{
			$this->session->setFlashData('msgErroLogin', 'Nome de usuário ou senha incorreto!');
			return redirect()->to(base_url('/usuario'));
		}
		
	}

	public function Sair(){

		$this->session->destroy();
		return redirect()->to(base_url('/usuario'));
	}

	public function AlteraSenha(){


		if( $this->isLoggedIn() ){
			$nome = $this->session->get('usuario');
			$usuarioModel = new \App\Models\UsuarioModel();
			$infoUsuario = $usuarioModel->where('nome' , $nome)->find();
			
			
			
			$dados = [
				'titulo' => 'Alterar senha',
				'infoUsuario' => $infoUsuario
			];
			return view('trocaSenha.php', $dados);
			
		}
		else{
			return redirect()->to(base_url());
		}
	

	}

	public function GestaoConta(){


		if( $this->isLoggedIn() ){
			$nome = $this->session->get('usuario');
			$usuarioModel = new \App\Models\UsuarioModel();
			$infoUsuario = $usuarioModel->where('nome' , $nome)->find();
			
			$msgAltFalha = $this->session->getFlashData('msgAlteracaoFalha');
			
			$dados = [
				'titulo' => 'Alterar senha',
				'infoUsuario' => $infoUsuario,
				'msgAltFalha' => $msgAltFalha
			];
			return view('trocaSenha.php', $dados);
			
		}
		else{
			return redirect()->to(base_url());
		}
	

	}

	public function ConfirmaTroca(){


		if( $this->isLoggedIn() ){
			$senha = $this->request->getPost('senha');
			$resposta = $this->request->getPost('resposta');
			$usuario = $this->session->get('usuario');
			$alteraModel = new \App\Models\UsuarioModel();
			
			$dadosAlteracao = [
				'usuario' => $usuario,
				'resposta' => $resposta,
				'senha' => $senha
			];
			
			$res = $alteraModel->alteraSenha($dadosAlteracao);

			if( $res == 1 ){
				$this->session->setFlashData('msgAlteracaoRealizada', 'Sua senha foi alterada com sucesso!');
				return redirect()->to(base_url());
			}
			else{
				$this->session->setFlashData('msgAlteracaoFalha', 'Erro! Não foi possível alterar a sua senha.');
				return redirect()->to(base_url('/usuario/gestaoconta'));
			}

		}
		else{
			return redirect()->to(base_url());
		}
	

	}



}
