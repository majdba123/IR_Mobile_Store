<template>
    <HeaderAdmin />
    <section class="attendance">
        <div class="attendance-list">
            <div class="title">
                <p>Message</p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Email</th>
                        <th>Content</th>
                        <th>Admin Response</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="elemnts in messages" :key="elemnts.id">
                        <td>{{ elemnts.id }}</td>
                        <td>{{ elemnts.userid }}</td>
                        <td>{{ elemnts.email }}</td>
                        <td>{{ elemnts.content }}</td>
                        <td>{{ elemnts.admin_response }}</td>
                        <td>{{ elemnts.created_at }}</td>
                        <td>{{ elemnts.updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <FooTer />
</template>
<script>
import HeaderAdmin from "@/components/HeaderAdmin.vue";
import FooTer from "@/components/footer.vue";
import axios from "axios";

export default {
    name: "TableOfMessage",
    components: {
        HeaderAdmin,
        FooTer,
    },
    data() {
        return {
            messages: {},
        };
    },
    methods: {
        getmessage() {
            const token = window.localStorage.getItem("token");

            axios({
                method: "get",
                url: "http://127.0.0.1:8000/api/all-message",
                headers: { Authorization: `Bearer ${token}` },
            })
                .then((response) => {
                    console.log(response);
                    this.messages = response.data;
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
    beforeMount() {
        this.getmessage();
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    outline: none;
    border: none;
    text-decoration: none;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

.title p {
    font-size: 25px;
    color: #000000;
    font-weight: bold;
    display: flex;
    text-align: center;
    justify-content: center;
    margin-top: 10px;
}

.table {
    border-collapse: collapse;
    table-layout: fixed;
    width: 80%;
    font-size: 13px;
    min-width: 100%;
    overflow: hidden;
    border-radius: 4px;
    margin: 15px auto;
}

.table thead tr {
    background: #000000;
    text-align: left;
    font-weight: bold;
    color: white;
}

.table th {
    padding: 12px 15px;
    text-align: center;
    word-break: break-all;
    color: white;
}

.table td {
    padding: 12px 15px;
    text-align: center;
    word-break: break-all;
}

.table tbody tr {
    border-bottom: 1px solid #ddd;
    background: #e9e9e9;
}

.table tbody tr:last-of-type {
    border-bottom: 2px solid #ffffff;
}

.table button {
    padding: 6px 20px;
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    background-color: #000000;
    border: 1px solid #ffffff;
}

.table button a {
    color: #fff;
}

.table button:hover {
    background: #373737;
    color: #fff;
    transition: 0.5rem;
}

tr td a {
    color: #000000;
}

tr td a:hover,
.dd:hover {
    color: #ffffff;
}

.dd {
    color: #000000;
}
</style>
