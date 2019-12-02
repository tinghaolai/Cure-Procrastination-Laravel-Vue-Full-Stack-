<template>
  <div class="w-full items-center" id="index">
    <div id="content" class="flex justify-center">
      <div class="w-1/2 text-center p-3">
        <div class="text-3xl text-teal-200">Dedicated to helping you</div>
        <div class="font-black text-5xl text-teal-100">Cure your Procrastination</div>
        <div class="p-2 text-lg text-white">
          <button class="mx-3">
            <img class="h-32" :src="'storage/defaults/alarm.svg'" alt />Clock
          </button>
          <button class="mx-3">
            <img class="h-32" :src="'storage/defaults/today.svg'" alt />To Do List
          </button>
          <button class="mx-3">
            <img class="h-32" :src="'storage/defaults/relax.svg'" alt />Relax
          </button>
          <button class="mx-3">
            <img class="h-32" :src="'storage/defaults/read.svg'" alt />Articles
          </button>
        </div>
      </div>
      <div
        class="w-1/2 h-1/2"
        id="main_img"
        :style="{ backgroundImage: 'url(' + 'storage/defaults/work.jpg' + ')' }"
      ></div>
    </div>
    <div id="slidebar" class="flex justify-center items-center">
      <button></button>
      <button></button>
      <button></button>
      <button></button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Homepage",
  computed: {},
  mounted: function() {},
  data: function() {
    return {};
  }
};
</script>

<style scoped>
#index {
}
#slidebar button {
  border: 2px rgb(182, 231, 208);
  background-color: rgb(182, 231, 208);
  border-radius: 100%;
  height: 10px;
  width: 10px;
  margin: 10px;
}

#content {
  background-image: linear-gradient(45deg, rgb(55, 96, 144), rgb(65, 130, 200));
  height: 390px;
}

#main_img {
  max-width: 100%;
  max-height: 100%;
  opacity: 0.9;
}
</style>
