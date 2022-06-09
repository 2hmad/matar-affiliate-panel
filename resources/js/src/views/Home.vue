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
                            <h2 class="mb-25 font-weight-bolder">
                                {{ marketer_data.details.length }}
                            </h2>
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
        <h4>اخر الدفعات المستلمة</h4>
        <vue-good-table
            :columns="paymentsColumns"
            :rows="paymentsRows"
            :search-options="{
                enabled: true,
            }"
        >
            <div slot="emptystate">لا توجد بيانات</div>
            <template slot="table-row" slot-scope="props">
                <span
                    v-if="props.column.field === 'fullName'"
                    class="text-nowrap"
                >
                    <span class="text-nowrap">{{ props.row.fullName }}</span>
                </span>

                <span v-else-if="props.column.field === 'method'">
                    <span v-if="props.row.method === 'register'"> تسجيل </span>
                    <span v-else> الاشتراك </span>
                </span>

                <span v-else-if="props.column.field === 'action'">
                    <span>
                        <router-link :to="`/outlook/${props.row.id}`">
                            <feather-icon
                                icon="EyeIcon"
                                size="16"
                                class="text-body"
                            />
                        </router-link>
                    </span>
                </span>

                <!-- Column: Common -->
                <span v-else>
                    {{ props.formattedRow[props.column.field] }}
                </span>
            </template>
        </vue-good-table>
    </div>
</template>

<script>
import { BCard, BCardText, BLink } from "bootstrap-vue";
import { VueGoodTable } from "vue-good-table";
import axios from "axios";
import "vue-good-table/dist/vue-good-table.css";
export default {
    components: {
        BCard,
        BCardText,
        BLink,
        VueGoodTable,
        axios,
    },
    data() {
        return {
            pageLength: 5,
            dir: false,
            paymentsColumns: [
                {
                    label: "#",
                    field: "id",
                    hidden: true,
                },
                {
                    label: "طريقة التحصيل",
                    field: "method",
                    sortable: false,
                },
                {
                    label: "تاريخ التحصيل",
                    field: "date",
                    sortable: false,
                },
                {
                    label: "المبلغ",
                    field: "amount",
                },
            ],
            paymentsRows: [],
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
                `/api/marketer/`,
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
            this.marketer_reg = marketer.data.details.filter(
                (item) => item.type === "register"
            );
            this.marketer_sub = marketer.data.details.filter(
                (item) => item.type === "subscribe"
            );
            this.paymentsRows = marketer.data.details;
            this.usersRows = marketer.data.details;
        } catch (err) {
            console.log(err);
        }
    },
};
</script>
