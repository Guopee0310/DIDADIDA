<?php
header("Access-Control-Allow-Origin: *"); //跨域(接收所有來源)
header("Content-Type: application/json"); //只接收json

require_once("connect.php"); //開啟DB
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $uploadDirectory = 'path_to_upload_directory/';

    if (getimagesize($file['tmp_name'])) {
        $newFileName = uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $uploadPath = $uploadDirectory . $newFileName;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            // 文件上传成功，保存新头像信息到数据库
            $mem_id = 1; // 你的用户ID
            $mem_pic = 'URL_TO_UPLOAD_DIRECTORY/' . $newFileName; // 保存到数据库的头像URL

            // 连接MySQL数据库并执行插入操作
            $conn = new mysqli('3306', 'root', '', 'dida');
            $sql = "UPDATE member SET mem_pic = '$mem_pic' WHERE id = $mem_id";
            $result = $conn->query($sql);

            if ($result) {
                echo json_encode(['success' => true, 'avatar_url' => $mem_pic]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Database update failed.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Upload failed.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid file type.']);
    }
}
?>
}