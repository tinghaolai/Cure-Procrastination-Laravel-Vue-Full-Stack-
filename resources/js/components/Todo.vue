<template>
  <div class="m-5 p-5 text-center" id="todo">
    <div class="text-3xl font-bold" id="title">To Do List</div>
    <div id="now">
      <span class="text-xl mr-2">Current time:</span>
      <span class="text-xl">{{ timestamp }}</span>
    </div>
    <div class="py-2 px-40 m-2 text-lg" id="add">
      <div class="form-text m-2">Thing to do</div>
      <input
        class="appearance-none block w-full bg-gray-00 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        id="grid-city"
        type="text"
        placeholder="Write My Homework"
        v-model="thing"
      />
      <div class="form-text m-2">Time to finish</div>
      <div class="flex justify-center">
        <timeselector
          v-model="time_origin_format"
          :interval="{h:1, m:1, s:1}"
          returnFormat="H:m"
          @formatedTime="recordTime"
        ></timeselector>
      </div>

      <button
        @click="addTodoItem"
        class="m-10 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
      >Add</button>

      <button
        @click="saveCookie"
        class="m-10 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
      >Save Schedule</button>

      <button
        @click="readCookie"
        class="m-10 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
      >Load Schedule</button>
    </div>

    <div>
      <ul>
        <li
          class="flex justify-center items-center text-center m-5"
          v-for="(item, index) in todoItems"
          :key="index"
        >
          <button
            :id="index"
            @click="clearQuest($event)"
            class="done focus:outline-none stext-base mx-2 font-bold py-2 px-4 rounded-full h-16 w-16 flex items-center justify-center"
          >Done</button>
          <timeselector :interval="{h:1, m:1, s:1}" returnFormat="H:m" @formatedTime="recordTime"></timeselector>
          <button
            :id="index"
            @click="changeDeadLine($event)"
            class="focus:outline-none bg-red-300 text-base mx-2 font-bold py-2 px-4 rounded-full h-16 w-16 flex items-center justify-center"
          >Change</button>
          <span class="text-lg inline-flex items-center px-4 py-2 m-3 deadline" v-text="item.time"></span>

          <span class="mx-2 inline-block w-3/4">
            <div
              class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-2 py-1 shadow-md"
              role="alert"
            >
              <div class="flex">
                <div class="w-full">
                  <div class="w-full flex justify-end">
                    <div
                      class="w-1/4 bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded"
                      role="alert"
                    >
                      <strong class="font-bold">Time left:</strong>
                      <span>{{secToString(item.time_left)}}</span>
                    </div>
                  </div>
                  <div class="w-full flex justify-start">
                    <span class="text-2xl quest font-extrabold">Quest {{index+1}}:</span>
                    <span class="text-lg inline-flex items-end quest-name">{{item.thing}}</span>
                  </div>
                </div>
              </div>
            </div>
          </span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
var track;

import Timeselector from "vue-timeselector";

export default {
  components: {
    Timeselector
  },
  name: "Todo",
  created() {
    setInterval(this.getNow, 1000);
  },
  computed: {},
  mounted: function() {},
  data: function() {
    return {
      time_origin_format: null,
      time: "0:0",
      thing: null,
      todoItems: [
        {
          thing: "123456789wefwegww",
          time: "8:00",
          time_left: 0
        },
        { thing: "234567890", time: "18:00", time_left: 0 },
        { thing: "345678901", time: "1:00", time_left: 0 }
      ],
      timestamp: "1970-01-01 00:00:00"
    };
  },
  methods: {
    getNow: function() {
      const today = new Date();
      const date =
        today.getFullYear() +
        "-" +
        (today.getMonth() + 1) +
        "-" +
        today.getDate();
      const time =
        today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      const dateTime = date + " " + time;
      this.timestamp = dateTime;

      for (var i = 0; i < this.todoItems.length; i++) {
        this.todoItems[i].time_left -= 1;
      }
      //console.log(this.todoItems[0].time_left);
    },
    addTodoItem: function() {
      let time_left = this.countTimeLeft();

      this.todoItems.push({
        thing: this.thing,
        time: this.time,
        time_left: time_left
      });
    },
    recordTime(e) {
      this.time = e;
    },
    secToString(sec) {
      if (sec <= 0) {
        return "Times up";
      }
      let hours = Math.floor(sec / 3600);
      return (
        hours + ":" + (Math.floor(sec / 60) - hours * 60) + ":" + (sec % 60)
      );
    },
    clearQuest(event) {
      this.todoItems.splice(event.currentTarget.id, 1);
    },
    changeDeadLine(event) {
      console.log(this.todoItems[event.currentTarget.id].time);
      this.todoItems[event.currentTarget.id].time = this.time;
      this.todoItems[event.currentTarget.id].time_left = this.countTimeLeft();
    },
    countTimeLeft() {
      let h_m = this.time.split(":");
      let sec = Number(h_m[0]) * 3600 + Number(h_m[1]) * 60;
      const today = new Date();
      let time_left =
        sec -
        today.getHours() * 3600 -
        today.getMinutes() * 60 -
        today.getSeconds();
      if (time_left < 0) {
        time_left += 86400;
      }
      return time_left;
    },
    saveCookie() {
      document.cookie = "schedule=" + JSON.stringify(this.todoItems);
    },
    readCookie() {
      var ca = document.cookie.split(";");
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") c = c.substring(1, c.length);
        if (c.indexOf("schedule=") === 0) {
          this.todoItems = JSON.parse(c.substring(9, c.length));
        }
      }
    }
  }
};
</script>

<style scoped>
</style>
