var numero = 1;

function setDetailAppartementParIndex(sens) {

    numero += sens;
    if (numero < 1)
        numero = nbAppartements;
    if (numero > nbAppartements)
        numero = 1;

    $.ajax({
        async: true,
        crossDomain: true,
        dataType: 'json',
        url: "http://172.24.2.189:8055/items/appartement?fields=id%2Cetage%2Cnumero%2Cidimm.adimm%2Cidimm.ascenseur%2Cidimm.ville%2Cidprop.nomprop%2Cidprop.prenomprop%2Cdescriptif%2Cidtype.libtype%2Cidtype.tariflocbase%2Cphoto&%5Bfilter%5D%5Bphoto%5D%5B_neq%5D=sansPhoto&limit=1&page=" + numero,
        method: "GET",
        headers: {
            "Authorization": "Bearer JetonDeSecurite"
        },
        success: function (response) {
            
            appartement = response.data[0];
            console.log(appartement);

            document.getElementById('slide').src = 'http://172.24.2.189:8055/assets/' + appartement.photo + '?width=600&height=300';
            
            document.getElementById('prix').textContent = appartement.idtype.tariflocbase + '€ / mois';
            
            detail = document.getElementById('details');
            detail.setAttribute('style', 'white-space: pre;');
            detail.textContent = '\r\n\r\nType : ' + appartement.idtype.libtype + "\r\n";
            detail.textContent += 'Numéro et Étage : ' + appartement.numero + ' | ' + appartement.etage + '\r\n';
            detail.textContent += 'Adresse : ' + appartement.idimm.adimm + ' ' + appartement.idimm.ville + '\r\n';
            detail.textContent += (appartement.idimm.ascenseur ? "L'immeuble a un ascenseur" : "L'immeuble n'a pas d'ascenseur") + '\r\n';
            detail.textContent += 'Propriétaire : ' + appartement.idprop.prenomprop + ' ' + appartement.idprop.nomprop + '\r\n';
            detail.textContent += 'Description : ' + appartement.descriptif;
            
            
            document.getElementById('button').value = appartement.id;
        }
    });
}
