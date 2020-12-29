<template>
  <div>
      <div class = "p-1">
      <inertia-link :href="link.url" class = " text-indigo-700 bg-gray-400  border-gray-500 p-1 " v-for="(link,index) in courseList.links" :key="link.label" >
            <span  class = " text-white rounded bg-blue-400 px-1" v-if="index!=0&&index!=courseList.links.length-1" :class = "{'text-white rounded bg-blue-600 py-2 px-4': link.active}" > {{link.label}} </span>
            <span class="text-white rounded bg-blue-400 px-1" v-if="index==0" :class = "{'text-white rounded bg-blue-600 py-2 px-4': link.active}" > < </span>
            <span class = "text-white rounded bg-blue-400 px-1" v-if="index==courseList.links.length-1" :class = "{'text-white rounded bg-blue-600 p-2': link.active}" > > </span>
        </inertia-link>
        </div>
  
  </div>
</template>

<script>

export default {
  props: ["data",],
  data() {
    return {
      courseList: this.data,
    };
  },
  mounted() {
  },
};
</script>