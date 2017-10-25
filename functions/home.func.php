<?php

 function get_posts(){
     global $db;

     $req = $db->query("

        SELECT  posts.id,
                posts.title,
                posts.content,
                posts.date,
                posts.image,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer=admins.email
        WHERE posted='1'
        ORDER BY date desc
        LIMIT 0,2

     ");

     $results = array();

     while($rows = $req->fetchObject()){
         $results[] = $rows;
     }

     return $results;
 }
