# php-microblog

A very small blogging engine written in PHP

A very small blogging engine written in PHP  
Just one file is all it takes.  
Based off the work done on [engineertf](https://github.com/TheDerpySage/engineertf).

## blog.php

The main `blog.php` page will show every post on the server, rendering only the first few lines.

Post titles link to the full render of that post.  

Every post is contained within its down directory thats named with the date YYYYMMDD, and they contain a markdown file `post.md`. Any assets you wish to use in the post is referenced from the same directory as `blog.php` so `./blog/YYYYMMDD/<asset>`.

The blog directory contains the placeholder posts you can use as examples.  

Uses [parsedown](https://github.com/erusev/parsedown) for full render.

## index.php

Supplied as an example. You can embed the PHP block into you own index page to render Recent Posts.

## Example Post

Included in this repo are a few example, but I wanted to point out some key parts. The header of each `post.md` needs to be formatted with the `# Title`, `## DATE`, and the body of the post spaced out accordingly. This fits with the proper Markdown formatting. The Date does not need to be formatted like I have it, but it is merely copied as is so it should be kept consistent.  

```markdown
# The Missile

## 01/21/2022

The missile knows where it is at all times.  
It knows this because it knows where it isn't.  
By subtracting where it is from where it isn't, or where it isn't from where it is (whichever is greater), it obtains a difference, or deviation.  
The guidance subsystem uses deviations to generate corrective commands to drive the missile from a position where it is to a position where it isn't, and arriving at a position where it wasn't, it now is.  
Consequently, the position where it is, is now the position that it wasn't, and it follows that the position that it was, is now the position that it isn't.  
In the event that the position that it is in is not the position that it wasn't, the system has acquired a variation, the variation being the difference between where the missile is, and where it wasn't.  
If variation is considered to be a significant factor, it too may be corrected by the GEA.  
However, the missile must also know where it was.  

![Missle](blog/19960114/tom.jpg)

```
