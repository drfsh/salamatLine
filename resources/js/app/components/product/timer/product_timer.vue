<template>
    <div class="comment-info">
        <div class="product-info m-0">
            <div class="title2">زمان باقی مانده تا پایان تخقیف</div>
            <div class="timer">
                <div class="item">
                        <span>
                            <ic_clock></ic_clock>
                            <div id="seconds">
                                0
                            </div>
                        </span>
                    <span>ثانیه</span>
                </div>
                <div class="item">
                        <span>
                            <ic_clock></ic_clock>
                            <div id="minutes">
                                0
                            </div>
                        </span>
                    <span>دقیقه</span>
                </div>
                <div class="item">
                        <span>
                            <ic_clock></ic_clock>
                            <div id="hours">
                                0
                            </div>
                        </span>
                    <span>ساعت</span>
                </div>
                <div class="item">
                        <span>
                            <ic_clock></ic_clock>
                            <div id="days">
                                0
                            </div>
                        </span>
                    <span>روز</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {JDate} from 'j-date'
import Ic_clock from "../../icon/ic_clock";
export default {
    name: "product_timer",
    components: {Ic_clock},
    props:['time'],
    data(){
      return{
          timer:null,
      }
    },
    methods:{
        setTime() {
            let vm = this;

            this.timer = setInterval(function () {
                vm.getDate(vm.time)
            }, 1000)
        },
        getDate(time) {
            const jdate = new JDate();
            const date = new Date();
            let ones = 0.000011574074074074073;

            let now = jdate.getFullYear() + '/' + (parseInt(jdate.getMonth())+1) + '/' + jdate.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds()
            let dds = new Date(time)
                - new Date(now)


            if (dds < 0) {
                this.finished = true
            }

            let math = (Math.abs(dds) / 1000 / 60 / 60 / 24);
            let day = parseInt(math)
            let math1;
            math1 = math / ones
            let h = parseInt(math1 / 60 / 60)
            let m = parseInt(math1 / 60)
            let s = math / ones
            if (s >= 60) {
                s = parseInt(s % 60)
            }
            if (m >= 60) {
                m = parseInt(m % 60)
            }
            if (h >= 24) {
                h = parseInt(h % 24)
            }


            let seconds = $('#seconds')
            if (seconds.text()!=s){
                seconds.addClass('hid')
                setTimeout(function () {
                    seconds.removeClass('hid')
                },300)
            }
            seconds.text(s)

            let minutes = $('#minutes')
            if (minutes.text()!=m){
                minutes.addClass('hid')
                setTimeout(function () {
                    minutes.removeClass('hid')
                },300)
            }
            minutes.text(m)

            let hours = $('#hours')
            if (hours.text()!=h){
                hours.addClass('hid')
                setTimeout(function () {
                    hours.removeClass('hid')
                },300)
            }
            hours.text(h)

            let days = $('#days')
            if (days.text()!=day){
                days.addClass('hid')
                setTimeout(function () {
                    days.removeClass('hid')
                },300)
            }
            days.text(day)

        },
    },
    mounted() {
        this.getDate(this.time)
        this.setTime()
    },
    destroyed() {
        clearInterval(this.timer)

    },
}
</script>

<style scoped>

</style>