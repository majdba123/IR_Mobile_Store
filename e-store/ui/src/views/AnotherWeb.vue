<template>
    <HeaderAllCategories />

    <body>
        <div class="container">
            <div class="search-bar text-center">
                <input v-model="name" type="search" placeholder="Search your product" class="search" />
                <button @click="getorders" class="search-button">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-5">
                    <div class="beautiful-title">Search Product in Gsm</div>
                    <table class="table">
                        <tr>
                            <th class="text-center">Product Image</th>
                            <td>
                                <img :src="gsm.image_phone" id="img1" alt="" />
                            </td>
                        </tr>
                        <tr>
                            <th>Name Phone</th>
                            <td>{{ gsm.name_phone }}</td>
                        </tr>
                        <tr>
                            <th>networt_technology</th>
                            <td>{{ gsm.networt_technology }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ gsm.sim }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">Netwoek technology</th>
                            <td>{{ gsm.demenation }}</td>
                        </tr>
                        <tr>
                            <th>SIM</th>
                            <td>{{ gsm.display }}</td>
                        </tr>
                        <tr>
                            <th>Demenation</th>
                            <td>{{ gsm.resoulation }}</td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td>{{ gsm.weight }}</td>
                        </tr>
                        <tr>
                            <th>Bulid</th>
                            <td>{{ gsm.size }}</td>
                        </tr>
                        <tr>
                            <th>Size</th>
                            <td>{{ gsm.build }}</td>
                        </tr>
                        <tr>
                            <th>Display</th>
                            <td>{{ gsm.chiapest }}</td>
                        </tr>
                        <tr>
                            <th>Resoulation</th>
                            <td>{{ gsm.cpu }}</td>
                        </tr>
                        <tr>
                            <th>Chiapest</th>
                            <td>{{ gsm.gpu }}</td>
                        </tr>
                        <tr>
                            <th>Cpu</th>
                            <td>{{ gsm.camera }}</td>
                        </tr>
                        <tr>
                            <th>GPY</th>
                            <td>{{ gsm.camera_f }}</td>
                        </tr>
                        <tr>
                            <th>Camera</th>
                            <td>{{ gsm.feature_camera }}</td>
                        </tr>
                        <tr>
                            <th>Camera f</th>
                            <td>{{ gsm.video }}</td>
                        </tr>
                        <tr>
                            <th>Feature Camera</th>
                            <td>{{ gsm.sensores }}</td>
                        </tr>
                        <tr>
                            <th>Video</th>
                            <td>{{ gsm.battarey }}</td>
                        </tr>
                        <tr>
                            <th>Sensores</th>
                            <td>{{ gsm.charghing }}</td>
                        </tr>
                        <tr>
                            <th>Battarey</th>
                            <td>{{ gsm.usb }}</td>
                        </tr>
                        <tr>
                            <th>Charghing</th>
                            <td>{{ gsm.model }}</td>
                        </tr>
                        <tr>
                            <th>Usb</th>
                            <td>{{ gsm.price }}</td>
                        </tr>
                        <tr>
                            <th>model</th>
                            <td>{{ gsm.colores }}</td>
                        </tr>
                        <tr>
                            <th>Colores</th>
                            <td>{{ gsm.company_id }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-5">
                    <div class="beautiful-title">Search Product in Mobo</div>
                    <table class="table">
                        <tr>
                            <th class="text-center">Product Image</th>
                            <td>
                                <img src="src\assets\product-1.jpg" id="img1" alt="" />
                            </td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td>{{ MOBO.name }}</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>{{ MOBO.resolution_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Product Price</th>
                            <td>{{ MOBO.price }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">Display Pattern</th>
                            <td>{{ MOBO.display_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Resolution Pattern</th>
                            <td>{{ MOBO.number_of_cameras_in_phone }}</td>
                        </tr>

                        <tr>
                            <th>PPI Pattern</th>
                            <td>{{ MOBO.ppi_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Inches Pattern</th>
                            <td>{{ MOBO.inches_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Camera Pattern</th>
                            <td>{{ MOBO.camera_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Capacity Pattern</th>
                            <td>{{ MOBO.capacity_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ MOBO.date }}</td>
                        </tr>
                        <tr>
                            <th>Screen Size</th>
                            <td>{{ MOBO.chipset_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Chipset</th>
                            <td>{{ MOBO.process_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Process Pattern</th>
                            <td>{{ MOBO.processer_type }}</td>
                        </tr>
                        <tr>
                            <th>Process Type</th>
                            <td>{{ MOBO.gpu_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Gpu Pattern</th>
                            <td>{{ MOBO.os }}</td>
                        </tr>
                        <tr>
                            <th>OS</th>
                            <td>{{ MOBO.space_limit_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Space limit Pattern</th>
                            <td>{{ MOBO.UFS }}</td>
                        </tr>
                        <tr>
                            <th>UFS</th>
                            <td>{{ MOBO.microsd_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Microsd Pattern</th>
                            <td>{{ MOBO.speakers_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Speakers Pattern</th>
                            <td>{{ MOBO.fingerprint_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Fingerprint Pattern</th>
                            <td>{{ MOBO.other_sensors_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Other Sensors Pattern</th>
                            <td>{{ MOBO.weight_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Weight Pattern</th>
                            <td>{{ MOBO.sim_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Sim Pattern</th>
                            <td>{{ MOBO.usb_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Usb Pattern</th>
                            <td>{{ MOBO.bluetooth_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Bluetooth Pattern</th>
                            <td>{{ MOBO.refresh_rate_pattern }}</td>
                        </tr>
                        <tr>
                            <th>Refresh Rate Pattern</th>
                            <td>{{ MOBO.company_id }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <FooTer />
</template>
<script>
import axios from "axios";
import HeaderAllCategories from "@/components/HeaderAllCategories.vue";
import FooTer from "@/components/footer.vue";
export default {
    name: "AnotherWeb",
    components: {
        HeaderAllCategories,
        FooTer,
    },
    data() {
        return {
            name: "",
            gsm: {},
            MOBO: {},
            products: [],
        };
    },
    methods: {
        getorders() {
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/IR?mobile_name=" + this.name,
            })
                .then((response) => {
                    this.products = response.data;
                    this.gsm = this.products[0];
                    this.MOBO = this.products[1];
                    console.log(this.gsm);
                    console.log(this.arena);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
    },
};
</script>
<style scoped>
body {
    background-color: #000000;
    margin: 0;
    padding: 0;
}

.search-bar {
    display: flex;
    align-items: center;
    justify-content: center;
}

.search {
    width: 50%;
    height: 35px;
    padding: 10px;
    border: 2px;
    border-radius: 10px 0 0 10px;
    background-color: #191919;
    color: #ffffff;
    font-size: 16px;
    margin-top: 30px;
}

.search-button {
    height: 35px;
    border: 2px;
    width: 35px;
    border-radius: 0 10px 10px 0;
    background-color: #252424;
    color: #ffffff;
    padding: 10px;
    cursor: pointer;
    margin-top: 30px;
}

.beautiful-title {
    font-size: 1rem;
    text-align: center;
    color: #fff;
    background-color: #191919;
    padding: 10px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    margin: 0;
    margin-top: 15px;
}

.table {
    color: #ffffff;
    text-align: center;
    justify-content: center;
    border-radius: 0 0 10px 10px;
    overflow: hidden;
}

.table th,
.table td {
    padding: 20px;
    font-size: 0.75rem;
    background-color: #1a1a1a;
    color: #ffffff;
}

img {
    width: 100%;
    max-height: 25vh;
    object-fit: contain;
    border-radius: 1vw;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

@media (max-width: 767px) {
    .beautiful-title {
        font-size: 1rem;
    }

    .table th,
    .table td {
        font-size: 0.75rem;
        padding: 10px;
    }

    img {
        max-height: 15vh;
    }
}
</style>
