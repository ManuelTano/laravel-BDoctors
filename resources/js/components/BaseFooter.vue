<template>
    <footer>
        <div class="container">
            <div class="row py-5">
                <div class="col-12-sm col-6-md">
                    <router-link :to="{ name: 'home' }" class="" id="logo">
                        <img
                            src="https://i.ibb.co/jwdnvh4/aaaaaaaa.png"
                            alt=""
                            class="img-fluid w-25 py-4"
                        />
                    </router-link>
                    <span
                        >Copyright © 2022 BDoctors, tutti i diritti
                        riservati.</span
                    >
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h4 class="text-black">Informazioni su BDoctors</h4>
                    <ul>
                        <li>Chi siamo</li>
                        <li>Lavora con noi</li>
                        <li>Hai bisogno di aiuto?</li>
                    </ul>
                </div>
                <div class="col-4">
                    <h4>Trova il tuo specialista</h4>
                    <ul>
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
                <div class="col-4">
                    <h4>Ricerche frequenti</h4>
                    <ul>
                        <li>Ginecologo Milano</li>
                        <li>Dermatologo Milano</li>
                        <li>Pediatra Milano</li>
                        <li>Cardiologo Milano</li>
                        <li>Oculista Milano</li>
                        <li>Odontoiatra Milano</li>
                        <li>Urologo Milano</li>
                        <li>Virologo Milano</li>
                        <li>Radiologo Milano</li>
                    </ul>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row mt-4">
                <div class="col-5">
                    <a href=""
                        ><i class="fa-brands fa-facebook fa-2xl mr-3"></i
                    ></a>
                    <a href=""
                        ><i class="fa-brands fa-instagram fa-2xl mr-3"></i
                    ></a>
                    <a href=""
                        ><i class="fa-brands fa-linkedin fa-2xl mr-3"></i
                    ></a>
                    <a href=""
                        ><i class="fa-brands fa-youtube fa-2xl mr-3"></i
                    ></a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <p>
                        BDoctors Srl, società soggetta a direzione e
                        coordinamento di BDoctors SAS, con sede legale in
                        Milano, Corso Giacomo Matteotti 1, 20121 - Capitale
                        Sociale: € 3.010.000,00 i.v. - Codice Fiscale, Partita
                        IVA e n. registrazione registro imprese Milano Monza
                        Brianza Lodi 11537360965 - REA: MI - 2609715, PEC
                        BDoctorssrl@legalmail.it - Per informazioni sul
                        trattamento dei dati personali o per esercitare i propri
                        diritti privacy.italia@BDoctors.com - Nota sulla
                        procedura di risoluzione delle controversie online dei
                        consumatori (ODR). Le informazioni sui diritti dei
                        consumatori e sulla procedura di risoluzione delle
                        controversie online sono disponibili al link
                        https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home2.show&lng=IT
                        Condizioni generali di utilizzo • Condizioni d'uso del
                        sito BDoctors • Informativa sulla protezione dei dati
                        personali • Politica sull’uso dei cookies • Gestione dei
                        cookie e consenso • Informativa privacy ex art.14 per
                        personale sanitario Federazione Nazionale degli Ordini
                        dei Medici Chirurghi e degli Odontoiatri • Elenco del
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

footer {
    padding-bottom: 50px;
}

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

i {
    color: #336699;
}
</style>
