<template>
    <body>
        <HeaderAllCategories />
        <div class="container">
            <div class="box">
                <div class="images">
                    <div class="img-holder active">
                        <img
                            :src="imges + products.imge"
                            style="width: 500px; height: 400px"
                        />
                    </div>
                    <div class="img-holder">
                        <img
                            :src="imges + products.imge"
                            style="width: 164px; height: 150px"
                        />
                    </div>
                    <div class="img-holder">
                        <img
                            :src="imges + products.imge"
                            style="width: 164px; height: 150px"
                        />
                    </div>
                    <div class="img-holder">
                        <img
                            :src="imges + products.imge"
                            style="width: 164px; height: 150px"
                        />
                    </div>
                </div>
                <div class="basic-info">
                    <h1>{{ products.mobile_name }}</h1>
                    <div class="rate">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="30"
                            height="30"
                            fill="currentColor"
                            class="bi bi-star"
                            viewBox="0 0 16 16"
                            v-for="(star, index) in 5"
                            :key="index"
                            @click="rateProduct(index + 1) + rate()"
                            :class="{ active: index < rating }"
                        >
                            <path
                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"
                            />
                        </svg>
                    </div>

                    <div class="product-price">
                        <p class="last-price">
                            <span>Price :</span>
                        </p>
                    </div>
                    <strong class="h1">${{ products.Price }}</strong>
                    <div class="options">
                        <button>
                            <router-link
                                to="CheckOut"
                                @click="
                                    AddProduct(
                                        products.id,
                                        products.mobile_name,
                                        products.Price,
                                        products.imge
                                    )
                                "
                                >Buy It Now</router-link
                            >
                        </button>
                        <button
                            @click="
                                AddProduct(
                                    products.id,
                                    products.mobile_name,
                                    products.Price,
                                    products.imge
                                )
                            "
                        >
                            Add to Cart
                        </button>
                    </div>
                </div>

                <div class="product-specs">
                    <h2 class="text-center">Product Specifications</h2>
                    <ul>
                        <li>Cpu : {{ products.Cpu_spsecfication }}</li>
                        <li>Gpu :{{ products.Gpu_spsecfication }}</li>
                        <li>Screen Size : {{ products.Screen_Size }}</li>
                        <li>
                            battery :
                            {{ products.battery_spsecfication }}
                        </li>
                        <li>
                            Front Camera :
                            {{ products.Front_camera_spsecfication }}
                        </li>
                        <li>
                            Back Camera :
                            {{ products.Back_camera_spsecfication }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <FooTer />
    </body>
</template>
<script>
import axios from "axios";
import store from "@/store";
import FooTer from "@/components/footer.vue";
import HeaderAllCategories from "@/components/HeaderAllCategories.vue";
export default {
    name: "DetailsProduct",
    data() {
        return {
            products: {},
            imges: "http://127.0.0.1:8000/api/get-image-link/",
            rating: 0,
        };
    },
    components: { FooTer, HeaderAllCategories },
    methods: {
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
        getorders() {
            axios({
                method: "get",
                url:
                    "http://127.0.0.1:8000/api/products/" +
                    store.state.productID,
            })
                .then((response) => {
                    this.products = response.data;
                    console.log(response);
                })
                .catch(function (error) {
                    window.alert(error.response);
                });
        },
        rateProduct(rating) {
            const stars = document.querySelectorAll(".rate svg");
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add("active");
                } else {
                    star.classList.remove("active");
                }
            });

            this.rating = rating;
            console.log("تم تقييم المنتج بنجاح: " + rating);
        },
        rate() {
            const token = window.localStorage.getItem("token");

            axios({
                method: "get",
                url:
                    "http://127.0.0.1:8000/api/products/" +
                    store.state.productID +
                    "/rate?rating=" +
                    this.rating,
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    console.log(response);
                })
                .catch(function (error) {
                    window.alert(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
    },
    beforeMount() {
        this.getorders();
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap");
body {
    background-color: #423f3e;
}
:root {
    --primary-color: #90e0ef;
    --secondary-color: #00b4d5;
    --tertiary-color: #0077b6;
    --yellow-color: #ffb900;
    --gray-color: #808080;
}

* {
    box-sizing: border-box;
    font-family: "Source Sans Pro", sans-serif;
    line-height: 1;
    padding: 0;
    margin: 0;
}

.container {
    background: #423f3e;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.box {
    background-color: rgb(0, 0, 0);
    border-radius: 10px;
    color: wheat;
    box-shadow: 5px 5px 10px 1px rgb(0, 0, 0, 12%);
    padding: 45px;
    margin: 15px 0;
    width: 950px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: auto 1fr;
    grid-template-areas:
        "images info"
        "images description";
    grid-gap: 35px;
}

.box .images {
    grid-area: images;
    display: grid;
    grid-template-columns: repeat(3, auto);
    grid-template-rows: auto 1fr;
    grid-template-areas:
        "active active active"
        "idle idle idle";
    grid-gap: 5px;
}

.box .images .img-holder img {
    width: 100%;
    display: block;
    border-radius: 10px;
}

.box .images .img-holder.active {
    grid-area: active;
}

.box .images .img-holder:not(.active):hover {
    opacity: 0.95;
    cursor: pointer;
}

.box .basic-info {
    grid-area: info;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.rate svg {
    font-size: 24px;
    cursor: pointer;
    color: #eafc6f;
}

.rate svg.active {
    color: gold;
}

.options button {
    background: #0077b6;
    color: #ffffff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin-right: 10px;
}

.options button:hover {
    background: #005691;
}

.options a {
    color: #fff;
    text-decoration: none;
}

.product-specs {
    margin-top: 30px;
    background-color: #423f3e;
    padding: 20px;
    border-radius: 8px;
    color: white;
}

.product-specs h2 {
    font-size: 20px;
    margin-bottom: 15px;
    text-align: center;
    justify-content: center;
}

.product-specs ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.product-specs li {
    font-size: 17px;
    margin-bottom: 5px;
}

.product-specs input {
    border: none;
    border-bottom: 1px solid #ccc;
    background-color: transparent;
    outline: none;
    padding: 5px;
    font-size: 16px;
    color: #ffff;
}

.product-price {
    margin: 1rem 0;
    font-size: 1.3rem;
    font-weight: 700;
}
.product-price span {
    font-weight: 400;
}
.last-price span {
    color: #f64749;
    font-size: 40px;
}
.new-price span {
    color: #256eff;
}

@media (max-width: 991px) {
    .box {
        width: 750px;
        grid-template-areas:
            "info info"
            "images description";
    }
    .box .basic-info .options a {
        padding: 8.5px 12px;
    }
}

@media screen and (max-width: 991px) and (min-width: 769px) {
    .box .basic-info span {
        position: absolute;
        align-self: flex-end;
    }
    .box .basic-info .options {
        position: absolute;
        align-self: flex-end;
        margin-top: 40px;
    }
}

@media (max-width: 768px) {
    .box {
        width: 600px;
        grid-template-areas:
            "images info"
            "description description";
    }
    .box .images {
        gap: 3px;
    }
    .box .images .img-holder img {
        border-radius: 5px;
    }
}

@media (max-width: 640px) {
    .box {
        width: 100%;
        min-height: 100vh;
        border-radius: 0;
        padding: 35px;
        margin: 0;
        grid-template-columns: 1fr;
        grid-template-rows: repeat(3, auto);
        grid-template-areas:
            "images"
            "info"
            "description";
    }
}
</style>
