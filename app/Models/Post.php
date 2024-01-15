<?php

namespace App\Models;

class Post
{
    private static $blog_post = [
        [
        "title" => "Judul Pertama",
        "slug" => "judul_pertama",
        "author" => "Kuda",
        "body" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "
        ],
        [
        "title"=> "Judul Kedua",
        "slug" => "judul_kedua",
        "author"=> "Ayam",
        "body"=> "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "
        ],
    ];

    public static function all()
    {
        return self::$blog_post;
    }

    public static function find($slug)
    {
        $post= self::$blog_post;
        $post = [];
        foreach($post as $p){
            if ($p['slug'] === $slug) {
                $post = $p;
            }
        }

        return $post;
    }
}
