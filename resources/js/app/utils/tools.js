export default {
    copyText:function(text,$this) {
        let temp = $('<input>')
        $('body').append(temp)
        temp.val(text).select()
        document.execCommand('copy')
        temp.remove();
        $('.blur_bg').click()
        $this.$toast("کپی شد!", {
            position: "top-left",
            timeout: 1000,
            hideProgressBar: true,
            closeButton: false,
        });
    },
}