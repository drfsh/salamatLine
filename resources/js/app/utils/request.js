export default {
    post: async function (url, form = {}) {
        Object.prototype.toString.call(form) === '[object FormData]' ?
            form.append('api_token', window.api_token) : form['api_token'] = window.api_token
        let {data} = await window.axios.post('/api/' + url, form);

        // if (data.logout){
        //     $.alert('logout')
        //     await this.logout()
        // }
        return data
    },
    delete: async function (url, form = {}) {
        form['api_token'] = window.api_token
        let m = ''
        for (const formKey in form) {
            m += formKey+'='+form[formKey]+'&'
        }
        let {data} = await window.axios.delete('/api/' + url+'?'+m);

        // if (data.logout){
        //     $.alert('logout')
        //     await this.logout()
        // }
        return data
    },
    get: async function (url, form=[]) {
        form['api_token'] = window.api_token
        let m = ''
        for (const formKey in form) {
            m += formKey+'='+form[formKey]+'&'
        }
        let {data} = await window.axios.get('/api/' + url+'?'+m);


        return data
    },
    getWeather5: async function (city,units='metric') {
        let form = {appid: window.KeyWeather, lang: 'fa', q: city,units:units}
        let m = ''
        for (const formKey in form) {
            m += formKey+'='+form[formKey]+'&'
        }


        let data = await fetch('https://api.openweathermap.org/data/2.5/forecast?'+m)
        return await data.json()
    },
    getWeather: async function (city,units='metric') {
        let form = {appid: window.KeyWeather, lang: 'fa', q: city,units:units}
        let m = ''
        for (const formKey in form) {
            m += formKey+'='+form[formKey]+'&'
        }
        let data = await fetch('https://api.openweathermap.org/data/2.5/weather?'+m)
        return await data.json()
    },

    getWeather5_: async function (lat,lon) {
        let form = {appid: window.KeyWeather, lang: 'fa', lat:lat,lon:lon ,units:'metric'}
        let m = ''
        for (const formKey in form) {
            m += formKey+'='+form[formKey]+'&'
        }


        let data = await fetch('https://api.openweathermap.org/data/2.5/forecast?'+m)
        return await data.json()
    },
    getWeather_: async function (lat,lon) {
        let form = {appid: window.KeyWeather, lang: 'fa',  lat:lat,lon:lon,units:'metric'}
        let m = ''
        for (const formKey in form) {
            m += formKey+'='+form[formKey]+'&'
        }
        let data = await fetch('https://api.openweathermap.org/data/2.5/weather?'+m)
        return await data.json()
    },

    logout:async function(){
        await this.get('logout')
    }
}
