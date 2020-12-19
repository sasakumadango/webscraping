<?php
require_once "./phpQuery-onefile.php";

for ($i = 1; $i <= 15; $i++) {
	$html = file_get_contents("./source/" . $i . ".html");
	$questions = phpQuery::newDocument($html)->find("#question-main");

	$questionTitleList = $questions[".txt"];
	$questionCount = count($questionTitleList);
	$correctAnswers = $questions[".correct"];
	$comentList = $questions[".comment"];

	for ($j = 0; $j < $questionCount; $j++) {
		$no = $j + 1;
		echo "**問" . $i . "-" . $no . "**";
		echo "<br>";
		echo $questionTitleList->find(".cke_contents_ltr:eq(" . $j . ")");
		echo "* **" . trim($questions[".correct"]->find("label:eq(" . $j . ")")->text()) . "**";
		echo "<br>";
		echo "<br>";

		$coment = $comentList->find(".cke_contents_ltr:eq(" . $j . ")")->find("p")->text();
		if ($coment != "") {
			echo "**解説**";
			echo "<br>";
			echo "* " . $coment;
			echo "<br>";
			echo "<br>";
		}
	}
}