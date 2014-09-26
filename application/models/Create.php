<?php

/**
 * Handles the post creation process
 * @author Zack Warren
 * @license http://opensource.org/licenses/MIT MIT License
 */
class Create
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var int $total Total number of posts retrieved from the table
     */
    public $total = "";
    /**
     * @var int $limit Amount of posts to show per page
     */
    public $limit = "";
    /**
     * @var int $pages Total number of pages set for given limit
     */
    public $pages = "";
    /**
     * @var int $page Current page id for list view
     */
    public $page = "";
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created
     */
    public function __construct()
    {
		// create a new post entry    
        if (isset($_POST['submit_post'])) {
	        $this->createPost($_SESSION['user_id'], $_SESSION['user_email'], $_SESSION['user_name'], $_POST['post_name'], $_POST['post_category'], $_POST['post_message']);
        }
        
        // create a new reply entry    
        if (isset($_POST['submit_reply'])) {
	        $this->createReply($_POST['post_id'], $_SESSION['user_id'], $_SESSION['user_name'], $_POST['reply_message'], $_POST['op_email']);
        }
        
        // update the post entry
        if (isset($_POST['update_post'])) {
	        $this->updatePost($_POST['post_id'], $_POST['post_category'], $_POST['post_message']);
        }
        
        // update the post resolved state
        if (isset($_POST['mark_as_solved'])) {
	        $this->markPostSolved($_POST['post_id']);
        }
        
        // update the post and reopen it
        if (isset($_POST['mark_as_reopened'])) {
	        $this->markPostReopened($_POST['post_id']);
        }
        
        // delete the post entry using the post id
        if (isset($_POST['delete_post'])) {
	        $this->deletePost($_POST['post_id']);
        }
        
        // delete the reply entry using the reply id
        if (isset($_POST['delete_reply'])) {
	        $this->deleteReply($_POST['reply_id']);
        }
        
        if (isset($_POST['search_term'])) {
			header("Location: /search_posts/?search=". $_POST['search_term']);
			exit();
		}
    }
     
	/**
	* Checks if database connection is opened and open it if not
	*/
    private function databaseConnection()
    {
        // connection already opened
        if ($this->db_connection != null) {
            return true;
        } else {
            // create a database connection, using the constants from config/config.php
            try {
                // Generate a database connection, using the PDO connector
                // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
                // Also important: We include the charset, as leaving it out seems to be a security issue:
                // @see http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers#Connecting_to_MySQL says:
                // "Adding the charset to the DSN is very important for security reasons,
                // most examples you'll see around leave it out. MAKE SURE TO INCLUDE THE CHARSET!"
                $this->db_connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
                return true;
            // If an error is catched, database connection failed
            } catch (PDOException $e) {
                $this->errors[] = MESSAGE_DATABASE_ERROR;
                return false;
            }
        }
    }
    
    /*
	private function logAction($action, $reference)
    {
        // if database connection opened
        if ($this->databaseConnection()) {
            // database query, create the new post
            $sql = 'INSERT INTO logs (action, reference, user, date) 
				    VALUES(:action, :reference, :user, now())';
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':action', $action, PDO::PARAM_STR);
		    $query->bindValue(':reference', $reference, PDO::PARAM_STR);
		    $query->bindValue(':user', $_SESSION['user_name'], PDO::PARAM_STR);
		    $query->execute();
        } else {
            return false;
        }
    }
    */
    
    private function createPost($user_id,
    							$author_email, 
        						$post_author,
    							$post_name, 
    							$post_category,
    							$post_message)
    {
        // if database connection opened
        if ($this->databaseConnection()) {
            // database query, create the new post
            $sql = 'INSERT INTO posts (author_id, author_email, post_author, post_title, post_category, post_message, date) 
            		VALUES(:user_id, :author_email, :post_author, :post_name, :post_category, :post_message, now())';
            $query = $this->db_connection->prepare($sql);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $query->bindValue(':author_email', $author_email, PDO::PARAM_STR);
            $query->bindValue(':post_author', $post_author, PDO::PARAM_STR);
            $query->bindValue(':post_name', strip_tags($post_name), PDO::PARAM_STR);
            $query->bindValue(':post_category', strip_tags($post_category), PDO::PARAM_STR);
            $query->bindValue(':post_message', strip_tags($post_message), PDO::PARAM_STR);
            $query->execute();
			
			if ($query->rowCount()) {
                $this->messages[] = MESSAGE_POST_CREATED;
            } else {
                $this->errors[] = MESSAGE_POST_NOT_CREATED;
            }
        } else {
            return false;
        }
    }
    
    private function createReply($post_id,
    							 $author_id,
    							 $reply_author,
    							 $reply_message,
    							 $op_email)
    {
        // if database connection opened
        if ($this->databaseConnection()) {
            // database query, create the new post reply
            $sql = 'INSERT INTO post_replies (post_id, author_id, reply_author, reply_message, date) 
            		VALUES(:post_id, :author_id, :reply_author, :reply_message, now())';
            $query = $this->db_connection->prepare($sql);
            $query->bindValue(':post_id', $post_id, PDO::PARAM_INT);
			$query->bindValue(':author_id', $author_id, PDO::PARAM_INT);
            $query->bindValue(':reply_author', $reply_author, PDO::PARAM_STR);										
            $query->bindValue(':reply_message', strip_tags($reply_message), PDO::PARAM_STR);
            $query->execute();
			
			if ($query->rowCount()) {
                $this->messages[] = MESSAGE_REPLY_CREATED;
                if ($_SESSION['user_email'] != $op_email) {
                	$this->sendNewReplyEmail($op_email, $post_id, $reply_author, $reply_message);
                }
            } else {
                $this->errors[] = MESSAGE_REPLY_NOT_CREATED;
            }
        } else {
            return false;
        }
    }
    
    public function getAllPosts()
    {
        // if database connection opened
        if ($this->databaseConnection()) {
        
        	// Find out how many items are in the table
		    $sql = 'SELECT
		        	COUNT(*)
					FROM posts';
		    $this->total = $this->db_connection->query($sql)->fetchColumn();
		    
		    // How many items to list per page
		    $this->limit = 15;
		    
		    // How many pages will there be
		    $this->pages = ceil($this->total / $this->limit);
		    
		    // What page are we currently on?
		    $this->page = min($this->pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
		        'options' => array(
		        'default'   => 1,
		        'min_range' => 1,
		        ),
		    )));
        
			// Calculate the offset for the query
		    $offset = ($this->page - 1)  * $this->limit;
		    
		    // Some information to display to the user
			$start = $offset + 1;
			$end = min(($offset + $this->limit), $this->total);
        
            // database query, fetching all posts from the table           
            $sql = 'SELECT * FROM posts 
            		ORDER BY date DESC
            		LIMIT :limit
            		OFFSET :offset';
            $query = $this->db_connection->prepare($sql);
            $query->bindParam(':limit', $this->limit, PDO::PARAM_INT);
		    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->execute();
            $posts = $query->fetchAll(PDO::FETCH_ASSOC);
            return $posts;	
        } else {
            return false;
        }
    }
    
    public function getUserPosts($user_id)
    {
        // if database connection opened
        if ($this->databaseConnection()) {
        	
        	// Find out how many items are in the table
		    $sql = 'SELECT
		        	COUNT(*)
					FROM posts
					WHERE author_id = :user_id';
			$query = $this->db_connection->prepare($sql);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();
		    $this->total = $query->fetchColumn();
		    
		    // How many items to list per page
		    $this->limit = 15;
		    
		    // How many pages will there be
		    $this->pages = ceil($this->total / $this->limit);
		    
		    // What page are we currently on?
		    $this->page = min($this->pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
		        'options' => array(
		        'default'   => 1,
		        'min_range' => 1,
		        ),
		    )));
        
			// Calculate the offset for the query
		    $offset = ($this->page - 1)  * $this->limit;

            // database query, fetching all posts from the table for the user ID selected          
            $sql = 'SELECT * FROM posts 
            		WHERE author_id = :user_id 
            		ORDER BY date DESC
            		LIMIT :limit
			        OFFSET :offset';
            $query = $this->db_connection->prepare($sql);
            $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $query->bindParam(':limit', $this->limit, PDO::PARAM_INT);
		    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->execute();
            $posts = $query->fetchAll(PDO::FETCH_ASSOC);
            return $posts;
        } else {
            return false;
        }
    }
    
    public function getPostByType($category)
    {
        // if database connection opened
        if ($this->databaseConnection()) {
        	
        	// Find out how many items are in the table
		    $sql = 'SELECT
		        	COUNT(*)
					FROM posts
					WHERE post_category = :category';
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':category', $category, PDO::PARAM_STR);
		    $query->execute();
		    $this->total = $query->fetchColumn();
		    
		    // How many items to list per page
		    $this->limit = 15;
		    
		    // How many pages will there be
		    $this->pages = ceil($this->total / $this->limit);
		    
		    // What page are we currently on?
		    $this->page = min($this->pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
		        'options' => array(
		        'default'   => 1,
		        'min_range' => 1,
		        ),
		    )));
        
			// Calculate the offset for the query
		    $offset = ($this->page - 1)  * $this->limit;

            // database query, fetching all posts from the table that match the selected category          
            $sql = 'SELECT * FROM posts 
            		WHERE post_category = :category 
            		ORDER BY date DESC
            		LIMIT :limit
			        OFFSET :offset';
            $query = $this->db_connection->prepare($sql);
            $query->bindValue(':category', $category, PDO::PARAM_STR);
            $query->bindParam(':limit', $this->limit, PDO::PARAM_INT);
		    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->execute();
            $posts = $query->fetchAll(PDO::FETCH_ASSOC);
            return $posts;
        } else {
            return false;
        }
    }
    
    public function getPost($post_id)
    {
        // if database connection opened
        if ($this->databaseConnection()) {
            // database query, fetching a single post from the table that matches the post ID         
            $sql = 'SELECT * FROM posts 
            		WHERE id = :post_id';
            $query = $this->db_connection->prepare($sql);
            $query->bindValue(':post_id', $post_id, PDO::PARAM_INT);
            $query->execute();
            $post = $query->fetch();
            if (!$post OR !intval($post) OR (!isset($_GET))) {
	        	$this->errors[] = 'No posts found';  
            } else {
           		return $post;
            }
        } else {
            return false;
        }
    }
    
    public function searchPosts($searchq)
    {
        // if database connection opened
        if ($this->databaseConnection()) {
        	
        	// Find out how many items are in the table
		    $sql = 'SELECT
		        	COUNT(*)
					FROM posts
					WHERE post_title LIKE "%'. $searchq . '%" OR post_message LIKE "%' . $searchq . '%"';
		    $query = $this->db_connection->prepare($sql);
		    $query->execute();
		    $this->total = $query->fetchColumn();
		    
		    // How many items to list per page
		    $this->limit = 15;
		    
		    // How many pages will there be
		    $this->pages = ceil($this->total / $this->limit);
		    
		    // What page are we currently on?
		    $this->page = min($this->pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
		        'options' => array(
		        'default'   => 1,
		        'min_range' => 1,
		        ),
		    )));
        
			// Calculate the offset for the query
		    $offset = ($this->page - 1)  * $this->limit;
		    
		    $cleanq = strip_tags($searchq);

            // database query, fetching all posts from the table that match the search query ($searchq)         
            $sql = 'SELECT * FROM posts 
            		WHERE post_title LIKE "%'. $cleanq . '%" OR post_message LIKE "%' . $cleanq . '%"
            		ORDER BY date DESC
            		LIMIT :limit
			        OFFSET :offset';
            $query = $this->db_connection->prepare($sql);
            $query->bindParam(':limit', $this->limit, PDO::PARAM_INT);
		    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->execute();
            $posts = $query->fetchAll(PDO::FETCH_ASSOC);
            return $posts;
        } else {
            return false;
        }
    }
    
    public function getPostReplies($post_id)
    {
        // if database connection opened
        if ($this->databaseConnection()) {
        
        	// Find out how many items are in the table
		    $sql = 'SELECT
		        	COUNT(*)
					FROM post_replies
					WHERE post_id = :post_id';
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':post_id', $post_id, PDO::PARAM_INT);
		    $query->execute();
		    $this->total = $query->fetchColumn();
		    
		    // How many items to list per page
		    $this->limit = 15;
		    
		    // How many pages will there be
		    $this->pages = ceil($this->total / $this->limit);
		    
		    // What page are we currently on?
		    $this->page = min($this->pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
		        'options' => array(
		        'default'   => 1,
		        'min_range' => 1,
		        ),
		    )));
        
			// Calculate the offset for the query
		    $offset = ($this->page - 1)  * $this->limit;
		    
            // database query, fetching all posts from the table           
            $sql = 'SELECT * FROM post_replies
            		WHERE post_id = :post_id
            		ORDER BY date DESC
            		LIMIT :limit
			        OFFSET :offset';
            $query = $this->db_connection->prepare($sql);
            $query->bindValue(':post_id', $post_id, PDO::PARAM_INT);
            $query->bindParam(':limit', $this->limit, PDO::PARAM_INT);
		    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->execute();
            $posts = $query->fetchAll(PDO::FETCH_ASSOC);
            return $posts;
        } else {
            return false;
        }
    }
    
    public function getReplyTotal($post_id) 
    {
	    // if database connection opened
	    if ($this->databaseCOnnection()) {
		    // Find out how many items are in the table
		    $sql = 'SELECT
		        	COUNT(*)
					FROM post_replies
					WHERE post_id = :post_id';
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':post_id', $post_id, PDO::PARAM_INT);
		    $query->execute();
		    $reply_total = $query->fetchColumn();
		    return $reply_total;
	    } else {
		    return false;
	    }
    }
    
    public function getUserPostTotal($user_id) 
    {
	    // if database connection opened
	    if ($this->databaseCOnnection()) {
		    // Find out how many items are in the table
		    $sql = 'SELECT
		        	COUNT(*)
					FROM posts
					WHERE author_id = :user_id AND post_solved in (0,2)';
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
		    $query->execute();
		    $post_total = $query->fetchColumn();
		    return $post_total;
	    } else {
		    return false;
	    }
    }
    
    public function getUserReplyTotal($user_id) 
    {
	    // if database connection opened
	    if ($this->databaseCOnnection()) {
		    // Find out how many items are in the table
		    $sql = 'SELECT
		        	COUNT(*)
					FROM post_replies
					WHERE author_id = :user_id';
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
		    $query->execute();
		    $reply_total = $query->fetchColumn();
		    return $reply_total;
	    } else {
		    return false;
	    }
    }
    
    public function timeAgo($time)
	{
	   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	   $lengths = array("60","60","24","7","4.35","12","10");
	
	   $now = time();
	
	       $difference = $now - $time;
	       $tense      = "ago";
	
	   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	       $difference /= $lengths[$j];
	   }
	
	   $difference = round($difference);
	
	   if($difference != 1) {
	       $periods[$j].= "s";
	   }
	   
	   if ($difference == 0) {
		   return "just now";
	   } else {
		   return "about $difference $periods[$j] ago";
	   }
	}
    
    private function updatePost($post_id,
    							$post_category,  
    							$post_message)
    {
	    // if database connection opened
	    if ($this->databaseConnection()) {
	    	// database query, update the selected post
		    $sql = 'UPDATE posts 
		    		SET post_category = :post_category, post_message = :post_message, edited = 1
		    		WHERE id = :post_id';
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':post_id', $post_id, PDO::PARAM_INT);
		    $query->bindValue(':post_category', strip_tags($post_category), PDO::PARAM_STR);
		    $query->bindValue(':post_message', strip_tags($post_message), PDO::PARAM_STR);
		    $query->execute();
		    
		    if ($query->rowCount()) {
                $this->messages[] = MESSAGE_POST_UPDATED;
            } elseif ($query) {
            	$this->messages[] = MESSAGE_POST_UPDATED;
            } else {
                $this->errors[] = MESSAGE_POST_NOT_UPDATED;
            }
	    } else {
		    return false;
	    }
    }
    
    private function markPostSolved($post_id)
    {
	    // if database connection opened
	    if ($this->databaseConnection()) {
	    	// database query, update the selected post and mark it as solved (1)
		    $sql = 'UPDATE posts 
		    		SET post_solved = 1 
		    		WHERE id = :post_id';
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':post_id', $post_id, PDO::PARAM_INT);
		    $query->execute();
		    
		    if ($query->rowCount()) {
                $this->messages[] = MESSAGE_POST_SOLVED;
            } else {
                $this->errors[] = MESSAGE_POST_NOT_SOLVED;
            }
	    } else {
		    return false;
	    }
    }
    
    private function markPostReopened($post_id)
    {
	    // if database connection opened
	    if ($this->databaseConnection()) {
	    	// database query, update the selected post and mark it as re-opened (2)
		    $sql = 'UPDATE posts 
		    		SET post_solved = 2 
		    		WHERE id = :post_id';
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':post_id', $post_id, PDO::PARAM_INT);
		    $query->execute();
		    
		    if ($query->rowCount()) {
                $this->messages[] = MESSAGE_POST_REOPENED;
            } else {
                $this->errors[] = MESSAGE_POST_NOT_REOPENED;
            }
	    } else {
		    return false;
	    }
    }
    
    private function deletePost($post_id) {
	    // if database connection opened
	    if ($this->databaseConnection()) {
	    	// database, query delete the selected post
		    $sql = 'DELETE FROM posts 
		    		WHERE id = :post_id';
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':post_id', $post_id, PDO::PARAM_INT);
		    $query->execute();
		    
		    if ($query->rowCount()) {
                $this->messages[] = MESSAGE_POST_DELETED;
            } else {
                $this->errors[] = MESSAGE_POST_NOT_DELETED;
            }
	    } else {
		    return false;
	    }
    }
    
    private function deleteReply($reply_id) {
	    // if database connection opened
	    if ($this->databaseConnection()) {
	    	// database, query delete the selected reply
		    $sql = 'UPDATE post_replies
		    		SET author_id = 0, reply_author = "deleted", reply_message = "This reply has been deleted."
		    		WHERE id = :reply_id';;
		    $query = $this->db_connection->prepare($sql);
		    $query->bindValue(':reply_id', $reply_id, PDO::PARAM_INT);
		    $query->execute();
		    
		    if ($query->rowCount()) {
                $this->messages[] = MESSAGE_POST_DELETED;
            } else {
                $this->errors[] = MESSAGE_POST_NOT_DELETED;
            }
	    } else {
		    return false;
	    }
    }
    
    public function sendNewReplyEmail($op_email, $post_id, $reply_author, $reply_message)
    {
        $mail = new PHPMailer;
        
        $mail->From = EMAIL_POST_REPLY_FROM;
        $mail->FromName = EMAIL_POST_REPLY_FROM_NAME;
        $mail->AddAddress($op_email);
        $mail->Subject = EMAIL_POST_REPLY_SUBJECT;

        $link = EMAIL_POST_REPLY_URL.'?id=' . $post_id;

        $mail->Body = EMAIL_POST_REPLY_CONTENT_ONE . $reply_author . ' said: ' . '"' . $reply_message . '"' . EMAIL_POST_REPLY_CONTENT_TWO . $link;

        if(!$mail->Send()) {
            $this->errors[] = "A message to the original poster was not sent.";
            return false;
        } else {
            return true;
        }
    }
}