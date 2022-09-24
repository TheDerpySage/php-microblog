<!DOCTYPE html>
<html lang="en">
<?php
    # A small helper to remove . and .. from scandir
    function scandir2($n){
        return array_slice(scandir($n), 2);
    }

	# POSTS	STORED IN
	$dir = 'blog';
	# CHANGE THIS TO CHANGE THE NUMBER OF POSTS SHOWN ON THE FRONT PAGE 
	$MAX = 2;
?>
<head>
	<title>index</title>
	<style>
		div {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		h1, h2, h3 {
			text-align: center;
		}
		p {
			text-align: justify;
		}
	</style>
</head>
<body>
	<div>
		<h1>index</h1>
		<?php
			$posts = scandir2($dir);
			if(!empty($posts)){
				print "<h3>Recent Posts</h3>";
				sort($posts);
				#To flip the order of the files so that our newest files are first
				$posts = array_reverse($posts);
				for( $x = 0; $x < $MAX; $x++ ) {
					$post = $posts[$x];
					$files = scandir2("$dir/$post");
					foreach($files as $file){
						[$title, $ext] = explode(".", $file);
						if ($ext == "md") {
							$handler = fopen("$dir/$post/$file", "r");
							$title = trim(str_replace('#', '',fgets($handler)));
							fgets($handler); // Blank Line
							$date = trim(str_replace('#', '',fgets($handler)));
							fclose($handler);
							echo "<p>$date - <a href=blog.php?post=$post>$title</a></p>";
						}
					}
				}
			}
        ?>
	</div>
</body>
</html>
