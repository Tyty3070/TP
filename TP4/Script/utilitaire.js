
function initialiserTab1(tab) {
    for (let i = 0; i < tab.length; i++) {
        tab[i] = 0;
    }
}


function remplirTab1(tab, min, max) {
    for (let i = 0; i < tab.length; i++) {
        tab[i] = Math.floor(Math.random() * (max - min + 1)) + min;
    }
}


function afficherTab1(tab, nbRempli) {
    for (let i = 0; i < nbRempli; i++) {
        console.log("Case " + i + " : " + tab[i]);
    }
}