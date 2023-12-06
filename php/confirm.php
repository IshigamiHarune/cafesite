<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mail = $_POST["email"];
    $content = $_POST["content"];
}
?>
 
<form action="" method="post">
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="email" value="<?php echo $mail; ?>">
    <input type="hidden" name="inquiry" value="<?php echo $content; ?>">
    <h2 class="contact-title">お問い合わせ 内容確認</h2>
    <p>お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
    <div>
        <label>お名前</label>
        <p><?php echo $name; ?></p>
    </div>
    <div>
        <label>メールアドレス</label>
        <p><?php echo $mail; ?></p>
    </div>
    <div>
        <label>お問い合わせ内容</label>
        <p><?php echo $item; ?></p>
    </div>
    <input class="btn" type="button" value="内容を修正する" onclick="history.back(-1)">
    <button class="btn" type="submit" name="submit">送信する</button>
</form>
 
<?php
if (isset($_POST["submit"])) {
    mb_language("ja");
    mb_internal_encoding("UTF-8");
    $subject = {$name} 様からのお問い合わせ;
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
    $fromEmail = "送信元のメールアドレス";
    $fromName = "ふくふく";
    $header = "From: " . mb_encode_mimeheader($fromName) . "<{$fromEmail}>";
    mb_send_mail("harune.ishigami@gmail.com", $subject, $body, $header);
    header("Location: send.php");
    exit;
}
?>
