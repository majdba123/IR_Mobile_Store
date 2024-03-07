<template>
    <body>
        <HeaderAdmin />
        <div class="container">
            <header>Add Cobon</header>

            <form action="#">
                <div class="form">
                    <div class="detalis">
                        <span class="title">Detalis </span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Add Code </label>
                                <input
                                    v-model="code"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label> Add Discount </label>
                                <input
                                    v-model="discount"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label> Expiration Date </label>
                                <input
                                    v-model="expirationdate"
                                    type="date"
                                    placeholder="Enter your name"
                                />
                            </div>
                        </div>
                        <button
                            type="button"
                            class="nextbtn"
                            @click="addcobon()"
                        >
                            Ok
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <section class="attendance">
            <div class="attendance-list">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Discount</th>
                            <th>Expiration Date</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="element in cobons" :key="element.id">
                            <td>{{ element.id }}</td>
                            <td>{{ element.code }}</td>
                            <td>{{ element.discount }}</td>
                            <td>{{ element.expiration_date }}</td>

                            <td>
                                <button
                                    class="dd"
                                    @click="deletecobon(element.id)"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                            <td>
                                <button
                                    class="dd"
                                    @click="editData(element.id)"
                                >
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <div id="popup" class="containeraaab" v-show="isPopupVisible">
            <header>Edit Cobon</header>

            <form action="#">
                <div class="form">
                    <div class="detalis">
                        <span class="title">Detalis </span>

                        <div class="fields">
                            <div class="input-field">
                                <label> Code </label>
                                <input
                                    v-model="code"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label>Discount </label>
                                <input
                                    v-model="discount"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label> Expiration Date </label>
                                <input
                                    v-model="expirationdate"
                                    type="date"
                                    placeholder="Enter your name"
                                />
                            </div>
                        </div>
                        <button @click="cancelEdit">Cancel</button>
                        <button
                            type="button"
                            class="nextbtn"
                            @click="editcobon() + saveEdit()"
                        >
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <FooTer />
    </body>
</template>
<script>
import HeaderAdmin from "@/components/HeaderAdmin.vue";
import FooTer from "@/components/footer.vue";
import axios from "axios";

export default {
    name: "AddCobon",
    components: {
        HeaderAdmin,
        FooTer,
    },
    data() {
        return {
            isPopupVisible: false,

            code: "",
            discount: "",
            expirationdate: "",
            cobons: {},
            idpro: null,
        };
    },
    methods: {
        editData(qw) {
            this.isPopupVisible = true;
            this.idpro = qw;
        },
        cancelEdit() {
            this.isPopupVisible = false;
        },
        saveEdit() {
            console.log("save ok");
            this.isPopupVisible = false;
        },

        addcobon() {
            const token = window.localStorage.getItem("token");

            axios({
                method: "post",
                url: "http://127.0.0.1:8000/api/cobon",
                headers: { Authorization: `Bearer ${token}` },

                data: {
                    code: this.code,
                    discount: this.discount,
                    expiration_date: this.expirationdate,
                },
            })
                .then((response) => {
                    console.log(response);
                    alert(response.data);
                })
                .catch(function (error) {
                    console.log(error.data);
                    console.log(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        getcobon() {
            const token = window.localStorage.getItem("token");

            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/cobon",
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    console.log(response);
                    this.cobons = response.data;
                })
                .catch(function (error) {
                    console.log(error.data);
                    console.log(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        deletecobon(id) {
            const token = window.localStorage.getItem("token");

            axios({
                method: "delete",
                url: "http://127.0.0.1:8000/api/cobon/" + id,
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    console.log(response);
                    window.location.reload();
                })
                .catch(function (error) {
                    console.log(error.data);
                    console.log(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        editcobon() {
            const token = window.localStorage.getItem("token");

            axios({
                method: "post",
                url: "http://127.0.0.1:8000/api/update-cobon/" + this.idpro,
                data: {
                    code: this.code,
                    discount: this.discount,
                    expiration_date: this.expirationdate,
                },
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    console.log(response);
                    alert(response.data);
                })
                .catch(function (error) {
                    console.log(error.data);
                    console.log(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
    },
    mounted() {
        this.getcobon();
    },
};
</script>
<style scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "poppins", "sans-serif";
}
.table {
    border-collapse: collapse;
    table-layout: fixed;
    font-size: 15px;
    min-width: 100%;
    overflow: hidden;
    border-radius: 4px;
}

.table thead tr {
    background: #000000;
    text-align: left;
    font-weight: bold;
    color: white;
}

.table th {
    padding: 12px 15px;
    text-align: center;
    word-break: break-all;
    color: white;
}
tr td a {
    color: #000000;
}
.dd {
    font-size: 30px;

    color: #000000;
}

.dd:hover {
    color: #3f3e3e;
}
.table td {
    padding: 12px 15px;
    text-align: center;
    word-break: break-all;
}

.table tbody tr {
    border-bottom: 1px solid #ddd;
    background: #e9e9e9;
}

.table tbody tr:last-of-type {
    border-bottom: 2px solid #ffffff;
}

.table button {
    padding: 6px 20px;
    border-radius: 10px;
    cursor: pointer;
    color: #ffffff;
    background-color: #000000;
    border: 1px solid #ffffff;
}

.table button:hover {
    background: #373737;
    color: #fff;
    transition: 0.5rem;
}

.aa {
    display: flex;
    text-align: center;
    justify-content: center;
    margin-top: 17px;
}

.order {
    font-size: 25px;
    color: #000000;
    font-weight: bold;
    margin-left: 20px;
}

.oo {
    color: #000000;
    display: flex;
    justify-content: space-between;
    text-align: center;
    padding: 20px;
    margin-top: 10px;
    font-family: sans-serif;
    background-color: white;
    border-radius: 4px;
}

.add-product .s1,
.s2 {
    background-color: #000000;
    color: white;
    width: 100px;
    height: 40px;
    border: none;
    outline: none;
    border-radius: 6px;
    transition: 0.5s ease;
    margin: 0 15px;
    cursor: pointer;
}

.add-product .s1:hover,
.add-product .s2:hover {
    background-color: #3f3e3e;
}

tr td a {
    color: #000000;
}

tr td a:hover,
.dd:hover {
    color: #ffffff;
}

.dd {
    color: #000000;
}

body {
    min-height: 100vh;
    align-items: center;
    justify-content: center;
    background: black;
}

.container {
    position: relative;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
.containeraaab {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1;
    width: 90%;
    max-width: 100%;
    height: 500px;
    max-height: 90vh;
    overflow: scroll;
}

.containeraaab header {
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.container header {
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}

.containeraaab header::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: rgb(26, 37, 37);
}
.container header::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: rgb(26, 37, 37);
}
.containeraaab form {
    position: relative;
    margin-top: 16px;
    min-height: 100px;
    background-color: #fff;
}
.container form {
    position: relative;
    margin-top: 16px;
    min-height: 100px;
    background-color: #fff;
}

.containeraaab form .details {
    margin-top: 10px;
}
.container form .details {
    margin-top: 10px;
}

.containeraaab form .title {
    font-size: 19px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .title {
    font-size: 19px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}

.containeraaab form .fields {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
.container form .fields {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

form .fields .input-field {
    display: flex;
    width: calc(100% / 3 -15px);
    flex-direction: column;
    margin: 4px 0;
}

.input-field label {
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
}

.input-field input {
    outline: none;
    font-size: 13px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
}

.input-field input:is(:focus, :valid) {
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
}

.containeraaab form button {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    border-radius: 5px;
    margin: 25px 0;
    color: #fff;
    background-color: #000;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form button {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    border-radius: 5px;
    margin: 25px 0;
    color: #fff;
    background-color: #000;
    transition: all 0.3s linear;
    cursor: pointer;
}

form button:hover {
    background-color: #242424;
}

.containeraaab form button {
    display: flex;
    align-items: center;
    justify-content: center;
}
.container form button {
    display: flex;
    align-items: center;
    justify-content: center;
}
@media (max-width: 400px) {
    .containeraaab {
        width: 90%;
        height: auto;
    }
    .container {
        width: 90%;
        height: auto;
    }
}
</style>
