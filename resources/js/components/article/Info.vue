<template>
  <div class="m-2">
    <b-card
      :title="title"
      :img-src="image"
      img-alt="Image"
      img-top
      tag="article"
      style="max-width: 20rem;"
      class="mb-2"
    >
      <b-card-text>{{this.body.substr(0,100)}}</b-card-text>
      <div>
        tag:
        <span v-for="(tag, index) in tags" :key="index">
          <a :href="'/tag/'+tag.id">{{ tag.name }}</a>
          /
        </span>
      </div>
      <b-button :href="article_href" variant="primary">Read</b-button>
    </b-card>
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
