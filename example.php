<?php
	require_once "Ztext/ztext.php";
?><!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset='UTF-8'>
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		<link rel='stylesheet' type='text/css' href='Ztext/ztext.css'>
		<script src="Ztext/ztext.js"></script>
	</head>
	<body>
		<?php
			include "Ztext/ztext_editor.php";

			$file = 'example.zxt';
			$file2 = array('example', '.', '.zxt');

			$f = fopen($file, 'r');
			$text = fread($f, filesize($file));
			fclose($f);
/*
			// fullprocess
			echo Ztext\frame(Ztext\fullprocess(
				$text, false, '', false, false), false, 'test');

			// textprocess
			echo Ztext\frame(Ztext\textprocess(
				$text, false, false, false));

			// altprocess
			echo Ztext\frame(Ztext\altprocess(
				$text, false, '', false, false, false,
				Ztext\BLK_ITALY, Ztext\BLK_NORMAL2));

			// magic
			echo Ztext\magic($file2[0], $file2[1], '', $file2[2]);
*/
			// magic2
			echo Ztext\magic2($text, $file2[0] . ' (magic2)');

			// nu_magic -- hybrid output
			echo Ztext\nu_magic($text, $file2[0], '',
		                        Ztext\FLG_PRO_FULL, Ztext\FLG_MODE_HYBRID, Ztext\FLG_SHOW_HIDDEN);
/*
			// textmagic
			echo Ztext\frame(Ztext\textmagic(...$file2), true);

			// textmagic2
			echo Ztext\frame(Ztext\textmagic2($text), true);
*/
		?>
	</body>
</html>
