<?php namespace App\Controllers;

class Cadastro extends BaseController
{
	public function index()
	{
		if( $this->isLoggedIn() ){
			return redirect()->to(base_url());
		}
		else{
			$msgErro = $this->session->getFlashData('msgErroCadastro');
			$dados = [
				'titulo' => 'Cadastro',
				'msgErro' => $msgErro
			];
			return view('cadastro.php', $dados);
		}	
	}

	public function inserir()
	{
		
		$nome = $this->request->getPost('nomeUsuario');
		$email = $this->request->getPost('email');
		$senha = $this->request->getPost('senha');
		$pergunta = $this->request->getPost('pergunta');
		$resposta = $this->request->getPost('resposta');
		$data_login = null;
		$hora_login = null;
		$IP = $_SERVER['REMOTE_ADDR'];

		$data['erros'] = '';

		$dados = [

			'nome' => $nome,
			'email' => $email,
			'senha' => md5($senha),
			'pergunta' => $pergunta,
			'resposta' => md5($resposta),
			'data_login' => $data_login,
			'hora_login' => $hora_login,
			'IP' => $IP

		];

		

		$pessoaModel = new \App\Models\CadastroModel();
		
		$usuario = $pessoaModel->where('nome', $nome)->findAll();

		if($pessoaModel->insert($dados)){
			$this->session->setFlashData('msgSucessoCadastro', 'Cadastro realizado com sucesso!');
			return redirect()->to(base_url('/usuario'));
		}
		else if($pessoaModel->where('nome', $nome)->findAll()){
			$this->session->setFlashData('msgErroCadastro', 'Nome de usuário indisponível!');
			return redirect()->to(base_url('/cadastro'));
		}
		else if($pessoaModel->where('email', $email)->findAll()){
			$this->session->setFlashData('msgErroCadastro', 'E-mail indisponível!');
			return redirect()->to(base_url('/cadastro'));
		}
	}
}