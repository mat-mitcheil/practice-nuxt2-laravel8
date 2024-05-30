export default function({store,redirect,route}){

    const excludedRoutes = ['login', 'register'];

    if (!excludedRoutes.includes(route.name)) {

        if(!store.getters['authenticated']){
            redirect('/login');
        }
    }

}