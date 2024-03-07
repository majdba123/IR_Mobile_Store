<template>
    <HeaderAdmin />

    <FooTer />
</template>
<script>
import HeaderAdmin from "@/components/HeaderAdmin.vue";
import FooTer from "@/components/footer.vue";

export default {
    name: "AdmIn",
    components: {
        HeaderAdmin,

        FooTer,
    },
};
</script>
