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
		table {
            margin-top: 100px;
            margin-right: auto;
            margin-left: auto;
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
	<table width="800">
        <tr>
            <td>
                <div>
                    <h1>Index</h1>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
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
									$title = str_replace('#', '',fgets($handler));
									$date = str_replace('#', '',fgets($handler));
									fclose($handler);
									echo "<p>$date - <a href=blog.php?post=$post>$title</a></p>";
								}
							}
						}
					}
				?>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
