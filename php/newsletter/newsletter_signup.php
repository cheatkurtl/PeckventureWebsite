<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. E-Mail-Adresse aus POST-Daten lesen
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // 2. Validierung
    if (!$email) {
        echo "Ungültige E-Mail-Adresse.";
        exit;
    }

    // 3. Datei zur Speicherung (oder später Datenbank verwenden)
    $file = 'newsletter_emails.txt';

    // 4. E-Mail speichern
    file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);

    mail($email, "Bestätigung Newsletter", "Danke für deine Anmeldung zu unserem Newsletter!", "From: info@peckventure.at");

    // 5. Erfolgsmeldung
    echo "Danke, dass du dich für unseren Newsletter angemeldet hast!";
} else {
    echo "Ungültige Anfrage.";
}
?>
