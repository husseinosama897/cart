<html>
<head>
    <title>goSell Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="shortcut icon" href="https://goSellJSLib.b-cdn.net/v2.0.0/imgs/tap-favicon.ico" />
    <link href="https://goSellJSLib.b-cdn.net/v2.0.0/css/gosell.css" rel="stylesheet" />
</head>
<body>
    <script type="text/javascript" src="https://goSellJSLib.b-cdn.net/v2.0.0/js/gosell.js"></script>

    <div id="root"></div>
    <button id="openLightBox" onclick="goSell.openLightBox()">open goSell LightBox</button>
    <button id="openPage" onclick="goSell.openPaymentPage()">open goSell Page</button>

    <script>

    goSell.config({
      containerID:"root",
      gateway:{
        publicKey:"pk_test_Vlk842B1EA7tDN5QbrfGjYzh",
        secretKey:"sk_test_XKokBfNWv6FIYuTMg5sLPjhJ",
        encryptionKey:"-----BEGIN PUBLIC KEY----- MIIBIDANBgkqhkiG9w0BAQEFAAOCAQ0AMIIBCAKCAQEA21z7Vcrrraiksj31If5K f7XGv6QNoHP7SRPjxxbxAnPrrI597NI683pHIaIgb0UNaOUggU6FYN+w+tBc1Mwk 1aOBsM8Ok6W0SsFxpa+Jt3VdOfF4iBw7k4sdd+EP5PfaiFdbrndRcCmV32mb87+I cuzDRxyqgl1Bx0dCPqmw0YCCWTuM+LXN60MHr56M5WO7J64AXn5YVzspZkon4Leg d9QbycUC77e/MUmhZL5QcGvXaBYWS5Lw5ROhjMYrLK15f4gWoYLtDcUTtMEEEtef EF4tus0Vx7XTrHa9vGbH9qUmH5F9HUkYOUX+UaFj7qVdfaR/VecB5xCwrt5ixV6y 3QIBEQ== -----END PUBLIC KEY-----",
        language:"en",
        contactInfo:true,
        supportedCurrencies:"all",
        supportedPaymentMethods: "all",
        saveCardOption:false,
        customerCards: true,
        notifications:'standard',
        callback:(response) => {
            console.log('response', response);
        },
        onClose: () => {
            console.log("onClose Event");
        },
        backgroundImg: {
          url: 'imgURL',
          opacity: '0.5'
        },
        labels:{
            cardNumber:"Card Number",
            expirationDate:"MM/YY",
            cvv:"CVV",
            cardHolder:"Name on Card",
            actionButton:"Pay"
        },
        style: {
            base: {
              color: '#535353',
              lineHeight: '18px',
              fontFamily: 'sans-serif',
              fontSmoothing: 'antialiased',
              fontSize: '16px',
              '::placeholder': {
                color: 'rgba(0, 0, 0, 0.26)',
                fontSize:'15px'
              }
            },
            invalid: {
              color: 'red',
              iconColor: '#fa755a '
            }
        }
      },
      customer:{
        id:"cus_m1QB0320181401l1LD1812485",
        first_name: "First Name",
        middle_name: "Middle Name",
        last_name: "Last Name",
        email: "demo@email.com",
        phone: {
            country_code: "965",
            number: "99999999"
        }
      },
      order:{
        amount: 100,
        currency:"KWD",
        items:[{
          id:1,
          name:'item1',
          description: 'item1 desc',
          quantity:'x1',
          amount_per_unit:'KD00.000',
          discount: {
            type: 'P',
            value: '10%'
          },
          total_amount: 'KD000.000'
        },
        {
          id:2,
          name:'item2',
          description: 'item2 desc',
          quantity:'x2',
          amount_per_unit:'KD00.000',
          discount: {
            type: 'P',
            value: '10%'
          },
          total_amount: 'KD000.000'
        },
        {
          id:3,
          name:'item3',
          description: 'item3 desc',
          quantity:'x1',
          amount_per_unit:'KD00.000',
          discount: {
            type: 'P',
            value: '10%'
          },
          total_amount: 'KD000.000'
        }],
        shipping:null,
        taxes: null
      },
     transaction:{
       mode: 'charge',
       charge:{
          saveCard: false,
          threeDSecure: true,
          description: "Test Description",
          statement_descriptor: "Sample",
          reference:{
            transaction: "txn_0001",
            order: "ord_0001"
          },
          metadata:{},
          receipt:{
            email: false,
            sms: true
          },
          redirect: "{{route('checker')}}",
          post: null,
        }
     }
    });

    </script>

</body>
</html>
