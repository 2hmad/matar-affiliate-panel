<template>
    <div id="app">
        <div class="container" style="margin-top: 80px">
            <h3 style="text-align: center; margin-bottom: 0">تسجيل الدخول</h3>
            <p style="text-align: center; font-size: 15px">
                تسجيل الدخول لحسابات المسوقين فقط
            </p>
            <b-form class="login-form" @submit.prevent="login">
                <b-form-group label="البريد الالكتروني" label-for="email">
                    <b-form-input
                        type="email"
                        id="email"
                        v-model="form.email"
                    />
                </b-form-group>
                <b-form-group label="كلمة المرور" label-for="password">
                    <b-form-input
                        type="password"
                        id="password"
                        v-model="form.password"
                    />
                </b-form-group>
                <div style="display: flex; justify-content: space-between">
                    <b-form-checkbox id="remember">تذكرني</b-form-checkbox>
                    <p style="text-align: Center; font-size: 14px">
                        <router-link
                            to="/forget-password"
                            style="color: #5e50ee"
                        >
                            نسيت كلمة المرور؟
                        </router-link>
                    </p>
                </div>
                <b-button variant="primary" type="submit">
                    تسجيل الدخول
                </b-button>
                <p style="text-align: Center; font-size: 16px">
                    ليس لديك حساب ؟
                    <router-link to="/register" style="color: #5e50ee">
                        انضم الينا الان
                    </router-link>
                </p>
            </b-form>
        </div>
    </div>
</template>

<script>
/* eslint-disable global-require */
import {
    BRow,
    BCol,
    BLink,
    BFormGroup,
    BFormInput,
    BInputGroupAppend,
    BInputGroup,
    BFormCheckbox,
    BCardText,
    BCardTitle,
    BImg,
    BForm,
    BButton,
} from "bootstrap-vue";
import store from "@/store/index";
import { mapActions } from "vuex";

export default {
    components: {
        BRow,
        BCol,
        BLink,
        BFormGroup,
        BFormInput,
        BInputGroupAppend,
        BInputGroup,
        BFormCheckbox,
        BCardText,
        BCardTitle,
        BImg,
        BForm,
        BButton,
    },
    data() {
        return {
            form: {
                email: "",
                password: "",
            },
        };
    },
    methods: {
        ...mapActions(["LogIn"]),
        async login() {
            const User = new FormData();
            User.append("email", this.form.email);
            User.append("password", this.form.password);
            try {
                await this.LogIn(User);
                this.$router.push("/");
                this.showError = false;
            } catch (error) {
                this.showError = true;
            }
        },
        openNav() {
            document.querySelector(".navbar-mobile .overlay").style.display =
                "block";
        },
        closeNav() {
            document.querySelector(".navbar-mobile .overlay").style.display =
                "none";
        },
    },
};
</script>

<style lang="scss">
.login-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    max-width: 400px;
    margin: 5% auto;
    .email,
    .password {
        padding: 9px;
        border: 1px solid #ccc;
        border-radius: 3px;
        outline: none;
        font-size: 17px;
    }
}
.navbar-desktop {
    margin-top: 50px;
    ul {
        list-style: none;
        display: flex;
        gap: 35px;
        justify-content: center;
        align-items: center;
        li {
            font-size: 19px;
        }
    }
    @media screen and (max-width: 768px) {
        display: none;
    }
}
.navbar-mobile {
    margin-top: 50px;
    display: none;
    .toggle {
        background-color: transparent;
        border: none;
        outline: none;
    }
    @keyframes sidebar {
        0% {
            width: 0%;
        }
        100% {
            width: 100%;
        }
    }
    .overlay {
        background-color: white;
        z-index: 999;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: none;
        animation: sidebar 0.5s;
        .close {
            background-color: transparent;
            border: none;
            outline: none;
            position: absolute;
            top: 15px;
        }
        ul {
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 35px;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }
    }
    @media screen and (max-width: 768px) {
        display: block;
    }
}
a {
    color: #65638f;
}
</style>
