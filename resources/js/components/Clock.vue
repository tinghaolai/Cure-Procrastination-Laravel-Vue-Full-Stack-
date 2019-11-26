<template>
  <div style="background-color:white;">
    <div class="flex justify-center">
      <div class="w-1/2 bg-blue-900 rounded-lg shadow px-6 py-12 flex flex-col items-center">
        <div class="bg-gray-400 rounded-full flex justify-around p-1">
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
          <div class="w-full">Time Interval</div>
          <div>Working Time: {{secToString(work_break_Interval[0])}} seconds</div>
          <div>Break Time: {{secToString(work_break_Interval[1])}} seconds</div>
          <div class="alert-success" v-if="intervalPointer">Take a break</div>
          <div class="alert-danger" v-else>Time for Working</div>

          <div>{{formattedTime}}</div>
          <button @click="start()">Start</button>
          <button @click="pause()">Pause</button>
          <button @click="reset()">Reset</button>
        </div>
        <!-- Setting -->
        <div class="w-full pt-8 text-white text-center" v-if="currentPage == 'setting'">
          <input type="checkbox" id="Loop" v-model="LoopAlarm" />
          <label for="Loop">Loop the Alarm: {{ LoopAlarm }}</label>
          <div>
            <select v-model="work_break_Music[0]">
              <option disabled value>{{work_break_Music[0]}}</option>
              <option>AlarmClock</option>
              <option>AnalogyClock</option>
              <option>ClockTower</option>
              <option>CuckooClock</option>
              <option>DigitalClock</option>
            </select>
            <span>Work Alarm: {{ work_break_Music[0] }}</span>
          </div>
          <div>
            <select v-model="work_break_Music[1]">
              <option disabled value>{{work_break_Music[1]}}</option>
              <option>AlarmClock</option>
              <option>AnalogyClock</option>
              <option>ClockTower</option>
              <option>CuckooClock</option>
              <option>DigitalClock</option>
            </select>
            <span>Break Alarm: {{ work_break_Music[1] }}</span>
          </div>
          <div class="text-black">
            <div v-text="'Working Time: ' + work_break_Interval[0]"></div>
            <Timeselector
              v-model="time"
              :interval="{h:1, m:1, s:1}"
              :displayHours="false"
              :displaySeconds="true"
              :displayFormat="'mm : ss'"
              returnFormat="m:s:0"
              @formatedTime="recordTime"
            >></Timeselector>
            <div v-text="'Break Time: ' + work_break_Interval[1]"></div>
            <Timeselector
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
      return "Minutes: " + Math.floor(sec / 60) + " Seconds: " + (sec % 60);
    }
  }
};
</script>

<style scoped>
</style>
