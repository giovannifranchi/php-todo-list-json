const { createApp } = Vue;

createApp({
    data(){
        return {
            user: null,
            password: null,
            currentUser: null,
            apiUrl: 'server.php',
            newTodo: '',
            todos: [],

        }
    },
    methods:{
        login(){
            const payload = {
                action: 'login',
                username: this.user,
                password: this.password,
            };
            const headers = {
                'Content-Type': 'multipart/form-data',
                'Accept': 'application/json',
            };
            axios.post(this.apiUrl, payload, {headers})
            .then((result)=> {
                console.log(result);
                this.user = null;
                this.password = null;
                if(result.data.username){
                    this.currentUser = result.data;
                    //call todos;
                }else {
                    alert('utente non trovato');
                }
            })
        },

        getTodos(){
            axios.get(this.apiUrl).then((result) =>{
                this.todos = result.data;
            });
        },

        addTodo(){
            console.log('addTodo');
            const payload = {
                add: this.newTodo,
            }
            const headers = {
                'Content-Type': 'multipart/form-data',
                'Accept': 'application/json',
            }
            axios.post(this.apiUrl, payload, {headers})
            .then((result)=>{
                this.todos = result.data;
                this.newTodo = '';
            });
        },

        deleteTodo(index){
            console.log('deleteTodo');
            const payload = {
                delete: index,
            };
            const headers = {
                'Content-Type': 'multipart/form-data',
                'Accept': 'application/json',
            };
            axios.post(this.apiUrl, payload, {headers})
            .then((result)=> {
                this.todos = result.data;
            });
        },

        editTodo(index){
            console.log('editTodo');
            const payload = {
                edit: index,
            };
            const headers = {
                'Content-Type': 'multipart/form-data',
                'Accept': 'application/json',
            };
            axios.post(this.apiUrl, payload, {headers})
            .then((result)=>{
                this.todos = result.data;
            });
        }
    }
}).mount('#app');