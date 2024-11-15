<template>
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h3 class="text-center">Forgot Password?</h3>
                            <h4>You can reset your password here.</h4>
                            <div class="panel-body">
                                <form
                                    id="register-form"
                                    role="form"
                                    autocomplete="off"
                                    class="form"
                                    method="post"
                                >
                                    <div class="form-group">
                                        <div class="qq">
                                            <input
                                                id="password"
                                                name="password"
                                                placeholder="Password "
                                                class="form-control text-center"
                                                type="password"
                                            />
                                        </div>
                                        <div class="qq">
                                            <input
                                                id="password"
                                                name="password"
                                                placeholder="RePassword"
                                                class="form-control text-center"
                                                type="password"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            name="recover-submit"
                                            class="btn btn-lg btn-primary btn-block"
                                            value="Reset Password"
                                            type="submit"
                                        />
                                    </div>

                                    <input
                                        type="hidden"
                                        class="hide"
                                        name="token"
                                        id="token"
                                        value=""
                                    />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RePassword",
};
</script>
<style scoped>
/* style.css */
body {
    color: white;
    font-family: Arial, sans-serif;
}

.bebe {
    background-color: #000;
}

.container {
    margin-top: 50px;
}

.panel-default {
    border-color: white;
}

.panel-body {
    color: beige;
    background-color: #454545;
    padding: 20px;
}

h3 {
    color: white;
}

h4 {
    color: white;
}

.form-group .qq input {
    background-color: black;
    color: white;
    border-color: white;
}

.form-group input[type="submit"] {
    background-color: black;
    border-color: white;
}

.form-group input[type="submit"]:hover {
    background: #454545;
}
</style>
