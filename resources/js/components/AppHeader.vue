<template>
    <header>
        <nav>
            <h1 id="logo" class="m-0">
                <a href=""><h1 class="text-white">BDoctors</h1></a>
            </h1>
            <ul>
                <li>
                    <a href="">Tutti i dottori</a>
                </li>
                <li>
                    <a href="">Dottori in evidenza</a>
                </li>
                <li>
                    <a href="">Ricerca avanzata</a>
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
                }
            }
        }
    }
}
</style>
