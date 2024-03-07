<template>
    <HeaderAllCategories />
    <body>
        <h1 class="beautiful-title">Compare Page</h1>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-9">
                    <table class="table table-dark">
                        <table class="table table-dark">
                            <tr>
                                <th>Select Product</th>
                                <th width="300px">
                                    <select
                                        class="form-control"
                                        id="select1"
                                        @change="changephone1()"
                                    >
                                        <option disabled>--Select--</option>
                                        <option
                                            v-for="(product, index) in products"
                                            :key="product.id"
                                            :value="index"
                                        >
                                            {{ product.mobile_name }}
                                        </option>
                                    </select>
                                </th>
                                <th width="300px">
                                    <select
                                        class="form-control"
                                        id="select2"
                                        @change="changephone2()"
                                    >
                                        <option disabled>--Select--</option>
                                        <option
                                            v-for="(product, index) in products"
                                            :key="product.id"
                                            :value="index"
                                        >
                                            {{ product.mobile_name }}
                                        </option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th>Mobile Price</th>
                                <td id="price1">
                                    {{
                                        phone1.Price == null
                                            ? "N/A"
                                            : phone1.Price
                                    }}
                                </td>
                                <td id="price2">
                                    {{
                                        phone2.Price == null
                                            ? "N/A"
                                            : phone2.Price
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <th>Front_camera_spsecfication</th>
                                <td id="Front_camera_spsecfication">
                                    {{
                                        phone1.Front_camera_spsecfication ==
                                        null
                                            ? "N/A"
                                            : phone1.Front_camera_spsecfication
                                    }}
                                </td>
                                <td id="Front_camera_spsecfication">
                                    {{
                                        phone2.Front_camera_spsecfication ==
                                        null
                                            ? "N/A"
                                            : phone2.Front_camera_spsecfication
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <th>Back_camera_spsecfication</th>
                                <td id="Back_camera_spsecfication">
                                    {{
                                        phone1.Back_camera_spsecfication == null
                                            ? "N/A"
                                            : phone1.Back_camera_spsecfication
                                    }}
                                </td>
                                <td id="Back_camera_spsecfication">
                                    {{
                                        phone2.Back_camera_spsecfication == null
                                            ? "N/A"
                                            : phone2.Back_camera_spsecfication
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <th>Type_of_charge</th>
                                <td id="Type_of_charge">
                                    {{
                                        phone1.Type_of_charge == null
                                            ? "N/A"
                                            : phone1.Type_of_charge
                                    }}
                                </td>
                                <td id="Cpu_spsecfication">
                                    {{
                                        phone2.Type_of_charge == null
                                            ? "N/A"
                                            : phone2.Type_of_charge
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <th>Gpu_spsecfication</th>
                                <td id="Gpu_spsecfication">
                                    {{
                                        phone1.Gpu_spsecfication == null
                                            ? "N/A"
                                            : phone1.Gpu_spsecfication
                                    }}
                                </td>
                                <td id="Cpu_spsecfication">
                                    {{
                                        phone2.Gpu_spsecfication == null
                                            ? "N/A"
                                            : phone2.Gpu_spsecfication
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <th>Cpu_spsecfication</th>
                                <td id="Cpu_spsecfication1">
                                    {{
                                        phone1.Cpu_spsecfication == null
                                            ? "N/A"
                                            : phone1.Cpu_spsecfication
                                    }}
                                </td>
                                <td id="Cpu_spsecfication">
                                    {{
                                        phone2.Cpu_spsecfication == null
                                            ? "N/A"
                                            : phone2.Cpu_spsecfication
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <th>Size_Screnn</th>

                                <td id="Size_Screnn1">
                                    {{
                                        phone1.Screen_Size == null
                                            ? "N/A"
                                            : phone1.Screen_Size
                                    }}
                                </td>
                                <td id="Size_Screnn2">
                                    {{
                                        phone2.Screen_Size == null
                                            ? "N/A"
                                            : phone2.Screen_Size
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <th>battery_spsecfication</th>
                                <td id="battery_spsecfication">
                                    {{
                                        phone1.battery_spsecfication == null
                                            ? "N/A"
                                            : phone1.battery_spsecfication
                                    }}
                                </td>
                                <td id="battery_spsecfication">
                                    {{
                                        phone2.battery_spsecfication == null
                                            ? "N/A"
                                            : phone2.battery_spsecfication
                                    }}
                                </td>
                            </tr>
                        </table>
                    </table>
                </div>
            </div>
        </div>
    </body>
</template>
<script>
import HeaderAllCategories from "@/components/HeaderAllCategories.vue";
import axios from "axios";
export default {
    name: "ComPare",
    data() {
        return { phone1: {}, products: [], phone2: {} };
    },
    methods: {
        getaaorders() {
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/products",
            })
                .then((response) => {
                    this.products = response.data;
                })
                .catch(function (error) {
                    console.log(error.data);
                    console.log(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        changephone1() {
            const phone = document.getElementById("select1");
            this.phone1 = this.products[phone.value];
        },
        changephone2() {
            const phone = document.getElementById("select2");
            this.phone2 = this.products[phone.value];
        },
    },
    beforeMount() {
        this.getaaorders();
    },
    components: { HeaderAllCategories },
};
</script>
<style scoped>
body {
    background-color: #2c2f32;
    color: #ecf0f1;
    margin: 0;
    padding: 0;
}

.container {
    margin-top: 5vh;
}

.beautiful-title {
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 3vh;
    color: #d3dae1;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease-in-out;
    padding-top: 2vh;
}

.table {
    background-color: #34495e;
    color: #ecf0f1;
    text-align: center;
    border-radius: 1vw;
    overflow: hidden;
}

.table th,
.table td {
    padding: 2vw;
}

.table-dark th,
.table-dark td,
.table-dark thead th {
    border-color: #2c3e50;
}

img {
    width: 100%;
    max-height: 25vh;
    object-fit: contain;
    border-radius: 1vw;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

img:hover {
    transform: scale(1.1);
}

@media (max-width: 767px) {
    .beautiful-title {
        font-size: 2rem;
    }

    .table th,
    .table td {
        padding: 1vw;
    }

    img {
        max-height: 15vh;
    }
}
</style>
