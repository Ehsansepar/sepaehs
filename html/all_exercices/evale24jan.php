<!DOCTYPE html>
<html>
<head>
    <title>Exemple de formulaire HTML</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Exemple de formulaire HTML</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $password = htmlspecialchars($_POST['password']);
        $email = htmlspecialchars($_POST['email']);
        $website = htmlspecialchars($_POST['website']);
        $phone = htmlspecialchars($_POST['phone']);
        $date = htmlspecialchars($_POST['date']);
        $time = htmlspecialchars($_POST['time']);
        $quantity = htmlspecialchars($_POST['quantity']);
        $message = htmlspecialchars($_POST['message']);
        $country = htmlspecialchars($_POST['country']);
        $gender = htmlspecialchars($_POST['gender']);
        $interests = implode(", ", $_POST['interest']); // Convertir le tableau en chaîne de caractères

        $to = "sepaehs@sjb-liege.org";
        $subject = "Nouveau formulaire soumis";
        $email_message = "Nom: $name\n";
        $email_message .= "Mot de passe: $password\n";
        $email_message .= "E-mail: $email\n";
        $email_message .= "Site Web: $website\n";
        $email_message .= "Téléphone: $phone\n";
        $email_message .= "Date: $date\n";
        $email_message .= "Heure: $time\n";
        $email_message .= "Quantité: $quantity\n";
        $email_message .= "Message: $message\n";
        $email_message .= "Pays: $country\n";
        $email_message .= "Genre: $gender\n";
        $email_message .= "Centres d'intérêt: $interests\n";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $email_message, $headers)) {
            echo "<p>E-mail envoyé avec succès.</p>";

            // Send confirmation email to the user
            $user_subject = "Confirmation de soumission de formulaire";
            $user_message = "Merci $name, votre formulaire a été soumis avec succès.\n\n";
            $user_message .= "Détails de votre soumission:\n";
            $user_message .= "Nom: $name\n";
            $user_message .= "E-mail: $email\n";
            $user_message .= "Site Web: $website\n";
            $user_message .= "Téléphone: $phone\n";
            $user_message .= "Date: $date\n";
            $user_message .= "Heure: $time\n";
            $user_message .= "Quantité: $quantity\n";
            $user_message .= "Message: $message\n";
            $user_message .= "Pays: $country\n";
            $user_message .= "Genre: $gender\n";
            $user_message .= "Centres d'intérêt: $interests\n";

            $user_headers = "From: sepaehs@sjb-liege.org\r\n";
            $user_headers .= "Reply-To: sepaehs@sjb-liege.org\r\n";
            $user_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            if (mail($email, $user_subject, $user_message, $user_headers)) {
                echo "<p>Un e-mail de confirmation a été envoyé à $email.</p>";
            } else {
                echo "<p>Erreur lors de l'envoi de l'e-mail de confirmation.</p>";
            }
        } else {
            echo "<p>Erreur lors de l'envoi de l'e-mail.</p>";
        }
    }
    ?>
    <form action="" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name"> <br> <br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password"> <br> <br>

        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email"> <br> <br>

        <label for="website">Site Web :</label>
        <input type="url" id="website" name="website"> <br> <br>

        <label for="phone">Téléphone :</label>
        <input type="tel" id="phone" name="phone"> <br> <br>

        <label for="date">Date :</label>
        <input type="date" id="date" name="date"> <br> <br>

        <label for="time">Heure :</label>
        <input type="time" id="time" name="time"> <br> <br>

        <label for="quantity">Quantité :</label>
        <input type="number" name="quantity" id="quantity"> <br> <br>

        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="4"></textarea> <br> <br>

        <label for="country">Pays :</label>
        <select id="country" name="country">
            <option value="Belgique">Belgique</option>
            <option value="france">France</option>
            <option value="usa">États-Unis</option>
            <option value="uk">Angleterre</option>
            <option value="germany">Allemagne</option>
        </select> <br> <br>

        <label>Genre :</label> <br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male" style="display: inline;">Homme</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female" style="display: inline;">Femme</label> <br> <br>

        <label>Centres d'intérêt :</label> <br>
        <input type="checkbox" id="sport" name="interest[]" value="sport">
        <label for="sport" style="display: inline;">Sport</label>
        <input type="checkbox" id="music" name="interest[]" value="music">
        <label for="music" style="display: inline;">Musique</label>
        <input type="checkbox" id="reading" name="interest[]" value="reading">
        <label for="reading" style="display: inline;">Lecture</label> <br> <br>

        <input type="submit" value="Envoyer">
        <input type="reset" value="Réinitialiser">
    </form>
</body>
</html>
