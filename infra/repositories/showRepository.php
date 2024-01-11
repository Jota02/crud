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

function getShowById($id)
{
    $stmt = $GLOBALS['pdo']->prepare('SELECT * FROM shows WHERE id = ?;');
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


function getShowCategoriesById($id){
    $sql = '
        SELECT 
            GROUP_CONCAT(DISTINCT categories.category_name ORDER BY categories.category_name ASC) AS show_categories
        FROM 
            shows
        LEFT JOIN 
            show_categories ON shows.id = show_categories.show_id
        LEFT JOIN 
            categories ON show_categories.category_id = categories.id
        WHERE 
            shows.id = ?
    ';

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch();

    return isset($result['show_categories']) ? $result['show_categories'] : null;
}

function getShowTypeById($id){
    $sql = ' SELECT type.show_type FROM shows JOIN type ON shows.id_type = type.id WHERE shows.id = ?;';

    $stmt = $GLOBALS['pdo']->prepare($sql);
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch();

    return isset($result['show_type']) ? $result['show_type'] : null;
}



function getShowsTitlePoster($limit, $offset, $show_type) {
    global $pdo;
    
    $sql = "SELECT id, title, poster_path FROM shows WHERE id_type= :show_type ORDER BY id LIMIT :limit OFFSET :offset";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':show_type', $show_type, PDO::PARAM_INT);
    
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getShowsTitleCovers() {
    global $pdo;
    
    $sql = "SELECT id, title, cover_path FROM shows WHERE cover_path IS NOT NULL;";
    
    $stmt = $pdo->prepare($sql);  
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function updateShow($show)
{
    $sqlUpdate = "UPDATE  
    shows SET
        id_type = :id_type, 
        title = :title, 
        description = :description, 
        seasons = :seasons, 
        rating = :rating, 
        age = :age, 
        release_year = :release_year,
        end_year = :end_year,
        trailer = :trailer,
        poster_path = :poster_path,
        cover_path = :cover_path
    WHERE id = :id;";

    $PDOStatement = $GLOBALS['pdo']->prepare($sqlUpdate);

    return $PDOStatement->execute([
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
    
}

function deleteShow($id)
{
    $stmt = $GLOBALS['pdo']->prepare('DELETE FROM shows WHERE id = ?;');
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    return $stmt->execute();
}

?>
