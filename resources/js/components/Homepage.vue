<template>
  <div class="w-full items-center" id="index">
    <div id="content" class="flex justify-center">
      <!-- Home Left-->
      <div v-if="currentPage == 'home'" class="w-1/2 text-center pt-8">
        <div class="text-3xl text-teal-200">Dedicated to helping you</div>
        <div class="font-black text-5xl text-teal-100">Cure your Procrastination</div>
        <div class="p-2 text-lg text-white">
          <button class="mx-3 focus:outline-none" @click="currentPage = 'clock'">
            <img class="h-32" :src="'storage/defaults/alarm.svg'" alt />Clock
          </button>
          <button class="mx-3 focus:outline-none" @click="currentPage = 'todo'">
            <img class="h-32" :src="'storage/defaults/today.svg'" alt />To Do List
          </button>
          <button class="mx-3 focus:outline-none" @click="currentPage = 'relax'">
            <img class="h-32" :src="'storage/defaults/relax.svg'" alt />Relax
          </button>
          <button class="mx-3 focus:outline-none" @click="currentPage = 'articles'">
            <img class="h-32" :src="'storage/defaults/read.svg'" alt />Articles
          </button>
        </div>
      </div>

      <!-- Home Right-->
      <div
        v-if="currentPage == 'home'"
        class="w-1/2 h-1/2"
        id="main_img"
        :style="{ backgroundImage: 'url(' + 'storage/defaults/work.jpg' + ')' }"
      ></div>

      <!-- clock -->
      <div
        v-if="currentPage == 'clock'"
        id="clock"
        :style="{ backgroundImage: 'url(' + 'storage/defaults/clock.jpg' + ')' }"
        class="w-full h-full m-0 text-right py-4 px-8"
      >
        <div class="text-6xl text-blue-800">Tomato Clock</div>
        <div class="text-2xl text-blue-900">
          Can not manage your working time and break time?
          <br />This customizable clock and help you with that.
          <br />The best feature is that you can choosing alarm sound.
          <br />No more annoying alarm clock ring.
        </div>
        <div class="mt-3">
          <button
            class="m-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
          >
            <a href="/clock">Try it now</a>
          </button>
          <button
            class="m-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
          >
            <a href="https://en.wikipedia.org/wiki/Pomodoro_Technique">Wikipedia</a>
          </button>
        </div>
      </div>

      <!-- todo-->
      <div
        v-if="currentPage == 'todo'"
        id="todolist"
        class="w-full h-full m-0 text-center py-4 px-8"
        :style="{ backgroundImage: 'url(' + 'storage/defaults/todo2.jpg' + ')' }"
      >
        <div class="text-6xl text-blue-200 font-bold">To Do List</div>
        <div class="text-2xl text-blue-200 font-bold">
          The most straight way to stop procrastination is
          <br />just start do what you should do.
          <br />But as we know,
          <br />it sounds simple and it's the hardest part.
          <br />Maybe try writing down your quests first. Hope this can help!
        </div>
        <div class="mt-3">
          <button
            class="m-2 bg-blue-100 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
          >
            <a href="/todo">Try it now</a>
          </button>
        </div>
      </div>

      <!-- relax-->
      <div
        v-if="currentPage == 'relax'"
        id="home_relax"
        class="w-full h-full m-0 text-right py-2 px-8"
        :style="{ backgroundImage: 'url(' + 'storage/defaults/relax.jpg' + ')' }"
      >
        <div class="text-4xl font-bold">
          <span>Relax And Refill Energy</span>
        </div>
        <div class="text-2xl font-bold">
          <span>
            Another excuese to take a break?
            <br />Watching cute cats can increases productivity!
            <br />Come back here whenever you're tired.
            <br />Have fun with cats and you're ready for next fighting!
          </span>
        </div>
        <div class="mt-3">
          <button
            class="m-2 bg-blue-100 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
          >
            <a href="/relax">Make Sure Working First</a>
          </button>
        </div>
      </div>

      <!-- articles-->
      <div
        v-if="currentPage == 'articles'"
        :style="{ backgroundImage: 'url(' + 'storage/defaults/read.jpg' + ')' }"
        id="home_articles"
        class="w-full h-full m-0 text-left py-2 px-8"
      >
        <div class="text-6xl text-green-200 font-bold">Articles</div>
        <div class="text-2xl text-green-200 font-bold">
          Procrastination is not only a term to be a excuse for being lazy.
          <br />There are many research and science explanation
          <br />To fight procrastination,
          <br />You have to know the enemy, know yourself.
          <br />Don't forget use the methods that you learn in real life!
        </div>
        <div class="mt-3">
          <button
            class="m-2 bg-blue-100 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
          >
            <a href="/articles">Start Learning</a>
          </button>
        </div>
      </div>
    </div>
    <div id="slidebar" class="flex justify-center items-center">
      <button class="focus:outline-none" @click="currentPage = 'home'"></button>
      <button class="focus:outline-none" @click="currentPage = 'clock'"></button>
      <button class="focus:outline-none" @click="currentPage = 'todo'"></button>
      <button class="focus:outline-none" @click="currentPage = 'relax'"></button>
      <button class="focus:outline-none" @click="currentPage = 'articles'"></button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Homepage",
  computed: {},
  mounted: function() {},
  data: function() {
    return {
      currentPage: "home"
    };
  }
};
</script>

<style scoped>
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

#clock {
  background-size: cover;
}

#todolist {
  background-size: cover;
  text-shadow: 2px 2px 5px rgb(48, 79, 90);
}
#home_articles {
  background-size: cover;
  text-shadow: 2px 2px 5px rgb(43, 94, 72);
}

#home_relax {
  background-size: cover;
  color: rgb(4, 33, 47);
}

#home_relax span {
  color: rgb(227, 242, 242);
  background-color: rgba(36, 79, 81, 0.7);
  border: 2px solid rgba(36, 79, 81, 0.7);
  border-radius: 20px;
  background-clip: padding-box;
  box-shadow: 0px 0px 15px 3px rgba(36, 79, 81, 0.7);
}
</style>
