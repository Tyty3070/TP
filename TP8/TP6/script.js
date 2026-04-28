const cards = document.querySelectorAll('.card');
const statsCount = document.getElementById('stats-count');
const restartBtn = document.getElementById('restart-btn');

let hasFlippedCard = false;
let lockBoard = false;
let firstCard, secondCard;
let attempts = 0;

function flipCard() {
    if (lockBoard) return;
    if (this === firstCard) return;

    this.classList.add('flip');

    if (!hasFlippedCard) {
        hasFlippedCard = true;
        firstCard = this;
        return;
    }

    secondCard = this;
    attempts++; // Augmente le nombre d'essais
    statsCount.textContent = attempts; // Met à jour l'affichage
    checkForMatch();
}

function checkForMatch() {
    let isMatch = firstCard.dataset.animal === secondCard.dataset.animal;
    isMatch ? disableCards() : unflipCards();
}

function disableCards() {
    firstCard.removeEventListener('click', flipCard);
    secondCard.removeEventListener('click', flipCard);
    resetBoard();
}

function unflipCards() {
    lockBoard = true;
    setTimeout(() => {
        firstCard.classList.remove('flip');
        secondCard.classList.remove('flip');
        resetBoard();
    }, 1000);
}

function resetBoard() {
    [hasFlippedCard, lockBoard] = [false, false];
    [firstCard, secondCard] = [null, null];
}

function shuffle() {
    cards.forEach(card => {
        let randomPos = Math.floor(Math.random() * cards.length);
        card.style.order = randomPos;
    });
}

// Fonction pour recommencer la partie
function restartGame() {
    attempts = 0;
    statsCount.textContent = attempts;
    hasFlippedCard = false;
    lockBoard = false;
    firstCard = null;
    secondCard = null;

    cards.forEach(card => {
        card.classList.remove('flip');
        card.addEventListener('click', flipCard);
    });
    
    // On attend un petit peu que les cartes se retournent avant de mélanger
    setTimeout(shuffle, 500);
}

// Initialisation
shuffle();
cards.forEach(card => card.addEventListener('click', flipCard));
restartBtn.addEventListener('click', restartGame);