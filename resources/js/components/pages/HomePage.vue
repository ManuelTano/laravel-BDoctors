<template>
  <section id="homepage">
    <BaseJumbotron class="d-flex align-items-center justify-content-between">
      <div class="container">
        <div class="row">
          <div class="col-8">
            <div class="mb-5">
              <span class="title"> Cerca un </span
              ><span class="wordchanger"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <BaseSelect
              @doctors-for-specialty="fetchDoctorsBySpecialist"
              :specialties="specialties"
              text="Scegli una specializzazione"
            />
          </div>
        </div>
      </div>
    </BaseJumbotron>
    <DoctorsView :users="users" />
  </section>
</template>

<script>
import BaseSelect from "../BaseSelect.vue";
import BaseJumbotron from "../BaseJumbotron.vue";
import DoctorsView from "../DoctorsView.vue";
export default {
  name: "HomePage",
  components: {
    BaseSelect,
    BaseJumbotron,
    DoctorsView,
  },
  data() {
    return {
      users: [],
      specialties: [],
      query: "",
    };
  },
  methods: {
    fetchDoctorsBySpecialist(choice) {
      this.query = choice;
      axios
        .get("http://127.0.0.1:8000/api/users/specialty/" + choice)
        .then((res) => {
          this.users = res.data.users_by_specialty;
        });
    },
    fetchSpecialties() {
      axios.get("http://127.0.0.1:8000/api/specialties").then((res) => {
        this.specialties = res.data.specialties;
      });
    },
  },
  mounted() {
    this.fetchSpecialties();
  },
};
</script>

<style lang="scss" scoped>
ul {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;

  list-style-type: none;

  margin: 50px 0;

  li {
    margin: 20px 0;
  }
}

.title {
  color: #b1a8e5;
  text-align: center;
  font-family: "Avenir Next", "Roboto", sans-serif;
  font-size: 5vw;
  line-height: 1;
  letter-spacing: -0.02em;
  font-weight: 800;
}

.wordchanger::before {
  content: "humanising";
  display: block;
  position: relative;
  color: #b1a8e5;
  text-align: center;
  font-family: "Avenir Next", "Roboto", sans-serif;
  font-size: 5vw;
  line-height: 1;
  letter-spacing: -0.02em;
  font-weight: 800;
  animation-name: mywordchange;
  animation-duration: 8s;
  animation-iteration-count: infinite;
  animation-timing-function: ease-in-out;
}

@keyframes mywordchange {
  0% {
    content: "pediatra";
    opacity: 0.58;
  }
  10% {
    content: "pediatra";
    opacity: 1;
  }
  19% {
    content: "pediatra";
    opacity: 0;
  }
  20% {
    content: "dermatologo";
    opacity: 0;
  }
  30% {
    content: "dermatologo";
    opacity: 1;
  }
  39% {
    content: "dermatologo";
    opacity: 0;
  }
  40% {
    content: "cardiologo";
    opacity: 0;
  }
  50% {
    content: "cardiologo";
    opacity: 1;
  }
  59% {
    content: "cardiologo";
    opacity: 0;
  }
  60% {
    content: "oculista";
    opacity: 0;
  }
  70% {
    content: "oculista";
    opacity: 1;
  }
  79% {
    content: "oculista";
    opacity: 0;
  }
  80% {
    content: "urologo";
    opacity: 0;
  }
  90% {
    content: "urologo";
    opacity: 1;
  }
  99% {
    content: "urologo";
    opacity: 0;
  }
  100% {
    content: "pediatra";
    opacity: 0;
  }
}
</style>
