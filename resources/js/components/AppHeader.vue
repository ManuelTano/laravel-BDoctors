<template>
    <header>
        <nav>
            <h1 id="logo" class="m-0">
                <a href=""><h1 class="text-white">BDoctors</h1></a>
            </h1>
            <ul>
                <li>
                    <router-link :to="{ name: 'alldoctors' }"
                        >Tutti i dottori</router-link
                    >
                </li>
                <li>
                    <router-link :to="{ name: 'all-featured-doctors' }"
                        >Dottori in evidenza</router-link
                    >
                </li>
                <li>
                    <router-link :to="{ name: 'doctors-by-specialty' }"
                        >Ricerca per specializzazione</router-link
                    >
                </li>
            </ul>
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
    height: 60px;
    padding: 2rem;
    width: 100%;

    nav {
        display: flex;
        align-items: center;

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
