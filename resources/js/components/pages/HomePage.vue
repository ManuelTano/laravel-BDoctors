<template>
  <section id="homepage">
    <BaseJumbotron class="d-flex align-items-center justify-content-between">
      <div class="container">
        <div class="row margin-left">
          <div class="col-8">
            <div class="mb-5">
              <span class="title"> Cerca un </span
              ><span class="wordchanger"></span>
            </div>
          </div>
        </div>
        <div class="row margin-left">
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
    <BaseCard />
    <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 220"  version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(217, 240, 237, 1)" offset="0%"></stop><stop stop-color="rgba(177, 168, 229, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,66L120,84.3C240,103,480,139,720,132C960,125,1200,73,1440,69.7C1680,66,1920,110,2160,135.7C2400,161,2640,169,2880,172.3C3120,176,3360,176,3600,176C3840,176,4080,176,4320,150.3C4560,125,4800,73,5040,77C5280,81,5520,139,5760,168.7C6000,198,6240,198,6480,187C6720,176,6960,154,7200,139.3C7440,125,7680,117,7920,117.3C8160,117,8400,125,8640,113.7C8880,103,9120,73,9360,77C9600,81,9840,117,10080,139.3C10320,161,10560,169,10800,146.7C11040,125,11280,73,11520,77C11760,81,12000,139,12240,150.3C12480,161,12720,125,12960,91.7C13200,59,13440,29,13680,29.3C13920,29,14160,59,14400,58.7C14640,59,14880,29,15120,18.3C15360,7,15600,15,15840,40.3C16080,66,16320,110,16560,135.7C16800,161,17040,169,17160,172.3L17280,176L17280,220L17160,220C17040,220,16800,220,16560,220C16320,220,16080,220,15840,220C15600,220,15360,220,15120,220C14880,220,14640,220,14400,220C14160,220,13920,220,13680,220C13440,220,13200,220,12960,220C12720,220,12480,220,12240,220C12000,220,11760,220,11520,220C11280,220,11040,220,10800,220C10560,220,10320,220,10080,220C9840,220,9600,220,9360,220C9120,220,8880,220,8640,220C8400,220,8160,220,7920,220C7680,220,7440,220,7200,220C6960,220,6720,220,6480,220C6240,220,6000,220,5760,220C5520,220,5280,220,5040,220C4800,220,4560,220,4320,220C4080,220,3840,220,3600,220C3360,220,3120,220,2880,220C2640,220,2400,220,2160,220C1920,220,1680,220,1440,220C1200,220,960,220,720,220C480,220,240,220,120,220L0,220Z"></path></svg>
    <BaseFooter />
  </section>
</template>

<script>
import BaseSelect from "../BaseSelect.vue";
import BaseJumbotron from "../BaseJumbotron.vue";
import DoctorsView from "../DoctorsView.vue";
import BaseFooter from "../BaseFooter.vue";
import BaseCard from "../BaseCard.vue";
export default {
  name: "HomePage",
  components: {
    BaseSelect,
    BaseJumbotron,
    DoctorsView,
    BaseCard,
    BaseFooter,
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

.margin-left {
  margin-left: 15px;
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
