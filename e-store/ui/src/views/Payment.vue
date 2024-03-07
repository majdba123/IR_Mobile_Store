<template>
    <HeaderAllCategories />

    <body>
        <div class="container">
            <form action="">
                <div class="row">
                    <div class="col">
                        <h3 class="title">billing address</h3>

                        <div class="inputBox">
                            <span>full name :</span>
                            <input type="text" placeholder="john deo" />
                        </div>
                        <div class="inputBox">
                            <span>email :</span>
                            <input type="email" placeholder="example@example.com" />
                        </div>
                        <div class="inputBox">
                            <span>address :</span>
                            <input type="text" placeholder="room - street - locality" />
                        </div>
                        <div class="inputBox">
                            <span>city :</span>
                            <input type="text" placeholder="mumbai" />
                        </div>

                        <div class="flex">
                            <div class="inputBox">
                                <span>state :</span>
                                <input type="text" placeholder="india" />
                            </div>
                            <div class="inputBox">
                                <span>zip code :</span>
                                <input type="text" placeholder="123 456" />
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <h3 class="title">payment</h3>

                        <div class="inputBox">
                            <span>cards accepted :</span>
                            <img src="../assets/Image/card_img.png" alt="" />
                        </div>
                        <div class="inputBox">
                            <span>name on card :</span>
                            <input type="text" placeholder="mr. john deo" />
                        </div>
                        <div class="inputBox">
                            <span>credit card number :</span>
                            <input v-model="stripe_payment_id" type="number" placeholder="1111-2222-3333-4444" />
                        </div>
                        <div class="inputBox">
                            <span>exp month :</span>
                            <input type="text" placeholder="january" />
                        </div>

                        <div class="flex">
                            <div class="inputBox">
                                <span>exp year :</span>
                                <input type="number" placeholder="2022" />
                            </div>
                            <div class="inputBox">
                                <span>CVV :</span>
                                <input type="text" placeholder="1234" />
                            </div>
                        </div>
                    </div>
                </div>

                <input @click="sendpayment" value="proceed to checkout" class="submit-btn" />
            </form>
        </div>
    </body>
    <FooTer />
</template>
<script>
import HeaderAllCategories from "@/components/HeaderAllCategories.vue";
import FooTer from "@/components/footer.vue";
import axios from "axios";
import store from "@/store";

export default {
    name: "PayMent",
    data() {
        return {
            user: "",
            stripe_payment_id: "",
        };
    },
    components: { HeaderAllCategories, FooTer },
    mounted() {
        this.getprofile();
    },
    methods: {
        getprofile() {
            const token = window.localStorage.getItem("token");
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/user/show-user",
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    this.user = response.data;
                    console.log(response.data);
                })
                .catch(function (error) {
                    window.alert(error.response);
                    console.log(error);
                });
        },
        sendpayment() {
            const token = window.localStorage.getItem("token");
            axios({
                method: "post",
                url: "http://127.0.0.1:8000/api/payment",
                data: {
                    order_id: store.state.idorder,
                    stripe_payment_id: this.stripe_payment_id,
                    user_id: this.user.id,
                },
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    console.log(response.data);
                })
                .catch(function (error) {
                    window.alert(error.response);
                    console.log(error);
                });
        },
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap");

* {
    font-family: "Poppins", sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-transform: capitalize;
    transition: all 0.2s linear;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 25px;
    min-height: 100vh;
    background: linear-gradient(90deg, #2ecc71 60%, #27ae60 40.1%);
}

.container form {
    padding: 20px;
    width: 700px;
    background: #fff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.container form .row {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.container form .row .col {
    flex: 1 1 250px;
}

.container form .row .col .title {
    font-size: 20px;
    color: #333;
    padding-bottom: 5px;
    text-transform: uppercase;
}

.container form .row .col .inputBox {
    margin: 15px 0;
}

.container form .row .col .inputBox span {
    margin-bottom: 10px;
    display: block;
}

.container form .row .col .inputBox input {
    width: 100%;
    border: 1px solid #ccc;
    padding: 10px 15px;
    font-size: 15px;
    text-transform: none;
}

.container form .row .col .inputBox input:focus {
    border: 1px solid #000;
}

.container form .row .col .flex {
    display: flex;
    gap: 15px;
}

.container form .row .col .flex .inputBox {
    margin-top: 5px;
}

.container form .row .col .inputBox img {
    height: 34px;
    margin-top: 5px;
    filter: drop-shadow(0 0 1px #000);
}

.container form .submit-btn {
    width: 100%;
    padding: 12px;
    font-size: 17px;
    background: #27ae60;
    color: #fff;
    margin-top: 5px;
    cursor: pointer;
}

.container form .submit-btn:hover {
    background: #2ecc71;
}
</style>
