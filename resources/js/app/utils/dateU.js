export default {
    get: function (date) {
        let time = window.moment(date, 'YYYY-MM-DDTH:mm:ss.000000Z').lang('fa');
        if (time.isSame(new Date(), "day")) {
            time = time.format('H:mm')
        } else {
            if (time.isSame(new Date(), "years"))
                time = time.format('MMMM DD')
            else
                time = time.format('DD MMMM YYYY')
        }
        return time
    },
    getDH: function (date, m = 'MMMM') {
        let time = window.moment(date, 'YYYY-MM-DDTH:mm:ss.000000Z').lang('fa');
        if (time.isSame(new Date(), "day")) {
            time = time.format('H:mm')
        } else {
            time = time.format('DD ' + m + ' , H:mm')
        }
        return time
    },
    get2: function (date) {
        let time = window.moment(date, 'YYYY-MM-DDTH:mm:ss.000000Z').lang('fa');
        if (time.isSame(new Date(), "day")) {
            time = time.format('H:mm')
        } else {
            time = time.format('YYYY/DD/MM')
        }
        return time
    },
    get3: function (date) {
        let time = window.moment(date, 'YYYY-MM-DDTH:mm:ss.000000Z').lang('fa');
        time = time.format('H:mm YYYY/DD/MM ')
        return time
    },
    getD: function (date) {
        let time = window.moment(date, 'jYYYY/jMM/jDD').lang('fa');
        time = time.format('DD MMMM')
        return time
    },
    getH: function (date) {
        let time = window.moment(date, 'YYYY-MM-DDTH:mm:ss.000000Z').lang('fa');
        time = time.format('H:mm')
        return time
    },
    getDay: function (date) {
        let time = window.moment(date, 'YYYY-MM-DDTH:mm:ss.000000Z').lang('fa');
        time = time.format('DD MMMM')
        return time
    },
    isToday: function (date, date2) {
        let time = window.moment(date, 'YYYY-MM-DDTH:mm:ss.000000Z').lang('fa');
        let time2 = window.moment(date2, 'YYYY-MM-DDTH:mm:ss.000000Z').lang('fa');
        return time.isSame(time2, "day");
    },
    now: function () {
        return window.moment().lang('en').format('YYYY-MM-DDTH:mm:ss.000000') + 'Z';
    },
    isOnline(date) {
        let time = window.moment(date, 'YYYY-MM-DDTH:mm:ss.000000Z').lang('fa');
        // return time.isSame(window.moment(),'minute')
        return time.isAfter(window.moment().add(-15, 'second'), "second") && time.isBefore(window.moment().add(15, 'second'), "second");
    },
    duration(start, end) {
        start = window.moment(start, 'jYYYY/jMM/jDD').lang('fa');
        end = window.moment(end, 'jYYYY/jMM/jDD').lang('fa');

        let duration = window.moment.duration(end.diff(start))
        let day = duration.asDays()
        return day
    }
}
