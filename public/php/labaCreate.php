<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");



require_once("connect.php"); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $uploadedFile = $_FILES["image"];
  $targetDirectory = "../../../public/all_images/laba/";
  $targetFile = $targetDirectory . basename($uploadedFile["name"]);

  if (move_uploaded_file($uploadedFile["tmp_name"], $targetFile)) {
    $response = [
      "success" => true,
      "message" => "文件上傳成功。",
      "file_path" => $targetFile,
    ];
    echo json_encode($response);
}
}


try {
   

    
    $sql = "SELECT * FROM laba";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
} catch (PDOException $e) {
    $response = array('error' => true, 'msg' => '获取管理员数据失败: ' . $e->getMessage());
    echo json_encode($response);
}

// 關閉連接
$pdo = null;


?>