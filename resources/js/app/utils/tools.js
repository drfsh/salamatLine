export default {
    copyText: function (text, $this) {
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

export function riyalToman(Number, toman = false) {
    if (!toman)
        Number /= 10
    Number += '';
    Number = Number.replace(',', '');
    let x = Number.split('.');
    let y = x[0];
    let z = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y = y.replace(rgx, '$1' + ',' + '$2');
    return y + z;
}