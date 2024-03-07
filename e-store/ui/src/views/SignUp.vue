<template>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <HeaderSignUp />
    <div class="aaa">
        <section class="wwrapper">
            <div class="form signup">
                <header>Signup</header>
                <form>
                    <input type="text" class="bbb" placeholder="Full name" required v-model="name" />
                    <input class="bbb" type="text" placeholder="Email address" required v-model="email" />
                    <input class="bbb" type="password" placeholder="Password" required v-model="password" />
                    <div class="checkbox">
                        <input type="checkbox" id="signupCheck" />
                        <label for="signupCheck">I accept all terms & conditions</label>
                    </div>
                    ><input type="button" @click="register()" class="bbb" value="Signup" />
                </form>
            </div>
            <div class="form login">
                <header>Login</header>
                <form action="#">
                    <input v-model="email" class="bbb" type="text" placeholder="Email address" required />
                    <input v-model="password" class="bbb" type="password" placeholder="Password" required />

                    <a href="#"><router-link to="/ForgotPassword">
                            Forgot password?</router-link>
                    </a>
                    <input type="button" class="bbb" value="Login" @click="login()" />
                </form>
            </div>
        </section>
    </div>

    </html>
</template>

<script>
import axios from "axios";
import HeaderSignUp from "@/components/Header.SignUp.vue";
import router from "@/router";
export default {
    name: "SignUp",
    data() {
        return {
            name: "",
            email: "",
            password: "",
            Nationality: "sryia",
        };
    },
    components: {
        HeaderSignUp,
    },
    methods: {
        register: function () {
            axios({
                method: "post",
                url: "http://127.0.0.1:8000/api/auth/register",
                data: {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    Nationality: this.Nationality,
                },
            })
                .then(function (response) {
                    console.log(response);

                    window.alert(" regestir succesful");
                })
                .catch(function (error) {
                    console.log(error);

                    window.alert(error.response.message);
                });
        },
        login() {
            axios({
                method: "post",
                url: "http://127.0.0.1:8000/api/auth/login",
                data: {
                    email: this.email,
                    password: this.password,
                },
            })
                .then(function (response) {
                    if (response.status == 200) {
                        console.log(response.data.type_of_user);
                        console.log(response.status);
                        window.alert("LogIn succesful");
                        window.localStorage.setItem(
                            "token",
                            response.data.token
                        );
                        if (response.data.type_of_user == 1) {
                            router.push("/CompanyAdmin");
                        } else router.push("/UserAccount");
                    }
                })
                .catch(function (error) {
                    router.push("/SignUp");
                    alert("Email Or Password invalid");
                    console.log(error);
                });
        },

        addActiveClass() {
            const wrapper = this.$el.querySelector(".wwrapper");
            wrapper.classList.add("active");
        },
        removeActiveClass() {
            const wrapper = this.$el.querySelector(".wwrapper");
            wrapper.classList.remove("active");
        },
    },
    mounted() {
        const signupHeader = this.$el.querySelector(".signup header");
        const loginHeader = this.$el.querySelector(".login header");

        loginHeader.addEventListener("click", this.addActiveClass);
        signupHeader.addEventListener("click", this.removeActiveClass);
    },
    beforeUnmount() {
        const signupHeader = this.$el.querySelector(".signup header");
        const loginHeader = this.$el.querySelector(".login header");

        loginHeader.removeEventListener("click", this.addActiveClass);
        signupHeader.removeEventListener("click", this.removeActiveClass);
    },
};
</script>
<style>
/* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

.aaa {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #464545;
}

.wwrapper {
    position: relative;
    max-width: 470px;
    width: 100%;
    border-radius: 12px;
    padding: 20px 30px 120px;
    background: #000000;
    box-shadow: 0 5px 10px #464545;
    overflow: hidden;
}

.form.login {
    position: absolute;
    left: 50%;
    bottom: -86%;
    transform: translateX(-50%);
    width: calc(100% + 220px);
    padding: 20px 140px;
    border-radius: 50%;
    height: 100%;
    background: #050505;
    transition: all 0.6s ease;
}

.wwrapper.active .form.login {
    bottom: -15%;
    border-radius: 35%;
    box-shadow: 0 -5px 10px #464545;
}

.form header {
    font-size: 30px;
    text-align: center;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
}

.form.login header {
    color: #fff;
    opacity: 0.6;
}

.wwrapper.active .form.login header {
    opacity: 1;
}

.wwrapper.active .signup header {
    opacity: 0.6;
}

.qwq {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-top: 40px;
}

.wwrapper form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-top: 40px;
}

.bbb {
    height: 60px;
    outline: none;
    border: none;
    padding: 0 15px;
    font-size: 16px;
    font-weight: 400;
    color: #ffffff;
    border-radius: 8px;
    background: #464545;
    transition: all 0.3s ease;
}

.bbb:hover {
    background: #696868;
}

.form.login input {
    border: 1px solid #aaa;
}

form .checkbox {
    gap: 10px;
}

.checkbox input[type="checkbox"] {
    height: 16px;
    width: 16px;
    accent-color: #fff;
    cursor: pointer;
    padding-right: 20px;
}

form .checkbox label {
    cursor: pointer;
    color: #fff;
    padding: 10px;
}

form a {
    color: #333;
    text-decoration: none;
}

form input [type="submit"] {
    margin-top: 15px;
    padding: none;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    background: #464545;
}

.form.login input[type="submit"] {
    background: #464545;
    color: #fff;
    border: none;
    transition: all 0.3s ease;
}

.form.login input[type="submit"]:hover {
    background: #696868;
}

.centered-link {
    text-align: center;
}

.link-container {
    padding: 10px;
}
</style>
