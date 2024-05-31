export const state = ()=>({
    token:null
})

export const getters = {
    authenticated(state){
        return state.auth.loggedIn;
    },
    user(state){
        return state.auth.user;
    }
    
}

export const mutations = {
    SET_TOKEN(state, token) {
        state.token = token
    },
}