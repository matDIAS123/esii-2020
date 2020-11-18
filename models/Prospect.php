<?php

namespace models;

/**
 * classe model de prospect
 *@author Matheus Dias
 */
class Prospect
{
	
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
	*facebook do usuario
	*@var string
	*/
	public $facebook;
	/**
	*whatsapp do usuario
	*@var string
	*/
	public $whatsapp;

	
	/**
	*carrega os atributos da classe prospect
	*@param string $nome Nome do prospect
	*@param string $email Email do prospect
	*@param string $celular Celular do prospect
	*@param string $facebook Facebook do prospect
	*@param string $whatsapp Whatsapp do prospect

	*/
	public function addProspect($nome, $email, $celular, $facebook, $whatsapp)
	{
		$this->nome = $nome;
		$this->email = $email;
		$this->celular = $celular;
		$this->facebook = $facebook;
		$this->whatsapp = $whatsapp;
	}
}

?>
