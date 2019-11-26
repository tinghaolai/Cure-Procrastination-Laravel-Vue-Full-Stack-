<template>
  <div class="bg-blue-500">
    <div>To Do List</div>
    <h1>Current time: {{ timestamp }}</h1>
    <span>Thing to do</span>
    <input v-model="thing" type="text" />
    <span>Time to finish</span>
    <timeselector
      v-model="time_origin_format"
      :interval="{h:1, m:1, s:1}"
      returnFormat="H:m"
      @formatedTime="recordTime"
    ></timeselector>
    time:{{time}}
    <button @click="addTodoItem">Add</button>

    <div>
      <ul>
        <li v-for="(item, index) in todoItems" :key="index">
          <span>{{item.thing}}</span>
          <span>Time to finish: {{item.time}}</span>
          <span>Time left: {{secToString(item.time_left)}}</span>
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
      time: null,
      thing: null,
      todoItems: [
        //{ thing: "123456789", time: "8:00", time_left: 0 },
        //{ thing: "234567890", time: "18:00", time_left: 0 },
        //{ thing: "345678901", time: "1:00", time_left: 0 }
      ],
      timestamp: ""
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
        "Hours:" +
        hours +
        "Minutes: " +
        (Math.floor(sec / 60) - hours * 60) +
        " Seconds: " +
        (sec % 60)
      );
    }
  }
};
</script>

<style scoped>
</style>
