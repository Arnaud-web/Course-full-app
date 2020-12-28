<template>
    <div>
    <div class="bg-gray-200 w-full rounded" >
        <div class="bg-green-500 text-white rounded text-center trasition-width duration-500" :style="'width:'+ pourcentage + '%'"  >{{ pourcentage }}%
        </div>
    </div>   
    </div>
</template>

<script>
export default {
    props:['watchedEpisodes','episodes'],
    data(){
        return{
            watchedEpisodesData : this.watchedEpisodes
        }
    },
    computed:{
        pourcentage(){
            let filteredEp = this.episodes.filter(courcesEp=>{
                return this.watchedEpisodesData.find(watchedEp=>{
                    return watchedEp.id === courcesEp.id
                })
            })

            return Math.ceil(filteredEp.length /this.episodes.length *100)
        }
    },
    mounted(){
        eventBus.$on('toggleProgress',data => this.watchedEpisodesData=data)
    }
}
</script>