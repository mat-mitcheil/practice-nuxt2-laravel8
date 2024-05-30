import Vue from 'vue'
import {mapGetters} from 'vuex'

const Validations = {
    install(Vue, options){
        Vue.mixin({
            computed:{
                ...mapGetters({
                    _errors: 'validation/errors',
                })
            }
        })
    }
};

Vue.use(Validations)