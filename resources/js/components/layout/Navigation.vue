<template>
  <div class="container-fluid p-5 text-center rounded" id="navigation">
    <b-row>
      <b-col class="text-left text-xl font-black">Cure-Procrastination</b-col>
      <b-col class="text-center text-lg" cols="6">
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
      <b-col class="text-right">3 of 3</b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  name: "Navigation",
  props: ["Link_names"],
  methods: {
    get_link_name: function(link) {
      return this.Link_names.split(".")[link];
    }
  }
};
</script>

<style scoped>
</style>
