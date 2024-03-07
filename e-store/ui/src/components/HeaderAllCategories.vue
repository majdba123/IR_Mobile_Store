<template>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta
                name="viewport"
                content="width=device-width, initial-scale=1"
            />
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
                                <h5 class="brand-name">eStore</h5>
                            </div>
                            <div class="col-md-5 my-auto">
                                <form role="search">
                                    <div class="input-group"></div>
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
                                                <i
                                                    class="fa fa-shopping-cart"
                                                ></i>
                                                Cart ({{
                                                    Object.keys(
                                                        $store.state.Order
                                                    ).length
                                                }})
                                            </router-link>
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
                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                >
                                                    English</a
                                                >
                                            </li>

                                            <li>
                                                <a
                                                    class="dropdown-item"
                                                    href="#"
                                                >
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
            </div>
        </body>
    </html>
</template>
<script>
export default {
    name: "HeaderAllCategories",
};
</script>
<style scoped>
#www {
    color: block;
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
    background-color: #ddd;
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
</style>
