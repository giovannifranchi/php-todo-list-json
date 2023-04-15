const { createApp } = Vue;

createApp({
    data(){
        return {
            apiUrl: 'server.php',
            newTodo: '',
            todos: [],

        }
    },
    methods:{
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
        }
    },
    created(){
        this.getTodos();
    }
}).mount('#app');