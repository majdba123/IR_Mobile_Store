<template>
    <link
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        rel="stylesheet"
    />

    <HeaderAllCategories />
    <section class="color">
        <section id="blog-home" class="pt-5 container">
            <h2 class="font-weight-bold pt-5">
                Shopping cart
                <hr class="underline" />
            </h2>
            <h2 class="font-weight-bold pt-5">eStore</h2>
        </section>
        <section id="cart-container" class="container my-5">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>image</td>
                        <td>product</td>
                        <td>price</td>
                        <td>-</td>
                        <td>Qunlitly</td>
                        <td>+</td>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(product, index) in $store.state.Order"
                        :key="index"
                    >
                        <td>
                            <button
                                @click="deleteproduct(index)"
                                class="btn btn-primary"
                                type="button"
                                style="
                                    margin: 0px 0px 0px 10px;
                                    padding: 0px 5px 0px 5px;
                                    background-color: white;
                                "
                            >
                                <span class="ml-2"
                                    ><i
                                        class="fa fa-trash-o ml-3 text-black-50"
                                    ></i
                                ></span>
                            </button>
                        </td>

                        <td><img :src="imges + product.img" alt="" /></td>
                        <td>
                            <h5>{{ product.name }}</h5>
                        </td>
                        <td>
                            <h5>{{ product.Price }}</h5>
                        </td>
                        <td>
                            <button
                                @click="
                                    if (
                                        $store.state.Order[index]['count'] > 0
                                    ) {
                                        $store.state.Orderto[index]['count']--;
                                        $store.state.Order[index]['count']--;
                                    }
                                    total_price();
                                "
                                class="btn btn-primary"
                                type="button"
                                style="
                                    margin: 0px 10px 0px 10px;
                                    padding: 0px 7px 0px 6px;
                                "
                            >
                                <span class="ml-2">-</span>
                            </button>
                        </td>
                        <td>
                            {{ product.count }}
                        </td>
                        <td>
                            <button
                                @click="
                                    $store.state.Order[index]['count']++;
                                    $store.state.Orderto[index]['count']++;

                                    total_price();
                                "
                                class="btn btn-primary"
                                type="button"
                                style="
                                    margin: 0px 0px 0px 10px;
                                    padding: 0px 5px 0px 5px;
                                "
                            >
                                <span class="ml-2">+</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="cart-bottom" class="container">
            <div class="row">
                <div class="coupon col-lg-6 col-md-6 col-12 mb-4">
                    <div>
                        <h5>COUPON</h5>
                        <P> Enter your coupon code hf you have one </P>
                        <input type="text" v-model="code" />
                        <button @click="postcobon">APPLY COUPON</button>
                    </div>
                </div>
                <div class="total col-lg-6 col-md-6 col-12">
                    <div>
                        <h5>CART TOTAL</h5>
                        <div class="d-flex justify-content-between">
                            <h6>Subtotal</h6>
                            <p>{{ totalprice }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6>Discount</h6>
                            <p>
                                {{
                                    totalprice - discount == totalprice
                                        ? 0
                                        : totalprice - discount
                                }}
                            </p>
                        </div>

                        <hr class="second-hr" />

                        <div class="d-flex justify-content-between">
                            <h6>Total</h6>
                            <p>{{ totalprice }}</p>
                        </div>
                        <button @click="postorder" class="ml-auto">
                            <router-link class="ml-auto" to="/PayMent"
                                >PROCEED TO CHECKOUT</router-link
                            >
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <FooTer />
</template>
<script>
import HeaderAllCategories from "@/components/HeaderAllCategories.vue";
import FooTer from "@/components/footer.vue";
import axios from "axios";
import Stripe from "@vue-stripe/vue-stripe";

import store from "@/store";
export default {
    name: "CheckOut",
    components: { HeaderAllCategories, FooTer },

    data() {
        return {
            amount: 0,
            code: "",
            totalprice: 0,
            see: "",
            discount: "",

            order: {},
            imges: "http://127.0.0.1:8000/api/get-image-link/",
            cartItems: [
                {
                    price: store.state.Order.Price,
                    quantity: store.state.Order.count,
                    id: store.state.Order.id,
                },
            ],
        };
    },
    methods: {
        async handleSubmit() {
            const { data } = await axios.post(
                "http://127.0.0.1:8000/api/createPaymentIntent",
                {
                    amount: this.amount * 100, // Convert amount to cents
                    currency: "usd",
                }
            );

            const stripe = Stripe(
                "pk_test_51OnzmLDbdangSdamoA2FNIkxwKIp9OtbxJOyQOdaWxWF9G6BAdboamYZD764nPKWIOoTermWP76AvJYAuqeDCPHA00TX7TIczo"
            );
            console.log(stripe);

            const elements = stripe.elements();
            const card = elements.create("card");

            const result = await stripe.confirmCardPayment(data.clientSecret, {
                payment_method: {
                    card,
                },
            });

            if (result.error) {
                console.error(result.error.message);
            } else {
                // Payment succeeded
                console.log(result.paymentIntent);
            }
        },

        postorder() {
            store.state.Orderto.totalPrice = this.totalprice;
            const data = store.state.Orderto;

            const a = data;

            const token = window.localStorage.getItem("token");

            axios
                .post(
                    "http://127.0.0.1:8000/api/create-order",
                    JSON.stringify(a),
                    {
                        headers: { Authorization: `Bearer ${token}` },
                    }
                )
                .then((response) => {
                    store.state.idorder = response.data;
                    console.log(response);
                    console.log(data);
                })
                .catch((error) => {
                    console.log(store.state.Orderto);
                    console.log(error);
                });
        },
        postcobon() {
            const token = window.localStorage.getItem("token");

            axios({
                method: "post",
                url:
                    "http://127.0.0.1:8000/api/discount?total_price=" +
                    this.totalprice +
                    "&coupon_code=" +
                    this.code,
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    this.discount = response.data;
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then((response) => {
                    this.discount = response.data;
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then((response) => {
                    this.discount = response.data;
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        total_price() {
            this.totalprice = 0;
            if (Object.keys(store.state.Order).length > 0) {
                for (
                    var index = 0;
                    index < Object.keys(store.state.Order).length;
                    index++
                ) {
                    this.totalprice +=
                        store.state.Order[index]["Price"] *
                        store.state.Order[index]["count"];
                }
            }
            console.log(store.state.Order);
        },
        deleteproduct(index) {
            var i = index;
            console.log(index);
            if (Object.keys(store.state.Order).length == 1) {
                delete store.state.Order[i];
                delete store.state.Orderto[i];

                this.total_price();
                store.state.counter--;
                store.state.count--;

                console.log(store.state.Order);
                return;
            }
            for (i = 0; i < Object.keys(store.state.Order).length - 1; i++) {
                store.state.Order[i] = store.state.Order[i + 1];
                store.state.Orderto[i] = store.state.Orderto[i + 1];
            }
            delete store.state.Order[i];
            delete store.state.Orderto[i];

            store.state.counter--;
            store.state.count--;

            this.total_price();
        },
        checkout() {
            var F_cart = {};
            for (
                var index = 0;
                index < Object.keys(store.state.Order).length;
                index++
            ) {
                F_cart[index] = {
                    productID: store.state.Order[index]["id"],
                    Amount: store.state.Order[index]["count"],
                };
            }
            console.log(F_cart);
        },
    },
    mounted() {
        this.total_price();
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

.underline {
    height: 5px;
    border-radius: 5px;
    background-color: #000000;
    margin: 10px 0;
    width: 40px;
}
.color {
    background-color: #e2e2e2;
}
#blog-home {
    display: flex;
    justify-content: space-between;
}
#cart-container {
    overflow: auto;
}

#cart-container table {
    border: 2px solid #000000;
    width: 100%;
    table-layout: fixed;
    white-space: nowrap;
}

#cart-container table thead {
    font-weight: 700;
    background-color: #000;
    color: #fff;
}

#cart-container table thead td {
    background: #000;
    color: #fff;
    border: none;
    padding: 10px;
}

#cart-container table td {
    border: 1px solid #090808;
    text-align: center;
    padding: 10px;
}

#cart-container table td:nth-child(1) {
    width: 100px;
}

#cart-container table td:nth-child(2),
#cart-container table td:nth-child(3) {
    width: 200px;
}

#cart-container table td:nth-child(4),
#cart-container table td:nth-child(5),
#cart-container table td:nth-child(6) {
    width: 170px;
}

#cart-container table tbody img {
    width: 100;
    height: 80px;
    object-fit: cover;
}

#cart-container table tbody i {
    color: #8d8c89;
}

#cart-bottom .coupon > div,
#cart-bottom .total > div {
    border: 1px solid #191919;
    border-radius: 10px;
    padding: 20px;
}

#cart-bottom .total > div {
    margin-bottom: 19px;
}

#cart-bottom .coupon h5,
#cart-bottom .total h5 {
    background: #000;
    color: #fff;
    border: none;
    padding: 6px 12px;
    border-radius: 10px;
    font-weight: 700;
}

#cart-bottom .coupon p,
#cart-bottom .coupon input {
    padding: 10px;
    margin-bottom: 10px;
}

#cart-bottom .coupon input {
    height: 44px;
}

#cart-bottom .coupon input,
#cart-bottom .coupon button {
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 4px;
}

#cart-bottom .coupon button {
    margin-left: 20px;
    transition: all 0.5s ease;
}

#cart-bottom .coupon button:hover {
    background-color: #2c2c2c;
}

#cart-bottom .total div > button:hover {
    background-color: #2c2c2c;
}

#cart-bottom .total div > div {
    padding: 0 12px;
}

#cart-bottom .total h6 {
    color: #000;
}

.second-hr {
    background: #b8b7b3;
    width: 100%;
    height: 1px;
}

#cart-bottom .total div > button {
    margin-top: 20px;
    display: block;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    transition: all 0.5s ease;
}
</style>
