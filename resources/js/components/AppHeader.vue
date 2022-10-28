<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <a class="navbar-brand" id="logo" href="#">BDoctors</a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <router-link :to="{ name: 'home' }"
                            >Homepage</router-link
                        >
                    </li>
                    <li class="nav-item active">
                        <router-link :to="{ name: 'alldoctors' }"
                            >Tutti i dottori</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'all-featured-doctors' }"
                            >Dottori in evidenza</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'doctors-by-specialty' }"
                            >Ricerca per specializzazione</router-link
                        >
                    </li>
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                    <input
                        class="form-control mr-sm-2"
                        type="search"
                        placeholder="Search"
                    />
                    <button
                        class="btn btn-outline-success my-2 my-sm-0"
                        type="submit"
                    >
                        Search
                    </button>
                </form> -->
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "AppHeader",
};
</script>

<style lang="scss" scoped>
@import "../../sass/variables";

header {
    width: 100%;

    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: 10;

    nav {
        #logo {
            display: flex;
            align-items: center;
            justify-content: center;

            a {
                text-decoration: none;
            }
        }

        ul {
            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0;

            list-style-type: none;
            li {
                margin: 0 1rem;
                a {
                    text-decoration: none;

                    color: white;

                    font-weight: bold;
                    font-size: 1rem;

                    &:hover {
                        color: $primary-color;
                    }
                }
            }
        }
    }
}
</style>
