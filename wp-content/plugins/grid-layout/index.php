<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
		div {
			border: 1px solid;
		}
		p {
			color: red;
		}
	</style>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<?php
function __autoload($className) {
	if(file_exists($className.".php")) {
		include $className.".php";
	} else {
		include "Widgets/".$className.".php";
	}
}


$composition = new Composition();

$text1 = new Text('TEXT1');
$text2 = new Text('TEXT2', '#f00');
$text3 = new Text('TEXT3', '#000', '8px');
$img = new Image('https://www.spicebox.com.ua/images/2756/main.jpg');
$img2 = new Image('https://www.spicebox.com.ua/images/2756/sample4.jpg');


$block = new Block();
$block2 = new Block();

$block2->insert(new Text('BLOCK 2'));

$block->insert(new Text('TEXT in the block'));
$block->insert($block2);
$block->insert(new Text('TEXT in the block 2'));



$composition->insert($text1);
$composition->insert($text2);
$composition->insert($block);
$composition->insert($text3);

$composition->draw();
//стр 79
//представления:
//
//Glyph* g;
//
//Iterator<Glyph*>* i = g->CreateIterator();
//
//for (i->First(); !i->IsDone(); i->Next()) {
//
//	Glyph* child = i->Current!tem();
//
//// выполнить действие с потомком
//
//}
//
//Createlterator по умолчанию возвращает экземпляр Nulllterator.
//
//Nulllterator - это вырожденный итератор для глифов, у которых нет потом-
//
//ков, то есть листовых глифов. Операция IsDone для Nulllterator всегда воз-
//
//вращает истину.

?>

</body>
</html>