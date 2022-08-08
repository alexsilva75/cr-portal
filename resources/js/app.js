require("./bootstrap");

////console.log("Vue Instance: ", Vue);

const { createApp } = Vue;

createApp({
    data() {
        return {
            name: "",
            surname: "",
            cpf: "",

            birthDate: "",
            address: "",
            addressNumber: "",
            neighborhood: "",
            city: "",
            phone: "",
            whatsapp: "",
            email: "",
        };
    },
    methods: {
        submitForm() {
            console.log("Name ", this.name);
        },
    },
}).mount("#subscription");
