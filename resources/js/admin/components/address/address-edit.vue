<template>
    <div class="modal-holder">
        <div class="modal">
            <form>
                <div class="grid-x grid-padding-x">
                    <div class="cell"><label>نام مکان
                        <input type="text"
                               placeholder="یک عنوان برای آدرس انتخاب کنید (مثلا: خونه، اداره، خونه‌ بابا اینا)">
                        <!----></label></div>
                    <div class="cell small-4"><label>استان
                        <div dir="rtl" class="v-select vs--single vs--searchable">
                            <div id="vs1__combobox" role="combobox" aria-expanded="false" aria-owns="vs1__listbox"
                                 aria-label="Search for option" class="vs__dropdown-toggle">
                                <div class="vs__selected-options"><span class="vs__selected">
            تهران
                                    <!----></span> <input aria-autocomplete="list" aria-labelledby="vs1__combobox"
                                                          aria-controls="vs1__listbox" type="search" autocomplete="off"
                                                          class="vs__search"></div>
                                <div class="vs__actions">
                                    <button type="button" title="Clear Selected" aria-label="Clear Selected"
                                            class="vs__clear" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                            <path
                                                d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path>
                                        </svg>
                                    </button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation"
                                         class="vs__open-indicator">
                                        <path
                                            d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path>
                                    </svg>
                                    <div class="vs__spinner" style="display: none;">Loading...</div>
                                </div>
                            </div>
                            <ul id="vs1__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                        </div> <!----></label></div>
                    <div class="cell small-4"><label>شهر
                        <div dir="rtl" class="v-select vs--single vs--searchable">
                            <div id="vs2__combobox" role="combobox" aria-expanded="false" aria-owns="vs2__listbox"
                                 aria-label="Search for option" class="vs__dropdown-toggle">
                                <div class="vs__selected-options"><input aria-autocomplete="list"
                                                                         aria-labelledby="vs2__combobox"
                                                                         aria-controls="vs2__listbox" type="search"
                                                                         autocomplete="off" class="vs__search"></div>
                                <div class="vs__actions">
                                    <button type="button" title="Clear Selected" aria-label="Clear Selected"
                                            class="vs__clear" style="display: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                            <path
                                                d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path>
                                        </svg>
                                    </button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation"
                                         class="vs__open-indicator">
                                        <path
                                            d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path>
                                    </svg>
                                    <div class="vs__spinner" style="display: none;">Loading...</div>
                                </div>
                            </div>
                            <ul id="vs2__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                        </div> <!----></label></div>
                    <div class="cell small-4"><!----></div>
                    <div class="cell medium-4"><label>شخص تحویل گیرنده
                        <input type="text"> <!----></label></div>
                    <div class="cell medium-4"><label>تلفن همراه
                        <input type="number" placeholder="مثال: 09121234567"> <!----></label></div>
                    <div class="cell medium-4"><label class="nm">کدپستی
                        <input type="number" placeholder="کد پستی عددی 10 رقمی است"> <!----> <small>دریافت کد پستی از
                            طریق <a href="https://gnaf.post.ir/portal/#postcodeFinder" target="_blank">نقشه</a> یا از
                            طریق <a href="http://epostcode.post.ir/postcode" target="_blank">نشانی</a></small></label>
                    </div>
                    <div class="cell"><label>آدرس پستی
                        <textarea rows="4"
                                  placeholder="اطلاعات تکمیلی آدرس را وارد نمایید(خیابان، کوچه، پلاک، واحد و یا ...)"
                                  name="content"></textarea> <!----></label></div>
                    <div class="cell medium-4 medium-offset-3"><a class="button success expanded save">ذخیره</a></div>
                    <div class="cell medium-2"><a class="button alert hollow expanded" @click="$parent.edit=false">بستن</a></div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "address-edit"
}
</script>

<style scoped>

</style>
