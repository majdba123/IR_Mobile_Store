<template>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <HeaderUserAccount />
    <div class="wrapper">
        <h1>Frequently Asked Questions</h1>

        <div class="faq">
            <button class="accordion">
                What is E-store?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>What is E-store?</p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
                How does it work?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Facilis saepe molestiae distinctio asperiores cupiditate
                    consequuntur dolor ullam, iure eligendi harum eaque hic
                    corporis debitis porro consectetur voluptate rem officiis
                    architecto.
                </p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
                Can I pay using credit cards?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>xsssssssss</p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
                Can I get a refund if I don't like the product?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Facilis saepe molestiae distinctio asperiores cupiditate
                    consequuntur dolor ullam, iure eligendi harum eaque hic
                    corporis debitis porro consectetur voluptate rem officiis
                    architecto.
                </p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
                Is this site safe?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Facilis saepe molestiae distinctio asperiores cupiditate
                    consequuntur dolor ullam, iure eligendi harum eaque hic
                    corporis debitis porro consectetur voluptate rem officiis
                    architecto.
                </p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
                What are the stages through which the request passes and how
                long does it take to complete it?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Facilis saepe molestiae distinctio asperiores cupiditate
                    consequuntur dolor ullam, iure eligendi harum eaque hic
                    corporis debitis porro consectetur voluptate rem officiis
                    architecto.
                </p>
            </div>
        </div>
    </div>

    <FooTer />
</template>
<script>
import FooTer from "@/components/footer.vue";
import HeaderUserAccount from "@/components/HeaderUserAccount.vue";
export default {
    name: "ab-out",
    components: {
        HeaderUserAccount,
        FooTer,
    },
    mounted() {
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                this.parentElement.classList.toggle("active");

                var pannel = this.nextElementSibling;

                if (pannel.style.display === "block") {
                    pannel.style.display = "none";
                } else {
                    pannel.style.display = "block";
                }
            });
        }
    },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Roboto", sans-serif;
}

body {
    background-color: black;
}

.wrapper {
    max-width: 75%;
    margin: auto;
}

.wrapper>p,
.wrapper>h1 {
    margin: 1.5rem 0;
    text-align: center;
    color: white;
}

.wrapper>h1 {
    letter-spacing: 3px;
}

.accordion {
    background-color: rgb(105, 105, 105);
    color: rgba(0, 0, 0, 0.8);
    cursor: pointer;
    font-size: 1.2rem;
    width: 100%;
    padding: 2rem 2.5rem;
    border: none;
    outline: none;
    transition: 0.4s;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: bold;
}

.accordion i {
    font-size: 1.6rem;
}

.active,
.accordion:hover {
    background-color: #f1f7f5;
}

.pannel {
    padding: 0 2rem 2.5rem 2rem;
    background-color: white;
    overflow: hidden;
    background-color: #f1f7f5;
    display: none;
}

.pannel p {
    color: rgba(0, 0, 0, 0.7);
    font-size: 1.2rem;
    line-height: 1.4;
}

.faq {
    border: 1px solid rgba(0, 0, 0, 0.2);
    margin: 10px 0;
}

.faq.active {
    border: none;
}
</style>
