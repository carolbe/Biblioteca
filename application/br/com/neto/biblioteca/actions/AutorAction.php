<?php
	namespace br\com\neto\biblioteca\actions
	{
		use br\com\neto\biblioteca\util\AbstractAction;
		use br\com\neto\biblioteca\view\AutorForm;
		use br\com\neto\biblioteca\entities\Autor;
		use br\com\neto\biblioteca\dao\AutorMysqlDao;
		
		class AutorAction extends AbstractAction
		{
			public function render()
			{
				if ($_POST)
				{
					$autor = new Autor();
					$autor->setNome($_POST['name']);
					
					try 
					{
						$dao = new AutorMysqlDao();
						$dao->save($autor);
						echo 'Autor salvo com sucesso!';
					}
					catch (\PDOException $e)
					{
						echo $e->getMessage();
					}
				}
				else
				{
					echo new AutorForm();	
				}
				
			}
		}
	}