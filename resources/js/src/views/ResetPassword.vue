<template>
    <div id="app">
        <div class="container" style="margin-top: 80px">
            <h3 style="text-align: center; margin-bottom: 0">
                اعادة تعيين كلمة المرور
            </h3>
            <validation-observer ref="simpleRules">
                <b-form class="login-form" @submit.prevent="reset">
                    <b-form-group
                        label="كلمة المرور الجديدة"
                        label-for="password"
                    >
                        <validation-provider
                            #default="{ errors }"
                            name="Password"
                            vid="Password"
                            rules="required|min:8"
                        >
                            <b-form-input
                                type="password"
                                id="password"
                                v-model="form.newPassword"
                                :state="errors.length > 0 ? false : null"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group
                        label="تأكيد كلمة المرور الجديدة"
                        label-for="password"
                    >
                        <validation-provider
                            #default="{ errors }"
                            name="Confirm Password"
                            rules="required|confirmed:Password"
                        >
                            <b-form-input
                                type="password"
                                id="password"
                                v-model="form.confirmPassword"
                                :state="errors.length > 0 ? false : null"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-button variant="primary" type="submit">
                        اعادة تعيين كلمة المرور
                    </b-button>
                </b-form>
            </validation-observer>
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
import axios from "axios";
import { ValidationProvider, ValidationObserver } from "vee-validate";
import { required, min, confirmed } from "@validations";

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
        ValidationProvider,
        ValidationObserver,
    },
    data() {
        return {
            required,
            min,
            confirmed,
            form: {
                token: this.$route.params.token,
                newPassword: "",
                confirmPassword: "",
            },
        };
    },
    async mounted() {
        axios
            .post("/api/check-reset-token", {
                token: this.$route.params.token,
            })
            .then((success) => {})
            .catch((err) => {
                alert("الكود غير صحيح"), (location.href = "/forget-password");
            });
    },
    methods: {
        reset() {
            this.$refs.simpleRules.validate().then((success) => {
                if (success) {
                    axios
                        .post("/api/reset-password", this.form)
                        .then((res) => {
                            alert("تم اعادة تعيين كلمة المرور"),
                                (location.href = "/login");
                        })
                        .catch((err) => {
                            alert("حدث خطأ ما");
                        });
                }
            });
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
