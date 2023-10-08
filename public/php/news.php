<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["image"]) && isset($_FILES["image"]['name'])) {
        $news_id = $_POST["news_id"];
        $uploadedFile = $_FILES["image"]['name'];
        $news_title = $_POST["news_title"];
        $news_content = $_POST["news_content"];
        $news_date = $_POST["news_date"];
        $news_category = $_POST["news_category"];
        $news_state = $_POST["news_state"];

        $fileName = uniqid();
        $fileExt = pathinfo($uploadedFile, PATHINFO_EXTENSION); //副檔名

        $targetDirectory = "../all_images/news/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory);
        }
        $targetFile = "{$fileName}.{$fileExt}";
        $result = ["fileName" => "$targetFile"];

        if (move_uploaded_file($_FILES["image"]["tmp_name"], "{$targetDirectory}{$targetFile}")) {
            $update_sql = "UPDATE news SET news_category = :news_category, news_content = :news_content, news_title = :news_title, news_img = :news_img, news_state= :news_state, news_date= :news_date WHERE news_id = :news_id";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->bindValue(":news_id", $news_id, PDO::PARAM_INT);
            $update_stmt->bindValue(":news_title", $news_title);
            $update_stmt->bindValue(":news_content", $news_content);
            $update_stmt->bindValue(":news_date", $news_date);
            $update_stmt->bindValue(":news_category", $news_category);
            $update_stmt->bindValue(":news_state", $news_state);
            $update_stmt->bindValue(":news_img", $targetFile);

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
                $response = [
                    "error" => true,
                    "message" => "更新失敗。",
                ];
                echo json_encode($response);
            }
        } else {
            // 文件上傳失敗，返回錯誤消息
            $response = [
                "error" => true,
                "message" => "文件上傳失敗。",
            ];
            echo json_encode($response);
        }
    } else {
        // "image"陣列不存在，返回錯誤消息
        $response = [
            "error" => true,
            "message" => "未收到有效的圖片文件。",
        ];
        echo json_encode($response);
    }
}

try {
    $sql = "SELECT * FROM news";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $response = array('error' => true, 'msg' => '获取管理员数据失败: ' . $e->getMessage());
}

// 關閉連接
$pdo = null;
?>
