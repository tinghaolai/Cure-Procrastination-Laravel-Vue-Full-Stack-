<template>
  <div class="px-6 pt-12 pb-6" id="sidebar-vue">
    <div class="text-3xl pb-2">
      <span class="title">Tag</span>
    </div>
    <div class="text-xl p-2" v-for="(tag, index) in tags" :key="index">
      <a :href="'/tag/' + tag.id">{{tag.name}}</a>
    </div>
    <div class="text-3xl pt-12 pb-4">
      <span class="title">Recently Added</span>
    </div>
    <div class="text-lg p-2" v-for="(article, index) in articles" :key="index">
      <a :href="article.href">{{article.sidebar_title}}</a>
    </div>
  </div>
</template>

<script>
export default {
  name: "Sidebar",
  props: ["articles", "tags"],
  computed: {},
  mounted: function() {},
  data: function() {
    return {};
  }
};
</script>

<style scoped>
</style>
