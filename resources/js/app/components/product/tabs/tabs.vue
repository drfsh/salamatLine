<template>
<div class="box3 product-tabs" style="padding: 10px;">
    <ul class="title-tabs">
        <li>
            <div @click="page=1" :class="{'active':page===1}">
                <span class="icon"><document_text></document_text></span>
                <span class="text">توضیحات</span>
            </div>
        </li>
        <li>
            <div @click="page=2" :class="{'active':page===2}">
                <span class="icon"><ic_task></ic_task></span>
                <span class="text">توضیحات تکمیلی</span>
            </div>
        </li>
        <li>
            <div @click="page=3" :class="{'active':page===3}">
                <span class="icon"><ic_comment></ic_comment></span>
                <span class="text">نظرات({{countComment}})</span>
            </div>
        </li>
    </ul>
    <div class="body">
        <tab-text v-if="page===1" :text="text"></tab-text>
    </div>
</div>
</template>

<script>
import Ic_document from "../../icon/ic_document";
import Ic_task from "../../icon/ic_task";
import Document_text from "../../icon/document_text";
import Ic_comment from "../../icon/ic_comment";
import tabText from "./text";
export default {
    name: "tabs",
    components: {tabText, Ic_comment, Document_text, Ic_task, Ic_document},
    props:{
      text:{
          default:'123'
      }
    },
    data(){
        return{
            page:1,
            countComment:0
        }
    }
}
</script>

<style scoped>

</style>
