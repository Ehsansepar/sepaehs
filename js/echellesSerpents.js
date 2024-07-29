// 

function lancerDE() {
    let DE = Math.floor(Math.random() * 6 ) + 1;
    return DE;
}

function verifierCase(casePion) {
    let c = casePion;

    // si on tombe sur une echelle 
    if (c=8) {
        alert('Case échelle vous montez à la 31 ')
    } 
    else if (c = 15) {
        alert('Case échelle vous montez à la case 97')
    }
    else if (c = 42 ) {
        alert('Case échelles vous montez à la 81')
    }
    //  si on tombe sur une tête de serpent 
    else if (c = 24) {
        alert('case sur tête de serpents vous tombez à la case 1')
    }
    else {}
}


function jouer() {
    alert('On joue ? \nCombien de joueurs ?');
    const nbJoueurs = prompt('Donnez-moi un nombre entre 2 et 4 et pour quitter met (q) : ');
    
    let nomJoueurs = [];
    let pionJoueurs = [];

    //     while (nbJoueurs != 'q') {
//         if (nbJoueurs == 2) {
//             prompt('Bien\n')
//         }
//     }
// }

    i = 0;
    while (i < nbJoueurs) {
        nomJoueurs[i] = prompt('Joueur n°'+(i+1)+'\n Quel es ton nom? : ');
        pionJoueurs[i] = 0;
        i++;
        
    }

    alert(nomJoueurs);
    
    j = 0; 
    while (j < nbJoueurs) {
        leDE = lancerDE();
        pionJoueurs[j] = pionJoueurs[j] + leDE;
        alert(nomJoueurs[j] + ' lancer le dé et obtient ' +leDE +
        'et va à la case ' + pionJoueurs );
        verifierCase(casePion);
        j++;    
        
    }
}