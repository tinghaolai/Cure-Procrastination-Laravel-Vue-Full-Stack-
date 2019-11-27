<template>
  <div
    class="z-10 fixed left-0 top-0 static container-fluid p-3 content-center rounded"
    :class="{'scrolled': scrollPosition}"
    id="navigation"
  >
    <b-row>
      <b-col class="text-left text-xl font-black">Cure-Procrastination</b-col>
      <b-col
        class="flex justify-center items-center text-center text-sm m-0"
        cols="6"
        :class="{'chinese': ! English}"
      >
        <b-row class="row w-full">
          <b-col class="col-sm text-center">
            <a href="/home" :class="{'nowBrowsing': ifSameRoute('/home')}">{{get_link_name(0)}}</a>
          </b-col>
          <b-col class="col-sm">
            <a
              href="/articles"
              :class="{'nowBrowsing': ifSameRoute('/articles')}"
            >{{get_link_name(1)}}</a>
          </b-col>
          <b-col class="col-sm">
            <a href="/relax" :class="{'nowBrowsing': ifSameRoute('/relax')}">{{get_link_name(2)}}</a>
          </b-col>
          <b-col class="col-sm">
            <a href="/todo" :class="{'nowBrowsing': ifSameRoute('/todo')}">{{get_link_name(3)}}</a>
          </b-col>
          <b-col class="col-sm">
            <a href="/clock" :class="{'nowBrowsing': ifSameRoute('/clock')}">{{get_link_name(4)}}</a>
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
    },
    currentRoute: function() {
      return this.$router.currentRoute.path;
    }
  },
  methods: {
    get_link_name: function(link) {
      console.log(this.currentRoute);
      return this.Link_names[link];
    },
    updateScroll() {
      this.scrollPosition = window.scrollY;
    },
    ifSameRoute(routename) {
      if (routename == this.currentRoute) return true;
      return false;
    }
  }
};
</script>

<style scoped>
.chinese {
  font-family: "Helvetica", "微軟正黑體";
}
.scrolled {
  background-color: gray;
  transition: background-color 0.7s;
}

.nowBrowsing {
  text-decoration: underline;
}
</style>
