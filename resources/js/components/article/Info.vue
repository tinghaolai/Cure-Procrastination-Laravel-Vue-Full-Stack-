<template>
  <div>
    <a :href="'articles/'+id">{{this.title}}</a>
  </div>
</template>

<script>
export default {
  name: "Info",
  props: ["title", "body", "id"]
};
</script>

<style scoped>
</style>
