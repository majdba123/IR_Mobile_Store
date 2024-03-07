<template>
    <router-view />
</template>
<script>
import store from "@/store";
export default {
    setup() {},
    watch: {
        $route(to, from) {
            if (to.path == "/DetailsProduct") {
                console.log(from);
                if ("id" in to.query) {
                    store.state.productID = to.query.id;
                }
            }
        },
    },
};
</script>
