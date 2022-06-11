<template>
    <div>
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div
                        class="card-body d-flex justify-content-between align-items-center"
                    >
                        <div class="truncate">
                            <h2
                                class="mb-25 font-weight-bolder"
                                v-if="marketer_funds.length > 0"
                            >
                                {{
                                    marketer_funds.reduce(
                                        (prev, curr) => prev + curr.amount,
                                        0
                                    )
                                }}$
                            </h2>
                            <h2 class="mb-25 font-weight-bolder" v-else>0$</h2>
                            <span>اجمالي الايرادات</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div
                        class="card-body d-flex justify-content-between align-items-center"
                    >
                        <div class="truncate">
                            <h2
                                class="mb-25 font-weight-bolder"
                                v-if="marketer_data.details.length > 0"
                            >
                                {{ marketer_data.details.length }}
                            </h2>
                            <h2 class="mb-25 font-weight-bolder" v-else>0</h2>
                            <span>عدد المسجلين من خلالك</span>
                        </div>
                        <span
                            class="b-avatar badge-light-primary rounded-circle"
                            style="width: 45px; height: 45px"
                        >
                            <span class="b-avatar-custom">
                                <feather-icon icon="UsersIcon" size="22" />
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div
                        class="card-body d-flex justify-content-between align-items-center"
                    >
                        <div class="truncate">
                            <h2
                                class="mb-25 font-weight-bolder"
                                v-if="marketer_reg.length > 0"
                            >
                                {{
                                    marketer_reg.reduce(
                                        (prev, curr) => prev + curr.amount,
                                        0
                                    )
                                }}$
                            </h2>
                            <h2 class="mb-25 font-weight-bolder" v-else>0$</h2>
                            <span>اجمالي عمولة التسجيل</span>
                        </div>
                        <span
                            class="b-avatar badge-light-success rounded-circle"
                            style="width: 45px; height: 45px"
                        >
                            <span class="b-avatar-custom">
                                <feather-icon icon="UserIcon" size="22" />
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div
                        class="card-body d-flex justify-content-between align-items-center"
                    >
                        <div class="truncate">
                            <h2
                                class="mb-25 font-weight-bolder"
                                v-if="marketer_sub.length > 0"
                            >
                                {{
                                    marketer_sub.reduce(
                                        (prev, curr) => prev + curr.amount,
                                        0
                                    )
                                }}$
                            </h2>
                            <h2 class="mb-25 font-weight-bolder" v-else>0$</h2>
                            <span>اجمالي عمولة الاشتراك</span>
                        </div>
                        <span
                            class="b-avatar badge-light-primary rounded-circle"
                            style="width: 45px; height: 45px"
                        >
                            <span class="b-avatar-custom">
                                <feather-icon icon="CloudIcon" size="22" />
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <div class="truncate">
                            <h4>الكوبون الخاص بك</h4>
                            <span>
                                شاركه مع الاصدقاء للاشتراك او التسجيل من خلاله
                                في تطبيق مطر لتزيد من ايراداتك
                            </span>
                        </div>
                        <br />
                        <b-input-group class="input-group-merge">
                            <b-form-input
                                id="basic-password1"
                                :value="coupon"
                                disabled
                            />
                            <b-input-group-append is-text>
                                <feather-icon
                                    icon="CopyIcon"
                                    class="cursor-pointer"
                                    @click="copy"
                                />
                            </b-input-group-append>
                        </b-input-group>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {
    BCard,
    BCardText,
    BLink,
    BInputGroup,
    BFormInput,
    BInputGroupAppend,
    BFormGroup,
} from "bootstrap-vue";
import axios from "axios";
import "vue-good-table/dist/vue-good-table.css";
export default {
    components: {
        BCard,
        BCardText,
        BLink,
        BFormInput,
        BInputGroupAppend,
        BInputGroup,
        BFormGroup,
    },
    data() {
        return {
            coupon: JSON.parse(localStorage.getItem("MatarMarketer")).coupon,
            pageLength: 5,
            dir: false,
            usersColumns: [
                {
                    label: "#",
                    field: "id",
                    hidden: true,
                },
                {
                    label: "اسم المستخدم",
                    field: "name",
                    sortable: false,
                },
                {
                    label: "البريد الالكتروني",
                    field: "email",
                    sortable: false,
                },
                {
                    label: "الدولة",
                    field: "country",
                },
            ],
            usersRows: [],
            marketer_data: [],
            marketer_funds: [],
            marketer_reg: [],
            marketer_sub: [],
        };
    },
    async mounted() {
        try {
            let marketer = await axios.post(
                `/api/marketer`,
                { id: JSON.parse(localStorage.getItem("MatarMarketer")).id },
                {
                    headers: {
                        token: JSON.parse(localStorage.getItem("MatarMarketer"))
                            .token,
                    },
                }
            );
            this.marketer_data = marketer.data;
            this.marketer_funds = marketer.data.details;
            if (marketer.data.details.length > 0) {
                this.marketer_reg = marketer.data.details.filter(
                    (item) => item.type === "register"
                );
                this.marketer_sub = marketer.data.details.filter(
                    (item) => item.type === "subscribe"
                );
            }
            this.paymentsRows = marketer.data.details;
            this.usersRows = marketer.data.details;
        } catch (err) {
            console.log(err);
        }
    },
    methods: {
        copy() {
            var copyText = this.coupon;
            navigator.clipboard.writeText(copyText);
            alert("تم نسخ الكوبون: " + copyText);
        },
    },
};
</script>
