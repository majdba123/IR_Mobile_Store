<template>
    <div class="welcome">
        <h6>user Id:{{ userId }}</h6>
        <h6>Id : {{ id }}</h6>
        <h4>Title : {{ title }}</h4>
        <h4>Body :{{ body }}</h4>
        <p>programing</p>
    </div>
</template>
<script>
export default {
    name: "WelcomeMohmad",
    props: ["userId", "id", "body", "title"],
};
</script>
<style scoped>
h1 {
    font-size: 50px;
}
</style>
