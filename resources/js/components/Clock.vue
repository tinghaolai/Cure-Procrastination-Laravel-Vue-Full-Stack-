<template>
  <div style="background-color:white;">
    <div class="flex justify-center">
      <div class="w-1/2 bg-blue-900 rounded-lg shadow px-6 py-12 flex flex-col items-center">
        <div class="bg-gray-400 rounded-full flex justify-around p-1">
          <button
            @click="currentFrequency = 'monthly'"
            class="rounded-full text-xs font-bold px-6 py-1 uppercase focus:outline-none"
            :class="currentFrequency == 'monthly' ? 'bg-blue-600 text-gray-200':''"
          >Starter</button>
          <button
            @click="currentFrequency = 'yearly'"
            class="rounded-full text-xs font-bold px-6 py-1 uppercase focus:outline-none"
            :class="currentFrequency == 'yearly' ? 'bg-blue-600 text-gray-200':''"
          >Pro</button>
        </div>
        <div class="flex w-full pt-8 text-center">
          <div class="text-white w-1/2">
            <h1>Starter</h1>
            <ul>
              <li>Benefit1</li>
              <li>Benefit2</li>
              <li>Benefit3</li>
            </ul>
          </div>
          <div class="text-white w-1/2">
            <h1>Starter</h1>
            <ul>
              <li>Benefit1</li>
              <li>Benefit2</li>
              <li>Benefit3</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div>
      <button
        @click="playSound()"
        class="bg-success rounded text-white font-bold hover:bg-dark px-4 py-2"
      >Click</button>
      <div v-if="played">
        <p>Your music played</p>
      </div>
      <img src="http://127.0.0.1:8000/storage/defaults/0bR9RJ4.jpg" alt />
      <img src="/storage/defaults/0bR9RJ4.jpg" alt />
    </div>
  </div>
</template>

<script>
var track = new Audio("/storage/audio/work.wav");

export default {
  name: "Clock",
  computed: {},
  mounted: function() {},
  data: function() {
    return {
      currentFrequency: "monthly",
      played: false
    };
  },
  methods: {
    playSound: function() {
      track.play();
      this.played = true;
    }
  }
};
</script>

<style scoped>
</style>
