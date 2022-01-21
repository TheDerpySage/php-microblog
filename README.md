# php-microblog
A very small blogging engine written in PHP

---

Just one file is all it takes.  
Based off the work done on [engineertf](https://github.com/TheDerpySage/engineertf).

blog.php
--------
The main `blog.php` page will show every post on the server, rendering only the first few lines.

Post titles link to the full render of that post. 

Every post is contained within its down directory thats named with the date YYYYMMDD, and they contain a markdown file `post.md`. Any assets you wish to use in the post is referenced from the same directory as `blog.php` so `./blog/YYYYMMDD/<asset>`.

The blog directory contains the placeholder posts you can use as examples. 

Uses [parsedown](https://github.com/erusev/parsedown) for full render.

index.php
---------
Supplied as an example. You can embed the PHP block into you own index page to render Recent Posts.