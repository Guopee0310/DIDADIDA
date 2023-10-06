<?php
header("Access-Control-Allow-Origin: *"); //跨域(接收所有來源)
header("Content-Type: application/json"); //只接收json



require_once("connect.php"); //開啟DB

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 使用 $_POST 來訪問前端發送的數據
    $ord_id = $_POST["ord_id"];
    $ord_date = $_POST["ord_date"];
    $ord_sum = $_POST["ord_sum"];
    $ord_shiip = $_POST["ord_ship"];
    $ord_pay = $_POST["ord_pay"];
    $ord_person = $_POST["ord_person"];
    $ord_phone = $_POST["ord_phone"];
    $ord_add = $_POST["ord_add"];
    $ord_state = $_POST["ord_state"];
    $ord_redeem = $_POST["ord_redeem"];
    

    // 直接執行更新操作
    $update_sql = "UPDATE orders SET smart_que = :smart_que, smart_ans = :smart_ans WHERE smart_id = :smart_id";
    $update_stmt = $pdo->prepare($update_sql);
    $update_stmt->bindValue(":ord_id", $ord_id, PDO::PARAM_INT);
    $update_stmt->bindValue(":ord_date", $ord_date);
    $update_stmt->bindValue(":ord_sum", $ord_sum);
    $update_stmt->bindValue(":ord_ship", $ord_ship);
    $update_stmt->bindValue(":ord_pay", $ord_pay);
    $update_stmt->bindValue(":ord_person", $ord_person);
    $update_stmt->bindValue(":ord_phone", $ord_phone);
    $update_stmt->bindValue(":ord_add", $ord_add);
    $update_stmt->bindValue(":ord_state", $ord_state);
    $update_stmt->bindValue(":ord_redeem", $ord_redeem);
   

    // 執行更新操作
    if ($update_stmt->execute()) {
        // 返回成功消息或其他適當的響應
        $response = [
            "success" => true,
            "message" => "更新成功。",
        ];
        // echo json_encode($response);
    } else {
        // 更新失敗，返回錯誤消息
        $response = [
            "error" => true,
            "message" => "更新失敗。",
        ];
        // echo json_encode($response);
    }
}


try {
    
    $sql = "SELECT * FROM orders";
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