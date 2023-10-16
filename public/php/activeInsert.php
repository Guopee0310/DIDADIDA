<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

require_once("connect.php"); // 開啟DB

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 使用 $_POST 來訪問前端發送的數據
    $active_id = $_POST["active_id"];
    $active_title = $_POST["active_title"];
    $active_content = $_POST["active_content"];
    $active_date = $_POST["active_date"];
    
    $active_state = $_POST["active_state"];
    $active_star = $_POST["active_star"];
    $active_end = $_POST["active_end"];
    $active_img = $_FILES["image"]["name"];
    $fileName = uniqid();
    $fileExt = pathinfo($active_img, PATHINFO_EXTENSION); //副檔名

    $targetDirectory = "../all_images/active/";
    
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory);
    }

    $targetFile = $fileName . "." . $fileExt;
    $targetFile = "{$fileName}.{$fileExt}";

    $result = ["fileName" => "$targetFile"];
    if (move_uploaded_file($_FILES["image"]["tmp_name"], "{$targetDirectory}{$targetFile}")) {
        $response = [
          "success" => true,
          "message" => "文件上傳成功。",
          "file_path" => $targetFile,
          "fileName" => $targetFile
        ];
        // echo json_encode($response);
    }
    
    // 執行更新操作
    $update_sql = "INSERT INTO activity (active_id, active_img, active_title, active_content, active_date, active_state, active_star, active_end) VALUES (:active_id, :active_img, :active_title, :active_content, :active_date,  :active_state, :active_star, :active_end)";

    $update_stmt = $pdo->prepare($update_sql);
    $update_stmt->bindValue(":active_id", $active_id, PDO::PARAM_INT);
    $update_stmt->bindValue(":active_img", $targetFile);
    $update_stmt->bindValue(":active_title", $active_title);
    $update_stmt->bindValue(":active_content", $active_content);
    $update_stmt->bindValue(":active_date", $active_date);
    
    $update_stmt->bindValue(":active_state", $active_state);
    $update_stmt->bindValue(":active_star", $active_star);
    $update_stmt->bindValue(":active_end", $active_end);


    
    // 執行更新操作
    if ($update_stmt->execute()) {
        // 返回成功消息或其他適當的響應
        $response = [
            "success" => true,
            "message" => "更新成功。",
        ];
        echo json_encode($response);
    } else {
        // 更新失敗，返回錯誤消息
        $errorInfo = $update_stmt->errorInfo();
        $response = [
            "error" => true,
            "message" => "更新失敗：" . $errorInfo[2], // 將錯誤信息包括在消息中
        ];
        echo json_encode($response);
    }
}


// 關閉連接
$pdo = null;
?>
