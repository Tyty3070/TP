const { jsPDF } = window.jspdf;

// --- Système de formatage du téléphone (ajoute les espaces) ---
const telInput = document.getElementById('client-tel');
telInput.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, ''); // Enlève tout ce qui n'est pas chiffre
    let formatted = "";
    for (let i = 0; i < value.length; i++) {
        if (i > 0 && i % 2 === 0) formatted += " ";
        formatted += value[i];
    }
    e.target.value = formatted.trim();
});

function genererDevis() {
    // Récupération
    const surface = parseFloat(document.getElementById('surface').value);
    const epaisseur = parseFloat(document.getElementById('epaisseur').value);
    const tel = document.getElementById('client-tel').value;
    const devisNum = document.getElementById('devis-num').value;

    // Validation
    if (epaisseur < 0.15 || epaisseur > 0.35) {
        alert("L'épaisseur doit être entre 0.15 et 0.35 m.");
        return;
    }

    // Calculs
    const volumeReel = surface * epaisseur;
    const nbCamions = Math.ceil(volumeReel / 9);
    const volumeLivre = nbCamions * 9;
    const prixBetonHT = volumeLivre * 91;
    const prixTransportHT = nbCamions * 140;
    const sousTotal = prixBetonHT + prixTransportHT;
    const tva = sousTotal * 0.20;
    const totalTTC = sousTotal + tva;

    // Injection
    document.getElementById('display-devis-num').innerText = devisNum;
    document.getElementById('display-client-nom').innerText = document.getElementById('client-nom').value.toUpperCase();
    document.getElementById('display-client-tel').innerText = tel;
    document.getElementById('display-client-adresse').innerText = document.getElementById('client-adresse').value;
    document.getElementById('currentDateDisplay').innerText = new Date().toLocaleDateString();

    document.getElementById('devis-table-body').innerHTML = `
        <tr><td>Béton Armé 350kg/m³</td><td>91.00 €</td><td>${volumeLivre} m³</td><td>${prixBetonHT.toFixed(2)} €</td></tr>
        <tr><td>Transport (Camion 9m³)</td><td>140.00 €</td><td>${nbCamions}</td><td>${prixTransportHT.toFixed(2)} €</td></tr>
    `;

    document.getElementById('resSousTotal').innerText = sousTotal.toFixed(2) + " €";
    document.getElementById('resTVA').innerText = tva.toFixed(2) + " €";
    document.getElementById('resTTC').innerText = totalTTC.toFixed(2) + " €";
    document.getElementById('resCiment').innerText = ((volumeLivre * 350) / 1000).toFixed(2);
    document.getElementById('resCamions').innerText = nbCamions;

    document.getElementById('input-screen').style.display = 'none';
    document.getElementById('devis-page').style.display = 'block';
}

async function telechargerPDF() {
    const element = document.getElementById('devis-content-area');
    const doc = new jsPDF('p', 'mm', 'a4');
    await html2canvas(element, { scale: 2 }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        doc.addImage(imgData, 'PNG', 0, 0, 210, 297);
        doc.save(`Devis_${document.getElementById('devis-num').value}.pdf`);
    });
}