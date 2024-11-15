<template>
    <body>
        <div class="container-fluid light-style container-p-y bg-dark">
            <h4
                class="font-weight-bold text-center text-white"
                style="padding: 25px"
            >
                Account settings
            </h4>
            <div
                class="container-fluid card overflow-hidden bg-dark"
                style="min-height: 80vh"
            >
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div
                            class="list-group list-group-flush account-settings-links"
                        >
                            <a
                                class="list-group-item list-group-item-action bg-dark text-white"
                                data-toggle="list"
                                href="#account-general"
                                >General</a
                            >
                            <a
                                class="list-group-item list-group-item-action bg-dark text-white"
                                data-toggle="list"
                                href="#account-info"
                                >Info</a
                            >
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div
                                class="tab-pane fade active show"
                                id="account-general"
                            >
                                <hr class="border-light m-0" />
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label text-white"
                                            >Username</label
                                        >
                                        <input
                                            v-model="user.name"
                                            type="text"
                                            class="form-control mb-1"
                                            placeholder="nmaxwell"
                                        />
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label text-white"
                                            >E-mail</label
                                        >
                                        <input
                                            v-model="user.email"
                                            type="text"
                                            class="form-control mb-1"
                                            placeholder="nmaxwell@mail.com"
                                        />
                                        <div
                                            class="alert alert-warning mt-3 text-white bg-dark"
                                        >
                                            Your email is not confirmed. Please
                                            check your inbox.<br />
                                            <a
                                                @click="veryfi()"
                                                href="javascript:void(0)"
                                                >Resend confirmation</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-info">
                                <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label text-white"
                                            >Nationality</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="user.Nationality"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label text-white"
                                            >Phone</label
                                        >
                                        <input
                                            v-model="user.phone"
                                            type="text"
                                            class="form-control"
                                            placeholder="+0 (963) 956 7891"
                                        />
                                    </div>
                                </div>
                                <hr class="border-light m-0" />
                                <div class="card-body pb-2">
                                    <h6 class="mb-4 text-white">Contacts</h6>

                                    <div
                                        class="form-group"
                                        v-for="addre in address"
                                        :key="addre.id"
                                    >
                                        <label class="form-label text-white"
                                            >Name Of The City
                                        </label>
                                        <input
                                            v-model="addre.name_of_the_city"
                                            type="text"
                                            class="form-control"
                                            placeholder="Name Of The City"
                                        />
                                        <label class="form-label text-white"
                                            >Number Of The Street</label
                                        >
                                        <input
                                            v-model="addre.number_of_the_street"
                                            type="text"
                                            class="form-control"
                                            placeholder="Number Of The Street"
                                        />
                                        <label class="form-label text-white">
                                            Number Of Building</label
                                        >
                                        <input
                                            v-model="addre.number_of_building"
                                            type="text"
                                            class="form-control"
                                            placeholder=" Number Of Building"
                                        />

                                        <hr />
                                    </div>
                                    <button
                                        @click="updateaddress"
                                        type="button"
                                        class="btn btn-primary btn-dark"
                                        style="padding: 15px"
                                    >
                                        Update Address
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button
                    @click="updateprofile"
                    type="button"
                    class="btn btn-primary btn-dark"
                    style="padding: 15px"
                >
                    Save changes</button
                >&nbsp;
                <button
                    type="button"
                    class="btn btn-default btn-dark"
                    style="padding: 15px"
                >
                    Cancel
                </button>
            </div>
        </div>
    </body>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return { user: {}, address: {} };
    },
    methods: {
        veryfi() {
            const token = window.localStorage.getItem("token");

            axios({
                method: "get",
                url:
                    "http://127.0.0.1:8000/api/send-verfiy-email/" +
                    this.user.email,
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
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
        getaddress() {
            const token = window.localStorage.getItem("token");
            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/show-address-user",
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    this.address = response.data;
                    console.log(response.data);
                })
                .catch(function (error) {
                    window.alert(error.response);
                    console.log(error);
                });
        },
        updateprofile() {
            const token = window.localStorage.getItem("token");
            axios({
                method: "post",
                url: "http://127.0.0.1:8000/api/user/update-user",
                data: {
                    name: this.user.name,
                    Nationality: this.user.Nationality,
                    phone: this.user.phone,
                    id: this.user.id,
                    email: this.user.email,
                },
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    this.user = response.data;
                    console.log(response.data);
                    console.log(this.user.name);
                })
                .catch(function (error) {
                    window.alert(error.response);
                    console.log(error);
                });
        },
        updateaddress() {
            const token = window.localStorage.getItem("token");
            axios({
                method: "post",
                url: "http://127.0.0.1:8000/api/update-address-user",
                data: {
                    name_of_the_city: this.address.name_of_the_city,
                    number_of_the_street: this.address.number_of_the_street,
                    number_of_building: this.address.number_of_building,
                    user_id: this.user.id,
                    id: this.address.id,
                },
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    this.address = response.data;
                    console.log(response.data);
                    console.log(this.address.id);
                })
                .catch(function (error) {
                    window.alert(error.response);
                    console.log(error);
                });
        },
        createaddress() {
            const token = window.localStorage.getItem("token");
            axios({
                method: "post",
                url: "http://127.0.0.1:8000/api/create-address-user",
                data: {
                    name_of_the_city: this.address.name_of_the_city,
                    number_of_the_street: this.address.number_of_the_street,
                    number_of_building: this.address.number_of_building,
                    user_id: this.user.id,
                    id: this.address.id,
                },
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    this.address = response.data;
                    console.log(response.data);
                    console.log(this.address.id);
                })
                .catch(function (error) {
                    window.alert(error.response);
                    console.log(error);
                });
        },
    },
    mounted() {
        this.getprofile();
        this.getaddress();
    },
};
</script>
<style scoped>
body {
    height: 100vh;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}

.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}

html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}

.account-settings-multiselect ~ .select2-container {
    width: 100% !important;
}

.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}

.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}

.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}

.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}

.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}

.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}

.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}

.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
</style>
