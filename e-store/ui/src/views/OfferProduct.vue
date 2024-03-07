<template>
    <!-- Header All Categories-->
    <HeaderAllCategories />
    <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h2>Offers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-md-6 col-lg-4 col-xl-3"
                    v-for="product in $store.state.products"
                    :key="product.id"
                    id="product-1"
                >
                    <div v-for="offer in offers" :key="offer.id">
                        <div
                            v-if="product.offer_id == offer.id"
                            id="product-2"
                            class="single-product"
                        >
                            <div
                                class="part-1"
                                :style="{
                                    backgroundImage:
                                        'url(' + product.imge + ')',
                                }"
                            >
                                <span
                                    class="discount"
                                    v-if="product.offer_id == idoffer"
                                    >{{ counter.percent_of_discount }} %
                                    off</span
                                >

                                <ul>
                                    <li>
                                        <a href="#">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-bag"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-suit-heart-fill"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            @click="
                                                AddProduct(
                                                    product.id,
                                                    product.mobile_name,
                                                    product.Price,
                                                    product.imge
                                                )
                                            "
                                            href="#"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-plus-lg"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><router-link
                                                :to="
                                                    '/DetailsProduct?id=' +
                                                    product.id
                                                "
                                                ><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="16"
                                                    height="16"
                                                    fill="currentColor"
                                                    class="bi bi-arrows-angle-expand"
                                                    viewBox="0 0 16 16"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"
                                                    />
                                                </svg>
                                            </router-link>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="part-2">
                                <h3 class="product-title">
                                    {{ product.mobile_name }}
                                </h3>
                                <h4 class="product-old-price">
                                    ${{ product.Price }}
                                </h4>
                                <h4 class="product-price">
                                    ${{
                                        ((100 - counter.percent_of_discount) *
                                            product.Price) /
                                        100
                                    }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <FooTer />
</template>
<script>
import axios from "axios";
import store from "@/store";
import FooTer from "@/components/footer.vue";
import HeaderAllCategories from "@/components/HeaderAllCategories.vue";
export default {
    name: "OfferProduct",
    components: {
        HeaderAllCategories,
        FooTer,
    },
    data() {
        return {
            img: [],
            product: {},
            idoffer: 1,
            offers: {},
            counter: {},
        };
    },
    methods: {
        getoffer() {
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/show/offer/" + this.idoffer,
            })
                .then((response) => {
                    this.counter = response.data;
                    console.log(this.counter);
                })
                .catch(function (error) {
                    window.alert(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        getalloffer() {
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/offers/",
            })
                .then((response) => {
                    this.offers = response.data;
                    console.log(this.product);
                })
                .catch(function (error) {
                    window.alert(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        getorders() {
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/products/",
            })
                .then((response) => {
                    store.state.products = response.data;
                    this.product = response.data;
                    console.log(this.product);
                    this.img = store.state.products;
                })
                .catch(function (error) {
                    window.alert(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        AddProduct(id, name_mobile, Price, img) {
            if (Object.keys(store.state.Order).length > 0) {
                for (
                    var index = 0;
                    index < Object.keys(store.state.Order).length;
                    index++
                ) {
                    if (id == store.state.Order[index]["id"]) {
                        store.state.Order[index]["count"]++;
                        console.log(store.state.Order);
                        return;
                    }
                    // if (id == store.state.Order[index]["id"]) {
                    //     store.state.Order[index]["count"]--;
                    //     return;
                    // }
                }
            }
            store.state.Order[store.state.counter] = {
                id: id,
                name: name_mobile,
                Price: Price,
                img: img,
                count: 1,
            };
            store.state.counter++;
            console.log(store.state.Order);
        },
    },
    beforeMount() {
        this.getorders();
        this.getoffer();
    },
};
</script>
<style scoped>
body p {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 12vh;
    font-size: 30px;
    font-family: "Arial", sans-serif;
}

.images {
    display: flex;
    justify-content: space-between;
}

img {
    width: 100px;
    height: 100px;
}

.dot {
    margin: 0 0 0 40px;
    height: 25px;
    width: 25px;
    background-color: #2874f0;
    border-radius: 50%;
    display: inline-block;
}

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

body {
    font-family: "Poppins", sans-serif;
    color: #ffffff;
}

a,
a:hover {
    text-decoration: none;
    color: inherit;
}

.section-products {
    padding: 80px 0 54px;
}

.section-products .header {
    margin-bottom: 50px;
}

.section-products .header h3 {
    font-size: 1rem;
    color: #fe302f;
    font-weight: 500;
}

.section-products .header h2 {
    font-size: 2.2rem;
    font-weight: 400;
    color: #444444;
}

.section-products .single-product {
    margin-bottom: 26px;
}

.section-products .single-product .part-1 {
    position: relative;
    height: 290px;
    max-height: 290px;
    margin-bottom: 20px;
    overflow: hidden;
}

.section-products .single-product .part-1::before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    transition: all 0.3s;
}

.section-products .single-product:hover .part-1::before {
    transform: scale(1.2, 1.2) rotate(5deg);
}

.section-products #product-1 .part-1::before {
    background: url("../assets/product-1.jpg") no-repeat center;
    background-size: cover;
    transition: all 0.3s;
}

.section-products #product-2 .part-1::before {
    background: url("https://i.ibb.co/cLnZjnS/2.jpg") no-repeat center;
    background-size: cover;
}

.section-products #product-3 .part-1::before {
    background: url("https://i.ibb.co/L8Nrb7p/1.jpg") no-repeat center;
    background-size: cover;
}

.section-products #product-4 .part-1::before {
    background: url("https://i.ibb.co/cLnZjnS/2.jpg") no-repeat center;
    background-size: cover;
}

.section-products .single-product .part-1 .discount,
.section-products .single-product .part-1 .new {
    position: absolute;
    top: 15px;
    left: 20px;
    color: #ffffff;
    background-color: #fe302f;
    padding: 2px 8px;
    text-transform: uppercase;
    font-size: 0.85rem;
}

.section-products .single-product .part-1 .new {
    left: 0;
    background-color: #444444;
}

.section-products .single-product .part-1 ul {
    position: absolute;
    bottom: -41px;
    left: 20px;
    margin: 0;
    padding: 0;
    list-style: none;
    opacity: 0;
    transition: bottom 0.5s, opacity 0.5s;
}

.section-products .single-product:hover .part-1 ul {
    bottom: 30px;
    opacity: 1;
}

.section-products .single-product .part-1 ul li {
    display: inline-block;
    margin-right: 4px;
}

.section-products .single-product .part-1 ul li a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    background-color: #ffffff;
    color: #444444;
    text-align: center;
    box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
    transition: color 0.2s;
}

.section-products .single-product .part-1 ul li a:hover {
    color: #fe302f;
}

.section-products .single-product .part-2 .product-title {
    font-size: 1rem;
}

.section-products .single-product .part-2 h4 {
    display: inline-block;
    font-size: 1rem;
}

.section-products .single-product .part-2 .product-old-price {
    position: relative;
    padding: 0 7px;
    margin-right: 2px;
    opacity: 0.6;
}

.section-products .single-product .part-2 .product-old-price::after {
    position: absolute;
    content: "";
    top: 50%;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: #444444;
    transform: translateY(-50%);
}
</style>
