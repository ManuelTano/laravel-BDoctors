<template>
  <header class="shadow position-fixed">
    <nav class="navbar navbar-expand-md ">
      <router-link :to="{ name: 'home' }" class="navbar-brand" id="logo">
        <img
          src="https://i.ibb.co/0QRNT2m/sdasdasdasd1.png"
          alt=""
          class="img-fluid w-50 mb-2"
        />
      </router-link>
    

      <div class="justify-content-start align-items-center text-center">
        <ul class="navbar-nav mr-auto mt-2  d-flex">
          <li class="nav-item active">
            <router-link :to="{ name: 'home' }">Homepage</router-link>
          </li>
          <li class="nav-item active">
            <router-link :to="{ name: 'advanced-search' }"
              >Ricerca avanzata</router-link
            >
          </li>
          <li class="nav-item active">
            <router-link :to="{ name: 'all-featured-doctors' }"
              >Dottori in evidenza</router-link
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
  background-color: $celestino;
  top: 0;
  left: 0;
  right: 0;
  z-index: 5;

  nav {
    #logo {
      display: flex;
      align-items: center;
      justify-content: center;

      font-weight: bold;
      font-size: 2rem;
      color: white;

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
