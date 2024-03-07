<template>
    <!-- Header All Categories-->
    <HeaderAllCategories />
    <!--All Categories in page All Categories-->
    <AllCategoriesOn /><router-view />
    <FooTer />
</template>
<script>
import FooTer from "@/components/footer.vue";
import HeaderAllCategories from "@/components/HeaderAllCategories.vue";
import AllCategoriesOn from "@/components/AllCategoriesOn.vue";
export default {
    components: {
        HeaderAllCategories,
        AllCategoriesOn,
        FooTer,
    },
};
</script>
