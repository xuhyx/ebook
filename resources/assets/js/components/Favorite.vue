<template>
    <div>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(post_id)">
            <span class="fa fa-heart">取消收藏</span>
        </a>
        <a href="#" v-else @click.prevent="favorite(post_id)">
            <span class="fa fa-heart-o">收藏</span>
        </a>
    </div>
</template>

<script>
    export default {
        props:['post_id','favorited'],
        data:function(){
            return{
                isFavorited:'',
            }
        },
        mounted(){
            this.isFavorited=this.favorited
        },
        methods:{
            favorite(post_id){
                axios.get('/favorite/'+post_id)
                    .then(res=>{
                        this.isFavorited=true;
                    })
            },
            unFavorite(post_id){
                axios.get('unfavorite/'+post_id)
                    .then(res=>{
                        this.isFavorited=false;
                    })
            }
        }
    }
</script>
<style>

</style>
