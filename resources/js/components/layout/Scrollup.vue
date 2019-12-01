<template>
  <button @click="top()" :class="{'scrolled': scrollPosition > 400 }">
    <i class="fa fa-angle-up fa-3x" aria-hidden="true"></i>
  </button>
</template>

<script>
export default {
  name: "Scrollup",
  data: function() {
    return {
      scrollPosition: null
    };
  },
  mounted() {
    window.addEventListener("scroll", this.updateScroll);
  },
  methods: {
    updateScroll() {
      this.scrollPosition = window.scrollY;
    },
    top() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  }
};
</script>

<style scoped>
button {
  visibility: hidden;
  position: fixed;
  bottom: 35px;
  right: 45px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: rgba(152, 178, 185, 0.5);
  color: white;
  cursor: pointer;
  padding: 6px 10px 6px 10px;
  border-radius: 10px;
  opacity: 0;
  transition: visibility 0.5s, opacity 0.5s linear;
}
.scrolled {
  visibility: visible;
  opacity: 1;
}
.fa {
  color: rgba(5, 9, 11, 0.5);
}
</style>
