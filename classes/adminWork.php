<?php
require_once __DIR__ . '/DB.php';

class Add
{
    protected $category;
    protected $first_name;
    protected $last_name;
    protected $biography;
    protected $title;
    protected $author;
    protected $publication;
    protected $pages;
    protected $photo;
    protected $categori;
    protected $notes;
    protected $book_id;
    protected $user_id;
    protected $set;

        // category setter
    public function setNewCategory($category){
        $this->category = $category;
    }

        // author setters
    public function setNewAuthorName($full_name){
       $this->full_name = $full_name;
    }
    // public function setNewAuthorSurname($last_name){
    //     $this->last_name = $last_name;
    // }
    public function setNewAuthorBio($biography){
        $this->biography = $biography;
     }

        // book setters
     public function setTitle($title){
        $this->title = $title;
     }
     public function setAuthor($author){
        $this->author = $author;
     }
     public function setPublication($publication){
        $this->publication = $publication;
     }
     public function setPages($pages){
        $this->pages = $pages;
     }
     public function setPhoto($photo){
        $this->photo = $photo;
     }
     public function setCategory($categori){
        $this->categori = $categori;
     }


     public function setNewNote($note){
        $this->note = $note;
    }
    public function setBookId($book_id){
        $this->book_id = $book_id;
    }
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
    public function setNewComment($comment){
        $this->comment = $comment;
    }
    public function setter($sett){
        $this->sett = $sett;
    }
    

    public function category(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $query = $connection->prepare(
            'INSERT INTO `categories` (`category`) 
            VALUES (:category)');

        $categoris = [
            'category' =>$this->category,
        ];

        $query->execute($categoris);
    }

    public function authores(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $query = $connection->prepare(
            'INSERT INTO `authors` (`full_name`,`biography`) 
            VALUES (:full_name,:biography)');

        $autorss = [
            'full_name' =>$this->full_name,
            'biography' =>$this->biography,
        ];

        $query->execute($autorss);
    }

    public function book(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $query = $connection->prepare(
            'INSERT INTO `books` (
                 `title`,`author`,`publication`, `pages`,`photo`,`categori`) 
            VALUES (    
                :title,:author,:publication,:pages,:photo,:categori)'
        );

        $data = [
            'title' =>$this->title,
            'author' => $this->author,
            'publication' => $this->publication,
            'pages' =>$this->pages,
            'photo' => $this->photo,
            'categori' => $this->categori,
        ];

        $query->execute($data);
    }

    public function note(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $query = $connection->prepare(
            'INSERT INTO `notes` (`note`,`book_id`,`user_id`) 
            VALUES (:note, :book_id, :user_id)'
        );

        $noteses = [
            'note' => $this->note,
            'book_id' => $this->book_id,
            'user_id' => $this->user_id
        ];

        $query->execute($noteses);
    }

    public function coment(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
    
        $checkQuery = $connection->prepare(
            'SELECT COUNT(*) as count FROM `comments` WHERE `book_id` = :book_id AND `user_id` = :user_id'
        );
        $checkQuery->execute([
            'book_id' => $this->book_id,
            'user_id' => $this->user_id
        ]);
        $commentExists = $checkQuery->fetch(PDO::FETCH_ASSOC);
    
        if ($commentExists['count'] == 0) {
            $query = $connection->prepare(
                'INSERT INTO `comments` (`comment`,`book_id`,`user_id`,`sett`) 
                VALUES (:comment, :book_id, :user_id, :sett)'
            );
    
            $comments = [
                'comment' => $this->comment,
                'book_id' => $this->book_id,
                'user_id' => $this->user_id,
                'sett' => $this->sett
            ];
    
            $query->execute($comments);
        }
    }
    

    public function getCategory(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $userss = $connection->prepare("SELECT * FROM `categories`;");
        $userss->execute();
        $categoris = $userss->fetchAll();
        return $categoris;
    }

    public function getAuthor(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $userss = $connection->prepare("SELECT * FROM `authors`;");
        $userss->execute();
        $authors = $userss->fetchAll();
        return $authors;
    }

    public function update(array $params){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare('UPDATE categories SET category = :category  WHERE id = :id');
        $first->execute($params);
    }

    public function edit(array $params){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare('UPDATE authors SET first_name = :first_name, last_name = :last_name, biography = :biography  WHERE id = :id');
        $first->execute($params);
    }

    public function updateBook(array $params){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare('UPDATE books SET title = :title, author = :author, publication=:publication, pages=:pages, photo=:photo, categori=:categori   WHERE id = :id');
        $first->execute($params);
    }

    public function updateNote(array $params){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare('UPDATE notes SET note = :note, user_id = :user_id  WHERE id = :id');
        $first->execute($params);
    }

    public function export($id){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare('UPDATE comments SET sett = 1 WHERE id = :id');
        $first->execute(['id' => $id]);
         
    }

    public function delete($data, $id){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare("UPDATE $data SET is_deleted = 1 WHERE id = :id");
        $first->execute(['id' => $id]);
         
    }

    public function deleted($id, $user, $data){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare("UPDATE $data SET is_deleted = 1 WHERE id = :id AND user_id = :user");
        $first->execute(['id' => $id, 'user' => $user]);
         
    }

    public function bookDelete($id){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare('UPDATE books SET is_deleted = 1 WHERE id = :id');
        $first->execute(['id' => $id]);
        
        $deleteNotes = $connection->prepare('UPDATE notes SET is_deleted = 1 WHERE book_id = :id');
        $deleteNotes->execute(['id' => $id]);
    
        $deleteComent = $connection->prepare('UPDATE comments SET is_deleted = 1 WHERE book_id = :id');
        $deleteComent->execute(['id' => $id]);
    }

    public function getDropdown($table){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare("SELECT * FROM $table");
        $first->execute();
        $second = $first->fetchAll();
        return $second;
    }

    public function getBook(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare("SELECT books.id, books.title, books.publication, books.pages, books.photo, books.is_deleted, authors.full_name, categories.category FROM books JOIN authors ON books.author = authors.id JOIN categories ON books.categori = categories.id ORDER BY books.id;");
        $first->execute();
        $second = $first->fetchAll();
        return $second;
    }

    public function getNote(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare("SELECT notes.id, notes.note, notes.user_id, notes.book_id, notes.is_deleted, books.title FROM `notes` JOIN books ON notes.book_id = books.id ORDER BY notes.id;");
        $first->execute();
        $second = $first->fetchAll();
        return $second;
    }

    public function getComment(){
        $conectionObj = new DB();
        $connection = $conectionObj->getPdo();
        $first = $connection->prepare("SELECT comments.id, comments.comment, comments.book_id, comments.user_id, comments.sett, comments.is_deleted, books.title FROM `comments` JOIN books ON comments.book_id = books.id ORDER BY comments.id;");
        $first->execute();
        $second = $first->fetchAll();
        return $second;
    }

}
?>