<template>
    <body>
        <HeaderAdmin />
        <div class="oo">
            <p class="order">Mangment Product</p>
            <div class="add-product">
                <button class="s1" @click="submitFile">Import</button>

                <input
                    type="file"
                    @change="changecsv"
                    accept="csv/*"
                    ref="file"
                    id="csv"
                    name="csv"
                />
            </div>
        </div>
        <div class="container">
            <header>Add Product</header>

            <form action="#">
                <div class="form">
                    <div class="detalis">
                        <span class="title">Detalis </span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Mobile Name</label>
                                <input
                                    v-model="mobilename"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label>Cpu Spsecfication</label>
                                <input
                                    v-model="cpu"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label>Gpu Spsecfication</label>
                                <input
                                    v-model="gpu"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>

                            <div class="input-field">
                                <label>Battery Spsecfication</label>
                                <input
                                    v-model="batt"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label>Front_camera Spsecfication</label>
                                <input
                                    v-model="front"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label>Back Camera_spsecfication</label>
                                <input
                                    type="text"
                                    v-model="back"
                                    placeholder="Enter your name"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="detalis">
                        <div class="fields">
                            <div class="input-field">
                                <label>Screen Size</label>
                                <input
                                    v-model="screen"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label>Type of charge</label>
                                <input
                                    v-model="type"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label>Price</label>
                                <input
                                    v-model="price"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>

                            <div class="input-field">
                                <label>Company Id</label>
                                <input
                                    v-model="comid"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label>Category Id</label>
                                <input
                                    v-model="catid"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label>Offer Id</label>
                                <input
                                    v-model="offerid"
                                    type="text"
                                    placeholder="Enter your name"
                                />
                            </div>
                            <div class="input-field">
                                <label>imge</label>
                                <input
                                    type="file"
                                    name="image"
                                    accept="image/*"
                                    id="image"
                                    class="mx-3"
                                    @change="changefile"
                                />
                            </div>
                        </div>
                        <button
                            type="button"
                            class="nextbtn"
                            @click="Addproduct()"
                        >
                            Ok
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
    <section class="attendance">
        <div class="attendance-list">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mobile_name</th>
                        <th>Cpu</th>
                        <th>Gpu</th>
                        <th>Battery</th>
                        <th>Front_camera</th>
                        <th>Back_camera</th>
                        <th>Screen_Size</th>
                        <th>Type_of_charge</th>
                        <th>Price</th>
                        <th>Company_id</th>
                        <th>category_id</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="element in Products" :key="element.id">
                        <td>{{ element.id }}</td>
                        <td>{{ element.mobile_name }}</td>
                        <td>{{ element.Cpu_spsecfication }}</td>
                        <td>{{ element.Gpu_spsecfication }}</td>
                        <td>{{ element.battery_spsecfication }}</td>
                        <td>{{ element.Front_camera_spsecfication }}</td>
                        <td>{{ element.Back_camera_spsecfication }}</td>
                        <td>{{ element.Screen_Size }}</td>
                        <td>{{ element.Type_of_charge }}</td>
                        <td>{{ element.Price }}</td>
                        <td>{{ element.Company_id }}</td>
                        <td>{{ element.category_id }}</td>
                        <td>
                            <button
                                class="dd"
                                @click="deleteproduct(element.id)"
                            >
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="dd" @click="editData(element.id)">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <div id="popup" class="containeraaab" v-show="isPopupVisible">
        <header>Edit Product</header>

        <form action="#">
            <div class="form">
                <div class="detalis">
                    <span class="title">Detalis </span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Mobile Name</label>
                            <input
                                v-model="mobilename"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="input-field">
                            <label>Cpu Spsecfication</label>
                            <input
                                v-model="cpu"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="input-field">
                            <label>Gpu Spsecfication</label>
                            <input
                                v-model="gpu"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>

                        <div class="input-field">
                            <label>Battery Spsecfication</label>
                            <input
                                v-model="batt"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="input-field">
                            <label>Front_camera Spsecfication</label>
                            <input
                                v-model="front"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="input-field">
                            <label>Back Camera_spsecfication</label>
                            <input
                                type="text"
                                v-model="back"
                                placeholder="Enter your name"
                            />
                        </div>
                    </div>
                </div>

                <div class="detalis">
                    <div class="fields">
                        <div class="input-field">
                            <label>Screen Size</label>
                            <input
                                v-model="screen"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="input-field">
                            <label>Type of charge</label>
                            <input
                                v-model="type"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="input-field">
                            <label>Price</label>
                            <input
                                v-model="price"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>

                        <div class="input-field">
                            <label>Company Id</label>
                            <input
                                v-model="comid"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="input-field">
                            <label>Offer Id</label>
                            <input
                                v-model="offerid"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="input-field">
                            <label>Category Id</label>
                            <input
                                v-model="catid"
                                type="text"
                                placeholder="Enter your name"
                            />
                        </div>
                        <div class="input-field">
                            <label>imge</label>
                            <input type="text" placeholder="Enter your name" />
                        </div>
                    </div>
                    <button @click="cancelEdit">Cancel</button>
                    <button
                        type="button"
                        class="nextbtn"
                        @click="editproduct() + saveEdit()"
                    >
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    <FooTer />
</template>
<script>
import axios from "axios";
import HeaderAdmin from "@/components/HeaderAdmin.vue";
import FooTer from "@/components/footer.vue";

export default {
    name: "AddProduct",
    components: {
        HeaderAdmin,
        FooTer,
    },
    data() {
        return {
            isPopupVisible: false,
            comid: "",
            img: "",
            catid: "",
            price: "",
            type: "",
            screen: "",
            back: "",
            front: "",
            batt: "",
            gpu: "",
            offerid: "",
            mobilename: "",
            cpu: "",
            Products: [],
            file: null,
            idpro: null,
            selectedFile: null,
            csv: "",
        };
    },
    methods: {
        changecsv(event) {
            this.csv = event.target.files[0];
        },
        changefile() {
            const input = document.getElementById("image");
            const file = input.files;
            this.img = file;
            console.log(this.img);
        },

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

        submitFile() {
            const formData = new FormData();
            // get the item
            // append data
            formData.append("csv_file", this.csv);
            console.log(this.csv);
            const token = window.localStorage.getItem("token");

            axios
                .post(
                    "http://127.0.0.1:8000/api/user/store/product/csv",
                    formData,

                    {
                        headers: {
                            Authorization: `Bearer ${token}`,

                            "Content-Type": "multipart/form-data",
                        },
                    }
                )
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        deleteproduct(id) {
            axios({
                method: "post",
                url: " http://127.0.0.1:8000/api/delete-product?id=" + id,
            })
                .then((response) => {
                    console.log(response);
                    window.alert("OK");
                })
                .catch(function (error) {
                    console.log(error.data);
                    console.log(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },

        Addproduct() {
            const formData = new FormData();
            // get the item
            const imgFile = document.querySelector("#image");
            // append data
            formData.append("mobile_name", this.mobilename);
            formData.append("Cpu_spsecfication", this.cpu);
            formData.append("Gpu_spsecfication", this.gpu);
            formData.append("battery_spsecfication", this.batt);
            formData.append("Front_camera_spsecfication", this.front);
            formData.append("Back_camera_spsecfication", this.back);
            formData.append("Screen_Size", this.screen);
            formData.append("Type_of_charge", this.type);
            formData.append("Price", this.price);
            formData.append("imge", imgFile.files[0]);
            formData.append("category_id", this.catid);
            formData.append("Company_id", this.comid);
            formData.append("offer_id", this.offerid);
            console.log(formData);

            axios
                .post(
                    "http://127.0.0.1:8000/api/create-product",

                    formData
                )
                .then((response) => {
                    console.log(response);
                    alert(response.data);
                })
                .catch(function (error, response) {
                    console.log(error.data);
                    console.log(error.response);
                    console.log(response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        editproduct() {
            axios({
                method: "post",
                url:
                    "http://127.0.0.1:8000/api/update-product?mobile_name=" +
                    this.mobilename +
                    "&Cpu_spsecfication=" +
                    this.cpu +
                    "&Gpu_spsecfication=" +
                    this.gpu +
                    "&battery_spsecfication=" +
                    this.batt +
                    "&Front_camera_spsecfication=" +
                    this.front +
                    "&Back_camera_spsecfication=" +
                    this.back +
                    "&Screen_Size=" +
                    this.screen +
                    "&Type_of_charge=" +
                    this.type +
                    "&Price=" +
                    this.price +
                    "&category_id=" +
                    this.catid +
                    "&Company_id=" +
                    this.comid +
                    "&id=" +
                    this.idpro,
                data: {
                    Company_id: this.comid,
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
        getproduct() {
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/products/",
            })
                .then((response) => {
                    console.log(response);
                    this.Products = response.data;
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
        this.getproduct();
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
