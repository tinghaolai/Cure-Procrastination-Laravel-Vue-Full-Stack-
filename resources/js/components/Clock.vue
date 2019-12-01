<template>
  <div id="clock">
    <div class="flex justify-center">
      <div
        class="relative w-1/2 rounded-lg shadow px-6 py-12 flex flex-col items-center"
        id="shell"
      >
        <span v-if="currentPage == 'timer'">
          <span
            class="text-lg font-extrabold absolute top-0 left-0"
            id="status"
            v-if="intervalPointer"
          >
            <span class="rounded-lg alert-success p-2">Take a break</span>
          </span>
          <span class="text-lg font-extrabold absolute top-0 left-0" id="status" v-else>
            <span class="rounded-lg alert-danger p-2" id="working">Time for Working</span>
          </span>
        </span>
        <div class="bg-gray-400 rounded-full flex justify-around p-1" id="bar">
          <button
            @click="currentPage = 'timer'"
            class="rounded-full text-xs font-bold px-6 py-1 uppercase focus:outline-none"
            :class="currentPage == 'timer' ? 'bg-blue-600 text-gray-200':''"
          >Timer</button>
          <button
            @click="currentPage = 'setting'"
            class="rounded-full text-xs font-bold px-6 py-1 uppercase focus:outline-none"
            :class="currentPage == 'setting' ? 'bg-blue-600 text-gray-200':''"
          >Setting</button>
        </div>
        <!-- Timer -->
        <div class="w-full pt-8 text-white text-center" v-if="currentPage == 'timer'">
          <div class="flex flex-wrap overflow-hidden">
            <div class="w-1/2 overflow-hidden font-bold">Working Time</div>

            <div class="w-1/2 overflow-hidden font-bold">Break Time</div>

            <div class="w-1/2 overflow-hidden font-lg">{{secToString(work_break_Interval[0])}}</div>

            <div class="w-1/2 overflow-hidden font-lg">{{secToString(work_break_Interval[1])}}</div>
          </div>
          <div class="m-5">
            <span class="text-4xl mx-10" id="timeleft">{{formattedTime}}</span>
          </div>

          <div>
            <button class="mx-5 text-lg focus:outline-none" @click="start()">Start</button>
            <button class="mx-5 text-lg focus:outline-none" @click="pause()">Pause</button>
            <button class="mx-5 text-lg focus:outline-none" @click="reset()">Reset</button>
          </div>
        </div>
        <!-- Setting -->
        <div
          id="setting"
          class="w-full pt-8 px-56 text-white text-center"
          v-if="currentPage == 'setting'"
        >
          <div class="text-black">
            <div class="flex justify-between">
              <span v-text="'Working Time: ' + work_break_Interval[0]"></span>
              <Timeselector
                class="Timeselector"
                v-model="time"
                :interval="{h:1, m:1, s:1}"
                :displayHours="false"
                :displaySeconds="true"
                :displayFormat="'mm : ss'"
                returnFormat="m:s:0"
                @formatedTime="recordTime"
              ></Timeselector>
            </div>
            <div class="flex justify-between">
              <span v-text="'Break Time: ' + work_break_Interval[1]"></span>
              <Timeselector
                class="Timeselector"
                v-model="time"
                :interval="{h:1, m:1, s:1}"
                :displayHours="false"
                :displaySeconds="true"
                :displayFormat="'mm : ss'"
                returnFormat="m:s:1"
                @formatedTime="recordTime"
              >></Timeselector>
            </div>
          </div>

          <div class="flex justify-between">
            <span>Work Alarm: {{ work_break_Music[0] }}</span>
            <select
              v-model="work_break_Music[0]"
              class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-0 px-4 pr-0 my-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            >
              <option disabled value>{{work_break_Music[0]}}</option>
              <option>AlarmClock</option>
              <option>AnalogyClock</option>
              <option>ClockTower</option>
              <option>CuckooClock</option>
              <option>DigitalClock</option>
            </select>
          </div>
          <div class="flex justify-between">
            <span>Break Alarm: {{ work_break_Music[1] }}</span>
            <select
              v-model="work_break_Music[1]"
              class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-0 px-4 pr-0 my-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            >
              <option disabled value>{{work_break_Music[1]}}</option>
              <option>AlarmClock</option>
              <option>AnalogyClock</option>
              <option>ClockTower</option>
              <option>CuckooClock</option>
              <option>DigitalClock</option>
            </select>
          </div>
          <div class="flex justify-between items-center">
            <span for="Loop">Loop the Alarm: {{ LoopAlarm }}</span>
            <div class="pt-2">
              <label class="switch" for="Loop">
                <input type="checkbox" id="Loop" v-model="LoopAlarm" />
                <div class="slider round"></div>
              </label>
            </div>
          </div>
        </div>
      </div>
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
  name: "Clock",
  computed: {},
  mounted: function() {},
  data: function() {
    let work_break_Interval = [5, 30];
    let work_break_Music = ["CuckooClock", "DigitalClock"];
    return {
      time: null,
      work_break_Interval: work_break_Interval,
      work_break_Music: work_break_Music,
      intervalPointer: 0,
      currentPage: "timer",
      played: false,
      timerState: "stopped",
      currentTimer: work_break_Interval[0],
      formattedTime: this.formatTime(work_break_Interval[0]),
      ticker: undefined,
      LoopAlarm: false
    };
  },
  methods: {
    recordTime(e) {
      let m_s_stage = e.split(":");
      this.work_break_Interval[m_s_stage[2]] =
        Number(m_s_stage[0]) * 60 + Number(m_s_stage[1]);
      this.reset();
    },
    playSound: function() {
      track.play();
      this.played = true;
    },
    start: function() {
      if (this.timerState != "running") {
        track = new Audio(
          "/storage/audio/" + this.work_break_Music[0] + ".wav"
        );
        track.loop = this.LoopAlarm;
        this.tick();
        this.timerState = "running";
      }
    },
    tick: function() {
      this.ticker = setInterval(() => {
        this.currentTimer--;
        this.formattedTime = this.formatTime(this.currentTimer);

        if (this.currentTimer == 0) {
          window.clearInterval(this.ticker);
          this.intervalPointer = (this.intervalPointer + 1) % 2;
          this.currentTimer = this.work_break_Interval[this.intervalPointer];
          track = new Audio(
            "/storage/audio/" +
              this.work_break_Music[this.intervalPointer] +
              ".wav"
          );
          track.loop = this.LoopAlarm;
          this.tick();
          this.playSound();
          alert("Stop Alert");
          track.pause();
        }
      }, 1000);
    },
    formatTime(seconds) {
      let measuredTime = new Date(null);
      measuredTime.setSeconds(seconds);
      let MHSTime = measuredTime.toISOString().substr(11, 8);
      return MHSTime;
    },
    pause() {
      window.clearInterval(this.ticker);
      this.timerState = "pause";
    },
    reset() {
      window.clearInterval(this.ticker);
      this.intervalPointer = 0;
      this.currentTimer = this.work_break_Interval[0];
      this.formattedTime = this.formatTime(this.currentTimer);
      this.timerState = "stopped";
    },
    secToString(sec) {
      return Math.floor(sec / 60) + " Minutes: " + (sec % 60) + " Seconds";
    }
  }
};
</script>

<style scoped>
</style>
