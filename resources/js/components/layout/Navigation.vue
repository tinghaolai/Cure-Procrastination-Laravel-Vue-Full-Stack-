<template>
  <div
    class="z-10 fixed left-0 top-0 static container-fluid p-3 content-center rounded"
    :class="{'scrolled': scrollPosition}"
    id="navigation"
  >
    <b-row>
      <b-col class="text-left text-xl font-black">Cure-Procrastination</b-col>
      <b-col class="text-center text-sm m-0" cols="6" :class="{'chinese': ! English}" id="outter">
        <b-row class="row" id="navi_links">
          <b-col class="col-sm text-center">
            <a href="/home">{{get_link_name(0)}}</a>
          </b-col>
          <b-col class="col-sm">
            <a href="/articles">{{get_link_name(1)}}</a>
          </b-col>
          <b-col class="col-sm">
            <a href="/relax">{{get_link_name(2)}}</a>
          </b-col>
          <b-col class="col-sm">
            <a href="/todo">{{get_link_name(3)}}</a>
          </b-col>
          <b-col class="col-sm">
            <a href="/clock">{{get_link_name(4)}}</a>
          </b-col>
        </b-row>
      </b-col>
      <b-col class="text-right">
        <button
          @click="English = ! English"
          class="bg-yellow-500 text-gray-900 hover:bg-yellow-600 active:bg-yellow-700 font-bold py-2 px-4 rounded"
          :class="{'chinese': English}"
        >{{get_link_name(5)}}</button>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  name: "Navigation",
  mounted() {
    window.addEventListener("scroll", this.updateScroll);
  },
  data: function() {
    return {
      English: true,
      transData: [
        ["Home", "Article", "Energy Refill", "To Do List", "Clock", "中文"],
        ["首頁", "文章", "能量補充", "時間規劃", "番茄鬧鐘", "English"]
      ],
      scrollPosition: null
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
      console.log(this.$router.currentRoute.path);
      return this.Link_names[link];
    },
    updateScroll() {
      this.scrollPosition = window.scrollY;
    }
  }
};
</script>

<style scoped>
.chinese {
  font-family: "Helvetica", "微軟正黑體";
}
.scrolled {
  background-color: red;
}
#outter {
  display: flex;
  justify-content: center;
  align-items: center;
}

#navi_links {
  width: 100%;
}
</style>
