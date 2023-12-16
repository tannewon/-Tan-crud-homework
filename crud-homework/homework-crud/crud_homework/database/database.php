<?php
/**
 * Connect to database
 */
function db() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Data_php1  ";
try{
    
    // Tạo kết nối đến cơ sở dữ liệu
   $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   return $conn;
}catch(PDOException $e){
    echo $e->getMessage();
    return null;
}
   
}
db();

/**
 * Create new student record
 */
function closeConnection($conn)
{
    $conn = null;
}

/**
 * Create new student record
 */
function createStudent($value)
{
    $conn = db();
    $sql = "INSERT INTO `student` (`name`, `age`, `email`, `profile`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $value['name']);
    $stmt->bindParam(2, $value['age']);
    $stmt->bindParam(3, $value['email']);
    $stmt->bindParam(4, $value['image_url']);
    if ($stmt->execute()) {
        closeConnection($conn);
        return true;
    } else {
        closeConnection($conn);
        return false;
    }
}


/**
 * Get all data from table student
 */
function selectAllStudents()
{
    $conn = db();
    $sql = "SELECT * FROM `student`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    closeConnection($conn);
    return $result;
}

/**
 * Get only one on record by id
 */
function selectOnestudent($id)
{
    $conn = db();
    $sql = "SELECT * FROM  `student` WHERE `id` = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    closeConnection($conn);
    return $result;
}

/**
 * Delete student by id
 */
function deleteStudent($id)
{
    $conn = db();
    $sql = "DELETE FROM `student` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $success = $stmt->execute();
    closeConnection($conn);
    return $success;
}



/**
 * Update students
 *
 */
function updateStudent($id, $name, $age, $email, $image_url)
{
    $conn = db();
    $sql = "UPDATE `student` SET `name` = ?, `age` = ?, `email` = ?, `profile` = ? WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $age);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $image_url);
    $stmt->bindParam(5, $id);
    $result = $stmt->execute();

    if ($result) {
        closeConnection($conn);
        return true;
    } else {
        closeConnection($conn);
        return false;
    }
}