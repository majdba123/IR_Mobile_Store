<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <HeaderUserAccount />
    <div class="contact-form">
        <h1>Contact Us</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Contact Us</h2>
                    <label for="">Email :</label>
                    <input type="email" name="name" placeholder="Enter Your Email" v-model="email" />
                    <label for="">Message :</label>
                    <textarea name="message" placeholder="Your Message" v-model="content"></textarea>
                    <button class="btn" @click="sendmessage()">
                        Send <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
                <div class="form-img"></div>
            </div>
        </div>
    </div>
    <FooTer />
</template>
<script>
import HeaderUserAccount from "@/components/HeaderUserAccount.vue";
import FooTer from "@/components/footer.vue";
import axios from "axios";

export default {
    name: "ContactUs",
    components: { HeaderUserAccount, FooTer },
    data() {
        return {
            email: "",
            content: "",
        };
    },
    methods: {
        sendmessage() {
            const token = window.localStorage.getItem("token");

            axios({
                method: "post",
                url: "http://127.0.0.1:8000/api/send-message",
                data: {
                    email: this.email,
                    content: this.content,
                },
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    console.log(response);
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
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "poppins", sans-serif;
}

.contact-form {
    position: relative;
    min-height: 100vh;
    z-index: 0;
    background: #000000;
    padding: 30px;
    justify-content: center;
    display: grid;
    grid-template-rows: 1fr auto 1fr;
    align-items: center;
}

.container {
    max-width: 800px;
    margin-top: 0 auto;
}

.contact-form h1 {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 400;
    color: #fff;
    font-family: "poppins";
}

.contact-form h2 {
    line-height: 40px;
    margin-bottom: 5px;
    font-size: 30px;
    font-weight: 500;
    color: #000000;
    text-align: center;
}

.contact-form .main {
    position: relative;
    display: flex;
    margin: 30px 0;
}

.content {
    flex-basis: 50%;
    padding: 3em 3em;
    background: #fff;
    box-shadow: 2px 9px 49px -17px rgba(156, 39, 148, 0.1);
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
}

.form-img {
    flex-basis: 50%;
    background: #f0f4f8;
    background-size: cover;
    padding: 40px;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
    align-items: center;
    display: grid;
}

.form-img img {
    max-width: 100%;
}

.btn,
button,
input {
    border-radius: 35px;
}

.btn:hover,
button:hover {
    color: #3e3d3e;
    transition: 0.5s ease;
}

.contact-form form {
    margin: 30px 0;
}

.contact-form input,
textarea {
    outline: none;
    margin-bottom: 15px;
    font-stretch: 16px;
    color: #000000;
    padding: 14px 20px;
    width: 100%;
    display: inline-block;
    box-sizing: border-box;
    border: none;
    background: #fcfcfc;
    transition: 0.3s ease;
}

.contact-form input:focus {
    background: transparent;
    border: 1px solid #000000;
}

.contact-form button {
    font-size: 18px;
    color: #fff;
    width: 100%;
    background: #000000;
    font-weight: 600;
    transition: 0.3s ease;
    padding: 14px 15px;
    border: 1px solid #ededed;
}

@media (max-width: 736px) {
    .contact-form .main {
        flex-direction: column;
    }

    .contact-form form {
        margin-top: 30px;
        margin-bottom: 10px;
    }

    .form-img {
        border-radius: 0;
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
        order: 2;
    }

    .content {
        order: 1;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
}
</style>
