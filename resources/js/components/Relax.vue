<template>
  <div style="background-color:white;">
    <ul>
      <li v-for="(image, index) in images" :key="index">
        <img :src="image.url" alt />
      </li>
    </ul>
  </div>
</template>

<script>
window.axios = require("axios");
export default {
  name: "Relax",
  computed: {},
  mounted: function() {
    //vue-resource (Reason: Retiring vue-resource)
    //laravel6 issue: barryvdh/laravel-cors   spatie/laravel-cors
    //middleware version也不夠新 不能的話就自己研究原理
    //https://developer.mozilla.org/zh-CN/docs/Web/HTTP/Access_control_CORS
    // https://stackoverflow.com/questions/59050470/laravel-6-cors-policy-issue?noredirect=1#comment104342049_59050470

    /*
    axios
      .get(
        "https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en"
      )
      .then(response => (this.quoteText = response.quoteText));

    axios.get("https://random.dog/woof.json").then(response => {
      console.log(response);
    });
*/
    for (var i = 0; i <= 5; i++) {
      axios.get("https://api.thecatapi.com/v1/images/search").then(response => {
        this.images.push(response.data[0]);
      });
    }
  },
  data: function() {
    return {
      images: [],
      quoteText: null
    };
  }
};
</script>

<style scoped>
</style>
