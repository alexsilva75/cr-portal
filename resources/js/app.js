require("./bootstrap");

////console.log("Vue Instance: ", Vue);

function showToaster(title, message, type) {
    const toastTitle = document.getElementById("toast-title");
    const toastMessage = document.getElementById("toast-message");
    const toastEl = document.querySelector(".toast");
    toastTitle.textContent = title;
    toastMessage.textContent = message;

    toastEl.classList.toggle("toast-show");
    toastEl.classList.toggle(type);

    window.setTimeout(function () {
        toastEl.classList.toggle("toast-show");
        toastEl.classList.toggle(type);
    }, 5000);
}

const { createApp } = Vue;

createApp({
    data() {
        return {
            name: "",
            surname: "",
            cpf_cnpj: "",
            birthdate: "",
            address: "",
            address_number: "",
            address_reference: "",
            neighborhood: "",
            city: "",
            phone: "",
            whatsapp: "",
            email: "",
            lat: 0,
            lng: 0,
        };
    },
    methods: {
        loadMap() {
            const options = {
                enableHighAccuracy: true,
                timeout: 5000,
                maximumAge: 0,
            };

            const success = (pos) => {
                const crd = pos.coords;
                this.setLocation(crd.latitude, crd.longitude);
            };
            function error() {
                //-12.5485687, -38.7092958
                this.setLocation(-12.5485687, -38.7092958);
            }

            error.bind(this);
            navigator.geolocation.getCurrentPosition(success, error, options);
        },
        setLocation(lat, lng) {
            console.log("Setting Location: ", lat, lng);
            let map = L.map("map").setView([lat, lng], 16);

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution:
                    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            }).addTo(map);

            let marker = L.marker([lat, lng]);
            marker.addTo(map).bindPopup("Você mora aqui.").openPopup();

            map.addEventListener("click", (event) => {
                //console.log("This is a map event: ", event);

                const lat = event.latlng.lat;
                const lng = event.latlng.lng;
                marker.setLatLng(L.latLng(lat, lng));

                // const latInputEl = document.getElementById("inputLat");
                // const lngInputEl = document.getElementById("inputLng");

                this.lat = lat;
                this.lng = lng;
            });

            this.lat = lat;
            this.lng = lng;
        },
        async submitForm() {
            console.log("Name ", this.name);
            const requestBody = {
                name: this.name,
                surname: this.surname,
                email: this.email,
                cpf_cnpj: this.cpf_cnpj,
                birthdate: this.birthdate,
                address: this.address,
                address_number: this.address_number,
                neighborhood: this.neighborhood,
                address_reference: this.address_reference,
                city: this.city,
                phone: this.phone,
                whatsapp: this.whatsapp,
                lat: this.lat,
                lng: this.lng,
            };

            console.log("Request Body: ", requestBody);
            const response = await window.axios.post(
                "http://localhost:8000/api/v1/subscription",
                requestBody
            );

            console.log("Response: ", response);

            if (response.status === 200) {
                showToaster(
                    "Sua inscrição foi realizada!",
                    "Em breve entraremos em contato para ajustar os detalhes da sua instalação.",
                    "success"
                );
            } else {
                showToaster(
                    "Houve um erro ao tentar enviar os seus dados!",
                    "Tente novamente mais tarde.",
                    "danger"
                );
            }
            hideModalForm();
        },
    },
    mounted: function () {
        this.loadMap();
    },
}).mount("#subscription");
