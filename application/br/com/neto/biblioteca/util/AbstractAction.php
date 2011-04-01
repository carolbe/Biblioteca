<?php
namespace br\com\neto\biblioteca\util{
	
	use br\com\neto\biblioteca\actions\AutorAction;
	use br\com\neto\biblioteca\actions\LivroAction;
	
	abstract class AbstractAction
	{
		public abstract function render();
		
		/**
		 * @return AbstractAction 
		 */
		
		
		public static function getAction($action)
		{
			switch ($action)
			{
				case 'livro':
					return new LivroAction();
				case 'autor':
				default:
					return new AutorAction();
			}
		}
	}
}