<template>
  <div class="container-fluid p-5 text-center rounded" id="navigation">
    <b-row>
      <b-col class="text-left text-xl font-black">Cure-Procrastination</b-col>
      <b-col class="text-center text-lg" cols="6" :class="{'chinese': ! English}">
        <div class="row">
          <div class="col-sm">
            <a href="/home">{{get_link_name(0)}}</a>
          </div>
          <div class="col-sm">
            <a href="/articles">{{get_link_name(1)}}</a>
          </div>
          <div class="col-sm">
            <a href="/relax">{{get_link_name(2)}}</a>
          </div>
          <div class="col-sm">
            <a href="/todo">{{get_link_name(3)}}</a>
          </div>
          <div class="col-sm">
            <a href="/clock">{{get_link_name(4)}}</a>
          </div>
        </div>
      </b-col>
      <b-col class="text-right">
        <b-button @click="English = ! English" class="bg-yellow-500 text-gray-900">{{lang}}</b-button>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  name: "Navigation",
  data: function() {
    return {
      lang: "Chinese",
      English: true,
      transData: [
        ["Home", "Article", "Energy Refill", "To Do List", "Clock"],
        ["首頁", "文章", "能量補充", "時間規劃", "番茄鬧鐘"]
      ]
    };
  },
  computed: {
    Link_names: function() {
      if (this.English) return this.transData[0];
      else return this.transData[1];
    }
  },
  methods: {
    get_link_name: function(link) {
      return this.Link_names[link];
    }
  }
};
</script>

<style scoped>
.chinese {
  font-family: "Helvetica", "微軟正黑體", sans-serif;
}
</style>
