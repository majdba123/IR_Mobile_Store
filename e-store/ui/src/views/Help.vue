<template>
    <div class="help">
        <p>Hi Pro</p>
        <WelcomeMohmad v-for="post in posts" :key="post.id" :id="post.id" :userId="post.userId" :title="post.title"
            :body="post.body" />
    </div>
</template>
<script>
import WelcomeMohmad from "@/components/welcom.vue";
import jsonpost from "../json/post.json";
export default {
    name: "HelpEr",

    components: {
        WelcomeMohmad,
    },
    data: function () {
        return {
            posts: jsonpost,
        };
    },
};
</script>
