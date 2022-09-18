<template>
    <l-map
        class="map map2"
        :zoom="12"
        :center="[lat,lng]">
        <l-tile-layer
            url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            attribution="&copy; <a href='http://osm.org/copyrighte'>OpenStreetMap</a> contributors"
        />
        <l-marker
            :lat-lng="[lat,lng]"
            :icon="defaultIcon"
        />
    </l-map>
</template>

<script>
import {LMap, LTileLayer, LMarker} from "@vue-leaflet/vue-leaflet";
import L from "leaflet";
import "leaflet/dist/leaflet.css"
export default {
    components: {
        LMap,
        LTileLayer,
        LMarker
    },
    name: "map_page",
    props:{
        lat:{
            default:35.757552763570196
        },
        lng:{
            default:51.41000747680664
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
    }
}
</script>

<style scoped>

</style>
