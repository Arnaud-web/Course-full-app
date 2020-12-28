<template>
  <div>
    <button
      class="bg-green-500 px-2 py-2 rounded text-white"
      @click="toggleProgress()"
    >
      {{ isWatched ? "Terminé " : "Terminé ?" }}
    </button>
  </div>
</template>

<script>
export default {
  props: ["episodeId", "watchedEpisodes"],
  data() {
    return {
      watchedEp: this.watchedEpisodes,
      isWatched: null,
    };
  },
  methods: {
    toggleProgress() {
      axios
        .post("/toggleProgress", {
          episodeId: this.episodeId,
        })
        .then((response) => {
          if (response.status === 200) {
            this.isWatched = !this.isWatched;
            eventBus.$emit('toggleProgress', response.data)
          }
          console.log(response);
        })
        .catch((error) => console.log(error));
    },
    isWatchedEpisode() {
      return this.watchedEp.find((episode) => episode.id === this.episodeId)
        ? true
        : false;
    },
  },
  mounted() {
    // console.log(this.watchedEp)
    this.isWatched = this.isWatchedEpisode();
  },
};
</script>