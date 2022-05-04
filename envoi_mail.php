<?php
//Test de sécurité
    if (count($_POST)==0){
        header('Location: index.html');
    }
//Récupération et formatage des données du formulaire
    //Le prénom
    if (!empty($_POST['prenom'])){
        $prenom=ucfirst(mb_strtolower($_POST['prenom']));
        echo 'Le prénom est : '.$prenom.'<br />'."\n";
    } else {
        echo "Erreur : le prénom est vide !"."\n";
        exit(0);
    }
    //Le Nom
    if (!empty($_POST['nom'])){
        $nom=mb_strtoupper($_POST['nom']);
        echo 'Le nom est : '.$nom.'<br />'."\n";
    } else {
        echo "Erreur : le nom est vide !"."\n";
        exit(0);
    }
    //L'adresse mail
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL )){
        $email=$_POST['email'];
        echo 'L\'email est : '.$email.'<br />'."\n";
    } else {
        echo "Erreur : l'email est vide !"."\n";
        exit(0);
    }
    //Le Message
    if (!empty($_POST['message'])){
        $message=$_POST['message'];
        echo 'Le message est : '.$message.'<br />'."\n";
    } else {
        echo "Erreur : le message est vide !"."\n";
        exit(0);
    }
//L'envoi du mail
    $messagefinal='Le message est envoyé par '.$prenom.' '.$nom.'.'."\n".'Il ou elle est à contacter sur l\'email suivant : '.$email.'.'."\n".$message."\n";
    $destinataire = 'julie.quero08@gmail.com';
    $sujet = 'Demande de renseignement --- '.date('d/m/Y');
    $headers = 'From: mmi21a13@mmi-troyes.fr' . "\r\n" .
    'Reply-To: mmi21a13@mmi-troyes.fr' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    if (mail($destinataire, $sujet, $messagefinal, $headers,)) {
    echo 'Message envoyé : OK !'."\n";
    // on revient à la page d'accueil
    header('Location: index.html');
    } else {
        echo 'Erreur : message non envoyé !'."\n";
    }
?>