<template>
    <div>
        <div class="info-map">برای دریافت سریع سفارش, آدرس تحویل گیرنده را روی نقشه مشخص کنید</div>
        <l-map
            class="map map2"
            @click="addMarker"
            :zoom="12"
            :center="[lat,lng]">
            <l-tile-layer
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                attribution="&copy; <a href='http://osm.org/copyrighte'>OpenStreetMap</a> contributors"
            />
            <l-marker
                v-if="marked"
                :lat-lng="[lat,lng]"
                :icon="defaultIcon"
            />
        </l-map>
    </div>
</template>

<script>
import {LMap, LTileLayer, LMarker} from "@vue-leaflet/vue-leaflet";
import L from "leaflet";
import "leaflet/dist/leaflet.css"

export default {
    name: "address_map",
    components: {
        LMap,
        LTileLayer,
        LMarker
    },
    computed: {
        address() {
            return this.$parent.address
        }
    },
    data() {
        return {
            lat: 35.757552763570196,
            lng: 51.41000747680664,
            marked: true,
            mapLoading: true,
            defaultIcon: L.icon({
                iconUrl: '/img/map/mark2.png',
                iconSize: [26, 45],
                iconAnchor: [13, 42],
                shadowSize: [41, 41],
                shadowAnchor: [13, 41],
            }),
        }
    },
    methods: {
        addMarker(event) {
            if (!event.latlng) {
                return;
            }
            this.lng = event.latlng.lng
            this.lat = event.latlng.lat
            this.address.lng = this.lng
            this.address.lat = this.lat
            this.marked = true
        }
    },
    mounted() {
        let vm = this
        if (this.address.lat == null)
            this.marked = false
        else {
            setTimeout(function (){
                vm.lng = vm.address.lng
                vm.lat = vm.address.lat
                vm.marked = true
            },500)
        }
    }
}
</script>

<style scoped>

</style>
