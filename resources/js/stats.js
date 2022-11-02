const stats = document.getElementById('myCanvas');
const myLabels = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
const myData = [555, 555, 555, 555, 555, 555, 444, 444, 444, 444, 444, 444,];

const chart = new Chart (myCanvas, {
    type: 'bar',
    data: {
        labels: myLabels,
        datasets: [{
            label: "Messaggi",
            data: myData, 
            backgroundColor: 'red'
        }]
    },
    options: {

    },
    methods: {
        fetchUsersByInput(search) {
            axios
                .get("http://127.0.0.1:8000/api/users/")
                .then((res) => {
                    this.users = res.data.users;
                });
        },
    }
})
