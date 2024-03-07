<template>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Ecommerce Navbar Design</title>

        <link
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="main-navbar shadow-sm sticky-top">
            <div class="top-navbar">
                <div class="container-fluid">
                    <div class="row">
                        <div
                            class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block"
                        >
                            <h5 class="brand-name">
                                <svg
                                    width="30"
                                    height="30"
                                    viewBox="0 0 30 30"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        opacity="0.64"
                                        d="M11.28 24C11.7237 24.0059 12.1557 24.1429 12.5218 24.3937C12.8878 24.6445 13.1715 24.9979 13.3372 25.4095C13.5029 25.8212 13.5432 26.2726 13.453 26.707C13.3629 27.1415 13.1463 27.5396 12.8304 27.8513C12.5146 28.163 12.1137 28.3743 11.678 28.4587C11.2424 28.5431 10.7916 28.4968 10.3822 28.3257C9.97279 28.1546 9.62314 27.8662 9.37721 27.4969C9.13128 27.1275 9.00004 26.6937 9 26.25C8.99997 25.952 9.05915 25.6569 9.1741 25.382C9.28904 25.107 9.45746 24.8576 9.66958 24.6483C9.8817 24.439 10.1333 24.2739 10.4097 24.1626C10.6862 24.0513 10.982 23.996 11.28 24ZM11.28 22.5C10.5371 22.494 9.80912 22.7089 9.1885 23.1173C8.56788 23.5258 8.08257 24.1093 7.79414 24.794C7.5057 25.4787 7.42715 26.2336 7.56844 26.963C7.70973 27.6924 8.06449 28.3634 8.58772 28.8908C9.11096 29.4183 9.77907 29.7784 10.5073 29.9256C11.2355 30.0727 11.9911 30.0002 12.678 29.7173C13.365 29.4344 13.9525 28.9538 14.3659 28.3365C14.7793 27.7191 15 26.9929 15 26.25C15 25.2606 14.6091 24.3113 13.9123 23.6089C13.2155 22.9065 12.2694 22.5079 11.28 22.5Z"
                                        fill="#542DED"
                                    />
                                    <path
                                        opacity="0.64"
                                        d="M23.295 24C23.738 24.0089 24.1685 24.1483 24.5325 24.4009C24.8966 24.6534 25.178 25.0079 25.3414 25.4197C25.5048 25.8315 25.543 26.2824 25.4511 26.7159C25.3593 27.1493 25.1416 27.546 24.8252 27.8562C24.5088 28.1664 24.1079 28.3763 23.6727 28.4595C23.2375 28.5427 22.7874 28.4956 22.3789 28.3241C21.9704 28.1525 21.6216 27.8642 21.3763 27.4952C21.131 27.1263 21.0001 26.6931 21 26.25C21.0039 25.6545 21.2422 25.0845 21.6634 24.6634C22.0845 24.2423 22.6545 24.0039 23.25 24H23.295ZM23.25 22.5C22.5083 22.5 21.7833 22.7199 21.1666 23.132C20.5499 23.5441 20.0693 24.1297 19.7855 24.8149C19.5016 25.5002 19.4274 26.2542 19.5721 26.9816C19.7168 27.709 20.0739 28.3772 20.5984 28.9017C21.1228 29.4261 21.791 29.7833 22.5184 29.928C23.2458 30.0726 23.9998 29.9984 24.6851 29.7146C25.3703 29.4307 25.956 28.9501 26.368 28.3334C26.7801 27.7167 27 26.9917 27 26.25C27.0001 25.2632 26.6112 24.3161 25.9176 23.6141C25.2241 22.9122 24.2817 22.5118 23.295 22.5H23.25Z"
                                        fill="#542DED"
                                    />
                                    <path
                                        d="M23.235 18H10.5C9.64695 17.9886 8.8237 17.6843 8.16828 17.1381C7.51285 16.5919 7.06509 15.8371 6.90004 15L4.41004 3.96002C4.3803 3.84719 4.37675 3.72906 4.39969 3.61465C4.42262 3.50024 4.47142 3.3926 4.54235 3.29995C4.61328 3.20731 4.70447 3.13211 4.80893 3.08013C4.91339 3.02814 5.02836 3.00074 5.14504 3.00002H26.235C26.7326 2.99799 27.2255 3.09499 27.6852 3.28537C28.1449 3.47574 28.5621 3.75568 28.9125 4.10888C29.2629 4.46208 29.5395 4.88148 29.7262 5.34265C29.9129 5.80381 30.006 6.29752 30 6.79502V11.295C29.9842 13.0788 29.2645 14.7841 27.9975 16.0399C26.7306 17.2956 25.0189 18.0001 23.235 18ZM6.09004 4.50002L8.37004 14.685C8.46544 15.1848 8.72853 15.6371 9.11583 15.9671C9.50312 16.2972 9.99143 16.4851 10.5 16.5H23.175C23.872 16.51 24.564 16.381 25.2107 16.1207C25.8573 15.8604 26.4456 15.4739 26.9413 14.9838C27.437 14.4937 27.8301 13.9098 28.0977 13.2662C28.3653 12.6226 28.5021 11.9321 28.5 11.235V6.73502C28.4981 6.43954 28.4379 6.14735 28.323 5.87512C28.2082 5.60288 28.0408 5.35595 27.8304 5.14841C27.6201 4.94087 27.371 4.77679 27.0972 4.66554C26.8235 4.55429 26.5305 4.49804 26.235 4.50002H6.09004Z"
                                        fill="#542DED"
                                    />
                                    <path
                                        opacity="0.8"
                                        d="M24 21.765H13.815C12.2795 21.7713 10.788 21.2526 9.58761 20.2951C8.38725 19.3375 7.55013 17.9985 7.215 16.5L4.215 3.27001C4.10695 2.77482 3.83486 2.33061 3.44283 2.00936C3.05079 1.68811 2.56177 1.50864 2.055 1.50001H0.75C0.55229 1.49617 0.363748 1.41592 0.223919 1.2761C0.0840905 1.13627 0.00384011 0.947725 0 0.750014C0 0.551102 0.0790178 0.360337 0.21967 0.219684C0.360322 0.0790322 0.551088 1.43816e-05 0.75 1.43816e-05H2.055C2.91842 -0.00238548 3.75579 0.295633 4.42355 0.842982C5.09132 1.39033 5.54789 2.15292 5.715 3.00001L8.715 16.23C8.972 17.398 9.62117 18.4428 10.5545 19.1906C11.4878 19.9383 12.6491 20.344 13.845 20.34H24C24.1989 20.34 24.3897 20.419 24.5303 20.5597C24.671 20.7003 24.75 20.8911 24.75 21.09C24.7313 21.2757 24.6442 21.4477 24.5055 21.5725C24.3668 21.6973 24.1866 21.766 24 21.765Z"
                                        fill="#542DED"
                                    />
                                </svg>
                                eStore
                            </h5>
                        </div>
                        <div class="col-md-5 my-auto">
                            <form role="search" class="search-form">
                                <div class="input-group">
                                    <input
                                        type="search"
                                        placeholder="Search your product"
                                        class="form-control"
                                        v-model="prname"
                                        @click="toggleSelectVisibility"
                                    />
                                    <button
                                        class="btn bg-white"
                                        type="button"
                                        @click="getserch()"
                                    >
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <div
                                        class="mt-3 select-group"
                                        v-show="showSelect"
                                    >
                                        <select
                                            class="form-select custom-select-sm rounded"
                                            v-model="prcompany"
                                            @change="getsearchcompany()"
                                        >
                                            <option
                                                v-for="company in companys"
                                                :key="company.id"
                                                :value="company.company_name"
                                            >
                                                {{ company.company_name }}
                                            </option>
                                        </select>
                                        <select
                                            class="form-select custom-select-sm rounded"
                                            v-model="prcategory"
                                            @change="getsearchcategory()"
                                        >
                                            <option
                                                v-for="category in categorys"
                                                :key="category.id"
                                                :value="category.name"
                                            >
                                                {{ category.name }}
                                            </option>
                                        </select>
                                        <select
                                            class="form-select custom-select-sm rounded"
                                            v-model="prcompany"
                                            @change="getsearchcategory()"
                                        >
                                            <option
                                                v-for="company in companys"
                                                :key="company.id"
                                                :value="company.company_name"
                                            >
                                                {{ company.company_name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 my-auto">
                            <ul class="nav justify-content-end">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <router-link
                                            to="/CheckOut"
                                            style="
                                                color: white;
                                                text-decoration: none;
                                            "
                                        >
                                            <i class="fa fa-shopping-cart"></i>
                                            Cart ({{
                                                Object.keys($store.state.Order)
                                                    .length
                                            }})
                                        </router-link>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <router-link
                                            to="/SignUp"
                                            style="
                                                color: #fff;
                                                font-size: 16px;
                                                font-weight: 500;
                                                text-decoration: none;
                                            "
                                            ><i class="fa fa-user"> </i>
                                            SignUp</router-link
                                        >
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a
                                        class="nav-link dropdown-toggle"
                                        href="#"
                                        id="navbarDropdown"
                                        role="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <i class="bi bi-translate"></i>
                                        Language
                                    </a>
                                    <ul
                                        class="dropdown-menu"
                                        aria-labelledby="navbarDropdown"
                                    >
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                English</a
                                            >
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="#">
                                                Arabic</a
                                            >
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a
                        class="navbar-brand d-block d-sm-block d-md-none d-lg-none"
                        href="#"
                    >
                    </a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                        class="collapse navbar-collapse"
                        id="navbarSupportedContent"
                    >
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="#"
                                    ><router-link to="/">Home</router-link>
                                </a>
                            </li>
                            <li class="nav-item">
                                <nav>
                                    <div class="wrapper">
                                        <ul class="nav-links">
                                            <li
                                                class="position-static menu-item-has-children"
                                            >
                                                <a class="nav-link" href="#">
                                                    All Company
                                                </a>
                                                <div class="mega-box">
                                                    <div class="content">
                                                        <div class="row">
                                                            <ul
                                                                class="mega-links"
                                                            >
                                                                <li
                                                                    class="dropdown"
                                                                    v-for="company in companies"
                                                                    :key="
                                                                        company.id
                                                                    "
                                                                >
                                                                    <a
                                                                        href="#"
                                                                        class="dropbtn"
                                                                        ><router-link
                                                                            @click="
                                                                                getcompid(
                                                                                    company.id
                                                                                )
                                                                            "
                                                                            co
                                                                            to="Company"
                                                                            >{{
                                                                                company.company_name
                                                                            }}
                                                                        </router-link>
                                                                    </a>
                                                                    <div
                                                                        class="dropdown-content"
                                                                    >
                                                                        <template
                                                                            v-for="category in categorys"
                                                                        >
                                                                            <a
                                                                                :key="
                                                                                    category.id
                                                                                "
                                                                                v-if="
                                                                                    category.company_id ===
                                                                                    company.id
                                                                                "
                                                                            >
                                                                                <router-link
                                                                                    @click="
                                                                                        getidcategory(
                                                                                            category.id
                                                                                        )
                                                                                    "
                                                                                    to="/CategoryPage"
                                                                                    >{{
                                                                                        category.name
                                                                                    }}</router-link
                                                                                >
                                                                            </a>
                                                                        </template>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"
                                    ><router-link to="/OfferProduct"
                                        >Offers</router-link
                                    ></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"
                                    ><router-link to="LatestProduct"
                                        >Latest Phones</router-link
                                    ></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"
                                    ><router-link to="AnotherWeb"
                                        >Another Web</router-link
                                    ></a
                                >
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#"
                                    ><router-link to="Compare"
                                        >Compare</router-link
                                    >
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </body>
</template>
<script>
import axios from "axios";
import store from "@/store";

export default {
    name: "HeaderPage",
    data() {
        return {
            companies: [],
            companys: [],
            categorys: [],
            prname: "",
            prcompany: "",
            showSelect: "",
            prcategory: "",
        };
    },
    methods: {
        toggleSelectVisibility() {
            this.showSelect = !this.showSelect;
        },
        hideSelect() {
            this.showSelect = false;
        },
        getcompany() {
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/Company",
            })
                .then((response) => {
                    this.companys = response.data;
                })
                .catch(function (error) {
                    console.log(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        getidcategory(id) {
            store.state.categoryid = id;
        },
        getcategory() {
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/catgory",
            })
                .then((response) => {
                    this.categorys = response.data;
                    store.state.products = response.data;
                })
                .catch(function (error) {
                    console.log(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        getcompid(id) {
            store.state.companyid = id;
            console.log(store.state.companyid);
        },
        getorders() {
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/Company/",
            })
                .then((response) => {
                    this.companies = response.data;
                    store.state.products = response.data;
                })
                .catch(function (error) {
                    window.alert(error.response);
                })
                .catch(function () {
                    window.alert("hi");
                });
        },
        getsearchdata() {
            axios({
                method: "get",
                url:
                    "http://127.0.0.1:8000/api/Serach/searchByName" +
                    "?mobile_name=" +
                    this.prname,
            })
                .then((response) => {
                    store.state.products = response.data;

                    console.log(response);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getsearchcompany() {
            axios({
                method: "get",
                url:
                    "http://127.0.0.1:8000/api/Serach/searchByCompany" +
                    "?company=" +
                    this.prcompany,
            })
                .then((response) => {
                    store.state.products = response.data;

                    console.log(response);
                    console.log(store.state.products);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getsearchcategory() {
            axios({
                method: "get",
                url:
                    "http://127.0.0.1:8000/api/Serach/searchByCategory?category=" +
                    this.prcategory,
            })
                .then((response) => {
                    store.state.products = response.data;

                    console.log(response);
                    console.log(store.state.products);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getsearchcompanyproduct() {
            axios({
                method: "get",
                url:
                    "http://127.0.0.1:8000/api/Serach/searchByCompany?company=" +
                    this.prcompany +
                    "&&product=" +
                    this.prname,
            })
                .then((response) => {
                    store.state.products = response.data;

                    console.log(response);
                    console.log(store.state.products);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getsearchcategoryproduct() {
            axios({
                method: "get",
                url:
                    "http://127.0.0.1:8000/api/Serach/searchByCategory?category=" +
                    this.prcategory +
                    "&&product=" +
                    this.prname,
            })
                .then((response) => {
                    store.state.products = response.data;

                    console.log(response);
                    console.log(store.state.products);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getserch() {
            if (this.prcompany == "" && this.prcategory == "") {
                this.getsearchdata();
            } else if (this.prcategory == "") {
                this.getsearchcompanyproduct();
            } else this.getsearchcategoryproduct();
        },
    },
    beforeMount() {
        this.getorders();

        this.getcompany();
        this.getcategory();
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}
.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    color: white;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #333;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 4px;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content a {
    display: block;

    color: black;
    text-align: center;
    text-decoration: none;
}

.dropdown-content a:hover {
    background-color: #ddd;
    display: block;
}

.main-navbar .top-navbar .nav-links li {
    list-style-type: none;
    display: inline;
    margin-right: 20px;
}

.brand-name {
    color: white;
    padding: 14px 16px;
    text-decoration: none;
}

.top-navbar {
    background-color: #333;
    margin: 0;
    padding: 0;
}

.nav-links li {
    list-style: none;
}

.nav-links li a {
    color: #f2f2f2;
    text-decoration: none;
    font-size: 18px;
    font-weight: 500;
    padding: 9px 15px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.nav-links li a:hover {
    background: white;
}

.nav-links .mobile-item {
    display: none;
}

.nav-links .drop-menu {
    position: absolute;
    background: #242526;
    width: 180px;
    line-height: 45px;
    top: 85px;
    opacity: 0;
    visibility: hidden;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

.nav-links li:hover .mega-box {
    transition: all 0.3s ease;
    top: 39px;
    opacity: 1;
    visibility: visible;
}
.mega-links {
    list-style-type: none;
}
.mega-links li {
    display: inline-block;
}
.mega-links li a {
    display: block;
}

.mega-box {
    position: absolute;
    left: 0;
    width: 100%;
    padding: 0 30px;
    top: 85px;
    opacity: 0;
    visibility: hidden;
}

.mega-box .content {
    background: #464545;
    padding: 25px 20px;
    display: flex;
    width: 100%;
    justify-content: space-between;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

.mega-box .content .row {
    flex: calc(100% / 3);
    line-height: 45px;
}

header {
    color: black;
}

.main-navbar {
    border-bottom: 1px solid #ccc;
}

.main-navbar .top-navbar {
    background-color: #000000;
    padding-top: 10px;
    padding-bottom: 10px;
}

.main-navbar .top-navbar .brand-name {
    color: #fff;
}

.main-navbar .top-navbar .nav-link {
    color: #fff;
    font-size: 16px;
    font-weight: 500;
}

.main-navbar .top-navbar .dropdown-menu {
    padding: 0px 0px;
    border-radius: 0px;
}

.main-navbar .top-navbar .dropdown-menu .dropdown-item {
    padding: 8px 16px;
    border-bottom: 1px solid #ccc;
    font-size: 14px;
}

.main-navbar .top-navbar .dropdown-menu .dropdown-item i {
    width: 20px;
    text-align: center;
    color: #2874f0;
    font-size: 14px;
}

.main-navbar .navbar {
    padding: 0px;
    background-color: #464545;
}

.main-navbar .navbar .nav-item a {
    padding: 8px 20px;
    color: #000;
    font-size: 15px;
    text-decoration: none;
}

@media only screen and (max-width: 600px) {
    .main-navbar .top-navbar .nav-link {
        font-size: 12px;
        padding: 8px 10px;
    }
}
.search-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.select-group {
    display: flex;
    align-items: center;
    width: calc(60% - 40px);
}

.form-select {
    height: 35px;
    width: 100%;
    justify-content: center;
    text-align: center;
    margin-left: 10px;
    margin-bottom: 10px;
}
.input-group input[type="search"],
.input-group button,
.select-group {
    height: 35px;
    margin-bottom: 10px;
    margin-top: 11px;
}
</style>
