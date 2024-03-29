<?php

class Comment extends Db_object
{
    //properties
    protected static $table_name = 'comments';
    public $id; //Primary key
    public $photo_id; //Foreign key
    public $user_image; //Foreign key *user_id

    public $author;
    public $body;


    public function get_properties()
    {
        return [
            'id' => $this->id,
            'photo_id' => $this->photo_id,
            'user_image' => $this->user_image,
            'author' => $this->author,
            'body' => $this->body,
        ];
    }

    public static function create_comment($photo_id, $author = "", $body = "")
    {
        if (!empty($photo_id) && !empty($author) && !empty($body)) {
            $comment = new Comment();
            $comment->photo_id = (int)$photo_id; //type casting to make the string as integer
            //$comment->user_id = $_SESSION['userid']; the user needs to be known.
            $comment->author = $author;
            $comment->body = $body;
            return $comment;
        } else {
            return false;
        }
    }


    public static function find_the_comments($photo_id)
    {
        global $database;
        $sql = "SELECT comments.id, comments.photo_id, users.user_image, comments.author, comments.body  FROM " . self::$table_name;
        $sql .= " LEFT JOIN USERS ON comments.user_id = users.id ";
        $sql .= " WHERE photo_id = " . $database->escape_string($photo_id);//active=true
        $sql .= " ORDER BY comments.id DESC";

        return self::find_this_query($sql);
    }

    public $image_placeholder = 'https://via.placeholder.com/62';
    public $upload_directory = 'assets/images/photos/users';

    public function comment_avatar(){
        return empty($this->user_image) ? $this->image_placeholder : 'admin' .DS. $this->upload_directory .DS. $this->user_image;
    }

}




?>