<title>Table of contents in PHP</title>

<style>
	.summary .level-2 {margin-left: 2em}
	.summary .level-3 {margin-left: 3em}
	.summary .level-4 {margin-left: 4em}
	.summary .level-5 {margin-left: 5em}
</style>

<h1>TOC function in PHP</h1>

<?php 
function tableOfContents($html) {
	$pattern = '/<h([2-5]) id=["\'](.*?)["\'].*?>(.*?)<\/h\1>/';
	preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);

	$output = "";
	foreach ($matches as $item) {
		$output .= '
			<li class="level-' . $item[1] . '">
				<a href="#' . $item[2] . '">' . $item[3] . '</a>
			</li>';
	}
 	
	return (!empty($output)) ? 
		"<ul class='summary'>" . $output . "</ul>" : 
		"";
}


$content = '<h2 id="h2">Headline 2</h2> <p>Text</p> <h3 id="h3">Headline 3</h3> <p>Text</p> <h3 id="h3-2">Headline 3</h3> <p>Text</p> <p>Text</p> <h2 id="h2-2">Headline 2</h2> <p>Text</p> <h4 id="h4">Headline 4</h4> <p>Text</p>';

echo tableOfContents($content);
echo "<hr>";
echo $content

?>