<?php

namespace models;

/**
 * classe model de usuario
 *@author Matheus Dias
 */
class Usuario
{
	/**
	* Login de usuario
	*@var string  
	*/
	public $login;
	/**
	*Nome do usuario
	*@var string
	*/
	public $nome;
	/**
	*email do usuario
	*@var string
	*/
	public $email;
	/**
	*celular do usuario
	*@var string
	*/
	public $celular;
	/**
	*ideentifica se o usuario esta ou nao logado
	*@var boolean
	*/
	public $logado;
	
	/**
	*carrega os atributos da classe usuario
	*@param string $login Login do usuario
	*@param string $nome Nome do usuario
	*@param string $email Email do usuario
	*@param string $celular Celular do usuario
	*@param boolean $logado Identifica se o usuario esta ou nao logado
	*return void 
	*/
	public function addUsuario($login, $nome, $email, $celular, $logado)
	{
		$this->login = $login;
		$this->nome = $nome;
		$this->email = $email;
		$this->celular = $celular;
		$this->logado = $logado;
	}
}

?>
