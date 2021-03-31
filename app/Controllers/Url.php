<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Url extends BaseController
{
	use ResponseTrait;

	public function index()
	{

		if( $this->isLoggedIn() ){
			
			$id_usuario  = $this->session->get('usuario_id');
			
			
			$urlModel = new \App\Models\UrlModel();
			$infoUrl = $urlModel->where('id_usuario' , $id_usuario)->find();


			$dados = [
				'titulo' => 'Lista de URLs',
				'infoUrl' => $infoUrl
			];
			return view('listaURLs.php', $dados);
		}
		else{
			return redirect()->to(base_url());
		}



	}

	public function Encurtar(){

		if($this->request->isAjax()){
			
			$urlOriginal = $this->request->getPost('urlOriginal');
			$tc = substr(md5(time()), 28, 4);
			$uc = strtoupper(substr(md5($urlOriginal), 5, 3));
			$c1 = substr($tc, 0, 1);
			$c2 = substr($uc, 0, 1);
			$c3 = substr($tc, 1, 1);
			$c4 = substr($uc, 1, 1);
			$c5 = substr($tc, 2, 1);
			$c6 = substr($uc, 2, 1);
			$c7 = substr($tc, 3, 1);
			$codigo = $c1.$c2.$c3.$c4.$c5.$c6.$c7;
			$insereUrl = new \App\Models\UrlModel();
			$urlCurta = base_url('/'.$codigo);
			$consultaCodigo = new \App\Models\UrlModel();
			if($consultaCodigo->where('codigo', $codigo)->find()){
				$ncodigo = substr(md5(time().$codigo), 0, 7);
				$codigo = $ncodigo;
			}


			if( $this->isLoggedIn() ){
				
				$id_usuario = $this->session->get('usuario_id');

				$dados = [
					'codigo' => $codigo,
					'url_original' => $urlOriginal,
					'url_curta' => $urlCurta,
					'id_usuario' => $id_usuario,
					'acessos' => 0
		
				];

				if($insereUrl->insert($dados)){
					$result = [];
					$r = ['urlCurta' => $urlCurta, 'validade' => 1];
					$result[] = $r;
		
					return $this->setResponseFormat('json')->respond($result);
				}
				else{
					$result = [];
					$r = ['urlCurta' => $urlCurta, 'validade' => 0];
					$result[] = $r;
		
					return $this->setResponseFormat('json')->respond($result);
				}

					

			}
			else{

				$id_usuario = NULL;

				$dados = [
					'codigo' => $codigo,
					'url_original' => $urlOriginal,
					'url_curta' => $urlCurta,
					'id_usuario' => $id_usuario,
					'acessos' => 0
		
				];

				if($insereUrl->insert($dados)){
					$result = [];
					$r = ['urlCurta' => $urlCurta, 'validade' => 1];
					$result[] = $r;
		
					return $this->setResponseFormat('json')->respond($result);
				}
				else{
					$result = [];
					$r = ['urlCurta' => $urlCurta, 'validade' => 0];
					$result[] = $r;
		
					return $this->setResponseFormat('json')->respond($result);
				};	
			}


			
		}
		else{
			throw new PageNotFoundException();
		}
		
	}

	public function Redirecionar($codigo){
		
		$redirecionaUrl = new \App\Models\UrlModel();

		$consultaUrl = $redirecionaUrl->where('codigo', $codigo)->find();
		$acessos = $consultaUrl[0]->acessos;
		$id = $consultaUrl[0]->id;
		$acessos += 1;

		$dados = ['acessos' => $acessos];

		if($redirecionaUrl->where('codigo', $codigo)->find()){

			$url_original = $consultaUrl[0]->url_original;
			$redirecionaUrl->where('codigo', $codigo)->update($id, $dados);

			return redirect()->to($url_original);

		}
		else{
			$this->session->setFlashData('msgErroURL', 'URL original não encontrada!');
			return redirect()->to(base_url());
		}

	}


}
