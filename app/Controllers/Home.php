<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{

		
		if( $this->isLoggedIn() ){
			$msgAltSucesso = $this->session->getFlashData('msgAlteracaoRealizada');
			$msgErroURL = $this->session->getFlashData('msgErroURL');
			$usuario = $this->session->get('usuario');
			$dados = [
				'titulo' => 'Início',
				'header' => 'headerLogado.php',
				'msgAltSucesso' => $msgAltSucesso,
				'msgErroURL' => $msgErroURL,
				'usuario' => $usuario
			];
			return view('home.php', $dados);
		}
		else{
			$msgErroURL = $this->session->getFlashData('msgErroURL');
			$dados = [
				'msgErroURL' => $msgErroURL,
				'titulo' => 'Início',
				'header' => 'header.php'
			];
			return view('home.php', $dados);
		}
		
		
	}
	

}