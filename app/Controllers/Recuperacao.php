<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Recuperacao extends BaseController
{
	use ResponseTrait;

	public function index()
	{
		if( $this->isLoggedIn() ){
			return redirect()->to(base_url());
		}
		else{
			$titulo['titulo'] = "Recuperação";
			return view('recuperacao.php', $titulo);
		}

	}

        
	public function RecuperaSenha(){
		
		$nomeUsuario = $this->request->getPost('nomeUsuario');
		$emailUsuario = $this->request->getPost('email');

		$recuperacaoModel = new \App\Models\UsuarioModel;

		$dadosUsuario = $recuperacaoModel->where('nome', $nomeUsuario)->find();

		$nome = $dadosUsuario[0]->nome;
		$email = $dadosUsuario[0]->email;

		if($this->request->isAjax()){
			
			if( $nome == $nomeUsuario and $email == $emailUsuario ){
				
				$verificacao = [];
				$v = ['texto' => $dadosUsuario[0]->pergunta , 'validade' => 1];
				$verificacao[] = $v;
	
				return $this->setResponseFormat('json')->respond($verificacao);	
			}
			else{

				$verificacao = [];
				$v = ['texto' => 'O email não corresponde ao nome do usuário!' , 'validade' => 0];
				$verificacao[] = $v;

				return $this->setResponseFormat('json')->respond($verificacao);
			}

		}
		else{
			throw new PageNotFoundException();
		}

	}

	public function GeraSenha(){

		$respostaUsuario = $this->request->getPost('resposta');
		$nomeUsuario = $this->request->getPost('nomeUsuario');
		$emailUsuario = $this->request->getPost('email');

		$gerasenhaModel = new \App\Models\UsuarioModel;

		$dadosUsuario = $gerasenhaModel->where('nome', $nomeUsuario)->find();

		$nome = $dadosUsuario[0]->nome;
		$email = $dadosUsuario[0]->email;
		$resposta = $dadosUsuario[0]->resposta;
		$id = $dadosUsuario[0]->usuario_id;
		$hora = $dadosUsuario[0]->hora_login;

		if($this->request->isAjax()){
			
			if( md5($respostaUsuario) == $resposta ){
				
				$novaSenha = substr(md5($nome.$id.$hora), 4, 8);
				$nsCriptografada = md5($novaSenha);

				$alteraSenha = [ 'senha' => $nsCriptografada ];
				$gerasenhaModel->update($id, $alteraSenha );

				$verificacao = [];
				$v = ['texto' => "Sua nova senha é: <strong> $novaSenha </strong>.", 'validade' => 1, 'senha' => $novaSenha];
				$verificacao[] = $v;
	
				return $this->setResponseFormat('json')->respond($verificacao);	
			}
			else{

				$verificacao = [];
				$v = ['texto' => 'Resposta incorreta!' , 'validade' => 0];
				$verificacao[] = $v;

				return $this->setResponseFormat('json')->respond($verificacao);
			}

		}
		else{
			throw new PageNotFoundException();
		}

	}


}
