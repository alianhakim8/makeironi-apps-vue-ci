<div class="footer">
    <div class="card footer-1 rounded-0 footer-mobile">
        <div class="container">
            <h1>Hubungi Kami Melalui</h1>
            <p>+62 821-6854-0447</p>
            <p>makeironie@gmail.com</p>
        </div>
    </div>

    <div class="card bg-dark rounded-0 copyright">
        <div class="container text-light pt-3">
            <p class="footer-mobile">Copyright MakeIroni 2021. All Right Reserved.</p>
        </div>
    </div>
</div>

<script>
    var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?20877';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
        "enabled": true,
        "chatButtonSetting": {
            "backgroundColor": "#4dc247",
            "ctaText": "",
            "borderRadius": "25",
            "marginLeft": "0",
            "marginBottom": "50",
            "marginRight": "50",
            "position": "right"
        },
        "brandSetting": {
            "brandName": "Make I Roni",
            "brandSubTitle": "Online",
            "brandImg": "https://cdn3.iconfinder.com/data/icons/tidee-food/24/016_023_pasta_penette_macaroni_food-512.png",
            "welcomeText": "Halo ! \nMau Pesan Makaroni Rasa Apa ?",
            "messageText": "Halo kak ! aku pengen dong makaroni make i roni nya kayaknya keliatan tasty banget nih :D",
            "backgroundColor": "#0a5f54",
            "ctaText": "Start Chat",
            "borderRadius": "25",
            "autoShow": false,
            "phoneNumber": "62821-6854-0447"
        }
    };
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
</script>