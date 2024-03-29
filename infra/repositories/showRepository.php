<?php
require_once __DIR__ . '/../db/connection.php';

function createShow($show)
{
    $sqlCreate = "INSERT INTO 
    shows (
        id_type, 
        title, 
        description, 
        seasons, 
        rating, 
        age, 
        release_year,
        end_year,
        trailer,
        poster_path,
        cover_path
        ) 
    VALUES (
        :id_type, 
        :title, 
        :description, 
        :seasons, 
        :rating, 
        :age, 
        :release_year,
        :end_year,
        :trailer,
        :poster_path,
        :cover_path
    )";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':id_type' => $show['id_type'],
        ':title' => $show['title'],
        ':description' => $show['description'],
        ':seasons' => $show['seasons'],
        ':rating' => $show['rating'],
        ':age' => $show['age'],
        ':release_year' => $show['release_year'],
        ':end_year' => $show['end_year'],
        ':trailer' => $show['trailer'],
        ':poster_path' => $show['poster_path'],
        ':cover_path' => $show['cover_path']
    ]);

    if ($success) {
        $show['id'] = $GLOBALS['pdo']->lastInsertId();
    }
    return $success;
}

function insertUserReview($review){
    $sqlCreate = "INSERT INTO 
    user_reviews (
        id_user, 
        id_show, 
        comment, 
        rating, 
        attachments
        ) 
    VALUES (
        :id_user, 
        :id_show, 
        :comment, 
        :rating, 
        :attachments
    )";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':id_user' => $review['id_user'],
        ':id_show' => $review['id_show'],
        ':comment' => $review['comment'],
        ':rating' => $review['rating'],
        ':attachments' => $review['attachments']
    ]);

    if ($success) {
        $review['id'] = $GLOBALS['pdo']->lastInsertId();
    }
    return $success;
}

function insertSharedContent($shared){
    $sqlCreate = "INSERT INTO 
    shared_content (
        sender_id, 
        destination_id, 
        show_id
        ) 
    VALUES (
        :sender_id, 
        :destination_id, 
        :show_id
    )";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':sender_id' => $shared['sender_id'],
        ':destination_id' => $shared['destination_id'],
        ':show_id' => $shared['show_id']
    ]);

    if ($success) {
        $shared['id'] = $GLOBALS['pdo']->lastInsertId();
    }
    return $success;
}

function insertUserShow($show){

    if (userShowExist($show['user_id'], $show['show_id'])) {
        return false;
    }

    $sqlCreate = "INSERT INTO 
    user_shows (
        user_id, 
        show_id
        ) 
    VALUES (
        :user_id, 
        :show_id
    )";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlCreate);

    $success = $PDOStatement->execute([
        ':user_id' => $show['user_id'],
        ':show_id' => $show['show_id']
    ]);

    if ($success) {
        $show['id'] = $GLOBALS['pdo']->lastInsertId();
    }
    return $success;
}



function getShowById($id)
{
    $stmt = $GLOBALS['pdo']->prepare('SELECT * FROM shows WHERE id = ?');
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

function getSearchedShows($searchInput)
{
    $sql = 'SELECT id FROM shows WHERE title LIKE :searchInput';

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $searchTermWithWildcards = '%' . $searchInput . '%';
    $stmt->bindParam(':searchInput', $searchTermWithWildcards, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getShared($id)
{
    $sql = 'SELECT sc.id, sc.show_id, s.title, s.poster_path 
            FROM shared_content sc 
            JOIN shows s ON sc.show_id = s.id 
            WHERE sc.destination_id = ?
            ORDER BY sc.shared_date DESC';

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getMyShows($userId){
    $sql = 'SELECT s.id AS show_id, s.id_type, s.title, s.poster_path
            FROM user_shows us 
            JOIN shows s ON us.show_id = s.id 
            WHERE us.user_id = ? 
            ORDER BY us.saved_date DESC';

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(1, $userId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getEvents($userId){
    $sql = 'SELECT s.title, s.poster_path, us.calendar_date
            FROM user_shows us 
            JOIN shows s ON us.show_id = s.id 
            WHERE us.user_id = ? AND us.calendar_date IS NOT NULL
            ORDER BY us.calendar_date ASC';

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(1, $userId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function userShowExist($userId, $showId) {
    $sql = 'SELECT COUNT(*) FROM user_shows WHERE user_id = :userId AND show_id = :showId';

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':showId', $showId, PDO::PARAM_INT);
    $result = $stmt->fetchColumn() > 0;
    
    return $result;
}


function getShowCategoriesById($id){
    $sql = 'SELECT GROUP_CONCAT(DISTINCT categories.category_name ORDER BY categories.category_name ASC) AS show_categories
        FROM shows
        LEFT JOIN show_categories ON shows.id = show_categories.show_id
        LEFT JOIN categories ON show_categories.category_id = categories.id
        WHERE shows.id = ?';

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();

    return isset($result['show_categories']) ? $result['show_categories'] : null;
}

function getShowTypeById($id){
    $sql = ' SELECT type.show_type FROM shows JOIN type ON shows.id_type = type.id WHERE shows.id = ?';

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();

    return isset($result['show_type']) ? $result['show_type'] : null;
}

function getUserReviews($id){
    $sql = 'SELECT user_reviews.*, users.name AS userName
            FROM user_reviews
            JOIN users ON user_reviews.id_user = users.id
            WHERE user_reviews.id_show = ?;
            ';

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getShowsTitlePoster($limit, $offset, $show_type) {
    
    $sql = 'SELECT id, title, poster_path FROM shows WHERE id_type= :show_type ORDER BY rating DESC LIMIT :limit OFFSET :offset';
    
    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':show_type', $show_type, PDO::PARAM_INT);
    
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getShowsTitleCovers() {
    
    $sql = 'SELECT id, title, cover_path FROM shows WHERE cover_path IS NOT NULL';
    
    $stmt = $GLOBALS['pdo']->prepare($sql);  
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function countMyShows() {
    $PDOStatement = $GLOBALS['pdo']->prepare('SELECT COUNT(*) AS row_count FROM user_shows;');
    $PDOStatement->execute();
    return $PDOStatement->fetch();
}

function countUsersReviews() {
    $PDOStatement = $GLOBALS['pdo']->prepare('SELECT COUNT(*) AS row_count FROM user_reviews;');
    $PDOStatement->execute();
    return $PDOStatement->fetch();
}

function countShows() {
    $PDOStatement = $GLOBALS['pdo']->prepare('SELECT COUNT(*) AS row_count FROM shows;');
    $PDOStatement->execute();
    return $PDOStatement->fetch();
}

function updateShow($show)
{
    $currentTimestamp = date('Y-m-d H:i:s');

    if ($show['calendar_date'] >= $currentTimestamp) {
        $sql ='UPDATE user_shows SET calendar_date= :calendar_date WHERE show_id= :id';

        $stmt = $GLOBALS['pdo']->prepare($sql);
        $stmt->bindParam(':calendar_date', $show['calendar_date'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $show['show_id'], PDO::PARAM_INT);
        
        $stmt->execute();
        
        return $stmt->fetch();
    } else {
        return false;
    }
}

function deleteMyShow($id)
{
    $stmt = $GLOBALS['pdo']->prepare('DELETE FROM user_shows WHERE show_id= ?');
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function deleteReview($id)
{
    $stmt = $GLOBALS['pdo']->prepare('DELETE FROM user_reviews WHERE id= ?');
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function deleteMyShared($id)
{
    $stmt = $GLOBALS['pdo']->prepare('DELETE FROM shared_content WHERE id= ?');
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    return $stmt->execute();
}

