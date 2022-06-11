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
        </div>
        <vue-good-table
            :columns="usersColumns"
            :rows="usersRows"
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
            pageLength: 15,
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
            this.usersRows = marketer.data.details;
        } catch (err) {
            console.log(err);
        }
    },
};
</script>
