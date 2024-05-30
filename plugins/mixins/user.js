import Vue from 'vue'
import {mapGetters} from 'vuex'

const User = {
    install(Vue, options){
        Vue.mixin({
            computed:{
                ...mapGetters({
                    _authenticated: 'authenticated',
                    _user: 'user',
                })
            }
        })
    }
};

Vue.use(User)