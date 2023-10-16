<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once("connect.php"); 

// if ($_SERVER["REQUEST_METHOD"] === "POST") { 
// }

try {
    $today = date('Y-m-d'); // 获取今天的日期

    $sql = "SELECT * FROM activity WHERE active_star >= :today ORDER BY active_star LIMIT 2";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':today', $today, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
} catch (PDOException $e) {
    $response = array('error' => true, 'msg' => '獲取管理員數據失敗: ' . $e->getMessage());
    echo json_encode($response);
}


// 關閉連接
$pdo = null;
?>