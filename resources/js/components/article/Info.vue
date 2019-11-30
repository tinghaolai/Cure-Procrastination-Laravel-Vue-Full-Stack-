<template>
  <div class="m-8 w-full" id="Info">
    <div class="md:flex">
      <div class="md:flex-shrink-0">
        <a class="p-0 m-0" :href="article_href">
          <img class="rounded-lg md:w-56" :src="image" />
        </a>
      </div>
      <div class="d:mt-0 md:ml-6">
        <a
          :href="article_href"
          class="title block text-2xl leading-tight font-semibold text-gray-900 hover:underline"
        >{{title}}</a>
        <p class="content mt-2 text-base">{{this.body.substr(0,200)}} ...</p>
        <div
          class="flex justify-end mt-3 uppercase tracking-wide text-sm text-indigo-600 font-bold"
        >
          <span>Tag:</span>
          <span v-for="(tag, index) in tags" :key="index">
            <a :href="'/tag/'+tag.id">{{ tag.name }}</a>
            /
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Info",
  props: ["title", "body", "article_href", "tags", "image"],
  computed: {},
  mounted: function() {
    //console.log(this.image);
  }
};
</script>

<style scoped>
</style>
