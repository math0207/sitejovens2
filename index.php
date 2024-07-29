<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["telefone"]);

    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($phone)) {
        echo "Os dados não estão corretos.";
        exit;
    }

    $recipient = "matheusalmeida387@gmail.com";  // Substitua pelo seu endereço de email
    $subject = "Novo contato de $name";
    $email_content = "Nome: $name\n";
    $email_content = "Email: $email\n";
    $email_content = "Telefone: $phone\n";

    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Houve um problema ao enviar sua mensagem. Tente novamente.";
    }
} else {
    echo "Método de solicitação inválido.";
}
?>