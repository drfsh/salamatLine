<template>
<div class="item-address">
    <div class="w-100">
        <div class="name">{{value.title}}</div>
        <div class="align-center d-flex more-a">
            <div class="section cities" style="min-width: 25.5%;">
                <div class="item bb"><span>استان : </span> {{value.province.title}}</div>
                <div class="item"><span>شهر محل سکونت : </span> {{value.city.title}}</div>
            </div>
            <div class="section cities" style="min-width: 45%;">
                <div class="item"><span>آدرس : </span> {{value.content}}</div>
                <div class="item"><span>کدپستی : </span> {{value.zipcode}}</div>
            </div>
            <div class="section" style="min-width: 30.5%;">
                <div class="item bb"><span>شماره تلفن همراه : </span> {{value.mobile}}</div>
                <div class="item"><span>آدرس ایمیل : </span> {{value.email}}</div>

            </div>
        </div>
    </div>
    <div class="edit" @click="$parent.edit=value;$parent.page=1">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <g id="vuesax_linear_edit-2" data-name="vuesax/linear/edit-2" transform="translate(-684 -252)">
                <g id="edit-2">
                    <path id="Vector" d="M9.263,1.439l-8.21,8.69a3.05,3.05,0,0,0-.67,1.43L.013,14.8a1.527,1.527,0,0,0,1.87,1.77l3.22-.55a2.871,2.871,0,0,0,1.39-.75l8.21-8.69c1.42-1.5,2.06-3.21-.15-5.3C12.353-.791,10.683-.061,9.263,1.439Z" transform="translate(687.997 254.161)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                    <path id="Vector-2" data-name="Vector" d="M0,0A6.126,6.126,0,0,0,5.45,5.15" transform="translate(695.89 257.05)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                    <path id="Vector-3" data-name="Vector" d="M0,0H18" transform="translate(687 274)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                    <path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(684 252)" fill="none" opacity="0"/>
                </g>
            </g>
        </svg>
    </div>
</div>
</template>

<script>
export default {
    name: "address-card",
    props:['value'],


}
</script>

<style scoped>

</style>
