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
                    <ul></ul>
                </div>
            </nav>
            <nav class="navbar-desktop">
                <ul></ul>
            </nav>
        </div>

        <div class="container" style="margin-top: 80px">
            <h3 style="text-align: center; margin-bottom: 0">تسجيل حساب</h3>
            <p style="text-align: center; font-size: 15px">
                انضم الي مجموعه مسوقين تطبيق مطر
            </p>
            <b-form class="login-form" method="POST" action="">
                <b-form-group label="الاسم بالكامل" label-for="name">
                    <b-form-input type="text" id="name" />
                </b-form-group>
                <b-form-group label="البريد الالكتروني" label-for="email">
                    <b-form-input type="email" id="email" />
                </b-form-group>
                <b-form-group label="رقم الهاتف" label-for="phone">
                    <b-form-input type="text" id="phone" />
                </b-form-group>
                <b-form-group label="الدولة" label-for="country">
                    <b-form-select id="country">
                        <option value="أفغانستان">أفغانستان</option>
                        <option value="ألبانيا">ألبانيا</option>
                        <option value="الجزائر">الجزائر</option>
                        <option value="أندورا">أندورا</option>
                        <option value="أنغولا">أنغولا</option>
                        <option value="أنتيغوا وباربودا">
                            أنتيغوا وباربودا
                        </option>
                        <option value="الأرجنتين">الأرجنتين</option>
                        <option value="أرمينيا">أرمينيا</option>
                        <option value="أستراليا">أستراليا</option>
                        <option value="النمسا">النمسا</option>
                        <option value="أذربيجان">أذربيجان</option>
                        <option value="البهاما">البهاما</option>
                        <option value="البحرين">البحرين</option>
                        <option value="بنغلاديش">بنغلاديش</option>
                        <option value="باربادوس">باربادوس</option>
                        <option value="بيلاروسيا">بيلاروسيا</option>
                        <option value="بلجيكا">بلجيكا</option>
                        <option value="بليز">بليز</option>
                        <option value="بنين">بنين</option>
                        <option value="بوتان">بوتان</option>
                        <option value="بوليفيا">بوليفيا</option>
                        <option value="البوسنة والهرسك ">
                            البوسنة والهرسك
                        </option>
                        <option value="بوتسوانا">بوتسوانا</option>
                        <option value="البرازيل">البرازيل</option>
                        <option value="بروناي">بروناي</option>
                        <option value="بلغاريا">بلغاريا</option>
                        <option value="بوركينا فاسو ">بوركينا فاسو</option>
                        <option value="بوروندي">بوروندي</option>
                        <option value="كمبوديا">كمبوديا</option>
                        <option value="الكاميرون">الكاميرون</option>
                        <option value="كندا">كندا</option>
                        <option value="الرأس الأخضر">الرأس الأخضر</option>
                        <option value="جمهورية أفريقيا الوسطى ">
                            جمهورية أفريقيا الوسطى
                        </option>
                        <option value="تشاد">تشاد</option>
                        <option value="تشيلي">تشيلي</option>
                        <option value="الصين">الصين</option>
                        <option value="كولومبيا">كولومبيا</option>
                        <option value="جزر القمر">جزر القمر</option>
                        <option value="كوستاريكا">كوستاريكا</option>
                        <option value="ساحل العاج">ساحل العاج</option>
                        <option value="كرواتيا">كرواتيا</option>
                        <option value="كوبا">كوبا</option>
                        <option value="قبرص">قبرص</option>
                        <option value="التشيك">التشيك</option>
                        <option value="جمهورية الكونغو الديمقراطية">
                            جمهورية الكونغو الديمقراطية
                        </option>
                        <option value="الدنمارك">الدنمارك</option>
                        <option value="جيبوتي">جيبوتي</option>
                        <option value="دومينيكا">دومينيكا</option>
                        <option value="جمهورية الدومينيكان">
                            جمهورية الدومينيكان
                        </option>
                        <option value="تيمور الشرقية ">تيمور الشرقية</option>
                        <option value="الإكوادور">الإكوادور</option>
                        <option value="مصر">مصر</option>
                        <option value="السلفادور">السلفادور</option>
                        <option value="غينيا الاستوائية">
                            غينيا الاستوائية
                        </option>
                        <option value="إريتريا">إريتريا</option>
                        <option value="إستونيا">إستونيا</option>
                        <option value="إثيوبيا">إثيوبيا</option>
                        <option value="فيجي">فيجي</option>
                        <option value="فنلندا">فنلندا</option>
                        <option value="فرنسا">فرنسا</option>
                        <option value="الغابون">الغابون</option>
                        <option value="غامبيا">غامبيا</option>
                        <option value="جورجيا">جورجيا</option>
                        <option value="ألمانيا">ألمانيا</option>
                        <option value="غانا">غانا</option>
                        <option value="اليونان">اليونان</option>
                        <option value="جرينادا">جرينادا</option>
                        <option value="غواتيمالا">غواتيمالا</option>
                        <option value="غينيا">غينيا</option>
                        <option value="غينيا بيساو">غينيا بيساو</option>
                        <option value="غويانا">غويانا</option>
                        <option value="هايتي">هايتي</option>
                        <option value="هندوراس">هندوراس</option>
                        <option value="المجر">المجر</option>
                        <option value="آيسلندا">آيسلندا</option>
                        <option value="الهند">الهند</option>
                        <option value="إندونيسيا">إندونيسيا</option>
                        <option value="إيران">إيران</option>
                        <option value="العراق">العراق</option>
                        <option value="جمهورية أيرلندا ">
                            جمهورية أيرلندا
                        </option>
                        <option value="فلسطين">فلسطين</option>
                        <option value="إيطاليا">إيطاليا</option>
                        <option value="جامايكا">جامايكا</option>
                        <option value="اليابان">اليابان</option>
                        <option value="الأردن">الأردن</option>
                        <option value="كازاخستان">كازاخستان</option>
                        <option value="كينيا">كينيا</option>
                        <option value="كيريباتي">كيريباتي</option>
                        <option value="الكويت">الكويت</option>
                        <option value="قرغيزستان">قرغيزستان</option>
                        <option value="لاوس">لاوس</option>
                        <option value="لاوس">لاوس</option>
                        <option value="لاتفيا">لاتفيا</option>
                        <option value="لبنان">لبنان</option>
                        <option value="ليسوتو">ليسوتو</option>
                        <option value="ليبيريا">ليبيريا</option>
                        <option value="ليبيا">ليبيا</option>
                        <option value="ليختنشتاين">ليختنشتاين</option>
                        <option value="ليتوانيا">ليتوانيا</option>
                        <option value="لوكسمبورغ">لوكسمبورغ</option>
                        <option value="مدغشقر">مدغشقر</option>
                        <option value="مالاوي">مالاوي</option>
                        <option value="ماليزيا">ماليزيا</option>
                        <option value="جزر المالديف">جزر المالديف</option>
                        <option value="مالي">مالي</option>
                        <option value="مالطا">مالطا</option>
                        <option value="جزر مارشال">جزر مارشال</option>
                        <option value="موريتانيا">موريتانيا</option>
                        <option value="موريشيوس">موريشيوس</option>
                        <option value="المكسيك">المكسيك</option>
                        <option value="مايكرونيزيا">مايكرونيزيا</option>
                        <option value="مولدوفا">مولدوفا</option>
                        <option value="موناكو">موناكو</option>
                        <option value="منغوليا">منغوليا</option>
                        <option value="الجبل الأسود">الجبل الأسود</option>
                        <option value="المغرب">المغرب</option>
                        <option value="موزمبيق">موزمبيق</option>
                        <option value="بورما">بورما</option>
                        <option value="ناميبيا">ناميبيا</option>
                        <option value="ناورو">ناورو</option>
                        <option value="نيبال">نيبال</option>
                        <option value="هولندا">هولندا</option>
                        <option value="نيوزيلندا">نيوزيلندا</option>
                        <option value="نيكاراجوا">نيكاراجوا</option>
                        <option value="النيجر">النيجر</option>
                        <option value="نيجيريا">نيجيريا</option>
                        <option value="كوريا الشمالية ">كوريا الشمالية</option>
                        <option value="النرويج">النرويج</option>
                        <option value="سلطنة عمان">سلطنة عمان</option>
                        <option value="باكستان">باكستان</option>
                        <option value="بالاو">بالاو</option>
                        <option value="بنما">بنما</option>
                        <option value="بابوا غينيا الجديدة">
                            بابوا غينيا الجديدة
                        </option>
                        <option value="باراغواي">باراغواي</option>
                        <option value="بيرو">بيرو</option>
                        <option value="الفلبين">الفلبين</option>
                        <option value="بولندا">بولندا</option>
                        <option value="البرتغال">البرتغال</option>
                        <option value="قطر">قطر</option>
                        <option value="جمهورية الكونغو">جمهورية الكونغو</option>
                        <option value="جمهورية مقدونيا">جمهورية مقدونيا</option>
                        <option value="رومانيا">رومانيا</option>
                        <option value="روسيا">روسيا</option>
                        <option value="رواندا">رواندا</option>
                        <option value="سانت كيتس ونيفيس">
                            سانت كيتس ونيفيس
                        </option>
                        <option value="سانت لوسيا">سانت لوسيا</option>
                        <option value="سانت فنسينت والجرينادينز">
                            سانت فنسينت والجرينادينز
                        </option>
                        <option value="ساموا">ساموا</option>
                        <option value="سان مارينو">سان مارينو</option>
                        <option value="ساو تومي وبرينسيب">
                            ساو تومي وبرينسيب
                        </option>
                        <option value="السعودية">السعودية</option>
                        <option value="السنغال">السنغال</option>
                        <option value="صربيا">صربيا</option>
                        <option value="سيشيل">سيشيل</option>
                        <option value="سيراليون">سيراليون</option>
                        <option value="سنغافورة">سنغافورة</option>
                        <option value="سلوفاكيا">سلوفاكيا</option>
                        <option value="سلوفينيا">سلوفينيا</option>
                        <option value="جزر سليمان">جزر سليمان</option>
                        <option value="الصومال">الصومال</option>
                        <option value="جنوب أفريقيا">جنوب أفريقيا</option>
                        <option value="كوريا الجنوبية">كوريا الجنوبية</option>
                        <option value="جنوب السودان">جنوب السودان</option>
                        <option value="إسبانيا">إسبانيا</option>
                        <option value="سريلانكا">سريلانكا</option>
                        <option value="السودان">السودان</option>
                        <option value="سورينام">سورينام</option>
                        <option value="سوازيلاند">سوازيلاند</option>
                        <option value="السويد">السويد</option>
                        <option value="سويسرا">سويسرا</option>
                        <option value="سوريا">سوريا</option>
                        <option value="طاجيكستان">طاجيكستان</option>
                        <option value="تنزانيا">تنزانيا</option>
                        <option value="تايلاند">تايلاند</option>
                        <option value="توغو">توغو</option>
                        <option value="تونجا">تونجا</option>
                        <option value="ترينيداد وتوباغو">
                            ترينيداد وتوباغو
                        </option>
                        <option value="تونس">تونس</option>
                        <option value="تركيا">تركيا</option>
                        <option value="تركمانستان">تركمانستان</option>
                        <option value="توفالو">توفالو</option>
                        <option value="أوغندا">أوغندا</option>
                        <option value="أوكرانيا">أوكرانيا</option>
                        <option value="الإمارات العربية المتحدة">
                            الإمارات العربية المتحدة
                        </option>
                        <option value="المملكة المتحدة">المملكة المتحدة</option>
                        <option value="الولايات المتحدة">
                            الولايات المتحدة
                        </option>
                        <option value="أوروغواي">أوروغواي</option>
                        <option value="أوزبكستان">أوزبكستان</option>
                        <option value="فانواتو">فانواتو</option>
                        <option value="فنزويلا">فنزويلا</option>
                        <option value="فيتنام">فيتنام</option>
                        <option value="اليمن">اليمن</option>
                        <option value="زامبيا">زامبيا</option>
                        <option value="زيمبابوي">زيمبابوي</option>
                    </b-form-select>
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
    BFormSelect,
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
        BFormSelect,
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
