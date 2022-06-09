<template>
    <div id="app">
        <div class="container">
            <nav class="navbar-mobile">
                <button class="toggle" @click="openNav">
                    <img src="/assets/images/bar.svg" />
                </button>
                <div class="overlay">
                    <button class="close" @click="closeNav">
                        <img src="/assets/images/close.svg" />
                    </button>
                    <ul>
                        <!-- <li>
                            <a href="/">الرئيسية</a>
                        </li>
                        <li>
                            <a href="/contact"> تواصل معنا </a>
                        </li>
                        <li>
                            <a href="https://www.gheym.com/">موقع غيم</a>
                        </li>
                        <li>
                            <a
                                href="https://play.google.com/store/apps/details?id=com.izzedineeita.ghym"
                                >تطبيق غيم</a
                            >
                        </li> -->
                        <!-- <li>
                            <b-button variant="primary" to="/register">
                                تسجيل حساب
                            </b-button>
                        </li>
                        <li>
                            <b-button variant="primary" to="/login">
                                تسجيل الدخول
                            </b-button>
                        </li> -->
                    </ul>
                </div>
            </nav>
            <nav class="navbar-desktop">
                <ul>
                    <!-- <li>
                        <a href="/">الرئيسية</a>
                    </li>
                    <li>
                        <a href="/contact"> تواصل معنا </a>
                    </li>
                    <li>
                        <a href="https://www.gheym.com/">موقع غيم</a>
                    </li>
                    <li>
                        <a
                            href="https://play.google.com/store/apps/details?id=com.izzedineeita.ghym"
                            >تطبيق غيم</a
                        >
                    </li> -->
                    <!-- <li>
                        <b-button variant="primary" to="/register">
                            تسجيل حساب
                        </b-button>
                    </li>
                    <li>
                        <b-button variant="primary" to="/login">
                            تسجيل الدخول
                        </b-button>
                    </li> -->
                </ul>
            </nav>
        </div>

        <div class="container" style="margin-top: 80px">
            <h3 style="text-align: center; margin-bottom: 0">تسجيل الدخول</h3>
            <p style="text-align: center; font-size: 15px">
                تسجيل الدخول لحسابات المسوقين فقط
            </p>
            <b-form class="login-form" method="POST" action="">
                <b-form-group label="البريد الالكتروني" label-for="email">
                    <b-form-input type="email" id="email" />
                </b-form-group>
                <b-form-group label="كلمة المرور" label-for="password">
                    <b-form-input type="password" id="password" />
                </b-form-group>
                <div>
                    <b-form-checkbox id="remember">تذكرني</b-form-checkbox>
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
import { ValidationProvider, ValidationObserver } from "vee-validate";
import VuexyLogo from "@core/layouts/components/Logo.vue";
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
import { required, email } from "@validations";
import { togglePasswordVisibility } from "@core/mixins/ui/forms";
import store from "@/store/index";
import ToastificationContent from "@core/components/toastification/ToastificationContent.vue";

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
        VuexyLogo,
        ValidationProvider,
        ValidationObserver,
    },
    mixins: [togglePasswordVisibility],
    data() {
        return {
            status: "",
            password: "",
            userEmail: "",
            sideImg: require("@/assets/images/pages/login-v2.svg"),
            // validation rulesimport store from '@/store/index'
            required,
            email,
        };
    },
    computed: {
        passwordToggleIcon() {
            return this.passwordFieldType === "password"
                ? "EyeIcon"
                : "EyeOffIcon";
        },
        imgUrl() {
            if (store.state.appConfig.layout.skin === "dark") {
                // eslint-disable-next-line vue/no-side-effects-in-computed-properties
                this.sideImg = require("@/assets/images/pages/login-v2-dark.svg");
                return this.sideImg;
            }
            return this.sideImg;
        },
    },
    methods: {
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
