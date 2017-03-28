<?php

namespace GL\Classes;

include \GL_Grid_Layout::$PLUG_DIR."/Libraries/scssphp/scss.inc.php";

Class Scss {
	
	CONST WIDGET_PATTERN = 'WIDGETID';
	
	private $compiler;
	private $styles_dir;
	private $styles_list = array();
	private $current_styles;
	private $styles;
	
	public function __construct()
	{
		$this->compiler = new \scssc();
	}
	
	public function loadDir($cssWidgetDirectory)
	{
		$this->styles_dir = \GL_Grid_Layout::$PLUG_DIR . "assets/css/widgets/{$cssWidgetDirectory}/";
		
		foreach(scandir($this->styles_dir) as $style)
		{
			if($style != '.' && $style != '..')
			{
				$this->styles_list[] = $style;
			}
		}
	}
	
	public function selectCurrentStyles($stylesName)
	{
		$this->current_styles = $stylesName;
	}
	
	public function loadStyles()
	{
		$this->styles = file_get_contents($this->styles_dir . $this->current_styles . '.scss');
	}
	
	public function replaceWidgetId($id)
	{
		$this->styles = str_replace(self::WIDGET_PATTERN, $id, $this->styles);
	}
	
	public function compile()
	{
//		echo $this->compiler->compile('
//		  $color: #abc;
//		  div { color: lighten($color, 20%); }
//		');
		echo $this->compiler->compile($this->styles);
	}
	
}
