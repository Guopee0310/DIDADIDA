<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once("connect.php");

// get
try {

    $sql = "SELECT * FROM member";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
} catch (PDOException $e) {
    $response = array('error' => true, 'msg' => '获取管理员数据失败: ' . $e->getMessage());
    echo json_encode($response);
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uploadedFile = $_FILES["image"]["name"];
    $mem_id = $_POST["mem_id"];

    // 檢查文件是否成功上傳
    if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
        $response = [
            "error" => true,
            "message" => "文件上傳失敗。"
        ];
        echo json_encode($response);
        exit;
    }

    $fileName = uniqid();
    $fileExt = pathinfo($uploadedFile, PATHINFO_EXTENSION);

    $targetDirectory = "../all_images/memAvatar/";

    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0755, true); // 遞歸創建目錄，如果它不存在的話
    }

    $targetFile = $fileName . "." . $fileExt;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetDirectory . $targetFile)) {
        // 文件上傳成功，接下來更新數據庫
        $update_sql = "UPDATE member SET mem_pic = :mem_pic WHERE mem_id = :mem_id";
        $update_stmt = $pdo->prepare($update_sql);
        $update_stmt->bindValue(":mem_id", $mem_id, PDO::PARAM_INT);
        $update_stmt->bindValue(":mem_pic", $targetFile);

        if ($update_stmt->execute()) {
            $response = [
                "success" => true,
                "message" => "更新成功。",
            ];
        } else {
            $errorInfo = $update_stmt->errorInfo();
            $response = [
                "error" => true,
                "message" => "更新失敗：" . $errorInfo[2],
            ];
        }
    } else {
        $response = [
            "error" => true,
            "message" => "文件複製失敗。"
        ];
    }

    echo json_encode($response);
}

// 用於數據庫操作的其餘代碼，取消註釋並正確處理



// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json");

// require_once("connect.php");

// $moved = false;  // 
// $message = '';
// $error = '';
// $upload_path = '../all_images/memAvatar/';
// $max_size = 5242880;
// $allowed_types = ['image/jpeg', 'image/png', 'image/gif',];
// $allowed_exts = ['jpeg', 'jpg', 'png', 'gif',];

// function create_filename($filename, $upload_path)
// {
//     $basename = pathinfo($filename, PATHINFO_FILENAME);
//     $extension = pathinfo($filename, PATHINFO_EXTENSION);
//     $basename = preg_replace('/[^A-z0-9]', '-', $basename);
//     $i = 0;
//     while (file_exists($upload_path . $filename)) {
//         $i = $i + 1;
//         $filename = $basename . $i . '.' . $extension;
//     }
//     return $filename;
// }
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $error = ($_FILES['image']['error'] === 1) ? '檔案太大' : '';

//     if ($_FILES['image']['error'] == 0) {
//         $error .= ($_FILES['image']['size'] <= $max_size) ? '' : '檔案太大';
//         $type = mime_content_type($_FILES['image']['tmp_name']);
//         $error .= in_array($type, $allowed_types) ? '' : '錯誤格式';
//         $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
//         $error .= in_array($ext, $allowed_exts) ? '' : '錯誤';
//         if (!$error) {
//             $filename = create_filename($_FILES['image']['name'], $upload_path);
//             $destination = $upload_path . $filename;
//             $moved = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
//         }
//     }
//     if ($moved === true) {
//         $message = 'Uploaded : <br><img src="' . $destination . '">';
//     } else {
//         $message = '<b>Could not upload file : </b>' . $error;
//     }
// }
?> 