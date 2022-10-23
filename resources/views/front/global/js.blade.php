<script src="{{ URL::asset('js/library/swiper-v2.js') }}"></script>
<script src="{{ mix('js/front/app.js') }}"></script>
<script src="{{ mix('js/front/app2.js') }}"></script>
<!---start GOFTINO code--->
<script type="text/javascript"> !function () {
        var i = "9g6pIM", a = window, d = document;

        function g() {
            var g = d.createElement("script"), s = "https://www.goftino.com/widget/" + i,
                l = localStorage.getItem("goftino_" + i);
            g.async = !0, g.src = l ? s + "?o=" + l : s;
            d.getElementsByTagName("head")[0].appendChild(g);
        }

        "complete" === d.readyState ? g() : a.attachEvent ? a.attachEvent("onload", g) : a.addEventListener("load", g, !1);
    }(); </script>
<!---end GOFTINO code--->
