<template>
    <div class="about">
        <h1>This is an about page</h1>
        <welcomemohmad
            v-for="post in posts"
            :key="post.id"
            :id="post.id"
            :userId="post.userId"
            :title="post.title"
            :body="post.body"
        />
    </div>
</template>
<script>
import welcomemohmad from "@/components/welcom.vue";
import jsonpost from "../json/post.json";
export default {
    name: "ab-out",
    components: {
        welcomemohmad,
    },
    data: function () {
        return {
            posts: jsonpost,
        };
    },
};
</script>
