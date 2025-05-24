<?php
// Configuration de la base de données
$host = 'mysql-sepaehs.alwaysdata.net'; // ou votre hôte
$user = 'sepaehs';      // ou votre utilisateur
$pass = 'onuq7256';          // ou votre mot de passe
$db = 'sepaehs_boulangerie';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Traitement des formulaires
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ajout client
    if (isset($_POST['add_client'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse_livraison'];
        
        $stmt = $conn->prepare("INSERT INTO clients (nom, prenom, email, telephone, adresse_livraison) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sss", $nom, $prenom, $email, $telephone, $adresse);
        
        if ($stmt->execute()) {
            $client_msg = "Client ajouté avec succès!";
        } else {
            $client_msg = "Erreur: " . $conn->error;
        }
        $stmt->close();
    }
    
    // Ajout commande
    if (isset($_POST['add_commande'])) {
        $date_com = $_POST['date_com'];
        $ref_cli = $_POST['ref_cli'];
        
        $stmt = $conn->prepare("INSERT INTO commandes (date_com, ref_cli) VALUES (?, ?)");
        $stmt->bind_param("si", $date_com, $ref_cli);
        
        if ($stmt->execute()) {
            $commande_msg = "Commande ajoutée avec succès!";
        } else {
            $commande_msg = "Erreur: " . $conn->error;
        }
        $stmt->close();
    }
    
    // Ajout produit
    if (isset($_POST['add_produit'])) {
        $categorie = $_POST['categorie'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        
        $stmt = $conn->prepare("INSERT INTO produits (categorie, nom, description, prix) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ss", $categorie, $nom, $description, $prix);
        
        if ($stmt->execute()) {
            $produit_msg = "Produit ajouté avec succès!";
        } else {
            $produit_msg = "Erreur: " . $conn->error;
        }
        $stmt->close();
    }
    
    // Ajout ligne de commande
    if (isset($_POST['add_ligne'])) {
        $ref_commande = $_POST['ref_commande'];
        $ref_produit = $_POST['ref_produit'];
        $quant = $_POST['quant'];
        
        $stmt = $conn->prepare("INSERT INTO lignescom (ref_commande, ref_produit, quant) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $ref_commande, $ref_produit, $quant);
        
        if ($stmt->execute()) {
            $ligne_msg = "Ligne ajoutée avec succès!";
        } else {
            $ligne_msg = "Erreur: " . $conn->error;
        }
        $stmt->close();
    }
}

// Récupération des données pour les listes déroulantes
$clients = $conn->query("SELECT * FROM clients");
$commandes = $conn->query("SELECT * FROM commandes");
$produits = $conn->query("SELECT * FROM produits");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des commandes de sandwiches</title>
    <style>
        .tabs {
            display: flex;
            margin-bottom: 20px;
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            background: #f0f0f0;
            border: 1px solid #ddd;
            margin-right: 5px;
        }
        .tab.active {
            background: #fff;
            border-bottom: 1px solid #fff;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        form {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            margin-bottom: 10px;
            padding: 5px;
            width: 200px;
        }
        .message {
            color: #444;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 3px;
        }
        .success {
            background: #dff0d8;
            color: #3c763d;
        }
        .error {
            background: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>
    <h1>Gestion des commandes de sandwiches</h1>
    
    <div class="tabs">
        <div class="tab active" onclick="showTab('client')">Clients</div>
        <div class="tab" onclick="showTab('commande')">Commandes</div>
        <div class="tab" onclick="showTab('produit')">Produits</div>
        <div class="tab" onclick="showTab('ligne')">Lignes de commande</div>
    </div>
    
    <!-- Onglet Clients -->
    <div id="client-tab" class="tab-content active">
        <h2>Ajouter un client</h2>
        <?php if (isset($client_msg)): ?>
            <div class="message <?php echo strpos($client_msg, 'Erreur') !== false ? 'error' : 'success'; ?>">
                <?php echo $client_msg; ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <input type="hidden" name="add_client" value="1">
            
            <label>Nom:</label>
            <input type="text" name="nom" required>
            
            <label>Prénom:</label>
            <input type="text" name="prenom" required>
            
            <label>Email:</label>
            <input type="email" name="email" required>
            
            <label>Téléphone:</label>
            <input type="tel" name="telephone">
            
            <label>Adresse de livraison:</label>
            <textarea name="adresse_livraison" required></textarea>
            
            <input type="submit" value="Ajouter">
        </form>
    </div>
    
    <!-- Onglet Commandes -->
    <div id="commande-tab" class="tab-content">
        <h2>Ajouter une commande</h2>
        <?php if (isset($commande_msg)): ?>
            <div class="message <?php echo strpos($commande_msg, 'Erreur') !== false ? 'error' : 'success'; ?>">
                <?php echo $commande_msg; ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <input type="hidden" name="add_commande" value="1">
            
            <label>Date:</label>
            <input type="date" name="date_com" required>
            
            <label>Client:</label>
            <select name="ref_cli" required>
                <option value="">Sélectionner un client</option>
                <?php while($row = $clients->fetch_assoc()): ?>
                    <option value="<?php echo $row['idclient']; ?>"><?php echo $row['prenom'] . ' ' . $row['nom']; ?></option>
                <?php endwhile; ?>
            </select>
            
            <input type="submit" value="Ajouter">
        </form>
    </div>
    
    <!-- Onglet Produits -->
    <div id="produit-tab" class="tab-content">
        <h2>Ajouter un produit</h2>
        <?php if (isset($produit_msg)): ?>
            <div class="message <?php echo strpos($produit_msg, 'Erreur') !== false ? 'error' : 'success'; ?>">
                <?php echo $produit_msg; ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <input type="hidden" name="add_produit" value="1">
            
            <label>Catégorie:</label>
            <input type="text" name="categorie" required>
            
            <label>Nom:</label>
            <input type="text" name="nom" required>
            
            <label>Description:</label>
            <textarea name="description"></textarea>
            
            <label>Prix (€):</label>
            <input type="number" name="prix" step="0.01" required>
            
            <input type="submit" value="Ajouter">
        </form>
    </div>
    
    <!-- Onglet Lignes de commande -->
    <div id="ligne-tab" class="tab-content">
        <h2>Ajouter une ligne de commande</h2>
        <?php if (isset($ligne_msg)): ?>
            <div class="message <?php echo strpos($ligne_msg, 'Erreur') !== false ? 'error' : 'success'; ?>">
                <?php echo $ligne_msg; ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <input type="hidden" name="add_ligne" value="1">
            
            <label>Commande:</label>
            <select name="ref_commande" required>
                <option value="">Sélectionner une commande</option>
                <?php while($row = $commandes->fetch_assoc()): ?>
                    <option value="<?php echo $row['idcommande']; ?>">Commande #<?php echo $row['idcommande']; ?></option>
                <?php endwhile; ?>
            </select>
            
            <label>Produit:</label>
            <select name="ref_produit" required>
                <option value="">Sélectionner un produit</option>
                <?php while($row = $produits->fetch_assoc()): ?>
                    <option value="<?php echo $row['idproduit']; ?>"><?php echo $row['nom']; ?></option>
                <?php endwhile; ?>
            </select>
            
            <label>Quantité:</label>
            <input type="number" name="quant" min="1" required>
            
            <input type="submit" value="Ajouter">
        </form>
    </div>

    <script>
        function showTab(tabName) {
            // Cacher tous les onglets
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Désactiver toutes les classes actives
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Afficher l'onglet sélectionné
            document.getElementById(tabName + '-tab').classList.add('active');
            event.target.classList.add('active');
        }
    </script>
</body>
</html>