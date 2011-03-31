<?php
namespace br\com\neto\biblioteca\dao{
	use br\com\neto\biblioteca\util\ConexaoMysql;
	use br\com\neto\biblioteca\entities\Autor;

	class AutorMysqlDao{
	
		public function getAutorPorId($id){
			$stm = ConexaoMysql::getInstance()->prepare("Select * From autor id Where id = ?");
   			$stm->execute(array($id));
   			
   			$obj = new $stm->fetchObject();
   			if($obj)
   			{
   				$autor = new Autor();
   				$autor->setId  ($obj->id);
   				$autor->setNome($obj->nome);
   				return $autor;
   			}
   			throw new Exception("Registro n�o encontrado");
		}
		public function remove(Autor $autor){
			$stm = ConexaoMysql::getInstance()->prepare("DELETE FROM autor WHERE id = ?");
			$stm->execute(array($autor->getId()));	
		}
		public function save(Autor $autor){
			if($autor->getId() > 0){
			$stm = ConexaoMysql::getInstance()->prepare("UPDATE autor set nome = ? WHERE id = ?");
			$stm->execute(array($autor->getNome(), $autor->getId()));
			}
			else{
			$stm = ConexaoMysql::getInstance()->prepare("INSERT INTO autor VALUES  nome = ? ");
			$stm->execute(array($autor->getNome()));		
			$autor->setId(ConexaoMysql::getInstance()->lastInsertId());
			}		
			}
			
			
		}
	}