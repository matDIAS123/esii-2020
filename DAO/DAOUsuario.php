<?php
namespace DAO;
mysqli_report(MYSQLI_REPORT_STRICT);
require_once('../models/Usuario.php');
use models\Usuario;

/**
*Esta classe é responsavel por fazer a comunicação com o banco de dados
*promovendo as funções de logar e incluir novo usuario
*@author Matheus Dias
*/

class DAOUsuario{

	/**
	*Funcao para fazer o login no sistema, validando os dados fornecidos pelo usuario
	*@param string $login Login do usuario
	*@param string $senha Senha do usuario
	*@return Usuario|Exception|
	*/

	public function logar($login, $senha){
		try{
			$connDB = $this->conectarBanco();
		 }catch (\Exception $e){
			die($e->getMessage());
		 }
   
   
		 $usuario = new Usuario();
   
		 $sql = $connDB->prepare("select login, nome, email, celular from usuario
								   where
								   login = ?
								   and
								   senha = ?");
		 $sql->bind_param('ss', $login, $senha);
		 $sql->execute();
		 if(!$sql->error){
			$resultado = $sql->get_result();
   
			if($resultado->num_rows === 0){
			   $usuario->addUsuario(null, null, null, null, FALSE);
			   throw new \Exception("Usuário ou senha inválidos!");
			}else{
			   while($linha = $resultado->fetch_assoc()){
				  $usuario->addUsuario($linha['login'], $linha['nome'], $linha['email'], $linha['celular'], TRUE);
			   }
			   return $usuario;
			}
		 }else{
			throw new \Exception("Erro ao executar busca com os dados fornecidos!");
		 }
   
		 $sql->close();
		 $connDB->close();
	}

	/**
	*inclui um novo usuario no BD
	*@param Usuario $usuario Objeto do tipo Usuario que devera ser cadastrado
	*@return TRUE|Exception TRUE para inclusao bem sucedida ou Exception para inclusao mal sucedida
	*/

	public function incluirUsuario($nome, $email, $celular, $login, $senha){
		try {
			$connDB = $this->conectarBanco();
		 } catch (\Exception $e) {
			die($e->getMessage());
		 }
   
		 $sqlInsert = $connDB->prepare("insert into usuario
										  (nome, email, celular, login, senha)
										  values
										  (?, ?, ?, ?, ?)");
		 $sqlInsert->bind_param("sssss", $nome, $email, $celular, $login, $senha);
		 $sqlInsert->execute();
		 if(!$sqlInsert->error){
			$retorno =  TRUE;
		 }else{
			throw new \Exception("Não foi possível incluir novo usuário!");
			die;
		 }
		 $connDB->close();
		 $sqlInsert->close();
		 return $retorno;
	}

	private function conectarBanco(){
		$ds = DIRECTORY_SEPARATOR;
		$base_dir = dirname(__FILE__).$ds;


		require($base_dir.'bd_config.php');

		try{
		$conn = new \MySQli($dbhost, $user, $password, $db);
		return $conn;
		}catch(MySQli_sql_exception $e){
			throw new \Exception($e);
			die;
		}

	}
}

?>