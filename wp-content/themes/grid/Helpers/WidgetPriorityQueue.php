<?php
namespace GL\Helpers;

class WidgetPriorityQueue extends \SplPriorityQueue
{
	public function compare($priority1, $priority2)
	{
		if ($priority1 === $priority2) return 0;
		return $priority1 < $priority2 ? -1 : 1;
	}
	
	public function getRow($row = 0)
	{
		if(!$this->isEmpty())
		{
			$this->top();
			
			while($this->valid())
			{
				if($this->key() == $row)
				{
					return $this->current();
				}
				
				$this->next();
			}
		}
		
		return FALSE;
	}
}
