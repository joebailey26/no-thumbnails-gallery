<?php
	$images = $_POST['images'];
	$files = glob("*.jpg");
	for ($i=0; $i<count($files); $i++){
		$num = $files[$i];
		echo '<a class="hello" href="'.dirname($_SERVER['PHP_SELF']).'/'.$num.'"></a>';
	}
	echo '<script>
			$("'.$images.' .hello").each(function() {
				$(this).attr("href", $(this).attr("href").replace("'.$_SERVER['DOCUMENT_ROOT'].'",""));
			});
			if ($("html").hasClass("webp")) {
				$("'.$images.' .hello").each(function() {
					$(this).attr("href", $(this).attr("href").replace("jpg","webp"));
				});
			};
		</script>';
	echo '<script>$("'.$images.' a:first").trigger("click");</script>';
?>