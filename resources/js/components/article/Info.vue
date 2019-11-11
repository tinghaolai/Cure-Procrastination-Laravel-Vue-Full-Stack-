<template>
  <div class="m-2">
    <b-card
      :title="title"
      img-src="https://picsum.photos/600/300/?image=25"
      img-alt="Image"
      img-top
      tag="article"
      style="max-width: 20rem;"
      class="mb-2"
    >
      <b-card-text>{{this.body.substr(0,100)}}</b-card-text>

      <b-button :href="'/articles/'+id" variant="primary">Read</b-button>
    </b-card>
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
