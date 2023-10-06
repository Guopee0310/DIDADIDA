<?php
header("Access-Control-Allow-Origin: *"); //跨域(接收所有來源)
header("Content-Type: application/json"); //只接收json

require_once("connect.php"); //開啟DB

// if($_SERVER["REQUEST_METHOD"] === "POST"){
//     $uploadedFile = $_FILES["image"]["name"];
//     $banner_id = $_POST["banner_id"];
// }

// $fileName = uniqid();
// $fileExt = pathinfo($uploadedFile,PATHINFO_EXTENSION);

// $targetDirectory = "../all_images/banner";
// if(!file_exists($targetDirectory)){
//     mkdir($targetDirectory);
// }
// $targetFile = $fileName . "." . $fileExt;
// // $targetFile = "{$fileName}.{$fileExt}";
// $result = ["fileName" => "$targetFile"];

// if (move_uploaded_file($_FILES["image"]["tmp_name"], "{$targetDirectory}{$targetFile}")){
//     $response = [
//         "success" => true,
//         "message" => "文件上傳成功。",
//         "file_path" => $targetFile,
//         "fileName" => $targetFile
//     ];
// }

// $update_sql = "UPDATE banner SET banner_pic = :banner_pic WHERE banner_id = :banner_id";
// $update_stmt = $pdo->prepare($update_sql);
// $update_stmt->bindValue(":banner_pic", $targetFile);


// if ($update_stmt->execute()){
//     $response = [
//         "success" => true,
//         "message" => "文件上傳成功。",
//     ];
//     // echo json_encode($response);
// }else {
//     $response = [
//         "error" => true,
//         "message" => "更新失敗。",
//     ];
//     // echo json_encode($response);
// }

try{
    $sql = "SELECT * FROM banner";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}catch(PDOException $e){
    $response = array('error' => true, 'msg' => '獲取管理員數據失敗:' . $e->getMessage());
    echo json_encode($response);

}

$pdo = null;
?>
