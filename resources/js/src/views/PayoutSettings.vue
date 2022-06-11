<template>
    <div>
        <b-form @submit.prevent="addPayout">
            <b-form-group label="طريقة السحب" label-for="method">
                <b-form-select id="method" v-model="form.method">
                    <b-form-select-option
                        selected
                        hidden
                        :value="form.method"
                        v-if="form.method === 'paypal'"
                    >
                        باي بال
                    </b-form-select-option>
                    <b-form-select-option
                        selected
                        hidden
                        :value="form.method"
                        v-if="form.method === 'bank-transfer'"
                    >
                        تحويل بنكي
                    </b-form-select-option>
                    <b-form-select-option
                        selected
                        hidden
                        :value="form.method"
                        v-if="form.method === 'western-union'"
                    >
                        ويسترن يونيون
                    </b-form-select-option>
                    <b-form-select-option value="paypal">
                        باي بال
                    </b-form-select-option>
                    <b-form-select-option value="bank-transfer">
                        تحويل بنكي
                    </b-form-select-option>
                    <b-form-select-option value="western-union">
                        ويسترن يونيون
                    </b-form-select-option>
                </b-form-select>
            </b-form-group>
            <b-form-group
                label="البريد الالكتروني (مُسجل علي باي بال)"
                label-for="paypal-email"
                v-if="form.method === 'paypal'"
            >
                <b-form-input id="paypal-email" v-model="form.paypalEmail" />
            </b-form-group>
            <b-form-group
                label="اسم البنك"
                label-for="bank-name"
                v-if="form.method === 'bank-transfer'"
            >
                <b-form-input id="bank-name" v-model="form.bankName" />
            </b-form-group>
            <b-form-group
                label="اسم مالك الحساب"
                label-for="bank-account-name"
                v-if="form.method === 'bank-transfer'"
            >
                <b-form-input
                    id="bank-account-name"
                    v-model="form.bankAccountName"
                />
            </b-form-group>
            <b-form-group
                label="رقم الحساب"
                label-for="bank-account-number"
                v-if="form.method === 'bank-transfer'"
            >
                <b-form-input
                    id="bank-account-number"
                    v-model="form.bankAccountNumber"
                />
            </b-form-group>
            <b-form-group
                label="رقم بطاقة الهوية"
                label-for="id-number"
                v-if="form.method === 'western-union'"
            >
                <b-form-input id="id-number" v-model="form.idNumber" />
            </b-form-group>
            <b-button
                variant="success"
                style="margin-right: auto; display: block; margin-left: auto"
                type="submit"
            >
                حفظ التغييرات
            </b-button>
        </b-form>
    </div>
</template>

<script>
import {
    BCard,
    BCardText,
    BLink,
    BFormGroup,
    BFormInput,
    BButton,
    BFormSelect,
    BFormSelectOption,
    BForm,
} from "bootstrap-vue";
import axios from "axios";
export default {
    components: {
        BCard,
        BCardText,
        BLink,
        BFormGroup,
        BFormInput,
        BButton,
        BFormSelect,
        BFormSelectOption,
        BForm,
    },
    data() {
        return {
            form: {
                id: JSON.parse(localStorage.getItem("MatarMarketer")).id,
                method: "",
                paypalEmail: "",
                bankName: "",
                bankAccountName: "",
                bankAccountNumber: "",
                idNumber: "",
            },
        };
    },
    async mounted() {
        try {
            let marketer = await axios.post(
                `/api/payout`,
                { id: JSON.parse(localStorage.getItem("MatarMarketer")).id },
                {
                    headers: {
                        token: JSON.parse(localStorage.getItem("MatarMarketer"))
                            .token,
                    },
                }
            );
            this.form.method = marketer.data.method;
            this.form.paypalEmail = marketer.data.paypal_account;
            this.form.bankName = marketer.data.bank_name;
            this.form.bankAccountName = marketer.data.bank_account;
            this.form.bankAccountNumber = marketer.data.bank_account_number;
            this.form.idNumber = marketer.data.id_number;
        } catch (err) {
            console.log(err);
        }
    },
    methods: {
        addPayout() {
            axios
                .post("/api/update-payout", this.form, {
                    headers: {
                        token: JSON.parse(localStorage.getItem("MatarMarketer"))
                            .token,
                    },
                })
                .then((res) => {
                    alert("تم تعديل بيانات السحب"), location.reload();
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
