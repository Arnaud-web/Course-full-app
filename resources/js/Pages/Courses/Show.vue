<template>
  <div>
    <AppLayout>
      <template slot="header">
        <p>{{ course.title }}</p>
      </template>
      <div class="py-4 mx-15">
        <div class="text-sm text-gray-500">
          <h3>Episode N* {{ currentKey + 1 }}</h3>
          <h2>{{ course.episodes[currentKey].title }}</h2>
          <p>lien : {{ course.episodes[currentKey].video_url }}</p>
        </div>
        <iframe
          class="w-full h-screen"
          :src="course.episodes[currentKey].video_url"
          frameborder="0"
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
        >
        </iframe>
        <div class="text-sm text-gray-500">
          {{ course.episodes[currentKey].description }}
        </div>
        <div class="mtma-10">
          <ul v-for="(episode, index) in course.episodes" :key="episode.id">
            <li class="mt-2 flex justify-between items-center">
              <div>
                Episode N* {{ index + 1 }} - {{ episode.title }}
                <button
                  class="text-gray-500 focus:text-green-500"
                  @click="switchEpisode(index)"
                >
                  Voir l'épisode
                </button>
              </div>

              <ProgressButton :episodeId ="episode.id" :watchedEpisodes="watched" />
            </li>
          </ul>
        </div>
      </div>
    </AppLayout>
  </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ProgressButton from "./ProgressButton.vue";

export default {
  props: ["course","watched"],
  data() {
    return {
      currentKey: 0,
    };
  },
  methods: {
    switchEpisode(index) {
      this.currentKey = index;

      window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth",
      });
    },
  },
  components: {
    AppLayout,
    ProgressButton,
  },
  mounted() {
    console.log(this.course);
  },
};
</script>