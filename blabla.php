<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Système de Gestion de Boulangerie Moderne</title>
  <meta name="description" content="Système complet de gestion pour une boulangerie avec un design moderne et élégant, comprenant sélection dynamique de catégories et produits, ainsi qu'un affichage des achats par client.">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.3/dist/tailwind.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.6.0/tabler-icons.min.css">
  <script>
    // Définition des catégories et produits
    const categoriesProduits = {
      "Pains": [
        "Baguette traditionnelle","Pain de campagne","Pain de seigle","Pain complet","Pain de mie","Pain de la maison"
      ],
      "Viennoiseries": [
        "Croissant nature","Croissant au beurre","Croissant au chocolat","Pain au chocolat","Pain au lait","Chocolatine","Chausson aux pommes","Brioche"
      ],
      "Pâtisseries": [
        "Tarte aux fruits","Tarte au chocolat","Tarte à la crème",
        "Éclair au chocolat","Éclair au café","Mille-feuilles",
        "Tarte meringuée au citron","Tarte meringuée à la framboise",
        "Bavarois aux fruits","Merveilleux","Tartelette à la crème pâtissière"
      ],
      "Gâteaux thématiques": [
        "Gâteau d'anniversaire","Gâteau de mariage","Gâteau pour baptême","Gâteau pour communion","Gâteau personnalisé"
      ],
      "Cakes et galettes": [
        "Cake nature","Cake aux fruits","Galette des rois nature","Galette des rois aux fruits","Cake marbré","Cake au chocolat"
      ],
      "Produits salés": [
        "Sandwich jambon","Sandwich fromage","Sandwich poulet","Quiche salée","Pizza maison","Focaccia","Pain surprise"
      ]
    };

    // Simuler une BDD clients et achats pour la démo d'affichage
    const demoClients = [
      {id:1, nom:"Dupont", prenom:"Marie", email:"marie.dupont@email.com", telephone:"0601234567", adresse:"12 rue du Pain, Paris",},
      {id:2, nom:"Martin", prenom:"Luc", email:"luc.martin@email.com", telephone:"0609876543", adresse:"17 avenue des Croissants, Lyon",},
      {id:3, nom:"Durand", prenom:"Sophie", email:"sophie.durand@email.com", telephone:"0612345678", adresse:"8 place des Gourmands, Lille"}
    ];
    const demoAchats = [
      {clientId:1, commandeId:101, date:"2024-06-15", lignes:[
        {categorie: "Pains", nom: "Pain de campagne", quantite: 2, prix: 2.2, img:"https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=400&q=80"},
        {categorie: "Viennoiseries", nom: "Croissant au beurre", quantite: 6, prix: 0.95, img:"https://images.unsplash.com/photo-1523983303491-16b3c8b33303?w=400&q=80"}
      ]},
      {clientId:2, commandeId:102, date:"2024-06-16", lignes:[
        {categorie: "Pâtisseries", nom: "Éclair au chocolat", quantite: 4, prix: 2.6, img:"https://images.unsplash.com/photo-1519864600265-abb23843cc9e?w=400&q=80"},
        {categorie: "Produits salés", nom: "Sandwich jambon", quantite: 2, prix: 4.8, img:"https://images.unsplash.com/photo-1519863232472-0884363b41cd?w=400&q=80"},
      ]},
      {clientId:3, commandeId:104, date:"2024-06-18", lignes:[
        {categorie: "Pâtisseries", nom: "Mille-feuilles", quantite: 1, prix: 3.2, img:"https://images.unsplash.com/photo-1542444459-db68ac1c4c57?w=400&q=80"},
        {categorie: "Viennoiseries", nom: "Pain au chocolat", quantite: 8, prix: 1.1, img:"https://images.unsplash.com/photo-1519863232472-0884363b41cd?w=400&q=80"}
      ]},
    ];
  </script>
</head>
<body class="font-sans bg-yellow-50 text-gray-900">
  <div class="max-w-5xl mx-auto p-8">
    <header class="flex flex-col md:flex-row md:items-center gap-2 mb-8">
      <img src="https://cdn.jsdelivr.net/gh/tabler/tabler-icons/icons/bread.svg" alt="Boulangerie Logo" class="w-12 h-12 mr-2 opacity-80">
      <div>
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-yellow-900 drop-shadow mb-2 flex gap-1 items-center">
          <span>Système de Gestion&nbsp;</span>
          <span class="inline-block text-amber-600">
            <i class="ti ti-bread"></i> Boulangerie
          </span>
        </h1>
        <p class="text-lg font-medium text-yellow-800 tracking-wide">Gestion des commandes, catégories dynamiques, vue achats client</p>
      </div>
    </header>
    
    <!-- Onglets -->
    <div>
      <div class="flex flex-wrap border-b border-yellow-200 mb-4 gap-2" id="tabs">
        <button type="button" class="tab-btn px-4 py-2 font-semibold rounded-t-lg bg-amber-100 text-amber-900 shadow-main transition hover:bg-amber-200 active"
          onclick="showTab('clients')">
          <i class="ti ti-users inline-block mr-2 text-xl"></i>Clients
        </button>
        <button type="button" class="tab-btn px-4 py-2 font-semibold rounded-t-lg bg-amber-100 text-amber-900 shadow-main transition hover:bg-amber-200"
          onclick="showTab('commandes')">
          <i class="ti ti-receipt inline-block mr-2 text-xl"></i>Commandes
        </button>
        <button type="button" class="tab-btn px-4 py-2 font-semibold rounded-t-lg bg-amber-100 text-amber-900 shadow-main transition hover:bg-amber-200"
          onclick="showTab('produits')">
          <i class="ti ti-cookie inline-block mr-2 text-xl"></i>Produits
        </button>
        <button type="button" class="tab-btn px-4 py-2 font-semibold rounded-t-lg bg-amber-100 text-amber-900 shadow-main transition hover:bg-amber-200"
          onclick="showTab('lignescom')">
          <i class="ti ti-list-check inline-block mr-2 text-xl"></i>Lignes de commande
        </button>
        <button type="button" class="tab-btn px-4 py-2 font-semibold rounded-t-lg bg-amber-100 text-amber-900 shadow-main transition hover:bg-amber-200"
          onclick="showTab('achats')">
          <i class="ti ti-user-check inline-block mr-2 text-xl"></i>Achats Clients
        </button>
      </div>
      <!-- Tab contents -->
      <div id="tab-clients" class="tab-content">
        <div class="bg-white p-6 rounded-lg shadow border border-yellow-100">
          <h2 class="text-xl font-semibold text-yellow-900 mb-4 flex items-center gap-2">
            <i class="ti ti-user-plus text-lg"></i>Ajouter un client
          </h2>
          <form id="form-client" class="grid md:grid-cols-2 gap-4">
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Nom *</label>
              <input type="text" name="nom" class="input-main" required>
            </div>
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Prénom *</label>
              <input type="text" name="prenom" class="input-main" required>
            </div>
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Email *</label>
              <input type="email" name="email" class="input-main" required>
            </div>
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Téléphone</label>
              <input type="tel" name="telephone" class="input-main">
            </div>
            <div class="md:col-span-2">
              <label class="block text-yellow-900 font-bold mb-1">Adresse</label>
              <input type="text" name="adresse" class="input-main">
            </div>
            <div class="md:col-span-2 text-end">
              <button type="submit" class="btn-main"><i class="ti ti-user-plus mr-2"></i>Ajouter</button>
            </div>
          </form>
        </div>
        <div class="mt-8">
          <h3 class="text-lg font-semibold text-yellow-800 mb-2 flex items-center gap-2"><i class="ti ti-users-group"></i>Liste des clients (démonstration)</h3>
          <div class="overflow-x-auto">
            <table class="table-main min-w-full">
              <thead>
                <tr>
                  <th>Nom</th><th>Prénom</th><th>Email</th><th>Téléphone</th><th>Adresse</th>
                </tr>
              </thead>
              <tbody id="clients-table">
              <!-- JS: clients list -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div id="tab-commandes" class="tab-content hidden">
        <div class="bg-white p-6 rounded-lg shadow border border-yellow-100">
          <h2 class="text-xl font-semibold text-yellow-900 mb-6 flex items-center gap-2"><i class="ti ti-receipt"></i>Ajouter une commande</h2>
          <form id="form-commande" class="grid md:grid-cols-2 gap-4">
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Date *</label>
              <input type="date" name="date" class="input-main" required>
            </div>
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Client *</label>
              <select name="client" class="input-main" required id="commande-client-select"></select>
            </div>
            <div class="md:col-span-2 text-end">
              <button type="submit" class="btn-main"><i class="ti ti-receipt mr-2"></i>Ajouter</button>
            </div>
          </form>
        </div>
        <div class="mt-8">
          <h3 class="text-lg font-semibold text-yellow-800 mb-2 flex items-center gap-2"><i class="ti ti-file-invoice"></i>Liste des commandes (démonstration)</h3>
          <div class="overflow-x-auto">
            <table class="table-main min-w-full">
              <thead>
                <tr>
                  <th>#Commande</th><th>Date</th><th>Client</th>
                </tr>
              </thead>
              <tbody id="commandes-table">
                <!-- JS: commandes list -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div id="tab-produits" class="tab-content hidden">
        <div class="bg-white p-6 rounded-lg shadow border border-yellow-100">
          <h2 class="text-xl font-semibold text-yellow-900 mb-6 flex items-center gap-2"><i class="ti ti-cookie"></i>Ajouter un produit</h2>
          <form class="grid md:grid-cols-2 gap-4" id="form-produit">
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Catégorie *</label>
              <select name="categorie" id="categorie" class="input-main" required>
                <option value="">Sélectionner une catégorie</option>
              </select>
            </div>
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Nom *</label>
              <select name="nom" id="nom" class="input-main" required disabled>
                <option value="">Sélectionner un produit</option>
              </select>
            </div>
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Prix (€) *</label>
              <input type="number" step="0.01" name="prix" class="input-main" required>
            </div>
            <div>
              <label class="block text-yellow-900 font-bold mb-1">URL image (optionnel)</label>
              <input type="url" name="img" class="input-main">
            </div>
            <div class="md:col-span-2">
              <label class="block text-yellow-900 font-bold mb-1">Description</label>
              <textarea name="description" rows="2" class="input-main"></textarea>
            </div>
            <div class="md:col-span-2 text-end">
              <button type="submit" class="btn-main"><i class="ti ti-cookie mr-2"></i>Ajouter</button>
            </div>
          </form>
        </div>
      </div>
      <div id="tab-lignescom" class="tab-content hidden">
        <div class="bg-white p-6 rounded-lg shadow border border-yellow-100">
          <h2 class="text-xl font-semibold text-yellow-900 mb-6 flex items-center gap-2"><i class="ti ti-list-check"></i>Ajouter une ligne de commande</h2>
          <form class="grid md:grid-cols-4 gap-4" id="form-lignecom">
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Commande *</label>
              <select name="commande" class="input-main" id="lignecom-commande" required></select>
            </div>
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Catégorie *</label>
              <select name="categorie" id="lignecom-categorie" class="input-main" required>
                <option value="">Sélectionner une catégorie</option>
              </select>
            </div>
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Produit *</label>
              <select name="produit" id="lignecom-produit" class="input-main" required disabled>
                <option value="">Sélectionner un produit</option>
              </select>
            </div>
            <div>
              <label class="block text-yellow-900 font-bold mb-1">Quantité *</label>
              <input type="number" min="1" name="quantite" class="input-main" required>
            </div>
            <div class="md:col-span-4 text-end">
              <button type="submit" class="btn-main"><i class="ti ti-list-check mr-2"></i>Ajouter</button>
            </div>
          </form>
        </div>
      </div>
      <div id="tab-achats" class="tab-content hidden">
        <section class="bg-white p-6 rounded-lg shadow border border-yellow-100">
          <h2 class="text-xl font-semibold text-yellow-900 flex items-center gap-2 mb-6"><i class="ti ti-user-check"></i>Achats clients (démonstration)</h2>
          <div class="">
              <div id="achats-clients-list" class="flex flex-col gap-8">
                <!-- JS: achats clients -->
              </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- Styles supplémentaires pour modern look -->
  <style>
    .input-main {
      @apply border border-amber-200 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-300 w-full text-gray-900 bg-amber-50;
    }
    .btn-main {
      @apply bg-amber-500 text-white font-semibold px-6 py-2 rounded shadow hover:bg-amber-600 transition;
    }
    .table-main th {
      @apply bg-amber-100 text-yellow-900 font-semibold px-4 py-2 border-b border-amber-200 text-left;
    }
    .table-main td {
      @apply px-4 py-2 border-b border-amber-100;
    }
    .table-main tbody tr:last-child td {
      border-bottom: 0;
    }
    .shadow-main {
      box-shadow: 0 2px 6px 0 rgba(239, 179, 57, 0.05);
    }
  </style>
  <!-- Script for dynamic tabs and demo filling -->
  <script>
    // Gestion des onglets
    function showTab(tab) {
      document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active','bg-amber-200'));
      document.querySelectorAll('.tab-content').forEach(tabEl => tabEl.classList.add('hidden'));
      document.getElementById('tab-' + tab).classList.remove('hidden');
      document.querySelectorAll('.tab-btn').forEach((btn, idx) => {
        if (btn.getAttribute('onclick').includes(tab)) btn.classList.add('active','bg-amber-200');
      });
    }

    // Remplir catégories
    function fillCategorieSelect(selectId) {
      const sel = document.getElementById(selectId);
      if(!sel) return;
      sel.innerHTML = `<option value="">Sélectionner une catégorie</option>`;
      Object.keys(categoriesProduits).forEach(cat => {
        const opt = document.createElement('option');
        opt.value = cat;
        opt.textContent = cat;
        sel.appendChild(opt);
      });
    }
    // Produits dynamiques
    function setupProduitDynamic() {
      const categorie = document.getElementById('categorie');
      const nom = document.getElementById('nom');
      if(!categorie || !nom) return;
      categorie.addEventListener('change', function() {
        nom.innerHTML = `<option value="">Sélectionner un produit</option>`;
        nom.disabled = true;
        if(categoriesProduits[this.value]) {
          categoriesProduits[this.value].forEach(prod => {
            const opt = document.createElement('option');
            opt.value = prod;
            opt.textContent = prod;
            nom.appendChild(opt);
          });
          nom.disabled = false;
        }
      });
    }
    function setupLignecomDynamic() {
      const cat = document.getElementById('lignecom-categorie');
      const prod = document.getElementById('lignecom-produit');
      if(!cat || !prod) return;
      cat.addEventListener('change', function() {
        prod.innerHTML = `<option value="">Sélectionner un produit</option>`;
        prod.disabled = true;
        if(categoriesProduits[this.value]) {
          categoriesProduits[this.value].forEach(val => {
            const opt = document.createElement('option');
            opt.value = val;
            opt.textContent = val;
            prod.appendChild(opt);
          })
          prod.disabled = false;
        }
      });
    }
    // Injecter la liste de clients pour démo
    function fillDemoClients() {
      const tbody = document.getElementById('clients-table');
      if (!tbody) return;
      tbody.innerHTML = demoClients.map(
          cli => `<tr>
            <td>${cli.nom}</td>
            <td>${cli.prenom}</td>
            <td>${cli.email}</td>
            <td>${cli.telephone||""}</td>
            <td>${cli.adresse||""}</td>
            </tr>`
      ).join('');
      // Pour commande client-select aussi
      const select = document.getElementById('commande-client-select');
      if (select) {
        select.innerHTML = '<option value="">Sélectionner un client</option>' +
        demoClients.map(cli=> `<option value="${cli.id}">${cli.prenom} ${cli.nom}</option>`).join('');
      }
    }
    // Simuler commandes (à partir de achats demo)
    function fillDemoCommandes() {
      const tbody = document.getElementById('commandes-table');
      const cmdSelect = document.getElementById('lignecom-commande');
      if (!tbody || !cmdSelect) return;
      const allCmds = demoAchats.map(ca => ({
        id: ca.commandeId,
        date: ca.date,
        client: demoClients.find(c=>c.id===ca.clientId),
      }));
      tbody.innerHTML = allCmds.map(cmd => `<tr>
        <td>#${cmd.id}</td>
        <td>${cmd.date}</td>
        <td>${cmd.client ? (cmd.client.prenom+" "+cmd.client.nom) : "-"}</td>
      </tr>`).join('');
      cmdSelect.innerHTML = `<option value="">Sélectionner une commande</option>` +
        allCmds.map(cmd => `<option value="${cmd.id}">#${cmd.id} - ${(cmd.client ? cmd.client.prenom+" "+cmd.client.nom : "-")} (${cmd.date})</option>`).join('');
    }
    // Remplir achats clients
    function renderAchatsClients() {
      const achView = document.getElementById('achats-clients-list');
      if (!achView) return;
      achView.innerHTML = "";
      demoClients.forEach(cli => {
        const achats = demoAchats.filter(x=>x.clientId===cli.id);
        if(!achats.length) return;
        const lignes = achats.map(com => `
          <div class="mb-3 pl-2 border-l-8 border-amber-300">
            <div class="text-sm text-amber-800 font-bold mb-1">Commande #${com.commandeId} <span class="font-medium text-gray-500 ml-2">${com.date}</span></div>
            <div class="flex flex-wrap gap-4">
              ${com.lignes.map(l => `
                <div class="flex items-center bg-amber-50 rounded-lg p-2 gap-3 border border-amber-100 min-w-[210px] max-w-xs">
                  <img src="${l.img}" class="w-16 h-16 object-cover rounded shadow" loading="lazy" alt="${l.nom}">
                  <div>
                    <div class="font-semibold text-amber-900">${l.nom}</div>
                    <div class="text-xs text-gray-500">${l.categorie}</div>
                    <div class="mt-1 text-amber-800 font-semibold">${l.prix.toFixed(2)}€ ×${l.quantite}</div>
                  </div>
                </div>
              `).join('')}
            </div>
          </div>
        `).join('');
        achView.innerHTML += `
          <div class="mb-10 bg-gradient-to-br from-amber-50 to-amber-100 p-6 rounded-2xl border border-amber-200 shadow">
            <div class="flex flex-wrap items-center gap-4 mb-3">
              <i class="ti ti-user-circle text-4xl text-amber-500"></i>
              <div>
                <span class="font-semibold text-lg">${cli.prenom} ${cli.nom}</span>
                <span class="ml-4 text-gray-500 text-base">(${cli.email})</span>
                <div class="text-sm text-gray-600 mt-1">${cli.adresse||''}</div>
              </div>
            </div>
            ${lignes}
          </div>
        `;
      });
    }
    // - Démarrage auto
    document.addEventListener('DOMContentLoaded',function(){
      // Onglet par défaut
      showTab('clients');
      // Remplir sélecteurs catégories
      fillCategorieSelect('categorie');
      fillCategorieSelect('lignecom-categorie');
      setupProduitDynamic();
      setupLignecomDynamic();
      // Demo filling
      fillDemoClients();
      fillDemoCommandes();
      renderAchatsClients();
    });
  </script>
</body>
</html>