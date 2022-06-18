import axios from "axios";

const state = {
    user: null,
};
const getters = {
    isAuthenticated: (state) => !!state.user,
    StateUser: (state) => state.user,
};
const actions = {
    async LogIn({ commit }, user) {
        axios
            .post("/api/login", user)
            .then((res) => {
                if (res.data.token) {
                    if (res.data.ban === 0) {
                        if (res.data.active === 1) {
                            localStorage.setItem(
                                "MatarMarketer",
                                JSON.stringify(res.data)
                            );
                            commit("setUser", user.get("email"));
                            document.location.reload();
                        } else {
                            alert("الحساب غير مفعل بعد ، من فضلك راجع الادارة");
                        }
                    } else {
                        alert("تم حظر المستخدم من قبل الادارة");
                    }
                }
            })
            .catch((err) =>
                alert("البريد الالكتروني او كلمة المرور غير صحيحة")
            );
    },
    async LogOut({ commit }) {
        const user = null;
        commit("logout", user);
        localStorage.removeItem("MatarMarketer");
    },
};
const mutations = {
    setUser(state, email) {
        state.user = email;
    },
    logout(state, user) {
        state.user = user;
    },
};
export default {
    state,
    getters,
    actions,
    mutations,
};
