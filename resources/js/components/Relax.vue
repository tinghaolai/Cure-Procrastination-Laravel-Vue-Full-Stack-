<template>
  <div class="px-48 my-32 h-auto" id="relax">
    <div class="h-auto">
      <div
        class="gallery h-auto"
        v-for="(image, index) in images"
        :key="index"
        @click="onClick(index)"
      >
        <img :src="image" alt />
      </div>
    </div>
    <vue-gallery-slideshow :images="images" :index="index" @close="index = null"></vue-gallery-slideshow>
  </div>
</template>

<script>
import VueGallerySlideshow from "vue-gallery-slideshow";

window.axios = require("axios");
export default {
  name: "Relax",
  components: {
    VueGallerySlideshow
  },
  computed: {},
  mounted: function() {
    for (var i = 0; i <= 20; i++) {
      axios.get("https://api.thecatapi.com/v1/images/search").then(response => {
        this.images.push(response.data[0].url);
        //console.log(response.data[0].url);
      });
    }
  },
  data: function() {
    return {
      images: [],
      quoteText: null,
      index: 0
    };
  },
  methods: {
    onClick(i) {
      this.index = i;
    }
  }
};
</script>

<style scoped>
.gallery {
  margin: 5px;
  float: left;
  max-width: 300px;
}

img {
  height: 300px;
  width: auto;
  margin: 10px;
  border-radius: 10px;
}
</style>
