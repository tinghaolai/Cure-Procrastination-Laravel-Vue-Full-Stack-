<template>
  <div style="background-color:white;">123</div>
</template>

<script>
window.axios = require("axios");
export default {
  name: "Courage",
  computed: {},
  mounted: function() {
    //如果仍然失敗 才改用vue-resource (Reason: Retiring vue-resource)
    /*
    axios
      .get(
        "https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en"
      )
      .then(response => (this.quoteText = response.quoteText));
*/
    axios
      .get(
        "https://api.nytimes.com/svc/topstories/v2/home.json?api-key=your_api_key"
      )
      .then(response => {
        this.results = response.data.results;
      });
  },
  data: function() {
    return {
      result: [],
      quoteText: null
    };
  }
};
</script>

<style scoped>
</style>
