<template>
    <div class="box shadow rounded hover space">
        <div class="heading">
            <h4>مشخصات لندینگ</h4>
        </div>
        <div class="content">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-6">
                    <label>
                        نام لندینگ
                        <input type="text" v-model="name">
                    </label>
                </div>
                <div class="cell medium-6">
                    <label>
                        آدرس صفحه
                        <div class="slug-landing">
                            <span>https://salamatline.com/landing/</span>
                            <input type="text" v-model="slug">
                        </div>
                    </label>
                </div>

                <div class="cell medium-6">
                    <label>
                        MetaDesc
                        <textarea rows="3" v-model="metadesc"></textarea>
                    </label>
                </div>
                <div class="cell medium-6">
                    <label>
                        کلمات کلیدی
                        <textarea rows="3" v-model="keywords"></textarea>
                    </label>
                </div>
                <div class="cell medium-6">
                    <label>
                        فعال
                        <input type="checkbox" v-model="active">
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>
    <div class="box shadow rounded hover space">
        <div class="heading">
            <h4>چیدمان صفحه</h4>
        </div>
        <div class="content">
            <div class="grid-x grid-padding-x">
                <div class="grid-x grid-padding-x bg-banner"
                     :style="'background:'+s1.style.mainBackground">
                    <div class="cell small-12 menus">
                        <i @click="editBg(1)"
                           class="fas fa-edit icon"></i>

                        <i v-if="s1.items.length!==1" @click="downColSize(1)" class="fas fa-chevron-right icon"></i>
                        <i v-if="s1.items.length!==1" @click="upColSize(1)" class="fas fa-chevron-left icon"></i>

                        <div class="slid-col">
                            <i class="fas fa-list icon"></i>
                            <div class="menu">
                                <div :class="{active:s1.items.length===1}"
                                     @click="change1Col(1)" class="item _1">
                                    <span style="width: 25px;background: #979797;"></span>
                                </div>
                                <div :class="{active:s1.items.length==2&&s1.items[0].size===4&&s1.items[1].size===8}"
                                     @click="changeCol(1,4,8)" class="item _1">
                                    <span style="width: 14px;background: #979797;"></span>
                                    <span style="width: 10px;"></span>
                                </div>
                                <div :class="{active:s1.items.length==2&&s1.items[0].size===6&&s1.items[1].size===6}"
                                     @click="changeCol(1,6,6)" class="item _1">
                                    <span style="background: #b5b5b5;"></span>
                                    <span></span>
                                </div>
                                <div :class="{active:s1.items.length==2&&s1.items[0].size===8&&s1.items[1].size===4}"
                                     @click="changeCol(1,8,4)" class="item _1">
                                    <span style="width: 10px;background: #b5b5b5;"></span>
                                    <span style="width: 14px;background: #979797;"></span>
                                </div>
                                <div :class="{active:s1.items.length===3}" @click="change3Col(1)" class="item _1">
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                </div>

                            </div>
                        </div>

                        <i v-if="s1.items.length===3" @click="downColSize3(1)" class="fas fa-chevron-right icon"></i>
                        <i v-if="s1.items.length===3" @click="upColSize3(1)" class="fas fa-chevron-left icon"></i>

                    </div>
                    <div v-for="(banner , i) in s1.items" class="cell mt-3" :class="'medium-'+banner.size">
                        <div class="banner-session">
                            <i v-if="banner.type" @click="sessionSetup(1,false,i)"
                               class="fas fa-edit change-size--banner"></i>
                            <div class="body" v-if="banner.type">
                                <img v-if="banner.imgPath" :src="banner.imgPath"
                                     :class="banner.type">
                                <div v-if="banner.type==='text'">
                                    <div
                                        :style="'color: '+banner.titleColor+';'+'font-size: '+banner.titleSize+'px'">
                                        {{ banner.title }}
                                    </div>
                                    <div
                                        :style="'color: '+banner.valueColor+';'+'font-size: '+banner.valueSize+'px'">
                                        {{ banner.value }}
                                    </div>
                                </div>
                            </div>
                            <div v-else class="install-banner">
                                <div>آماده سازی جایگاه {{ i + 1 }}</div>
                                <div class="text">فرمت جایگاه را انتخاب کنید</div>
                                <div>
                                    <button @click="setupText(1,i)" type="button" class="btn btn-blue">متن</button>
                                    <button @click="setupBanner(1,i)" type="button" class="btn btn-blue">بنر</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="grid-x grid-padding-x bg-banner"
                     :style="'background:'+s2.style.mainBackground">
                    <div class="cell small-12 menus">
                        <i @click="editBg(2)"
                           class="fas fa-edit icon"></i>

                        <i v-if="s2.items.length!==1" @click="downColSize(2)" class="fas fa-chevron-right icon"></i>
                        <i v-if="s2.items.length!==1" @click="upColSize(2)" class="fas fa-chevron-left icon"></i>

                        <div class="slid-col">
                            <i class="fas fa-list icon"></i>
                            <div class="menu">
                                <div :class="{active:s2.items.length===1}"
                                     @click="change1Col(2)" class="item _1">
                                    <span style="width: 25px;background: #979797;"></span>
                                </div>
                                <div :class="{active:s2.items.length===2&&s2.items[0].size===4&&s2.items[1].size===8}"
                                     @click="changeCol(2,4,8)" class="item _1">
                                    <span style="width: 14px;background: #979797;"></span>
                                    <span style="width: 10px;"></span>
                                </div>
                                <div :class="{active:s2.items.length===2&&s2.items[0].size===6&&s2.items[1].size===6}"
                                     @click="changeCol(2,6,6)" class="item _1">
                                    <span style="background: #b5b5b5;"></span>
                                    <span></span>
                                </div>
                                <div :class="{active:s2.items.length===2&&s2.items[0].size===8&&s2.items[1].size===4}"
                                     @click="changeCol(2,8,4)" class="item _1">
                                    <span style="width: 10px;background: #b5b5b5;"></span>
                                    <span style="width: 14px;background: #979797;"></span>
                                </div>
                                <div :class="{active:s2.items.length===3}" @click="change3Col(2)" class="item _1">
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                </div>

                            </div>
                        </div>

                        <i v-if="s2.items.length===3" @click="downColSize3(2)" class="fas fa-chevron-right icon"></i>
                        <i v-if="s2.items.length===3" @click="upColSize3(2)" class="fas fa-chevron-left icon"></i>

                    </div>
                    <div v-for="(banner , i) in s2.items" class="cell mt-3" :class="'medium-'+banner.size">
                        <div class="banner-session">
                            <i v-if="banner.type" @click="sessionSetup(2,false,i)"
                               class="fas fa-edit change-size--banner"></i>
                            <div class="body" v-if="banner.type">
                                <img v-if="banner.imgPath" :src="banner.imgPath"
                                     :class="banner.type">
                                <div v-if="banner.type==='text'">
                                    <div
                                        :style="'color: '+banner.titleColor+';'+'font-size: '+banner.titleSize+'px'">
                                        {{ banner.title }}
                                    </div>
                                    <div
                                        :style="'color: '+banner.valueColor+';'+'font-size: '+banner.valueSize+'px'">
                                        {{ banner.value }}
                                    </div>
                                </div>
                            </div>
                            <div v-else class="install-banner">
                                <div>آماده سازی جایگاه {{ i + 3 }}</div>
                                <div class="text">فرمت جایگاه را انتخاب کنید</div>
                                <div>
                                    <button @click="setupText(2,i)" type="button" class="btn btn-blue">متن</button>
                                    <button @click="setupBanner(2,i)" type="button" class="btn btn-blue">بنر</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="cell grid-x grid-padding-x" style="width: 100%;margin: 0;padding: 0;">
                    <div class="cell mt-3 small-12">
                        <div class="product-session" @click="productSetup(1)">
                            <div style="text-align: center;">
                                <div style="font-size: 17px;">آماده سازی جایگاه ۱ محصولات</div>
                                <img style="width: 104px;" src="/img/page/empty-cart.svg"/>
                            </div>
                        </div>
                    </div>
                    <div v-if="products1.length>0" class="cell small-12 menus">
                        <i @click="closeProducts(1)"
                           class="fas fa-times icon"></i>
                    </div>

                    <div class="cell mt-3 small-6 medium-6 large-3" v-for="(v,i) in productsShow1">
                        <div class="product-session" @click="productEdit(1,i)">
                            <img :src="v.tiny">
                            <div>
                                <div>{{ v.title }}</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="grid-x grid-padding-x bg-banner"
                     :style="'background:'+s3.style.mainBackground">
                    <div class="cell small-12 menus">
                        <i @click="editBg(3)"
                           class="fas fa-edit icon"></i>

                        <i v-if="s3.items.length!==1" @click="downColSize(3)" class="fas fa-chevron-right icon"></i>
                        <i v-if="s3.items.length!==1" @click="upColSize(3)" class="fas fa-chevron-left icon"></i>

                        <div class="slid-col">
                            <i class="fas fa-list icon"></i>
                            <div class="menu">
                                <div :class="{active:s3.items.length===1}"
                                     @click="change1Col(3)" class="item _1">
                                    <span style="width: 25px;background: #979797;"></span>
                                </div>
                                <div :class="{active:s3.items.length==2&&s3.items[0].size===4&&s3.items[1].size===8}"
                                     @click="changeCol(3,4,8)" class="item _1">
                                    <span style="width: 14px;background: #979797;"></span>
                                    <span style="width: 10px;"></span>
                                </div>
                                <div :class="{active:s3.items.length==2&&s3.items[0].size===6&&s3.items[1].size===6}"
                                     @click="changeCol(3,6,6)" class="item _1">
                                    <span style="background: #b5b5b5;"></span>
                                    <span></span>
                                </div>
                                <div :class="{active:s3.items.length==2&&s3.items[0].size===8&&s3.items[1].size===4}"
                                     @click="changeCol(3,8,4)" class="item _1">
                                    <span style="width: 10px;background: #b5b5b5;"></span>
                                    <span style="width: 14px;background: #979797;"></span>
                                </div>
                                <div :class="{active:s3.items.length===3}" @click="change3Col(3)" class="item _1">
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                </div>

                            </div>
                        </div>

                        <i v-if="s3.items.length===3" @click="downColSize3(3)" class="fas fa-chevron-right icon"></i>
                        <i v-if="s3.items.length===3" @click="upColSize3(3)" class="fas fa-chevron-left icon"></i>

                    </div>
                    <div v-for="(banner , i) in s3.items" class="cell mt-3" :class="'medium-'+banner.size">
                        <div class="banner-session">
                            <i v-if="banner.type" @click="sessionSetup(3,false,i)"
                               class="fas fa-edit change-size--banner"></i>
                            <div class="body" v-if="banner.type">
                                <img v-if="banner.imgPath" :src="banner.imgPath"
                                     :class="banner.type">
                                <div v-if="banner.type==='text'">
                                    <div
                                        :style="'color: '+banner.titleColor+';'+'font-size: '+banner.titleSize+'px'">
                                        {{ banner.title }}
                                    </div>
                                    <div
                                        :style="'color: '+banner.valueColor+';'+'font-size: '+banner.valueSize+'px'">
                                        {{ banner.value }}
                                    </div>
                                </div>
                            </div>
                            <div v-else class="install-banner">
                                <div>آماده سازی جایگاه {{ i + 5 }}</div>
                                <div class="text">فرمت جایگاه را انتخاب کنید</div>
                                <div>
                                    <button @click="setupText(3,i)" type="button" class="btn btn-blue">متن</button>
                                    <button @click="setupBanner(3,i)" type="button" class="btn btn-blue">بنر</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="cell grid-x grid-padding-x" style="width: 100%;margin: 0;padding: 0;">
                    <div class="cell mt-3 small-12">
                        <div class="product-session" @click="productSetup(2)">
                            <div style="text-align: center;">
                                <div style="font-size: 17px;">آماده سازی جایگاه 2 محصولات</div>
                                <img style="width: 104px;" src="/img/page/empty-cart.svg"/>
                            </div>
                        </div>
                    </div>
                    <div v-if="products2.length>0" class="cell small-12 menus">
                        <i @click="closeProducts(2)" class="fas fa-times icon"></i>
                    </div>

                    <div class="cell mt-3 small-6 medium-6 large-3" v-for="(v,i) in productsShow2">
                        <div class="product-session" @click="productEdit(2,i)">
                            <img :src="v.tiny">
                            <div>
                                <div>{{ v.title }}</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="grid-x grid-padding-x bg-banner"
                     :style="'background:'+s4.style.mainBackground">
                    <div class="cell small-12 menus">
                        <i @click="editBg(4)"
                           class="fas fa-edit icon"></i>

                        <i v-if="s4.items.length!==1" @click="downColSize(4)" class="fas fa-chevron-right icon"></i>
                        <i v-if="s4.items.length!==1" @click="upColSize(4)" class="fas fa-chevron-left icon"></i>

                        <div class="slid-col">
                            <i class="fas fa-list icon"></i>
                            <div class="menu">
                                <div :class="{active:s4.items.length===1}"
                                     @click="change1Col(4)" class="item _1">
                                    <span style="width: 25px;background: #979797;"></span>
                                </div>
                                <div :class="{active:s4.items.length===2&&s4.items[0].size===4&&s4.items[1].size===8}"
                                     @click="changeCol(4,4,8)" class="item _1">
                                    <span style="width: 14px;background: #979797;"></span>
                                    <span style="width: 10px;"></span>
                                </div>
                                <div :class="{active:s4.items.length===2&&s4.items[0].size===6&&s4.items[1].size===6}"
                                     @click="changeCol(4,6,6)" class="item _1">
                                    <span style="background: #b5b5b5;"></span>
                                    <span></span>
                                </div>
                                <div :class="{active:s4.items.length===2&&s4.items[0].size===8&&s4.items[1].size===4}"
                                     @click="changeCol(4,8,4)" class="item _1">
                                    <span style="width: 10px;background: #b5b5b5;"></span>
                                    <span style="width: 14px;background: #979797;"></span>
                                </div>
                                <div :class="{active:s4.items.length===3}" @click="change3Col(4)" class="item _1">
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                    <span style="width: 12px;background: #b5b5b5;"></span>
                                </div>

                            </div>
                        </div>

                        <i v-if="s4.items.length===3" @click="downColSize3(4)" class="fas fa-chevron-right icon"></i>
                        <i v-if="s4.items.length===3" @click="upColSize3(4)" class="fas fa-chevron-left icon"></i>

                    </div>
                    <div v-for="(banner , i) in s4.items" class="cell mt-3" :class="'medium-'+banner.size">
                        <div class="banner-session">
                            <i v-if="banner.type" @click="sessionSetup(4,false,i)"
                               class="fas fa-edit change-size--banner"></i>
                            <div class="body" v-if="banner.type">
                                <img v-if="banner.imgPath" :src="banner.imgPath"
                                     :class="banner.type">
                                <div v-if="banner.type==='text'">
                                    <div
                                        :style="'color: '+banner.titleColor+';'+'font-size: '+banner.titleSize+'px'">
                                        {{ banner.title }}
                                    </div>
                                    <div
                                        :style="'color: '+banner.valueColor+';'+'font-size: '+banner.valueSize+'px'">
                                        {{ banner.value }}
                                    </div>
                                </div>
                            </div>
                            <div v-else class="install-banner">
                                <div>آماده سازی جایگاه {{ i + 7 }}</div>
                                <div class="text">فرمت جایگاه را انتخاب کنید</div>
                                <div>
                                    <button @click="setupText(4,i)" type="button" class="btn btn-blue">متن</button>
                                    <button @click="setupBanner(4,i)" type="button" class="btn btn-blue">بنر</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="cell grid-x grid-padding-x" style="width: 100%;margin: 0;padding: 0;">
                    <div class="cell mt-3 small-12">
                        <div class="product-session" @click="productSetup(3)">
                            <div style="text-align: center;">
                                <div style="font-size: 17px;">آماده سازی جایگاه 3 محصولات</div>
                                <img style="width: 104px;" src="/img/page/empty-cart.svg"/>
                            </div>
                        </div>
                    </div>
                    <div v-if="products3.length>0" class="cell small-12 menus">
                        <i @click="closeProducts(3)"
                           class="fas fa-times icon"></i>
                    </div>

                    <div class="cell mt-3 small-6 medium-6 large-3" v-for="(v,i) in productsShow3">
                        <div class="product-session" @click="productEdit(3,i)">
                            <img :src="v.tiny">
                            <div>
                                <div>{{ v.title }}</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="double-gap"></div>
    <div v-show="showNewP" class="jconfirm jconfirm-light jconfirm-open">
        <div class="jconfirm-bg"
             style="transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1);"></div>
        <div class="jconfirm-scrollpane">
            <div class="jconfirm-row">
                <div class="jconfirm-cell">
                    <div class="jconfirm-holder" style="padding-top: 40px; padding-bottom: 40px;">
                        <div class="jc-bs3-container container">
                            <div
                                class="jc-bs3-row row justify-content-md-center justify-content-sm-center justify-content-xs-center justify-content-lg-center">
                                <div
                                    class="jconfirm-box-container jconfirm-animated col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 jconfirm-no-transition"
                                    style="transform: translate(0px, 0px); transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1);overflow: unset;">
                                    <div
                                        class="jconfirm-box jconfirm-hilight-shake jconfirm-type-default jconfirm-type-animated"
                                        role="dialog" aria-labelledby="jconfirm-box49120" tabindex="-1"
                                        style="transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1); transition-property: all, margin;overflow: unset;">
                                        <div class="jconfirm-closeIcon" style="display: none;">×</div>
                                        <div class="jconfirm-title-c"><span class="jconfirm-icon-c"></span><span
                                            class="jconfirm-title">تنظیم محصولات</span></div>
                                        <div class="jconfirm-content-pane no-scroll"
                                             style="transition-duration: 0.4s; transition-timing-function: cubic-bezier(0.36, 0.55, 0.19, 1); max-height: 589.5px;overflow: unset;">
                                            <div class="jconfirm-content" style="overflow: unset;"
                                                 id="jconfirm-box49120">
                                                <div>
                                                    <div class="cell medium-12">
                                                        جستجو محصولات
                                                        <select_product></select_product>
                                                    </div>
                                                    <div class="cell medium-12">
                                                        جستجو دسته بندی
                                                        <select_category></select_category>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jconfirm-buttons">
                                            <button @click="showNewP=false" type="button" class="btn btn-red">لغو
                                            </button>
                                            <button type="button" @click="setProduct()" class="btn btn-green">ذخیره
                                            </button>
                                        </div>
                                        <div class="jconfirm-clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button onclick="history.back()" class="button alert">بازگشت</button>
        <button class="button success" @click="save">ویرایش</button>
    </div>
    <full_loading v-if="loading"></full_loading>
</template>

<script>
import Select_product from "../discount/select_product";
import Full_loading from "../../../app/components/loading/full_loading";
import Select_category from "../loading/select_category";

export default {
    name: "create_landing",
    components: {Select_category, Full_loading, Select_product},
    data() {
        return {
            loading: false,
            showNewP: false,
            product_id: 0,
            cat_id: 0,
            name: '',
            slug: '',
            metadesc: '',
            keywords: '',
            active: true,

            s1: {style: {mainBackground: '', container: true}, items: [{type: '', size: 6}, {type: '', size: 6}]},
            s2: {style: {mainBackground: '', container: true}, items: [{type: '', size: 6}, {type: '', size: 6}]},
            s3: {style: {mainBackground: '', container: true}, items: [{type: '', size: 6}, {type: '', size: 6}]},
            s4: {style: {mainBackground: '', container: true}, items: [{type: '', size: 12}]},

            products: null,
            cursure: 0,
            products1: [],
            productsShow1: [],
            products2: [],
            productsShow2: [],
            products3: [],
            productsShow3: [],
        }
    },
    methods: {
        closeProducts(p) {
            let vm = this

            $.confirm({
                title: 'delete all',
                content: 'Are you sure you want to delete all products?',
                buttons: {
                    ok: {
                        text: 'delete',
                        btnClass: 'btn-red',
                        action: () => {
                            vm.$data['products' + p] = []
                            vm.$data['productsShow' + p] = []
                        }
                    },
                    no: {
                        text: 'no'
                    }
                }
            })
        },
        change3Col(p) {
            let items = this.$data['s' + p].items
            if (items.length === 3) return
            if (items.length === 2) {
                items[0].size = 4
                items[1].size = 4
                items[2] = {type: '', size: 4}
            } else if (items.length === 1) {
                items[0].size = 4
                items[1] = {type: '', size: 4}
                items[2] = {type: '', size: 4}
            }
        },
        change1Col(p) {
            let items = this.$data['s' + p].items
            if (items.length === 3) {
                items.splice(1, 1)
                items.splice(2, 1)
            }
            if (items.length === 2) {
                items.splice(1, 1)
            }

            items[0].size = 12
        },
        upColSize(p) {
            let items = this.$data['s' + p].items
            if (items.length === 3 && items[1].size === 3) return;
            if (items[0].size === 9 && items[1].size === 3) return

            items[0].size++
            items[1].size--
        },
        downColSize(p) {
            let items = this.$data['s' + p].items

            if (items.length === 3 && items[0].size === 3) return;
            if (items[0].size === 3 && items[1].size === 9) return

            items[0].size--
            items[1].size++
        },
        upColSize3(p) {
            let items = this.$data['s' + p].items

            if (items.length === 3 && items[0].size + items[1].size === 9 && items[2].size === 3) return;

            if (items[1].size === 9 && items[2].size === 3) return
            items[1].size++
            items[2].size--
        },
        downColSize3(p) {
            let items = this.$data['s' + p].items

            if (items.length === 3 && items[1].size === 3) return;

            if (items[1].size === 3 && items[2].size === 9) return


            items[1].size--
            items[2].size++
        },
        changeCol(p, i, i2) {
            let items = this.$data['s' + p].items
            if (items.length === 2) {
                items[0].size = i
                items[1].size = i2
            } else if (items.length === 3) {
                items.splice(2, 1)
                items[0].size = i
                items[1].size = i2
            } else if (items.length === 1) {
                items[0].size = i
                items[1] = {type: '', size: i2}
            }
        },
        editBg(p) {
            let data = this.$data['s' + p].style

            if (data.mainBackground == undefined || data.mainBackground == null)
                data.mainBackground = ''
            if (data.container == undefined || data.container == null)
                data.container = true

            let text = "<div class=\"cell medium-12\">\n" +
                "        <label>\n" +
                "            پس زمینه\n" +
                "                <input "
            if (data.mainBackground.trim() !== "")
                text += ' checked ';
            text += "type=\"checkbox\" id=\"is-bg\">\n" +
                "            <input value='" + data.mainBackground + "' type=\"color\" id=\"bg-banner\">\n" +
                "        </label>\n" +
                "    </div>\n" +
                "    <div class=\"cell medium-12\">\n" +
                "        <label>\n" +
                "            container\n" +
                "                <input";
            if (data.container == true)
                text += ' checked '
            text += " type=\"checkbox\" id=\"is-container\">\n" +
                "        </label>\n" +
                "    </div>";
            let vm = this

            $.confirm({
                title: 'تنظیم پس زمینه ردیف' + p,
                content: text,
                buttons: {
                    cancel: {
                        text: 'لغو',
                        btnClass: 'btn-red'
                    },
                    save: {
                        text: 'ذخیره',
                        btnClass: 'btn-green',
                        action: () => {
                            let background = document.getElementById('bg-banner').value
                            let container = document.getElementById('is-container').checked
                            let isBg = document.getElementById('is-bg').checked

                            if (isBg)
                                data.mainBackground = background
                            else
                                data.mainBackground = ''
                            data.container = container
                        }
                    },
                }
            })

        },
        productSetup(p) {
            this.showNewP = true
            this.cursure = p
        },
        async setProduct() {
            if (this.product_id == 0 && this.cat_id == 0)
                return ''
            this.loading = true
            if (this.product_id !== 0) {
                let {data} = await window.axios.get('/api/product/' + this.product_id)
                this.$data['products' + this.cursure].push(data.id);
                this.$data['productsShow' + this.cursure].push(data);
                this.product_id = 0
            }

            if (this.cat_id !== 0) {
                let {data} = await window.axios.get('/admin/allapi/category/' + this.cat_id)
                for (const i in data) {
                    let v = data[i]
                    this.$data['products' + this.cursure].push(v.id);
                    this.$data['productsShow' + this.cursure].push(v);
                    this.cat_id = 0
                }
            }

            this.showNewP = false
            this.loading = false
        },
        productEdit(p, i) {
            let vm = this
            $.confirm({
                title: 'حذف',
                content: 'محصول از جایگاه حذف شود؟',
                buttons: {
                    cancel: {
                        text: 'لغو',
                    },
                    product: {
                        text: 'حذف',
                        btnClass: 'btn-red',
                        action: () => {
                            vm.$data['productsShow' + p].splice(i, 1)
                            vm.$data['products' + p].splice(i, 1)
                        }
                    }
                }
            })
        },
        changeSize21(p) {
            if (p == 'right') {
                if (this.session1.size > 1) {
                    this.session1.size--
                    this.session2.size++
                }
            } else {
                if (this.session2.size > 1) {
                    this.session1.size++
                    this.session2.size--
                }
            }
        },
        changeSize34(p) {
            if (p == 'right') {
                if (this.session3.size > 1) {
                    this.session3.size--
                    this.session4.size++
                }
            } else {
                if (this.session4.size > 1) {
                    this.session3.size++
                    this.session4.size--
                }
            }
        },
        changeSize56(p) {
            if (p == 'right') {
                if (this.session5.size > 1) {
                    this.session5.size--
                    this.session6.size++
                }
            } else {
                if (this.session6.size > 1) {
                    this.session5.size++
                    this.session6.size--
                }
            }
        },
        sessionSetup(p, back = false, i) {
            let data = this.$data['s' + p].items[i]

            if (!back) {
                if (data.type === 'text') {
                    this.setupText(p, i)
                    return
                } else if (data.type === 'banner') {
                    this.setupBanner(p, i)
                    return
                }
            }

            let vm = this
            $.confirm({
                title: 'آماده سازی جایگاه ' + p,
                content: 'فرمت جایگاه شماره را انتخاب کنید',
                buttons: {
                    cancel: {
                        text: 'لغو',
                        btnClass: 'btn-red'
                    },
                    text: {
                        text: 'متن',
                        btnClass: 'btn-blue',
                        action: () => {
                            vm.setupText(p, i)
                        }
                    },
                    banner: {
                        text: 'بنر',
                        btnClass: 'btn-blue',
                        action: () => {
                            vm.setupBanner(p, i)
                        }
                    }
                }
            })
        },
        setupBanner(p, i) {
            let data = this.$data['s' + p].items[i]
            if (data.name == undefined || data.name == null)
                data.name = ''
            if (data.link == undefined || data.link == null)
                data.link = ''

            let text = "<div class=\"cell medium-12\">\n" +
                "        <label>\n" +
                "            نام بنر\n" +
                "            <input value='" + data.name + "' type=\"text\" id=\"name-banner\">\n" +
                "        </label>\n" +
                "    </div>\n" +
                "    <div class=\"cell medium-12\">\n" +
                "        <label>\n" +
                "            آدرس\n" +
                "            <div class=\"slug-landing\">\n" +
                "                <input value='" + data.link + "' type=\"text\" id=\"link-banner\">\n" +
                "            </div>\n" +
                "        </label>\n" +
                "    </div>\n" +
                "    <div class=\"cell medium-12\">\n" +
                "        <label>\n" +
                "تصویر            " +
                "            <input type=\"file\" accept=\"image/*\" id=\"file-banner\">\n" +
                "        </label>\n" +
                "    </div>"
            let vm = this

            $.confirm({
                title: 'تنظیم بنر برای جایگاه ' + p,
                content: text,
                buttons: {
                    cancel: {
                        text: 'لغو',
                        btnClass: 'btn-red'
                    },
                    back: {
                        text: 'بازگشت',
                        action: () => {
                            vm.sessionSetup(p, true, i)
                        }
                    },
                    save: {
                        text: 'ذخیره',
                        btnClass: 'btn-green',
                        action: () => {
                            let file = document.getElementById('file-banner').files[0]
                            let name = document.getElementById('name-banner').value
                            let link = document.getElementById('link-banner').value

                            var reader = new FileReader();
                            reader.onload = function (e) {
                                data.imgPath = e.target.result;
                            }
                            reader.readAsDataURL(file)

                            data.type = 'banner'
                            data.name = name
                            data.link = link
                            data.file = file
                        }
                    },
                }
            })

        },
        setupText(p, i) {
            let data = this.$data['s' + p].items[i]
            if (data.titleSize == undefined || data.titleSize == null)
                data.titleSize = 22
            if (data.valueSize == undefined || data.valueSize == null)
                data.valueSize = 15
            if (data.title == undefined || data.title == null)
                data.title = ''
            if (data.value == undefined || data.value == null)
                data.value = ''
            if (data.titleColor == undefined || data.titleColor == null)
                data.titleColor = ''
            if (data.valueColor == undefined || data.valueColor == null)
                data.valueColor = ''

            let text = "<div class=\"grid-x grid-padding-x\">" +
                "<div class=\"cell medium-12\">\n" +
                "        <label>\n" +
                "            سربرگ\n" +
                "            <input value='" + data.title + "' type=\"text\" id=\"title-text\">\n" +
                "        </label>\n" +
                "    </div>\n" +
                "    <div class=\"cell medium-12\">\n" +
                "        <label>\n" +
                "            متن\n" +
                "            <div class=\"slug-landing\">\n" +
                "                <textarea id=\"value-text\">" + data.value + "</textarea>\n" +
                "            </div>\n" +
                "        </label>\n" +
                "    </div>\n" +
                "<div class=\"cell medium-6\" style='width: 50%;'>\n" +
                "        <label>\n" +
                "سایر سربرگ\n" +
                "            <input value='" + data.titleSize + "' type=\"number\" id=\"title-size-text\">\n" +
                "        </label>\n" +
                "    </div>\n" +
                "<div class=\"cell medium-6\" style='width: 50%;'>\n" +
                "        <label>\n" +
                "سایر متن \n" +
                "            <input value='" + data.valueSize + "' type=\"number\" id=\"value-size-text\">\n" +
                "        </label>\n" +
                "    </div>\n" +

                "<div class=\"cell medium-6\" style='width: 50%;'>\n" +
                "        <label>\n" +
                "رنگ سربرگ\n" +
                "            <input value='" + data.titleColor + "' type=\"color\" id=\"title-color-text\">\n" +
                "        </label>\n" +
                "    </div>\n" +
                "<div class=\"cell medium-6\" style='width: 50%;'>\n" +
                "        <label>\n" +
                "رنگ متن \n" +
                "            <input value='" + data.valueColor + "' type=\"color\" id=\"value-color-text\">\n" +
                "        </label>\n" +
                "    </div>\n" +
                "    <div class=\"cell medium-12\">\n" +
                "        <label>\n" +
                "تصویر            " +
                "            <input type=\"file\" accept=\"image/*\" id=\"file-text\">\n" +
                "        </label>\n" +
                "    </div>" +
                "</div>"
            let vm = this

            let clearClass = 'hide'
            if (data.imgPath)
                clearClass = ''

            $.confirm({
                title: 'تنظیم متن برای جایگاه ' + p,
                content: text,
                buttons: {
                    cancel: {
                        text: 'لغو',
                        btnClass: 'btn-red'
                    },
                    back: {
                        text: 'بازگشت',
                        action: () => {
                            vm.sessionSetup(p, true, i)
                        }
                    },
                    save: {
                        text: 'ذخیره',
                        btnClass: 'btn-green',
                        action: () => {
                            let file = document.getElementById('file-text').files[0]
                            let title = document.getElementById('title-text').value
                            let value = document.getElementById('value-text').value
                            let valueSize = document.getElementById('value-size-text').value
                            let titleSize = document.getElementById('title-size-text').value

                            let valueColor = document.getElementById('value-color-text').value
                            let titleColor = document.getElementById('title-color-text').value

                            console.log('img' + (p + i))
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                data.imgPath = e.target.result;
                            }
                            if (file != null)
                                reader.readAsDataURL(file)


                            data.type = 'text'
                            data.title = title
                            data.value = value
                            if (file != null)
                                data.file = file

                            data.titleSize = titleSize
                            data.valueSize = valueSize
                            data.titleColor = titleColor
                            data.valueColor = valueColor
                        }
                    },
                    clear: {
                        text: 'حذف تصویر',
                        btnClass: clearClass,
                        action:()=>{
                            data.imgPath = null;
                            data.file = null
                        }
                    }
                }
            })
        },
        async getProduct() {
            let {data} = await window.axios.get('/admin/allapi/products')
            this.products = data
        },
        async save() {
            if (this.name.trim() == '') {
                $.alert("نام را وارد کنید")
                return
            }
            if (this.slug.trim() == '') {
                $.alert("لینک را وارد کنید")
                return
            }
            this.loading = true
            let form = new FormData()

            let banners = [this.s1, this.s2, this.s3, this.s4]
            for (const i in banners) {
                let items = banners[i].items
                for (const b in items) {
                    if (items[b].imgPath && items[b].imgPath.indexOf('/img/landing/')==-1)
                    delete items[b].imgPath
                    if (items[b].file)
                        form.append(i + '_' + b, items[b].file)
                }
            }


            form.append("product1", JSON.stringify(this.products1))
            form.append("product2", JSON.stringify(this.products2))
            form.append("product3", JSON.stringify(this.products3))
            form.append("banners", JSON.stringify(banners))

            form.append("title", this.name)
            form.append("active", this.active)
            form.append("slug", this.slug)
            form.append("metadesc", this.metadesc)
            form.append("keywords", this.keywords)

            form.append("_token", window.token)
            form.append("_method", "PUT")

            let {data} = await window.axios.post('/admin/collection/' + this.id, form)

            location.href = '/admin/collection'
            this.loading = false
        },
        async getLanding() {
            this.loading = true
            let {data} = await window.axios.get('/admin/api/landing/' + this.id)
            this.name = data['data'].title
            this.slug = data['data'].slug
            this.metadesc = data['data'].metadesc
            this.keywords = data['data'].keywords
            this.active = data['data'].active == 1

            for (const i in data['data'].banners) {
                this.$data['s' + (parseInt(i) + 1)] = data['data'].banners[i]
            }

            for (const i in data['data'].products) {
                let list = data['data'].products[i]
                this.cursure = parseInt(i) + 1
                for (const b in list) {
                    this.product_id = list[b];
                    await this.setProduct();
                }
            }

            this.loading = false
        },

    },
    props:['id'],
    mounted() {
        this.getLanding()
    }
}
</script>

<style scoped>

</style>