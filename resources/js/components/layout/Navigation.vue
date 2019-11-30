<template>
  <div
    class="z-10 fixed left-0 top-0 static container-fluid content-center"
    :class="{'scrolled': scrollPosition}"
    id="navigation"
  >
    <b-row>
      <b-col class="pt-2 pl-4 pr-3 text-3xl font-black h-20 logo">
        <a href="/home" class="hover:no-underline">Cure-Procrastination</a>
      </b-col>
      <b-col
        class="flex justify-center items-center text-center text-base bold m-0"
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
      <b-col class="mt-3 text-right">
        <button
          @click="English = ! English"
          class="font-bold py-2 px-4 focus:outline-none focus:shadow-outline"
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
        ["Home", "Article", "Energy Refill", "To Do List", "Clock", "Chinese"],
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

#navigation {
  transition: background-color 0.7s;
}
.scrolled {
  background-color: rgb(14, 17, 26);
  transition: background-color 0.5s;
}

.nowBrowsing {
  text-decoration: underline;
}
</style>
