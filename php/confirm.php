<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $content = $_POST["inquiry"];
}
?>

<link rel="stylesheet" href="../css/php.css">
<form action="" method="post">
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="mail" value="<?php echo $mail; ?>">
    <input type="hidden" name="inquiry" value="<?php echo $content; ?>">
    <h2 class="contact-title">【お問い合わせ内容確認】</h2>
    <p>お問い合わせ内容はこちらでよろしいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
    <div>
        <label>【お名前】</label><br>
        <?php echo $name; ?>
    </div>
    <div>
        <label>【メールアドレス】</label><br>
        <?php echo $mail; ?>
    </div>
    <div>
        <label>【お問い合わせ内容】</label><br>
        <?php echo $content; ?>
    </div>

    <input class="btn" type="button" value="内容を修正する" onclick="history.back(-1)">
    <button class="btn" type="submit" name="submit">送信する</button>
</form>
 
<?php
if (isset($_POST["submit"])) {
    mb_language("ja");
    mb_internal_encoding("UTF-8");
    $subject = "{$name} 様からのお問い合わせ";
    $body = <<< EOM
{$name} 様からのお問い合わせ
===================================================
【 お名前 】
{$name}
【 メール 】
{$mail}
【 内容 】
{$content}
===================================================
EOM;

$to = "harune.ishigami@gmail.com";

    mb_send_mail($to, $subject, $body);
    header("Location:sended.php");
    exit;
}
?>
