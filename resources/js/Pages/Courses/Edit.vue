<template>
  <div>
    <AppLayout>
      <template slot="header">
        <p>Modification de {{ courseData.title }}</p>
      </template>
      <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                Creation de la formation
              </h3>
              <p class="mt-1 text-sm text-gray-600">
                This information will be displayed publicly so be careful what
                you share.
              </p>
              <div
                class="bg-green-200 text-green-600 p-3"
                v-if="$page.flash.success"
              >
                {{ $page.flash.success }}
              </div>
            </div>
          </div>
          <div class="pt-10 mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submit">
              <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label
                        for="company_website"
                        class="block text-sm font-medium text-gray-700"
                      >
                        Titre
                      </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <span
                          class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
                        >
                          titre :
                        </span>
                        <input
                          type="text"
                          name="company_website"
                          id="company_website"
                          class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                          placeholder="title"
                          v-model="courseData.title"
                        />
                      </div>
                    </div>
                  </div>

                  <div>
                    <label
                      for="about"
                      class="block text-sm font-medium text-gray-700"
                    >
                      Description
                    </label>
                    <div class="mt-1">
                      <textarea
                        id="about"
                        name="about"
                        rows="3"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="descr"
                        v-model="courseData.description"
                      ></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                      description de la formation
                    </p>
                    <div class="mb-5">
                      <h2 class="text-2xl">Episodes de la formation</h2>
                      <div
                        v-for="(episode, index) in courseData.episodes"
                        :key="index"
                      >
                        <div class="">
                          <div class="">
                            <label
                              :for="'title-' + index"
                              class="block text-sm font-medium text-gray-700"
                            >
                              Titre de l'épisode N* {{ index + 1 }}
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                              <span
                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
                              >
                                titre :
                              </span>
                              <input
                                type="text"
                                name="company_website"
                                :id="'title-' + index"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="title"
                                v-model="courseData.episodes[index].title"
                              />
                            </div>
                          </div>
                          <div class="">
                            <label
                              :for="'description-' + index"
                              class="block text-sm font-medium text-gray-700"
                            >
                              Description de l'épisode N* {{ index + 1 }}
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                              <span
                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
                              >
                                desc :
                              </span>
                              <textarea
                                name="company_website"
                                :id="'description-' + index"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="description de l'épi..."
                                v-model="courseData.episodes[index].description"
                              ></textarea>
                            </div>
                          </div>
                          <div class="">
                            <label
                              :for="'video_url-' + index"
                              class="block text-sm font-medium text-gray-700"
                            >
                              URL de la video de l'épisode N* {{ index + 1 }}
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                              <span
                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"
                              >
                                http:// :
                              </span>
                              <input
                                type="text"
                                name="company_website"
                                :id="'video_url-' + index"
                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="www.example.com"
                                v-model="courseData.episodes[index].video_url"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button
                    class="bg-green-600 rounded py-2 px-4 text-white"
                    v-if="courseData.episodes.length < 15"
                    @click.prevent="add"
                  >
                    +
                  </button>
                  <button
                    class="bg-red-600 rounded py-2 px-4 text-white"
                    v-if="courseData.episodes.length > 1"
                    @click.prevent="remove"
                  >
                    🗑️
                  </button>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button
                    type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  >
                    Modifier ma formation
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </AppLayout>
  </div>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
  components: {
    AppLayout,
  },
  props: ["course"],
  data() {
    return {
      courseData: this.course,
    };
  },
  methods: {
    submit() {
      this.$inertia.patch("/courses/" + this.courseData.id, this.courseData);
    },
    add() {
      this.courseData.episodes.push({
        title: null,
        description: null,
        video_url: null,
      });
    },
    remove() {
      this.courseData.episodes.pop();
    },
  },
};
</script>