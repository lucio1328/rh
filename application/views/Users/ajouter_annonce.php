<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a job announcement form template based on Bootstrap 5">
    <title>Ajouter une Annonce</title>
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/all.css">
    <link rel="stylesheet" href="<?php echo site_url(); ?>assets/toast/toast.min.css">
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

        /* Style de la barre de navigation */
        .navbar {
            background-color: #007BFF;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-weight: bold;
        }

        .navbar a:hover {
            background-color: #0056b3;
            border-radius: 4px;
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

        .checkbox-group {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin: 10px 0;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: normal;
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

    <h1>Détails supplémentaire</h1>

    <form action="<?php echo site_url('recrutement/ajouter');?>" method="post">
        <input type="hidden" name="id_besoin" value="<?php echo $id_besoin; ?>"/>
        
        <div class="checkbox-group">
            <label>Pièce à fournir :</label>
            <label><input type="checkbox" name="piece[]" value="CV"> CV</label>
            <label><input type="checkbox" name="piece[]" value="Lettre de motivation"> Lettre de motivation</label>
            <label><input type="checkbox" name="piece[]" value="Diplômes"> Diplômes</label>
        </div>

        <label for="avantages">Avantages du Poste :</label>
        <textarea name="avantages" id="avantages"></textarea>

        <div class="checkbox-group">
            <label>Moyen pour postuler :</label>
            <label><input type="checkbox" name="moyen_postuler[]" value="Email"> Email</label>
            <label><input type="checkbox" name="moyen_postuler[]" value="Téléphone"> Téléphone</label>
            <label><input type="checkbox" name="moyen_postuler[]" value="En personne"> En personne</label>
        </div>

        <label for="date_limite">Date limite de candidature :</label>
        <input type="date" name="date_limite" id="date_limite" required>

        <button type="submit">Valider</button>
    </form>
    <div>
        <h3>Questionnaire</h3>
        <ul>
            <li>Quelles avantages peuvent attirer le talent recherché</li>
            <li>Quelles sont nos atouts par rapport à nos concurrents</li>
            <li>La date limite imposé est elle raisonnable pour l'avancement de l'entreprise </li>
        </ul>
    </div>
</body>
</html>
