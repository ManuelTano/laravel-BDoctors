<template>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-6">
             <router-link :to="{ name: 'home' }" class="" id="logo"
                >
          <img
            src="https://i.ibb.co/jwdnvh4/aaaaaaaa.png"
            alt=""
            class="img-fluid w-25 py-4"

          />
                </router-link
            >
          <span 
            >Copyright © 2022 BDoctors, tutti i diritti riservati.</span
          >
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <ul>
            <li><h4 class="text-black">Informazioni su BDoctors</h4></li>
            <li>Chi siamo</li>
            <li>Lavora con noi</li>
            <li>Hai bisogno di aiuto?</li>
          </ul>
        </div>
        <div class="col-3">
          <ul>
            <li><h4>Trova il tuo specialista</h4></li>
            <li>Dermatologo</li>
            <li>Pediatra</li>
            <li>Ginecologo</li>
            <li>Oculista</li>
            <li>Cardiologo</li>
            <li>Urologo</li>
            <li>Odontoiatra</li>
            <li>Radiologo</li>
            <li>Virologo</li>
          </ul>
        </div>
        <div class="col-3">
            <ul>

            <li><h4>Ricerche frequenti</h4></li>
            </ul>
        </div>
        <div class="col-3"></div>
      </div>
      <div class="row mt-4">
        <div class="col-12">
          <p>
            BDoctors Srl, società soggetta a direzione e coordinamento di
            BDoctors SAS, con sede legale in Milano, Corso Giacomo Matteotti 1,
            20121 - Capitale Sociale: € 3.010.000,00 i.v. - Codice Fiscale,
            Partita IVA e n. registrazione registro imprese Milano Monza Brianza
            Lodi 11537360965 - REA: MI - 2609715, PEC BDoctorssrl@legalmail.it -
            Per informazioni sul trattamento dei dati personali o per esercitare
            i propri diritti privacy.italia@BDoctors.com - Nota sulla procedura
            di risoluzione delle controversie online dei consumatori (ODR). Le
            informazioni sui diritti dei consumatori e sulla procedura di
            risoluzione delle controversie online sono disponibili al link
            https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home2.show&lng=IT
            Condizioni generali di utilizzo • Condizioni d'uso del sito BDoctors
            • Informativa sulla protezione dei dati personali • Politica
            sull’uso dei cookies • Gestione dei cookie e consenso • Informativa
            privacy ex art.14 per personale sanitario Federazione Nazionale
            degli Ordini dei Medici Chirurghi e degli Odontoiatri • Elenco del
            FNOMCeO
          </p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "BaseFooter",
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables";

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  cursor: pointer;
}

li:hover {
    color: #b1a8e5;
}

footer {
  background-color: #d9f0ed;
}
</style>
