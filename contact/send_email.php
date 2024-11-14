<!-- send_email.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "support@peckventure.at";
    $subject = "Neue Nachricht von der Kontaktseite";
    $body = "Name: $name\nE-Mail: $email\nNachricht:\n$message";
    $headers = "From: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Nachricht erfolgreich gesendet.'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Fehler beim Senden der Nachricht. Bitte versuche es erneut.'); window.location.href = 'index.html';</script>";
    }
}
?>