 <?php 


    $header = "Line Notify";
    $id = $_POST['txt_user'];
    $firstname = $_POST['txt_firstname'];
    $lastname = $_POST['txt_lastname'];
    $phone = $_POST['txt_phone'];
    $email = $_POST['txt_email'];
    $ms = $_POST['txt_des'];

    $message = $header.
                "\n". "ชื่อผู้ใช้: " . $id .
                "\n". "ชื่อจริง: " . $firstname .
                "\n". "นามสกุล: " . $lastname .
                "\n". "เบอร์โทรศัพท์: " . $phone .
                "\n". "อีเมล์: " . $email.
                "\n". "แจ้งเรื่อง: " . $ms;


    if (isset($_POST["submit"])) {
        if ( $id <> "" ||$firstname <> "" ||  $lastname <> "" ||  $phone <> "" ||  $email <> "" ||  $ms <> "") {
            sendlinemesg();
            header('Content-Type: text/html; charset=utf8');
            $res = notify_message($message);
            echo "<script>alert('สมัครสมาชิกเรียบร้อย');</script>";
            header("location: index.php");
        } else {
            echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
            header("location: index.php");
        }
    }

    function sendlinemesg() {
		// LINE LINE_API https://notify-api.line.me/api/notify ใช้ร่วมกันได้
		// LINE TOKEN 51uoSsSNuSQdSVRzsaqNAt6VAFqln6yFSHOqHVDyxiV ใข้ของตนเอง
        define('LINE_API',"https://notify-api.line.me/api/notify");
        define('LINE_TOKEN',"51uoSsSNuSQdSVRzsaqNAt6VAFqln6yFSHOqHVDyxiV");

        function notify_message($message) {
            $queryData = array('message' => $message);
            $queryData = http_build_query($queryData,'','&');
            $headerOptions = array(
                'http' => array(
                    'method' => 'POST',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                                ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                                ."Content-Length: ".strlen($queryData)."\r\n",
                    'content' => $queryData
                )
            );
            $context = stream_context_create($headerOptions);
            $result = file_get_contents(LINE_API, FALSE, $context);
            $res = json_decode($result);
            return $res;
        }
    }


?>