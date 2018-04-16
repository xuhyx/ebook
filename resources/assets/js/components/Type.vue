<template>
    <div class="list-group">
        <a href="/post" :class="['list-group-item',{active:isActive==0}] ">
            所有
        </a>
        <a v-for="list in lists" :href="'/type/'+list.id" :class="['list-group-item',{active:isActive==list.id}] " >
            {{list.name}}
        </a>
    </div>
</template>

<script>
    export default {
        props:['index','id'],
        data:function(){
            return{
                lists:[],
                curId:0,

            }

        },

        created(){
            axios.get('/types')
                .then(res=>{
                    this.lists=res.data
                });
            this.curId=this.id;
        },
        computed:{
            isActive:function(){
                return this.curId;
            }
        },

    }
</script>

<style scoped>

</style>