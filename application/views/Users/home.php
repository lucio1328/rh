<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Bootstrap 5 Login Page</title>
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/all.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/toast/toast.min.css">
    <script src="<?php echo site_url(); ?>assets/toast/jqm.js"></script>
    <script src="<?php echo site_url(); ?>assets/toast/toast.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        h1 {
            text-align: center;
            color: #333;
            padding: 20px;
            background-color: #007BFF;
            color: white;
        }

        form {
            width: 60%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        /* Responsivité pour les petits écrans */
        @media (max-width: 768px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <h1>Insertion Besoin Talent et Recherche du Profil</h1>
    <center><p><?php if(!empty($error)) { ?>
        <span style="color: red;"><?= $error ?></span>
    <?php } ?></p></center>
    <form action="<?php echo site_url('recrutement/');?>" method="post">
        <label for="titre">Titre du Poste :</label>
        <input type="text" name="titre" id="titre" required><br>

        <label for="description">Description :</label>
        <textarea name="description" id="description"></textarea><br>

        <label for="responsabilite">Responsabilité Principale :</label>
        <textarea name="responsabilite" id="responsabilite"></textarea><br>

        <label for="etudes">Études :</label>
        <input type="text" name="etudes" id="etudes"><br>

        <label for="experience">Expérience :</label>
        <input type="number" name="experience" id="experience"><br>

        <button type="submit">OK</button>
    </form>
    <div>
        <h3>Questionnaire</h3>
        <ul>
            <li>Ce besoin est il primordial pour atteindre les objectifs de la société</li> 
            <li>Quelles apports pourrait apporter ce besoin à l'équipe actuelle</li> 
            <li>Pourra-t-elle renforcer les forces de l'équipe et remédier à ses faiblesses</li>
        </ul>
    </div>
</body>
</html>
