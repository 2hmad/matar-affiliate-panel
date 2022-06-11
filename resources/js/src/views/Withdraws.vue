<template>
    <div>
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div
                        class="card-body d-flex justify-content-between align-items-center"
                    >
                        <div class="truncate">
                            <h2 class="mb-25 font-weight-bolder">
                                {{ paymentsRows.length }}
                            </h2>
                            <span>عمليات السحب</span>
                        </div>
                        <span
                            class="b-avatar badge-light-primary rounded-circle"
                            style="width: 45px; height: 45px"
                        >
                            <span class="b-avatar-custom">
                                <feather-icon
                                    icon="GitPullRequestIcon"
                                    size="22"
                                />
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
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
                    <span v-if="props.row.method === 'paypal'"> باي بال </span>
                    <span v-else-if="props.row.method === 'bank-transfer'">
                        تحويل بنكي
                    </span>
                    <span v-else-if="props.row.method === 'western-union'">
                        ويسترن يونيون
                    </span>
                    <span v-else></span>
                </span>

                <span v-else-if="props.column.field === 'amount'">
                    <span> {{ props.row.amount }}$ </span>
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
                    label: "طريقة السحب",
                    field: "method",
                    sortable: false,
                },
                {
                    label: "تاريخ السحب",
                    field: "date",
                },
                {
                    label: "المبلغ",
                    field: "amount",
                },
            ],
            paymentsRows: [],
        };
    },
    async mounted() {
        try {
            let marketer = await axios.post(
                `/api/withdrawals`,
                { id: JSON.parse(localStorage.getItem("MatarMarketer")).id },
                {
                    headers: {
                        token: JSON.parse(localStorage.getItem("MatarMarketer"))
                            .token,
                    },
                }
            );
            this.paymentsRows = marketer.data;
        } catch (err) {
            console.log(err);
        }
    },
};
</script>
