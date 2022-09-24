<!DOCTYPE html>
<html lang='en'>
<?php
    # Error handler, a carry over from the olden days
    function iAmError($n) {
        return "<center><h3>An Error Occured: $n</h3></center>";
    }

    # A small helper to remove . and .. from scandir
    function scandir2($n){
        return array_slice(scandir($n), 2);
    }

    # Parsedown for post rendering
    include "dependencies/Parsedown.php";
    $Parsedown = new Parsedown();

    # GET method for post number
    $post = isset($_GET['post']) ? $_GET['post'] : '';

    # POSTS STORED IN
    $dir = 'blog';
    # CHANGE THIS TO CHANGE THE NUMBER OF LINES RENDERED
    $RENDER_LINES = 3;
?>
<head>
    <title>blog</title>
    <meta charset='utf-8'>
    <style>
        table {
            margin-top: 100px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>
<body>
    <table width="800">
        <tr>
            <td>
                <div>
                    <h1>Blog</h1>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <?php
                        if(empty($post)) {
                            # Include scandir2 to exclude . and .. folder paths
                            $posts = scandir2($dir);
                            if(!empty($posts)){
                                sort($posts);
                                #To flip the order of the files so that our newest files are first
                                $posts = array_reverse($posts);
                                foreach($posts as $post) {
                                    $files = scandir2("$dir/$post");
                                    foreach($files as $file){
                                        if (explode(".", $file)[1] == "md") {
                                            # Limits the number of lines that we render
                                            $handler = fopen("$dir/$post/$file", "r");
                                            $md = "##[" . trim(substr(fgets($handler), 2)) . "](blog.php?post=$post)\n";
                                            $md .= fgets($handler); // Blank Line
                                            $md .= fgets($handler); // Date
                                            $md .= fgets($handler); // Blank Line
                                            for ( $x = 0; $x < $RENDER_LINES; $x++ ) {
                                                $md .= fgets($handler);
                                            }
                                            if(!feof($handler))
                                                $md .= "\n[Read more...](blog.php?post=$post)";
                                            fclose($handler);
                                            echo $Parsedown->text($md);
                                            echo "<br />";
                                            break;
                                        }
                                    }
                                }
                            } else {
                                    echo iAmError('There are currently no posts.');
                            }
                        } else {
                            $posts = scandir2("$dir");
                            if (in_array($post, $posts)){
                                $files = scandir2("$dir/$post");
                                foreach($files as $file){
                                    if (explode(".", $file)[1] == "md") {
                                        $handler = fopen("$dir/$post/$file", "r");
                                        $md = "#[" . trim(substr(fgets($handler), 2)) . "](blog.php?post=$post)\n";
                                        while(!feof($handler))
                                            $md .= fgets($handler);
                                        fclose($handler);
                                        echo $Parsedown->text($md);
                                        echo "<br /><a href='blog.php'>Back</a>";
                                        break;
                                    }
                                }
                            } else {
                                echo iAmError('Blog post not found.');
                            }
                        }
                    ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div style="text-align: center;">
                    <p>
                        <a href='.'>index</a>
                    </p>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>