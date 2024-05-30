export default function({$axios,store}){
    $axios.setHeader('Access-Control-Allow-Origin', '*');
    $axios.setHeader('Request-From', 'client-panel');
    $axios.setHeader('X-Requested-With', 'XMLHttpRequest');
    $axios.onError(error => {  
        if(error.response.status == 422 || error.response.status == 400) {
            store.dispatch("validation/setErrors", error.response.data.errors);
        }
        if(error.response.status == 401){
            store.dispatch("validation/setErrors", error.response.data);
        }
        return Promise.reject(error);
    });

    $axios.onRequest(config => {
        store.dispatch("validation/cleanErrors");        
    });

}