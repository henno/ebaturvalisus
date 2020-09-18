<?php

require 'classes/Sanitize.php';
class Post
{
    public static function get_all()
    {
        return Sanitize::arr(get_all("SELECT * FROM posts"));
    }
}