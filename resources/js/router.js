// Importiamo Vue e VueRouter

import Vue from "vue";
import VueRouter from "vue-router";

// Importiamo tutti i componenti pages

import AllDoctorsPage from "./components/pages/AllDoctorsPage.vue";
import HomePage from "./components/pages/HomePage.vue";
import NotFoundPage from "./components/pages/NotFoundPage.vue";
import FeaturedDoctorsPage from "./components/pages/FeaturedDoctorsPage.vue";
import DoctorsBySpecialties from "./components/pages/DoctorsBySpecialties.vue";

// Usa vue-router

Vue.use(VueRouter);

// Definiamo le rotte

const routes = new VueRouter({
    // Gestisce la cronologia delle rotte
    mode: "history",

    // Gestisce l'active dei link delle pagine nell'header
    linkExactActiveClass: "active",

    // Oggetto contenente tutte le rotte
    routes: [
        { path: "/", component: HomePage, name: "home" },
        {
            path: "/alldoctors",
            component: AllDoctorsPage,
            name: "alldoctors",
        },
        {
            path: "/all-featured-doctors",
            component: FeaturedDoctorsPage,
            name: "all-featured-doctors",
        },
        {
            path: "/doctors-specialty",
            component: DoctorsBySpecialties,
            name: "doctors-by-specialty",
        },

        // ! Rotta da mettere sempre dopo le altre

        { path: "*", component: NotFoundPage, name: "not_found" },
    ],
});

// Esporto solo l'oggetto fatto e finito

export default routes;
