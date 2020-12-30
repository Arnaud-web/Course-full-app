<template>
  <div>
    <AppLayout>
      <template slot="header">
        <p>Listes des formation </p>
      </template>
      <div  class = "text-center p-3" >
      <Page :data = "courseList"/>
      </div>
        <div class="flex items-center justify-center ">
      <div class = " bg-gray-100  md:w-4/6 " >
      <div class="py-1 " v-for="(course, key) in courseList.data" :key="key">
        <div class="px-2 bg-white rounded shadow p-4 m-2" >
          <div class="text-sm text-gray-400">
            Mise en ligne par {{ course.user.name }}
          </div>
          <p class="text-gray-500 text-sm">
            {{ course.participants }} paticipant<span
              v-if="parseInt(course.participants) > 1"
              >s</span
            >
          </p>
          <div class="flex justify-between items-center">
            <div class="text-4xl">
              {{ course.title }}
            </div>
            <div class="text-sm text-gray-400">
              {{ course.episodes_count }} épisode{{
                course.episodes_count > 1 ? "s" : ""
              }}
            </div>
          </div>
          <div class="text-sm text-gray-500">
            {{ course.description }}
          </div>
          <div class="flex items-center justify-between">
            <a
              :href="'course/' + course.id"
              class="bg-indigo-400 text-sm text-white px-2 py-2 mt-3 rounded hover:bg-indigo-700 inline-block"
            >
              Voir la formation
            </a>
            <a
              :href="'courses/edit/' + course.id"
              v-if="userId == course.user_id"
              class="bg-gray-400 text-sm text-white px-2 py-2 mt-3 rounded hover:bg-indigo-700 inline-block"
            >
              Modifier la formation
            </a>
          </div>
        </div>
      </div>
      </div>
      </div>
      <Page :data = "courseList"/>
      <h1>Bonjour Courses</h1>
    </AppLayout>
  </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Page from './Page'
export default {
  props: ["courses", "userId"],
  data() {
    return {
      courseList: this.courses,
    };
  },
  components: {
    AppLayout,
    Page
  },
  mounted() {
    console.log(this.courseList);
  },
};
</script>