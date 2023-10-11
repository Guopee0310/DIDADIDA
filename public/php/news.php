<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $news_id = $_POST["news_id"];
    $news_title = $_POST["news_title"];
    $news_content = $_POST["news_content"];
    $news_date = $_POST["news_date"];
    $news_category = $_POST["news_category"];
    $news_state = $_POST["news_state"];

    // 检查是否存在上传的文件
    if (isset($_FILES["news_img"]) && $_FILES["news_img"]["error"] === UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES["news_img"]["name"];
        $fileName = uniqid();
        $fileExt = pathinfo($uploadedFile, PATHINFO_EXTENSION);

        $targetDirectory = "../all_images/news/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory);
        }
        $targetFile = "{$fileName}.{$fileExt}";

        if (move_uploaded_file($_FILES["news_img"]["tmp_name"], "{$targetDirectory}{$targetFile}")) {

            $update_sql = "UPDATE news SET news_category = :news_category, news_content = :news_content, news_title = :news_title, news_img = :news_img, news_state = :news_state, news_date = :news_date WHERE news_id = :news_id";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->bindValue(":news_id", $news_id, PDO::PARAM_INT);
            $update_stmt->bindValue(":news_title", $news_title);
            $update_stmt->bindValue(":news_content", $news_content);
            $update_stmt->bindValue(":news_date", $news_date);
            $update_stmt->bindValue(":news_category", $news_category);
            $update_stmt->bindValue(":news_state", $news_state);
            $update_stmt->bindValue(":news_img", $targetFile);
            
            if ($update_stmt->execute()) {
                $response = [
                    "success" => true,
                    "message" => "更新成功。",
                ];
                echo json_encode($response);
            } else {
                $response = [
                    "error" => true,
                    "message" => "更新失敗。",
                ];
                echo json_encode($response);
            }
        } else {
            $response = [
                "error" => true,
                "message" => "文件上傳失敗。",
            ];
            echo json_encode($response);
        }
    } else {
        // 如果没有上传新图片，只更新标题、内容等其他字段
        $update_sql = "UPDATE news SET news_category = :news_category, news_content = :news_content, news_title = :news_title, news_state = :news_state, news_date = :news_date WHERE news_id = :news_id";
        $update_stmt = $pdo->prepare($update_sql);
        $update_stmt->bindValue(":news_id", $news_id, PDO::PARAM_INT);
        $update_stmt->bindValue(":news_title", $news_title);
        $update_stmt->bindValue(":news_content", $news_content);
        $update_stmt->bindValue(":news_date", $news_date);
        $update_stmt->bindValue(":news_category", $news_category);
        $update_stmt->bindValue(":news_state", $news_state);

        if ($update_stmt->execute()) {
            $response = [
                "success" => true,
                "message" => "更新成功。",
            ];
            echo json_encode($response);
        } else {
            $response = [
                "error" => true,
                "message" => "更新失敗。",
            ];
            echo json_encode($response);
        }
    }
}

// 关闭连接
$pdo = null;
?>
