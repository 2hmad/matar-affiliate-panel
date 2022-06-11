import Vue from "vue";
import VueRouter from "vue-router";
import store from "../store";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    scrollBehavior() {
        return { x: 0, y: 0 };
    },
    routes: [
        {
            path: "/",
            name: "home",
            component: () => import("@/views/Home.vue"),
            meta: {
                pageTitle: "الرئيسية",
                requiresAuth: true,
                breadcrumb: [
                    {
                        text: "الرئيسية",
                        active: true,
                    },
                ],
            },
        },
        {
            path: "/transactions",
            name: "transactions",
            component: () => import("@/views/Transactions.vue"),
            meta: {
                pageTitle: "اخر المعاملات",
                requiresAuth: true,
                breadcrumb: [
                    {
                        text: "اخر المعاملات",
                        active: true,
                    },
                ],
            },
        },
        {
            path: "/withdraw",
            name: "withdraw",
            component: () => import("@/views/Withdraws.vue"),
            meta: {
                pageTitle: "عمليات السحب",
                requiresAuth: true,
                breadcrumb: [
                    {
                        text: "عمليات السحب",
                        active: true,
                    },
                ],
            },
        },
        {
            path: "/payout-settings",
            name: "payout-settings",
            component: () => import("@/views/PayoutSettings.vue"),
            meta: {
                pageTitle: "اعدادات الدفع",
                requiresAuth: true,
                breadcrumb: [
                    {
                        text: "اعدادات الدفع",
                        active: true,
                    },
                ],
            },
        },
        {
            path: "/users",
            name: "users",
            component: () => import("@/views/Users.vue"),
            meta: {
                pageTitle: "المستخدمين",
                requiresAuth: true,
                breadcrumb: [
                    {
                        text: "المستخدمين",
                        active: true,
                    },
                ],
            },
        },
        {
            path: "/login",
            name: "login",
            component: () => import("@/views/Login.vue"),
            meta: {
                layout: "full",
                guest: true,
            },
        },
        {
            path: "/register",
            name: "register",
            component: () => import("@/views/Register.vue"),
            meta: {
                layout: "full",
                guest: true,
            },
        },
        {
            path: "/error-404",
            name: "error-404",
            component: () => import("@/views/error/Error404.vue"),
            meta: {
                layout: "full",
            },
        },
        {
            path: "*",
            redirect: "error-404",
        },
    ],
});

// ? For splash screen
// Remove afterEach hook if you are not using splash screen
router.afterEach(() => {
    // Remove initial loading
    const appLoading = document.getElementById("loading-bg");
    if (appLoading) {
        appLoading.style.display = "none";
    }
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (store.getters.isAuthenticated) {
            next();
            return;
        }
        next("/login");
    } else {
        next();
    }
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.guest)) {
        if (store.getters.isAuthenticated) {
            next("/");
            return;
        }
        next();
    } else {
        next();
    }
});

export default router;
