<template>
    <!-- Header-->
    <HeaderUserAccount />
    <!-- AllBroducts-->
    <AllProducts />
    <!-- OtherCompany-->

    <OtherCompany />
    <!-- FooTer -->

    <FooTer />

    <router-view />
</template>

<script>
// @ is an alias to /src
import HeaderUserAccount from "@/components/HeaderUserAccount.vue";
import AllProducts from "@/components/AllProducts.vue";
import FooTer from "@/components/footer.vue";
import OtherCompany from "@/components/OtherCompany.vue";

export default {
    components: {
        HeaderUserAccount,
        AllProducts,
        OtherCompany,
        FooTer,
    },
};
</script>
<style></style>
