<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc.json") }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>Auth</h1>
<!-- START_a8e9988fc450431ae63401388912b16a -->
<h2>Countries</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/countrycodes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/countrycodes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 1,
        "name_ar": "أفغانستان",
        "name_en": "Afghanistan",
        "iso_code": "AF",
        "country_code": "93",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/af.png"
    },
    {
        "id": 2,
        "name_ar": "ألبانيا",
        "name_en": "Albania",
        "iso_code": "AL",
        "country_code": "355",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/al.png"
    },
    {
        "id": 3,
        "name_ar": "الجزائر",
        "name_en": "Algeria",
        "iso_code": "DZ",
        "country_code": "213",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/dz.png"
    },
    {
        "id": 4,
        "name_ar": "ساموا الأمريكية",
        "name_en": "American Samoa",
        "iso_code": "AS",
        "country_code": "684",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/as.png"
    },
    {
        "id": 5,
        "name_ar": "أندورا",
        "name_en": "Andorra",
        "iso_code": "AD",
        "country_code": "376",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ad.png"
    },
    {
        "id": 6,
        "name_ar": "أنجولا",
        "name_en": "Angola",
        "iso_code": "AO",
        "country_code": "244",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ao.png"
    },
    {
        "id": 7,
        "name_ar": "أنجويلا",
        "name_en": "Anguilla",
        "iso_code": "AI",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ai.png"
    },
    {
        "id": 8,
        "name_ar": "القطب الجنوبي",
        "name_en": "Antarctica",
        "iso_code": "AQ",
        "country_code": "268",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/aq.png"
    },
    {
        "id": 9,
        "name_ar": "أنتيجوا وبربودا",
        "name_en": "Antigua and Barbuda",
        "iso_code": "AG",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ag.png"
    },
    {
        "id": 10,
        "name_ar": "الأرجنتين",
        "name_en": "Argentina",
        "iso_code": "AR",
        "country_code": "54",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ar.png"
    },
    {
        "id": 11,
        "name_ar": "أرمينيا",
        "name_en": "Armenia",
        "iso_code": "AM",
        "country_code": "374",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/am.png"
    },
    {
        "id": 12,
        "name_ar": "آروبا",
        "name_en": "Aruba",
        "iso_code": "AW",
        "country_code": "297",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/aw.png"
    },
    {
        "id": 13,
        "name_ar": "أستراليا",
        "name_en": "Australia",
        "iso_code": "AU",
        "country_code": "61",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/au.png"
    },
    {
        "id": 14,
        "name_ar": "النمسا",
        "name_en": "Austria",
        "iso_code": "AT",
        "country_code": "43",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/at.png"
    },
    {
        "id": 15,
        "name_ar": "أذربيجان",
        "name_en": "Azerbaijan",
        "iso_code": "AZ",
        "country_code": "994",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/az.png"
    },
    {
        "id": 16,
        "name_ar": "الباهاما",
        "name_en": "Bahamas",
        "iso_code": "BS",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bs.png"
    },
    {
        "id": 17,
        "name_ar": "البحرين",
        "name_en": "Bahrain",
        "iso_code": "BH",
        "country_code": "973",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bh.png"
    },
    {
        "id": 18,
        "name_ar": "بنجلاديش",
        "name_en": "Bangladesh",
        "iso_code": "BD",
        "country_code": "880",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bd.png"
    },
    {
        "id": 19,
        "name_ar": "بربادوس",
        "name_en": "Barbados",
        "iso_code": "BB",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bb.png"
    },
    {
        "id": 20,
        "name_ar": "روسيا البيضاء",
        "name_en": "Belarus",
        "iso_code": "BY",
        "country_code": "375",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/by.png"
    },
    {
        "id": 21,
        "name_ar": "بلجيكا",
        "name_en": "Belgium",
        "iso_code": "BE",
        "country_code": "32",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/be.png"
    },
    {
        "id": 22,
        "name_ar": "بليز",
        "name_en": "Belize",
        "iso_code": "BZ",
        "country_code": "501",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bz.png"
    },
    {
        "id": 23,
        "name_ar": "بنين",
        "name_en": "Benin",
        "iso_code": "BJ",
        "country_code": "229",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bj.png"
    },
    {
        "id": 24,
        "name_ar": "برمودا",
        "name_en": "Bermuda",
        "iso_code": "BM",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bm.png"
    },
    {
        "id": 25,
        "name_ar": "بوتان",
        "name_en": "Bhutan",
        "iso_code": "BT",
        "country_code": "975",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bt.png"
    },
    {
        "id": 26,
        "name_ar": "بوليفيا",
        "name_en": "Bolivia",
        "iso_code": "BO",
        "country_code": "591",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bo.png"
    },
    {
        "id": 27,
        "name_ar": "البوسنة والهرسك",
        "name_en": "Bosnia and Herzegovina",
        "iso_code": "BA",
        "country_code": "387",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ba.png"
    },
    {
        "id": 28,
        "name_ar": "بتسوانا",
        "name_en": "Botswana",
        "iso_code": "BW",
        "country_code": "267",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bw.png"
    },
    {
        "id": 29,
        "name_ar": "جزيرة بوفيه",
        "name_en": "Bouvet Island",
        "iso_code": "BV",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bv.png"
    },
    {
        "id": 30,
        "name_ar": "البرازيل",
        "name_en": "Brazil",
        "iso_code": "BR",
        "country_code": "55",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/br.png"
    },
    {
        "id": 31,
        "name_ar": "المحيط الهندي البريطاني",
        "name_en": "British Indian Ocean Territory",
        "iso_code": "IO",
        "country_code": "246",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/io.png"
    },
    {
        "id": 32,
        "name_ar": "جزر فرجين البريطانية",
        "name_en": "British Virgin Islands",
        "iso_code": "VG",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/vg.png"
    },
    {
        "id": 33,
        "name_ar": "بروناي",
        "name_en": "Brunei",
        "iso_code": "BN",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bn.png"
    },
    {
        "id": 34,
        "name_ar": "بلغاريا",
        "name_en": "Bulgaria",
        "iso_code": "BG",
        "country_code": "359",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bg.png"
    },
    {
        "id": 35,
        "name_ar": "بوركينا فاسو",
        "name_en": "Burkina Faso",
        "iso_code": "BF",
        "country_code": "226",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bf.png"
    },
    {
        "id": 36,
        "name_ar": "بوروندي",
        "name_en": "Burundi",
        "iso_code": "BI",
        "country_code": "257",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/bi.png"
    },
    {
        "id": 37,
        "name_ar": "كمبوديا",
        "name_en": "Cambodia",
        "iso_code": "KH",
        "country_code": "855",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/kh.png"
    },
    {
        "id": 38,
        "name_ar": "الكاميرون",
        "name_en": "Cameroon",
        "iso_code": "CM",
        "country_code": "237",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cm.png"
    },
    {
        "id": 39,
        "name_ar": "كندا",
        "name_en": "Canada",
        "iso_code": "CA",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ca.png"
    },
    {
        "id": 40,
        "name_ar": "الرأس الأخضر",
        "name_en": "Cape Verde",
        "iso_code": "CV",
        "country_code": "238",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cv.png"
    },
    {
        "id": 41,
        "name_ar": "جزر الكايمن",
        "name_en": "Cayman Islands",
        "iso_code": "KY",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ky.png"
    },
    {
        "id": 42,
        "name_ar": "جمهورية افريقيا الوسطى",
        "name_en": "Central African Republic",
        "iso_code": "CF",
        "country_code": "236",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cf.png"
    },
    {
        "id": 43,
        "name_ar": "تشاد",
        "name_en": "Chad",
        "iso_code": "TD",
        "country_code": "235",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/td.png"
    },
    {
        "id": 44,
        "name_ar": "شيلي",
        "name_en": "Chile",
        "iso_code": "CL",
        "country_code": "56",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cl.png"
    },
    {
        "id": 45,
        "name_ar": "الصين",
        "name_en": "China",
        "iso_code": "CN",
        "country_code": "86",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cn.png"
    },
    {
        "id": 46,
        "name_ar": "جزيرة الكريسماس",
        "name_en": "Christmas Island",
        "iso_code": "CX",
        "country_code": "16",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cx.png"
    },
    {
        "id": 47,
        "name_ar": "جزر كوكوس",
        "name_en": "Cocos [Keeling] Islands",
        "iso_code": "CC",
        "country_code": "16",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cc.png"
    },
    {
        "id": 48,
        "name_ar": "كولومبيا",
        "name_en": "Colombia",
        "iso_code": "CO",
        "country_code": "57",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/co.png"
    },
    {
        "id": 49,
        "name_ar": "جزر القمر",
        "name_en": "Comoros",
        "iso_code": "KM",
        "country_code": "269",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/km.png"
    },
    {
        "id": 50,
        "name_ar": "الكونغو - برازافيل",
        "name_en": "Congo - Brazzaville",
        "iso_code": "CG",
        "country_code": "242",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cg.png"
    },
    {
        "id": 51,
        "name_ar": "جمهورية الكونغو الديمقراطية",
        "name_en": "Congo - Kinshasa",
        "iso_code": "CD",
        "country_code": "243",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cd.png"
    },
    {
        "id": 52,
        "name_ar": "جزر كوك",
        "name_en": "Cook Islands",
        "iso_code": "CK",
        "country_code": "682",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ck.png"
    },
    {
        "id": 53,
        "name_ar": "كوستاريكا",
        "name_en": "Costa Rica",
        "iso_code": "CR",
        "country_code": "506",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cr.png"
    },
    {
        "id": 54,
        "name_ar": "كرواتيا",
        "name_en": "Croatia",
        "iso_code": "HR",
        "country_code": "385",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/hr.png"
    },
    {
        "id": 55,
        "name_ar": "كوبا",
        "name_en": "Cuba",
        "iso_code": "CU",
        "country_code": "53",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cu.png"
    },
    {
        "id": 56,
        "name_ar": "قبرص",
        "name_en": "Cyprus",
        "iso_code": "CY",
        "country_code": "357",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cy.png"
    },
    {
        "id": 57,
        "name_ar": "جمهورية التشيك",
        "name_en": "Czech Republic",
        "iso_code": "CZ",
        "country_code": "420",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cz.png"
    },
    {
        "id": 58,
        "name_ar": "ساحل العاج",
        "name_en": "Côte d’Ivoire",
        "iso_code": "CI",
        "country_code": "225",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ci.png"
    },
    {
        "id": 59,
        "name_ar": "الدانمرك",
        "name_en": "Denmark",
        "iso_code": "DK",
        "country_code": "45",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/dk.png"
    },
    {
        "id": 60,
        "name_ar": "جيبوتي",
        "name_en": "Djibouti",
        "iso_code": "DJ",
        "country_code": "253",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/dj.png"
    },
    {
        "id": 61,
        "name_ar": "دومينيكا",
        "name_en": "Dominica",
        "iso_code": "DM",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/dm.png"
    },
    {
        "id": 62,
        "name_ar": "جمهورية الدومينيك",
        "name_en": "Dominican Republic",
        "iso_code": "DO",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/do.png"
    },
    {
        "id": 63,
        "name_ar": "الاكوادور",
        "name_en": "Ecuador",
        "iso_code": "EC",
        "country_code": "593",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ec.png"
    },
    {
        "id": 64,
        "name_ar": "مصر",
        "name_en": "Egypt",
        "iso_code": "EG",
        "country_code": "20",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/eg.png"
    },
    {
        "id": 65,
        "name_ar": "السلفادور",
        "name_en": "El Salvador",
        "iso_code": "SV",
        "country_code": "503",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sv.png"
    },
    {
        "id": 66,
        "name_ar": "غينيا الاستوائية",
        "name_en": "Equatorial Guinea",
        "iso_code": "GQ",
        "country_code": "240",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gq.png"
    },
    {
        "id": 67,
        "name_ar": "اريتريا",
        "name_en": "Eritrea",
        "iso_code": "ER",
        "country_code": "291",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/er.png"
    },
    {
        "id": 68,
        "name_ar": "استونيا",
        "name_en": "Estonia",
        "iso_code": "EE",
        "country_code": "372",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ee.png"
    },
    {
        "id": 69,
        "name_ar": "اثيوبيا",
        "name_en": "Ethiopia",
        "iso_code": "ET",
        "country_code": "251",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/et.png"
    },
    {
        "id": 70,
        "name_ar": "جزر فوكلاند",
        "name_en": "Falkland Islands",
        "iso_code": "FK",
        "country_code": "500",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/fk.png"
    },
    {
        "id": 71,
        "name_ar": "جزر فارو",
        "name_en": "Faroe Islands",
        "iso_code": "FO",
        "country_code": "298",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/fo.png"
    },
    {
        "id": 72,
        "name_ar": "فيجي",
        "name_en": "Fiji",
        "iso_code": "FJ",
        "country_code": "679",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/fj.png"
    },
    {
        "id": 73,
        "name_ar": "فنلندا",
        "name_en": "Finland",
        "iso_code": "FI",
        "country_code": "358",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/fi.png"
    },
    {
        "id": 74,
        "name_ar": "فرنسا",
        "name_en": "France",
        "iso_code": "FR",
        "country_code": "33",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/fr.png"
    },
    {
        "id": 75,
        "name_ar": "غويانا",
        "name_en": "French Guiana",
        "iso_code": "GF",
        "country_code": "594",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gf.png"
    },
    {
        "id": 76,
        "name_ar": "بولينيزيا الفرنسية",
        "name_en": "French Polynesia",
        "iso_code": "PF",
        "country_code": "689",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pf.png"
    },
    {
        "id": 77,
        "name_ar": "المقاطعات الجنوبية الفرنسية",
        "name_en": "French Southern Territories",
        "iso_code": "TF",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tf.png"
    },
    {
        "id": 78,
        "name_ar": "الجابون",
        "name_en": "Gabon",
        "iso_code": "GA",
        "country_code": "241",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ga.png"
    },
    {
        "id": 79,
        "name_ar": "غامبيا",
        "name_en": "Gambia",
        "iso_code": "GM",
        "country_code": "220",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gm.png"
    },
    {
        "id": 80,
        "name_ar": "جورجيا",
        "name_en": "Georgia",
        "iso_code": "GE",
        "country_code": "995",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ge.png"
    },
    {
        "id": 81,
        "name_ar": "ألمانيا",
        "name_en": "Germany",
        "iso_code": "DE",
        "country_code": "49",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/de.png"
    },
    {
        "id": 82,
        "name_ar": "غانا",
        "name_en": "Ghana",
        "iso_code": "GH",
        "country_code": "233",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gh.png"
    },
    {
        "id": 83,
        "name_ar": "جبل طارق",
        "name_en": "Gibraltar",
        "iso_code": "GI",
        "country_code": "350",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gi.png"
    },
    {
        "id": 84,
        "name_ar": "اليونان",
        "name_en": "Greece",
        "iso_code": "GR",
        "country_code": "30",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gr.png"
    },
    {
        "id": 85,
        "name_ar": "جرينلاند",
        "name_en": "Greenland",
        "iso_code": "GL",
        "country_code": "299",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gl.png"
    },
    {
        "id": 86,
        "name_ar": "جرينادا",
        "name_en": "Grenada",
        "iso_code": "GD",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gd.png"
    },
    {
        "id": 87,
        "name_ar": "جوادلوب",
        "name_en": "Guadeloupe",
        "iso_code": "GP",
        "country_code": "590",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gp.png"
    },
    {
        "id": 88,
        "name_ar": "جوام",
        "name_en": "Guam",
        "iso_code": "GU",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gu.png"
    },
    {
        "id": 89,
        "name_ar": "جواتيمالا",
        "name_en": "Guatemala",
        "iso_code": "GT",
        "country_code": "502",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gt.png"
    },
    {
        "id": 90,
        "name_ar": "غينيا",
        "name_en": "Guinea",
        "iso_code": "GN",
        "country_code": "224",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gn.png"
    },
    {
        "id": 91,
        "name_ar": "غينيا بيساو",
        "name_en": "Guinea-Bissau",
        "iso_code": "GW",
        "country_code": "245",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gw.png"
    },
    {
        "id": 92,
        "name_ar": "غيانا",
        "name_en": "Guyana",
        "iso_code": "GY",
        "country_code": "592",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gy.png"
    },
    {
        "id": 93,
        "name_ar": "هايتي",
        "name_en": "Haiti",
        "iso_code": "HT",
        "country_code": "509",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ht.png"
    },
    {
        "id": 94,
        "name_ar": "جزيرة هيرد وماكدونالد",
        "name_en": "Heard Island and McDonald Islands",
        "iso_code": "HM",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/hm.png"
    },
    {
        "id": 95,
        "name_ar": "هندوراس",
        "name_en": "Honduras",
        "iso_code": "HN",
        "country_code": "504",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/hn.png"
    },
    {
        "id": 96,
        "name_ar": "هونج كونج الصينية",
        "name_en": "Hong Kong SAR China",
        "iso_code": "HK",
        "country_code": "852",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/hk.png"
    },
    {
        "id": 97,
        "name_ar": "المجر",
        "name_en": "Hungary",
        "iso_code": "HU",
        "country_code": "36",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/hu.png"
    },
    {
        "id": 98,
        "name_ar": "أيسلندا",
        "name_en": "Iceland",
        "iso_code": "IS",
        "country_code": "354",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/is.png"
    },
    {
        "id": 99,
        "name_ar": "الهند",
        "name_en": "India",
        "iso_code": "IN",
        "country_code": "91",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/in.png"
    },
    {
        "id": 100,
        "name_ar": "اندونيسيا",
        "name_en": "Indonesia",
        "iso_code": "ID",
        "country_code": "62",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/id.png"
    },
    {
        "id": 101,
        "name_ar": "ايران",
        "name_en": "Iran",
        "iso_code": "IR",
        "country_code": "98",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ir.png"
    },
    {
        "id": 102,
        "name_ar": "العراق",
        "name_en": "Iraq",
        "iso_code": "IQ",
        "country_code": "964",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/iq.png"
    },
    {
        "id": 103,
        "name_ar": "أيرلندا",
        "name_en": "Ireland",
        "iso_code": "IE",
        "country_code": "353",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ie.png"
    },
    {
        "id": 104,
        "name_ar": "جزيرة مان",
        "name_en": "Isle of Man",
        "iso_code": "IM",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/im.png"
    },
    {
        "id": 105,
        "name_ar": "اسرائيل",
        "name_en": "Israel",
        "iso_code": "IL",
        "country_code": "972",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/il.png"
    },
    {
        "id": 106,
        "name_ar": "ايطاليا",
        "name_en": "Italy",
        "iso_code": "IT",
        "country_code": "39",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/it.png"
    },
    {
        "id": 107,
        "name_ar": "جامايكا",
        "name_en": "Jamaica",
        "iso_code": "JM",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/jm.png"
    },
    {
        "id": 108,
        "name_ar": "اليابان",
        "name_en": "Japan",
        "iso_code": "JP",
        "country_code": "81",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/jp.png"
    },
    {
        "id": 109,
        "name_ar": "جيرسي",
        "name_en": "Jersey",
        "iso_code": "JE",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/je.png"
    },
    {
        "id": 110,
        "name_ar": "الأردن",
        "name_en": "Jordan",
        "iso_code": "JO",
        "country_code": "962",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/jo.png"
    },
    {
        "id": 111,
        "name_ar": "كازاخستان",
        "name_en": "Kazakhstan",
        "iso_code": "KZ",
        "country_code": "7",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/kz.png"
    },
    {
        "id": 112,
        "name_ar": "كينيا",
        "name_en": "Kenya",
        "iso_code": "KE",
        "country_code": "254",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ke.png"
    },
    {
        "id": 113,
        "name_ar": "كيريباتي",
        "name_en": "Kiribati",
        "iso_code": "KI",
        "country_code": "686",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ki.png"
    },
    {
        "id": 114,
        "name_ar": "الكويت",
        "name_en": "Kuwait",
        "iso_code": "KW",
        "country_code": "59",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/kw.png"
    },
    {
        "id": 115,
        "name_ar": "قرغيزستان",
        "name_en": "Kyrgyzstan",
        "iso_code": "KG",
        "country_code": "996",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/kg.png"
    },
    {
        "id": 116,
        "name_ar": "لاوس",
        "name_en": "Laos",
        "iso_code": "LA",
        "country_code": "856",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/la.png"
    },
    {
        "id": 117,
        "name_ar": "لاتفيا",
        "name_en": "Latvia",
        "iso_code": "LV",
        "country_code": "371",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/lv.png"
    },
    {
        "id": 118,
        "name_ar": "لبنان",
        "name_en": "Lebanon",
        "iso_code": "LB",
        "country_code": "961",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/lb.png"
    },
    {
        "id": 119,
        "name_ar": "ليسوتو",
        "name_en": "Lesotho",
        "iso_code": "LS",
        "country_code": "266",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ls.png"
    },
    {
        "id": 120,
        "name_ar": "ليبيريا",
        "name_en": "Liberia",
        "iso_code": "LR",
        "country_code": "231",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/lr.png"
    },
    {
        "id": 121,
        "name_ar": "ليبيا",
        "name_en": "Libya",
        "iso_code": "LY",
        "country_code": "218",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ly.png"
    },
    {
        "id": 122,
        "name_ar": "ليختنشتاين",
        "name_en": "Liechtenstein",
        "iso_code": "LI",
        "country_code": "243",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/li.png"
    },
    {
        "id": 123,
        "name_ar": "ليتوانيا",
        "name_en": "Lithuania",
        "iso_code": "LT",
        "country_code": "370",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/lt.png"
    },
    {
        "id": 124,
        "name_ar": "لوكسمبورج",
        "name_en": "Luxembourg",
        "iso_code": "LU",
        "country_code": "352",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/lu.png"
    },
    {
        "id": 125,
        "name_ar": "ماكاو الصينية",
        "name_en": "Macau SAR China",
        "iso_code": "MO",
        "country_code": "853",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mo.png"
    },
    {
        "id": 126,
        "name_ar": "مقدونيا",
        "name_en": "Macedonia",
        "iso_code": "MK",
        "country_code": "389",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mk.png"
    },
    {
        "id": 127,
        "name_ar": "مدغشقر",
        "name_en": "Madagascar",
        "iso_code": "MG",
        "country_code": "261",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mg.png"
    },
    {
        "id": 128,
        "name_ar": "ملاوي",
        "name_en": "Malawi",
        "iso_code": "MW",
        "country_code": "265",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mw.png"
    },
    {
        "id": 129,
        "name_ar": "ماليزيا",
        "name_en": "Malaysia",
        "iso_code": "MY",
        "country_code": "60",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/my.png"
    },
    {
        "id": 130,
        "name_ar": "جزر الملديف",
        "name_en": "Maldives",
        "iso_code": "MV",
        "country_code": "960",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mv.png"
    },
    {
        "id": 131,
        "name_ar": "مالي",
        "name_en": "Mali",
        "iso_code": "ML",
        "country_code": "223",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ml.png"
    },
    {
        "id": 132,
        "name_ar": "مالطا",
        "name_en": "Malta",
        "iso_code": "MT",
        "country_code": "356",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mt.png"
    },
    {
        "id": 133,
        "name_ar": "جزر المارشال",
        "name_en": "Marshall Islands",
        "iso_code": "MH",
        "country_code": "692",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mh.png"
    },
    {
        "id": 134,
        "name_ar": "مارتينيك",
        "name_en": "Martinique",
        "iso_code": "MQ",
        "country_code": "596",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mq.png"
    },
    {
        "id": 135,
        "name_ar": "موريتانيا",
        "name_en": "Mauritania",
        "iso_code": "MR",
        "country_code": "222",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mr.png"
    },
    {
        "id": 136,
        "name_ar": "موريشيوس",
        "name_en": "Mauritius",
        "iso_code": "MU",
        "country_code": "230",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mu.png"
    },
    {
        "id": 137,
        "name_ar": "مايوت",
        "name_en": "Mayotte",
        "iso_code": "YT",
        "country_code": "262",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/yt.png"
    },
    {
        "id": 138,
        "name_ar": "المكسيك",
        "name_en": "Mexico",
        "iso_code": "MX",
        "country_code": "52",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mx.png"
    },
    {
        "id": 139,
        "name_ar": "ميكرونيزيا",
        "name_en": "Micronesia",
        "iso_code": "FM",
        "country_code": "691",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/fm.png"
    },
    {
        "id": 140,
        "name_ar": "مولدافيا",
        "name_en": "Moldova",
        "iso_code": "MD",
        "country_code": "373",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/md.png"
    },
    {
        "id": 141,
        "name_ar": "موناكو",
        "name_en": "Monaco",
        "iso_code": "MC",
        "country_code": "377",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mc.png"
    },
    {
        "id": 142,
        "name_ar": "منغوليا",
        "name_en": "Mongolia",
        "iso_code": "MN",
        "country_code": "976",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mn.png"
    },
    {
        "id": 143,
        "name_ar": "الجبل الأسود",
        "name_en": "Montenegro",
        "iso_code": "ME",
        "country_code": "382",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/me.png"
    },
    {
        "id": 144,
        "name_ar": "مونتسرات",
        "name_en": "Montserrat",
        "iso_code": "MS",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ms.png"
    },
    {
        "id": 145,
        "name_ar": "المغرب",
        "name_en": "Morocco",
        "iso_code": "MA",
        "country_code": "212",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ma.png"
    },
    {
        "id": 146,
        "name_ar": "موزمبيق",
        "name_en": "Mozambique",
        "iso_code": "MZ",
        "country_code": "258",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mz.png"
    },
    {
        "id": 147,
        "name_ar": "ميانمار",
        "name_en": "Myanmar [Burma]",
        "iso_code": "MM",
        "country_code": "95",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mm.png"
    },
    {
        "id": 148,
        "name_ar": "ناميبيا",
        "name_en": "Namibia",
        "iso_code": "NA",
        "country_code": "264",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/na.png"
    },
    {
        "id": 149,
        "name_ar": "نورو",
        "name_en": "Nauru",
        "iso_code": "NR",
        "country_code": "674",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/nr.png"
    },
    {
        "id": 150,
        "name_ar": "نيبال",
        "name_en": "Nepal",
        "iso_code": "NP",
        "country_code": "977",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/np.png"
    },
    {
        "id": 151,
        "name_ar": "هولندا",
        "name_en": "Netherlands",
        "iso_code": "NL",
        "country_code": "31",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/nl.png"
    },
    {
        "id": 152,
        "name_ar": "جزر الأنتيل الهولندية",
        "name_en": "Netherlands Antilles",
        "iso_code": "AN",
        "country_code": "599",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/an.png"
    },
    {
        "id": 153,
        "name_ar": "كاليدونيا الجديدة",
        "name_en": "New Caledonia",
        "iso_code": "NC",
        "country_code": "687",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/nc.png"
    },
    {
        "id": 154,
        "name_ar": "نيوزيلاندا",
        "name_en": "New Zealand",
        "iso_code": "NZ",
        "country_code": "64",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/nz.png"
    },
    {
        "id": 155,
        "name_ar": "نيكاراجوا",
        "name_en": "Nicaragua",
        "iso_code": "NI",
        "country_code": "505",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ni.png"
    },
    {
        "id": 156,
        "name_ar": "النيجر",
        "name_en": "Niger",
        "iso_code": "NE",
        "country_code": "227",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ne.png"
    },
    {
        "id": 157,
        "name_ar": "نيجيريا",
        "name_en": "Nigeria",
        "iso_code": "NG",
        "country_code": "234",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ng.png"
    },
    {
        "id": 158,
        "name_ar": "نيوي",
        "name_en": "Niue",
        "iso_code": "NU",
        "country_code": "683",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/nu.png"
    },
    {
        "id": 159,
        "name_ar": "جزيرة نورفوك",
        "name_en": "Norfolk Island",
        "iso_code": "NF",
        "country_code": "672",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/nf.png"
    },
    {
        "id": 160,
        "name_ar": "كوريا الشمالية",
        "name_en": "North Korea",
        "iso_code": "KP",
        "country_code": "850",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/kp.png"
    },
    {
        "id": 161,
        "name_ar": "جزر ماريانا الشمالية",
        "name_en": "Northern Mariana Islands",
        "iso_code": "MP",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mp.png"
    },
    {
        "id": 162,
        "name_ar": "النرويج",
        "name_en": "Norway",
        "iso_code": "NO",
        "country_code": "47",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/no.png"
    },
    {
        "id": 163,
        "name_ar": "عمان",
        "name_en": "Oman",
        "iso_code": "OM",
        "country_code": "968",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/om.png"
    },
    {
        "id": 164,
        "name_ar": "باكستان",
        "name_en": "Pakistan",
        "iso_code": "PK",
        "country_code": "92",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pk.png"
    },
    {
        "id": 165,
        "name_ar": "بالاو",
        "name_en": "Palau",
        "iso_code": "PW",
        "country_code": "680",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pw.png"
    },
    {
        "id": 166,
        "name_ar": "فلسطين",
        "name_en": "Palestinian Territories",
        "iso_code": "PS",
        "country_code": "970",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ps.png"
    },
    {
        "id": 167,
        "name_ar": "بنما",
        "name_en": "Panama",
        "iso_code": "PA",
        "country_code": "507",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pa.png"
    },
    {
        "id": 168,
        "name_ar": "بابوا غينيا الجديدة",
        "name_en": "Papua New Guinea",
        "iso_code": "PG",
        "country_code": "675",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pg.png"
    },
    {
        "id": 169,
        "name_ar": "باراجواي",
        "name_en": "Paraguay",
        "iso_code": "PY",
        "country_code": "595",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/py.png"
    },
    {
        "id": 170,
        "name_ar": "بيرو",
        "name_en": "Peru",
        "iso_code": "PE",
        "country_code": "51",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pe.png"
    },
    {
        "id": 171,
        "name_ar": "الفيلبين",
        "name_en": "Philippines",
        "iso_code": "PH",
        "country_code": "63",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ph.png"
    },
    {
        "id": 172,
        "name_ar": "بتكايرن",
        "name_en": "Pitcairn Islands",
        "iso_code": "PN",
        "country_code": "870",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pn.png"
    },
    {
        "id": 173,
        "name_ar": "بولندا",
        "name_en": "Poland",
        "iso_code": "PL",
        "country_code": "48",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pl.png"
    },
    {
        "id": 174,
        "name_ar": "البرتغال",
        "name_en": "Portugal",
        "iso_code": "PT",
        "country_code": "351",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pt.png"
    },
    {
        "id": 175,
        "name_ar": "بورتوريكو",
        "name_en": "Puerto Rico",
        "iso_code": "PR",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pr.png"
    },
    {
        "id": 176,
        "name_ar": "قطر",
        "name_en": "Qatar",
        "iso_code": "QA",
        "country_code": "974",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/qa.png"
    },
    {
        "id": 177,
        "name_ar": "رومانيا",
        "name_en": "Romania",
        "iso_code": "RO",
        "country_code": "40",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ro.png"
    },
    {
        "id": 178,
        "name_ar": "روسيا",
        "name_en": "Russia",
        "iso_code": "RU",
        "country_code": "7",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ru.png"
    },
    {
        "id": 179,
        "name_ar": "رواندا",
        "name_en": "Rwanda",
        "iso_code": "RW",
        "country_code": "250",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/rw.png"
    },
    {
        "id": 180,
        "name_ar": "روينيون",
        "name_en": "Réunion",
        "iso_code": "RE",
        "country_code": "262",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/re.png"
    },
    {
        "id": 181,
        "name_ar": "سانت هيلنا",
        "name_en": "Saint Helena",
        "iso_code": "SH",
        "country_code": "290",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sh.png"
    },
    {
        "id": 182,
        "name_ar": "سانت كيتس ونيفيس",
        "name_en": "Saint Kitts and Nevis",
        "iso_code": "KN",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/kn.png"
    },
    {
        "id": 183,
        "name_ar": "سانت لوسيا",
        "name_en": "Saint Lucia",
        "iso_code": "LC",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/lc.png"
    },
    {
        "id": 184,
        "name_ar": "سانت مارتين",
        "name_en": "Saint Martin",
        "iso_code": "MF",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/mf.png"
    },
    {
        "id": 185,
        "name_ar": "سانت بيير وميكولون",
        "name_en": "Saint Pierre and Miquelon",
        "iso_code": "PM",
        "country_code": "508",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/pm.png"
    },
    {
        "id": 186,
        "name_ar": "سانت فنسنت وغرنادين",
        "name_en": "Saint Vincent and the Grenadines",
        "iso_code": "VC",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/vc.png"
    },
    {
        "id": 187,
        "name_ar": "ساموا",
        "name_en": "Samoa",
        "iso_code": "WS",
        "country_code": "685",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ws.png"
    },
    {
        "id": 188,
        "name_ar": "سان مارينو",
        "name_en": "San Marino",
        "iso_code": "SM",
        "country_code": "378",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sm.png"
    },
    {
        "id": 189,
        "name_ar": "المملكة العربية السعودية",
        "name_en": "Saudi Arabia",
        "iso_code": "SA",
        "country_code": "966",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sa.png"
    },
    {
        "id": 190,
        "name_ar": "السنغال",
        "name_en": "Senegal",
        "iso_code": "SN",
        "country_code": "221",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sn.png"
    },
    {
        "id": 191,
        "name_ar": "صربيا",
        "name_en": "Serbia",
        "iso_code": "RS",
        "country_code": "381",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/rs.png"
    },
    {
        "id": 192,
        "name_ar": "صربيا والجبل الأسود",
        "name_en": "Serbia and Montenegro",
        "iso_code": "CS",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/cs.png"
    },
    {
        "id": 193,
        "name_ar": "سيشل",
        "name_en": "Seychelles",
        "iso_code": "SC",
        "country_code": "248",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sc.png"
    },
    {
        "id": 194,
        "name_ar": "سيراليون",
        "name_en": "Sierra Leone",
        "iso_code": "SL",
        "country_code": "232",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sl.png"
    },
    {
        "id": 195,
        "name_ar": "سنغافورة",
        "name_en": "Singapore",
        "iso_code": "SG",
        "country_code": "65",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sg.png"
    },
    {
        "id": 196,
        "name_ar": "سلوفاكيا",
        "name_en": "Slovakia",
        "iso_code": "SK",
        "country_code": "421",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sk.png"
    },
    {
        "id": 197,
        "name_ar": "سلوفينيا",
        "name_en": "Slovenia",
        "iso_code": "SI",
        "country_code": "386",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/si.png"
    },
    {
        "id": 198,
        "name_ar": "جزر سليمان",
        "name_en": "Solomon Islands",
        "iso_code": "SB",
        "country_code": "677",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sb.png"
    },
    {
        "id": 199,
        "name_ar": "الصومال",
        "name_en": "Somalia",
        "iso_code": "SO",
        "country_code": "252",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/so.png"
    },
    {
        "id": 200,
        "name_ar": "جمهورية جنوب افريقيا",
        "name_en": "South Africa",
        "iso_code": "ZA",
        "country_code": "27",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/za.png"
    },
    {
        "id": 201,
        "name_ar": "جورجيا الجنوبية وجزر ساندويتش الجنوبية",
        "name_en": "South Georgia and the South Sandwich Islands",
        "iso_code": "GS",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gs.png"
    },
    {
        "id": 202,
        "name_ar": "كوريا الجنوبية",
        "name_en": "South Korea",
        "iso_code": "KR",
        "country_code": "82",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/kr.png"
    },
    {
        "id": 203,
        "name_ar": "أسبانيا",
        "name_en": "Spain",
        "iso_code": "ES",
        "country_code": "34",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/es.png"
    },
    {
        "id": 204,
        "name_ar": "سريلانكا",
        "name_en": "Sri Lanka",
        "iso_code": "LK",
        "country_code": "94",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/lk.png"
    },
    {
        "id": 205,
        "name_ar": "السودان",
        "name_en": "Sudan",
        "iso_code": "SD",
        "country_code": "249",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sd.png"
    },
    {
        "id": 206,
        "name_ar": "سورينام",
        "name_en": "Suriname",
        "iso_code": "SR",
        "country_code": "597",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sr.png"
    },
    {
        "id": 207,
        "name_ar": "سفالبارد وجان مايان",
        "name_en": "Svalbard and Jan Mayen",
        "iso_code": "SJ",
        "country_code": "47",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sj.png"
    },
    {
        "id": 208,
        "name_ar": "سوازيلاند",
        "name_en": "Swaziland",
        "iso_code": "SZ",
        "country_code": "268",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sz.png"
    },
    {
        "id": 209,
        "name_ar": "السويد",
        "name_en": "Sweden",
        "iso_code": "SE",
        "country_code": "46",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/se.png"
    },
    {
        "id": 210,
        "name_ar": "سويسرا",
        "name_en": "Switzerland",
        "iso_code": "CH",
        "country_code": "41",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ch.png"
    },
    {
        "id": 211,
        "name_ar": "سوريا",
        "name_en": "Syria",
        "iso_code": "SY",
        "country_code": "963",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/sy.png"
    },
    {
        "id": 212,
        "name_ar": "ساو تومي وبرينسيبي",
        "name_en": "São Tomé and Príncipe",
        "iso_code": "ST",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/st.png"
    },
    {
        "id": 213,
        "name_ar": "تايوان",
        "name_en": "Taiwan",
        "iso_code": "TW",
        "country_code": "886",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tw.png"
    },
    {
        "id": 214,
        "name_ar": "طاجكستان",
        "name_en": "Tajikistan",
        "iso_code": "TJ",
        "country_code": "992",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tj.png"
    },
    {
        "id": 215,
        "name_ar": "تانزانيا",
        "name_en": "Tanzania",
        "iso_code": "TZ",
        "country_code": "255",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tz.png"
    },
    {
        "id": 216,
        "name_ar": "تايلند",
        "name_en": "Thailand",
        "iso_code": "TH",
        "country_code": "66",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/th.png"
    },
    {
        "id": 217,
        "name_ar": "تيمور الشرقية",
        "name_en": "Timor-Leste",
        "iso_code": "TL",
        "country_code": "670",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tl.png"
    },
    {
        "id": 218,
        "name_ar": "توجو",
        "name_en": "Togo",
        "iso_code": "TG",
        "country_code": "228",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tg.png"
    },
    {
        "id": 219,
        "name_ar": "توكيلو",
        "name_en": "Tokelau",
        "iso_code": "TK",
        "country_code": "690",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tk.png"
    },
    {
        "id": 220,
        "name_ar": "تونجا",
        "name_en": "Tonga",
        "iso_code": "TO",
        "country_code": "676",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/to.png"
    },
    {
        "id": 221,
        "name_ar": "ترينيداد وتوباغو",
        "name_en": "Trinidad and Tobago",
        "iso_code": "TT",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tt.png"
    },
    {
        "id": 222,
        "name_ar": "تونس",
        "name_en": "Tunisia",
        "iso_code": "TN",
        "country_code": "216",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tn.png"
    },
    {
        "id": 223,
        "name_ar": "تركيا",
        "name_en": "Turkey",
        "iso_code": "TR",
        "country_code": "90",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tr.png"
    },
    {
        "id": 224,
        "name_ar": "تركمانستان",
        "name_en": "Turkmenistan",
        "iso_code": "TM",
        "country_code": "993",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tm.png"
    },
    {
        "id": 225,
        "name_ar": "جزر الترك وجايكوس",
        "name_en": "Turks and Caicos Islands",
        "iso_code": "TC",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tc.png"
    },
    {
        "id": 226,
        "name_ar": "توفالو",
        "name_en": "Tuvalu",
        "iso_code": "TV",
        "country_code": "688",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/tv.png"
    },
    {
        "id": 227,
        "name_ar": "جزر الولايات المتحدة البعيدة الصغيرة",
        "name_en": "U.S. Minor Outlying Islands",
        "iso_code": "UM",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/um.png"
    },
    {
        "id": 228,
        "name_ar": "جزر فرجين الأمريكية",
        "name_en": "U.S. Virgin Islands",
        "iso_code": "VI",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/vi.png"
    },
    {
        "id": 229,
        "name_ar": "أوغندا",
        "name_en": "Uganda",
        "iso_code": "UG",
        "country_code": "256",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ug.png"
    },
    {
        "id": 230,
        "name_ar": "أوكرانيا",
        "name_en": "Ukraine",
        "iso_code": "UA",
        "country_code": "380",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ua.png"
    },
    {
        "id": 231,
        "name_ar": "الامارات العربية المتحدة",
        "name_en": "United Arab Emirates",
        "iso_code": "AE",
        "country_code": "971",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ae.png"
    },
    {
        "id": 232,
        "name_ar": "المملكة المتحدة",
        "name_en": "United Kingdom",
        "iso_code": "GB",
        "country_code": "44",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/gb.png"
    },
    {
        "id": 233,
        "name_ar": "الولايات المتحدة الأمريكية",
        "name_en": "United States",
        "iso_code": "US",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/us.png"
    },
    {
        "id": 234,
        "name_ar": "منطقة غير معرفة",
        "name_en": "Unknown or Invalid Region",
        "iso_code": "ZZ",
        "country_code": "1",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/zz.png"
    },
    {
        "id": 235,
        "name_ar": "أورجواي",
        "name_en": "Uruguay",
        "iso_code": "UY",
        "country_code": "598",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/uy.png"
    },
    {
        "id": 236,
        "name_ar": "أوزبكستان",
        "name_en": "Uzbekistan",
        "iso_code": "UZ",
        "country_code": "998",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/uz.png"
    },
    {
        "id": 237,
        "name_ar": "فانواتو",
        "name_en": "Vanuatu",
        "iso_code": "VU",
        "country_code": "678",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/vu.png"
    },
    {
        "id": 238,
        "name_ar": "الفاتيكان",
        "name_en": "Vatican City",
        "iso_code": "VA",
        "country_code": "379",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/va.png"
    },
    {
        "id": 239,
        "name_ar": "فنزويلا",
        "name_en": "Venezuela",
        "iso_code": "VE",
        "country_code": "58",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ve.png"
    },
    {
        "id": 240,
        "name_ar": "فيتنام",
        "name_en": "Vietnam",
        "iso_code": "VN",
        "country_code": "84",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/vn.png"
    },
    {
        "id": 241,
        "name_ar": "جزر والس وفوتونا",
        "name_en": "Wallis and Futuna",
        "iso_code": "WF",
        "country_code": "681",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/wf.png"
    },
    {
        "id": 242,
        "name_ar": "الصحراء الغربية",
        "name_en": "Western Sahara",
        "iso_code": "EH",
        "country_code": "212",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/eh.png"
    },
    {
        "id": 243,
        "name_ar": "اليمن",
        "name_en": "Yemen",
        "iso_code": "YE",
        "country_code": "967",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ye.png"
    },
    {
        "id": 244,
        "name_ar": "زامبيا",
        "name_en": "Zambia",
        "iso_code": "ZM",
        "country_code": "260",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/zm.png"
    },
    {
        "id": 245,
        "name_ar": "زيمبابوي",
        "name_en": "Zimbabwe",
        "iso_code": "ZW",
        "country_code": "236",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/zw.png"
    },
    {
        "id": 246,
        "name_ar": "جزر أولان",
        "name_en": "Åland Islands",
        "iso_code": "AX",
        "country_code": "358",
        "deleted_at": null,
        "created_at": null,
        "updated_at": null,
        "flag": "http:\/\/wajad.test\/images\/flags\/ax.png"
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/countrycodes</code></p>
<!-- END_a8e9988fc450431ae63401388912b16a -->
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
<h2>Login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user":"00966236363256","password":"123456789","device_type":"harum","mobile_country_id":"quia"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user": "00966236363256",
    "password": "123456789",
    "device_type": "harum",
    "mobile_country_id": "quia"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "token_type": "Bearer",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9sb2dpbiIsImlhdCI6MTU3NTM2OTMzMSwiZXhwIjoxNTc1NTg1MzMxLCJuYmYiOjE1NzUzNjkzMzEsImp0aSI6InQ2eTB2Q0JvWHMzYllYcjEiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.LEWVdQFO7AMtEPjx8IlnfbAzRKlrSqAdvs_lSWF9Cqs",
    "expires_in": 216000,
    "user": {
        "id": 1,
        "name": "Api User",
        "email": "api_user_@wajad.co",
        "status": 1,
        "mobile_number": "1006994920",
        "receive_emails": false,
        "receive_push_notifications": false,
        "is_email_verified": false,
        "is_mobile_number_verified": false,
        "default_distance_unit": "kilo",
        "image": "image.png"
    }
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "These credentials do not match our records.",
    "status_code": 401
}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "please enter a valid email address or phone number.",
    "status_code": 400
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user</code></td>
<td>numeric,email,min:9,max:14</td>
<td>required</td>
<td>phone number or email for the user.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>min:6 password.</td>
</tr>
<tr>
<td><code>device_type</code></td>
<td>string</td>
<td>required</td>
<td>android or ios</td>
</tr>
<tr>
<td><code>mobile_country_id</code></td>
<td>numeric</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
<h2>Register</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Api Username","email":"api@wajad.com","password":"123456789","mobile_number":"123456789","device_type":"assumenda","mobile_country_id":5}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Api Username",
    "email": "api@wajad.com",
    "password": "123456789",
    "mobile_number": "123456789",
    "device_type": "assumenda",
    "mobile_country_id": 5
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "token_type": "Bearer",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTU3NTM2OTk2NCwiZXhwIjoxNTc1NTg1OTY0LCJuYmYiOjE1NzUzNjk5NjQsImp0aSI6IjU0dEQ5WDU5NHROd212QngiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.tja6CsTMHh2NIOYpCfAFVbshcX4DWRc2HQ4zYwid6zQ",
    "expires_in": 216000,
    "user": {
        "id": 1,
        "name": "Api User",
        "email": "api_user_@wajad.co",
        "status": 1,
        "mobile_number": "1006994920",
        "receive_emails": false,
        "receive_push_notifications": false,
        "is_email_verified": false,
        "is_mobile_number_verified": false,
        "default_distance_unit": "kilo",
        "image": "image.png",
        "country": {
            "id": 64,
            "name_ar": "مصر",
            "name_en": "Egypt",
            "iso_code": "EG",
            "country_code": "20",
            "deleted_at": null,
            "created_at": null,
            "updated_at": null
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/register</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>required</td>
<td>'min:6','max:255' .</td>
</tr>
<tr>
<td><code>email</code></td>
<td>email</td>
<td>required</td>
<td>email,unique:users,email.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>min:6 .</td>
</tr>
<tr>
<td><code>mobile_number</code></td>
<td>numeric</td>
<td>required</td>
<td>min:6,unique:users,mobile_number,digits_between:9,14.</td>
</tr>
<tr>
<td><code>device_type</code></td>
<td>string</td>
<td>required</td>
<td>android or ios</td>
</tr>
<tr>
<td><code>mobile_country_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:countries,id</td>
</tr>
</tbody>
</table>
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->
<!-- START_406e4552819a456070d1f6c93688188d -->
<h2>Refresh Token</h2>
<p>[Refresh the current API Beaerer Token]</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/refreshToken" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"debitis"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/refreshToken"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "debitis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "token_type": "Bearer",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTU3NTM2OTk2NCwiZXhwIjoxNTc1NTg1OTY0LCJuYmYiOjE1NzUzNjk5NjQsImp0aSI6IjU0dEQ5WDU5NHROd212QngiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.tja6CsTMHh2NIOYpCfAFVbshcX4DWRc2HQ4zYwid6zQ",
    "expires_in": 216000,
    "user": {
        "id": 1,
        "name": "Api User",
        "email": "api_user_@wajad.co",
        "status": 1,
        "mobile_number": "1006994920",
        "receive_emails": false,
        "receive_push_notifications": false,
        "is_email_verified": false,
        "is_mobile_number_verified": false,
        "default_distance_unit": "kilo"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/refreshToken</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_406e4552819a456070d1f6c93688188d -->
<!-- START_c1b4f9c20bd55c55c37030195bfd263b -->
<h2>Social Login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/socialLogin/ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"iusto","device_type":"libero"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/socialLogin/ut"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "iusto",
    "device_type": "libero"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "token_type": "Bearer",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9zb2NpYWxMb2dpblwvZmFjZWJvb2siLCJpYXQiOjE1OTg1MjM2MjMsImV4cCI6MTU5ODczOTYyMywibmJmIjoxNTk4NTIzNjIzLCJqdGkiOiJYUURhRGpRVFpoQjNNRWNYIiwic3ViIjoyNCwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dQ-bgytx50E5tF42VxLFNwICdOrOjCguZReTC7AGKt8",
    "expires_in": 216000,
    "user": {
        "id": 24,
        "name": "Smart AppCo",
        "email": "a.shafik@smartappco.com",
        "status": null,
        "mobile_number": "",
        "receive_emails": false,
        "receive_push_notifications": false,
        "is_email_verified": false,
        "is_mobile_number_verified": false,
        "default_distance_unit": null,
        "quick_user_id": null,
        "quick_user_email": "a.shafik@smartappco.com",
        "quick_user_password": null,
        "image": "https:\/\/graph.facebook.com\/v3.3\/100385468456652\/picture?type=normal",
        "country": null
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/socialLogin/{driver}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>driver</code></td>
<td>optional</td>
<td>string required</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>device_type</code></td>
<td>string</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_c1b4f9c20bd55c55c37030195bfd263b -->
<!-- START_3b5687173ae5e240cea00ef4a66fe5d0 -->
<h2>Apple Login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/appleLogin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"eos","device_type":"praesentium","name":"possimus","email":"illo"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/appleLogin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "eos",
    "device_type": "praesentium",
    "name": "possimus",
    "email": "illo"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "token_type": "Bearer",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9zb2NpYWxMb2dpblwvZmFjZWJvb2siLCJpYXQiOjE1OTg1MjM2MjMsImV4cCI6MTU5ODczOTYyMywibmJmIjoxNTk4NTIzNjIzLCJqdGkiOiJYUURhRGpRVFpoQjNNRWNYIiwic3ViIjoyNCwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dQ-bgytx50E5tF42VxLFNwICdOrOjCguZReTC7AGKt8",
    "expires_in": 216000,
    "user": {
        "id": 24,
        "name": "Smart AppCo",
        "email": "a.shafik@smartappco.com",
        "status": null,
        "mobile_number": "",
        "receive_emails": false,
        "receive_push_notifications": false,
        "is_email_verified": false,
        "is_mobile_number_verified": false,
        "default_distance_unit": null,
        "quick_user_id": null,
        "quick_user_email": "a.shafik@smartappco.com",
        "quick_user_password": null,
        "image": null,
        "country": null
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/appleLogin</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>device_type</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>optional</td>
</tr>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>optional</td>
</tr>
</tbody>
</table>
<!-- END_3b5687173ae5e240cea00ef4a66fe5d0 -->
<!-- START_ea7e28be0fe9f5f4f03de00c1544e2c3 -->
<h2>Send Code</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/sendCode/phone." \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"eum"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/sendCode/phone."
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "eum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Verification code sent.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/sendCode/{type}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>phone or email.</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_ea7e28be0fe9f5f4f03de00c1544e2c3 -->
<!-- START_61739f3220a224b34228600649230ad1 -->
<h2>Logout</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"ab"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "ab"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "User logged out successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/logout</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_61739f3220a224b34228600649230ad1 -->
<h1>FCM</h1>
<!-- START_52d12c3be4526cb65821766c16d35f7e -->
<h2>Get FCM List</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/fcm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"occaecati"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/fcm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "occaecati"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": "35b355cb-0c30-46ed-b56c-e1217f71af0a",
            "payload": {
                "title": "  The Item Shawmii",
                "body": "Your Item  Shawmii Shawmiii x + jemii added successfully . ",
                "type": "item",
                "deeplink": "item",
                "image": null,
                "item": {
                    "owner": {
                        "image": "http:\/\/wajad.test\/images\/profile\/default-profile.png",
                        "country": {
                            "country_code": "93",
                            "updated_at": null,
                            "name_ar": "أفغانستان",
                            "created_at": null,
                            "id": 1,
                            "iso_code": "AF",
                            "deleted_at": null,
                            "name_en": "Afghanistan"
                        },
                        "is_email_verified": false,
                        "name": "User",
                        "receive_emails": false,
                        "id": 2,
                        "default_distance_unit": "kilo",
                        "mobile_number": "1142416124",
                        "receive_push_notifications": false,
                        "email": "ibrahim.saber512@outlook.com",
                        "status": 1,
                        "is_mobile_number_verified": false
                    },
                    "date": "2020-01-13 14:50:51",
                    "images": [],
                    "color": {
                        "name": "Silver",
                        "icon": "images\/profile\/default-profile.png",
                        "id": 9
                    },
                    "qrcode": null,
                    "title": "Shawmii",
                    "deleted_at": "",
                    "details": "Shawmiii x + jemii",
                    "model": {
                        "image": "http:\/\/wajad.test\/images\/posts\/post3.jpg",
                        "name": "Dell XPS 13",
                        "description": "CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch FHD (1,920 x 1,080) – 4k (3840 x 2160) | Storage: 256GB – 1TB SSD",
                        "id": 1
                    },
                    "id": 1,
                    "subcategory": {
                        "image": "http:\/\/wajad.test\/images\/default.png",
                        "name": "Lap top",
                        "description": null,
                        "id": 12
                    },
                    "brand": {
                        "image": "http:\/\/wajad.test\/images\/posts\/post7.jpg",
                        "name": "LCWIKIKI",
                        "description": "",
                        "id": 1
                    },
                    "status": "found"
                },
                "post": null,
                "url": null,
                "id": 1,
                "badge": 31
            },
            "created_at": "2020-04-15T17:33:22.000000Z",
            "read_at": "2020-04-15T17:33:22.000000Z"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/fcm</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_52d12c3be4526cb65821766c16d35f7e -->
<!-- START_6b045e89df94ac5ae4b0be311f58e4bb -->
<h2>Save Fcm  Device Token</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/fcm/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"fcm_token":"fugiat","lang":"iusto","device":"consequatur","token":"soluta"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/fcm/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "fcm_token": "fugiat",
    "lang": "iusto",
    "device": "consequatur",
    "token": "soluta"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "FCM Token created successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/fcm/create</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>fcm_token</code></td>
<td>required</td>
<td>optional</td>
</tr>
<tr>
<td><code>lang</code></td>
<td>required</td>
<td>optional</td>
<td>in:ar,en</td>
</tr>
<tr>
<td><code>device</code></td>
<td>required</td>
<td>optional</td>
<td>in:android,ios</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_6b045e89df94ac5ae4b0be311f58e4bb -->
<h1>Home</h1>
<!-- START_f88a061d9993dcc554330a46cccfb0dc -->
<h2>Banners</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/banners/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/home/banners/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "type": "url",
            "image": "http:\/\/wajad.test\/ddd",
            "url": "c dvd",
            "item_id": null,
            "item": null
        },
        {
            "type": "item",
            "image": "http:\/\/wajad.test\/ddd",
            "url": "c dvddfefe",
            "item_id": "1",
            "item": {
                "latitude": "30.1111111",
                "longitude": "30.1111111",
                "name": "khoih",
                "description": "jgiugiugiu",
                "city": "Cairo",
                "date": "2019-12-12 11:12:05"
            }
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/banners/{banner?}</code></p>
<!-- END_f88a061d9993dcc554330a46cccfb0dc -->
<!-- START_adef4ddd684318346ed10525cf68c6e9 -->
<h2>Posts</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/posts/odio/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/home/posts/odio/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "subCategoryName": "opjmp",
            "subCategoryIcon": "http:\/\/wajad.test\/images\/default.png",
            "subCategoryPostsCount": 3
        }
    ],
    "parentCategory": {
        "subCategoryName": "All",
        "subCategoryIcon": "http:\/\/wajad.test\/subcategories\/all.png",
        "subCategoryPostsCount": 3
    },
    "posts": [
        {
            "id": 3,
            "title": "Quibusdam aliquid omnis quia quibusdam molestiae placeat voluptatum consequatur.",
            "approval_status": 1,
            "reward": 0,
            "description": "Repudiandae sequi enim aut et praesentium adipisci. Expedita deleniti explicabo aspernatur labore occaecati quidem unde sequi. Non omnis veritatis blanditiis harum perspiciatis cum sint. Et dignissimos temporibus ut excepturi. Molestiae eos qui occaecati iste. Accusantium enim quo rerum. Dignissimos omnis rerum voluptatem fugiat id. Ad optio blanditiis quis placeat. Officiis illum id sint omnis. Quisquam tempore beatae nesciunt. Reprehenderit sed quo est nobis excepturi nisi. Non nihil dignissimos alias totam. Adipisci occaecati accusantium illum itaque velit unde. Autem voluptas voluptatem qui commodi inventore ullam quia.",
            "status": "found",
            "attached_to_item": true,
            "item": {
                "id": 1,
                "title": "poj",
                "details": "pokpo",
                "status": "found",
                "owner": {
                    "id": 2,
                    "name": "User",
                    "email": "user@nova.com",
                    "status": 1,
                    "mobile_number": "01142416124",
                    "receive_emails": false,
                    "receive_push_notifications": false,
                    "is_email_verified": false,
                    "is_mobile_number_verified": false,
                    "default_distance_unit": "kilo"
                },
                "model": {
                    "id": 3,
                    "name": "Explicabo rerum ut et dolores officiis et.",
                    "description": "Laudantium fugit ut harum magnam magnam deserunt.",
                    "image": "http:\/\/wajad.test\/default-icon.png"
                },
                "color": {
                    "id": 1,
                    "name": "Red",
                    "icon": "images\/colors\/red.png"
                },
                "brand": {
                    "id": 2,
                    "name": "Et dicta similique adipisci ut autem deleniti qui.",
                    "description": "Facilis incidunt dolores consequatur quis aliquam quia voluptatem.",
                    "image": "http:\/\/wajad.test\/\/tmp\/4886df1c2c60650759bf348635be787a.jpg"
                },
                "date": "2019-12-13 00:00:00",
                "images": [
                    "\/images\/image.png",
                    "\/images\/image.png"
                ]
            },
            "sub_category": {
                "id": 5,
                "name": "Est ipsa explicabo et suscipit maxime quidem illo.",
                "description": "Quia impedit hic nesciunt quis eum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 3,
                "name": "Explicabo rerum ut et dolores officiis et.",
                "description": "Laudantium fugit ut harum magnam magnam deserunt.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": {
                "id": 1,
                "name": "Red",
                "icon": "images\/colors\/red.png"
            },
            "date": "2019-12-08 15:40:37",
            "images": [
                "\/images\/image.png",
                "\/images\/image.png"
            ],
            "questions": [
                {
                    "id": 1,
                    "question": "question1?",
                    "answer": "answer1"
                },
                {
                    "id": 2,
                    "question": "question2?",
                    "answer": "answer2"
                },
                {
                    "id": 3,
                    "question": "question3?",
                    "answer": "answer3"
                }
            ],
            "claimers": [
                {
                    "questions": [
                        {
                            "id": 1,
                            "question": "question1?",
                            "answer": "answer1"
                        },
                        {
                            "id": 2,
                            "question": "question2?",
                            "answer": "answer2"
                        },
                        {
                            "id": 3,
                            "question": "question3?",
                            "answer": "answer3"
                        }
                    ],
                    "id": 4,
                    "name": "Braden Heathcote",
                    "email": "matt.koelpin@wunsch.com",
                    "status": 1,
                    "mobile_number": "+18155885009",
                    "receive_emails": true,
                    "receive_push_notifications": true,
                    "is_email_verified": true,
                    "is_mobile_number_verified": false,
                    "default_distance_unit": "kilo",
                    "image": "http:\/\/admin-wajad.smartappco.net\/images\/profile\/default-profile.png"
                }
            ],
            "city": {
                "id": 1,
                "name": "Al Riyadh"
            },
            "publisher": {
                "id": 105,
                "name": "teddy tf high j",
                "email": "ss@ss.com",
                "status": 1,
                "mobile_number": "966512345678",
                "receive_emails": false,
                "receive_push_notifications": false,
                "is_email_verified": false,
                "is_mobile_number_verified": true,
                "default_distance_unit": "kilo",
                "image": "http:\/\/admin-wajad.smartappco.net\/images\/profile\/sKtIyY1Kl67j9gp.png"
            }
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/posts/{status}/{subcategory_id?}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>status</code></td>
<td>required</td>
<td>string lost or found</td>
</tr>
<tr>
<td><code>subcategory_id</code></td>
<td>optional</td>
<td>int, sub_category_id, exists in sub_categories</td>
</tr>
</tbody>
</table>
<!-- END_adef4ddd684318346ed10525cf68c6e9 -->
<h1>Items</h1>
<!-- START_e18d215dd04344daa68de35e381670fd -->
<h2>User Items</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/userItems" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"quibusdam"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/userItems"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "quibusdam"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 2,
            "title": "hiughiu",
            "details": "oihiojjjjjjjjjjjjjjhioj",
            "status": "found",
            "owner": {
                "id": 2,
                "name": "User",
                "email": "user@nova.com",
                "status": 1,
                "mobile_number": "01142416124",
                "receive_emails": false,
                "receive_push_notifications": false,
                "is_email_verified": false,
                "is_mobile_number_verified": false,
                "default_distance_unit": "kilo"
            },
            "subcategory": {
                "id": 5,
                "name": "Est ipsa explicabo et suscipit maxime quidem illo.",
                "description": "Quia impedit hic nesciunt quis eum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 1,
                "name": "jhinoi",
                "description": "pjipo",
                "image": "http:\/\/wajad.test\/images\/default.png"
            },
            "color": {
                "id": 1,
                "name": "Red",
                "icon": "images\/colors\/red.png"
            },
            "brand": {
                "id": 1,
                "name": "pojmop",
                "description": "ijoi",
                "image": "http:\/\/wajad.test\/images\/default.png"
            },
            "qrcode": {
                "id": 1,
                "url": "http:\/\/api.wajad.test\/api\/scan-qr-code",
                "user": null,
                "item": {
                    "id": 1,
                    "title": "Porro est dolores at perferendis tempora.",
                    "details": "Corrupti velit alias sit a omnis illo. Soluta veritatis nihil incidunt at sit illum ad. Et voluptas earum explicabo cum sunt. Impedit ullam aliquam velit excepturi soluta. Quae atque ut perspiciatis magni. Eligendi error eius sit. Fuga minus voluptatem harum veritatis mollitia deleniti. Sequi eligendi voluptatem minus ipsum cum non ut. Eos veniam quia et est. Qui non nemo eum ducimus. Aut non ducimus et aut. Ea repellendus eaque nostrum quidem mollitia quaerat. Aliquid qui ut beatae et quidem iure quod dolor. Minima porro iure autem distinctio temporibus ut nobis. Hic accusamus veniam voluptas ipsum quisquam. Suscipit omnis id sed in. Reprehenderit cum dolorem adipisci earum sunt ullam. Est debitis numquam voluptatem dicta quia est dolore officia. Quia ducimus qui dolor esse ea eius. Velit itaque consequatur cum eaque consequatur.",
                    "status": 3,
                    "owner_id": 4,
                    "model_id": 6,
                    "color_id": 13,
                    "sub_category_id": null,
                    "brand_id": null,
                    "deleted_at": null,
                    "created_at": "2019-12-10 17:20:28",
                    "updated_at": "2019-12-10 17:20:28"
                }
            },
            "date": "2019-12-04 14:23:43",
            "images": []
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/userItems</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_e18d215dd04344daa68de35e381670fd -->
<!-- START_1f8988f8b514fb2127ba9ed8e2499f98 -->
<h2>Show Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"odio"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/items/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "odio"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 1,
        "title": "hiughiu",
        "details": "oihiojjjjjjjjjjjjjjhioj",
        "status": "found",
        "owner": {
            "id": 2,
            "name": "User",
            "email": "user@nova.com",
            "status": 1,
            "mobile_number": "01142416124",
            "receive_emails": false,
            "receive_push_notifications": false,
            "is_email_verified": false,
            "is_mobile_number_verified": false,
            "default_distance_unit": "kilo"
        },
        "subcategory": {
            "id": 5,
            "name": "Est ipsa explicabo et suscipit maxime quidem illo.",
            "description": "Quia impedit hic nesciunt quis eum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        "model": {
            "id": 1,
            "name": "jhinoi",
            "description": "pjipo",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        "color": {
            "id": 1,
            "name": "Red",
            "icon": "images\/colors\/red.png"
        },
        "brand": {
            "id": 1,
            "name": "pojmop",
            "description": "ijoi",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        "qrcode": {
            "id": 1,
            "url": "http:\/\/api.wajad.test\/api\/scan-qr-code",
            "user": null,
            "item": {
                "id": 1,
                "title": "Porro est dolores at perferendis tempora.",
                "details": "Corrupti velit alias sit a omnis illo. Soluta veritatis nihil incidunt at sit illum ad. Et voluptas earum explicabo cum sunt. Impedit ullam aliquam velit excepturi soluta. Quae atque ut perspiciatis magni. Eligendi error eius sit. Fuga minus voluptatem harum veritatis mollitia deleniti. Sequi eligendi voluptatem minus ipsum cum non ut. Eos veniam quia et est. Qui non nemo eum ducimus. Aut non ducimus et aut. Ea repellendus eaque nostrum quidem mollitia quaerat. Aliquid qui ut beatae et quidem iure quod dolor. Minima porro iure autem distinctio temporibus ut nobis. Hic accusamus veniam voluptas ipsum quisquam. Suscipit omnis id sed in. Reprehenderit cum dolorem adipisci earum sunt ullam. Est debitis numquam voluptatem dicta quia est dolore officia. Quia ducimus qui dolor esse ea eius. Velit itaque consequatur cum eaque consequatur.",
                "status": 3,
                "owner_id": 4,
                "model_id": 6,
                "color_id": 13,
                "sub_category_id": null,
                "brand_id": null,
                "deleted_at": null,
                "created_at": "2019-12-10 17:20:28",
                "updated_at": "2019-12-10 17:20:28"
            }
        },
        "date": "2019-12-04 14:17:09",
        "images": [
            {
                "id": 1,
                "image": "http:\/\/wajad.test\/images\/items\/E9S8p3Z5R7GLR1qc1xBcECGZjHBALeDLU9KtvSCN.jpeg"
            },
            {
                "id": 2,
                "image": "http:\/\/wajad.test\/images\/items\/EJgxxfyHErwzc3cPTGpCKmihIgcX8hNdYX4DirAo.jpeg"
            },
            {
                "id": 3,
                "image": "http:\/\/wajad.test\/images\/items\/GxwJYCc5eSSUj585huRcVks8m17DUwCGhEUDNubN.jpeg"
            },
            {
                "id": 4,
                "image": "http:\/\/wajad.test\/images\/items\/sp0KWN5ryd0VN6xzdIVbm9hY9dYemUlfDMD5LTmY.jpeg"
            },
            {
                "id": 5,
                "image": "http:\/\/wajad.test\/images\/items\/1hancpYm0XR8HjjK4Iz8AVAUyMqkQPOubagobDxs.jpeg"
            }
        ]
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/items/{item}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>item</code></td>
<td>required</td>
<td>int Item id.</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_1f8988f8b514fb2127ba9ed8e2499f98 -->
<!-- START_07fb85e5d8610027392f9f49c33a97c1 -->
<h2>Create Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/items" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"maxime","details":"repellat","color_id":"sed","brand_id":"et","model_id":"sed","sub_category_id":"maxime","qrcode_id":"velit","images":["eveniet"],"token":"officia"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/items"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "maxime",
    "details": "repellat",
    "color_id": "sed",
    "brand_id": "et",
    "model_id": "sed",
    "sub_category_id": "maxime",
    "qrcode_id": "velit",
    "images": [
        "eveniet"
    ],
    "token": "officia"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Item created successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/items</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>title</code></td>
<td>min:6,max:255</td>
<td>required</td>
</tr>
<tr>
<td><code>details</code></td>
<td>min:20,max:500</td>
<td>required</td>
</tr>
<tr>
<td><code>color_id</code></td>
<td>exists:colors,id</td>
<td>required</td>
</tr>
<tr>
<td><code>brand_id</code></td>
<td>exists:brands,id</td>
<td>required</td>
</tr>
<tr>
<td><code>model_id</code></td>
<td>exists:models,id</td>
<td>required</td>
</tr>
<tr>
<td><code>sub_category_id</code></td>
<td>exists:sub_category,id</td>
<td>required</td>
</tr>
<tr>
<td><code>qrcode_id</code></td>
<td>exists:qrcodes,id</td>
<td>optional</td>
</tr>
<tr>
<td><code>images</code></td>
<td>array</td>
<td>required</td>
<td>between:1,5</td>
</tr>
<tr>
<td><code>images.*</code></td>
<td>image</td>
<td>required</td>
<td>mimes:jpeg,jpg,png,gif max:5012</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_07fb85e5d8610027392f9f49c33a97c1 -->
<!-- START_589a987e1c85f683fdb556954a192f2c -->
<h2>Edit Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"voluptatem","details":"corrupti","color_id":"in","brand_id":"et","model_id":"cupiditate","sub_category_id":"sed","qrcode_id":"molestiae","images":["asperiores"],"token":"facere"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/items/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "voluptatem",
    "details": "corrupti",
    "color_id": "in",
    "brand_id": "et",
    "model_id": "cupiditate",
    "sub_category_id": "sed",
    "qrcode_id": "molestiae",
    "images": [
        "asperiores"
    ],
    "token": "facere"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Item updated successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/items/{item}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>item</code></td>
<td>required</td>
<td>int Item id.</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>title</code></td>
<td>min:6,max:255</td>
<td>required</td>
</tr>
<tr>
<td><code>details</code></td>
<td>min:20,max:500</td>
<td>required</td>
</tr>
<tr>
<td><code>color_id</code></td>
<td>exists:colors,id</td>
<td>required</td>
</tr>
<tr>
<td><code>brand_id</code></td>
<td>exists:brands,id</td>
<td>required</td>
</tr>
<tr>
<td><code>model_id</code></td>
<td>exists:models,id</td>
<td>required</td>
</tr>
<tr>
<td><code>sub_category_id</code></td>
<td>exists:sub_category,id</td>
<td>required</td>
</tr>
<tr>
<td><code>qrcode_id</code></td>
<td>exists:qrcodes,id</td>
<td>optional</td>
</tr>
<tr>
<td><code>images</code></td>
<td>array</td>
<td>required</td>
<td>between:1,5</td>
</tr>
<tr>
<td><code>images.*</code></td>
<td>image</td>
<td>required</td>
<td>mimes:jpeg,jpg,png,gif max:5012</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_589a987e1c85f683fdb556954a192f2c -->
<!-- START_4ba7e871e55098b0081507ac0b4e478b -->
<h2>Delete Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://api.wajad.test/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"temporibus"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/items/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "temporibus"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Item deleted successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/items/{item}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>item</code></td>
<td>required</td>
<td>Item id.</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_4ba7e871e55098b0081507ac0b4e478b -->
<h1>Map</h1>
<!-- START_bd6ef4ad5e299a34f4c6db1eb27ba327 -->
<h2>Map</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/maps/minima" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"longitude":"aliquam","latitude":"cum","radius":8,"unit":"aspernatur"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/maps/minima"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "longitude": "aliquam",
    "latitude": "cum",
    "radius": 8,
    "unit": "aspernatur"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "name": "Error cumque sit culpa quibusdam aut sunt nemo.",
            "details": "Quis voluptate perspiciatis officia omnis veritatis id. Voluptas culpa molestiae beatae corporis saepe quos iusto. Molestiae enim optio maiores dolor sit soluta. Aliquid commodi pariatur aliquid. Fugiat animi eos sapiente dolor possimus. Ut quo voluptatem nobis eos. Vitae nulla illum debitis consequuntur quaerat deserunt. Suscipit cum earum et et consectetur et. Tempore voluptates dolore ratione eveniet molestiae ullam. Est qui sit totam modi voluptas omnis officia. Illum nostrum vel unde iusto. Animi reiciendis odio et repellendus rem id. Qui deserunt rerum explicabo est dolorem dolorem nulla. Ratione dolorem libero doloremque laboriosam temporibus autem veniam corrupti. Accusantium ad autem excepturi quasi minus. Eveniet velit rem numquam ipsum. Voluptatibus eligendi nihil dolor hic perspiciatis. Qui omnis est voluptatem assumenda. Debitis fuga est blanditiis dolorem nihil impedit. Nihil est illum cupiditate unde beatae suscipit labore. Et alias eligendi sed quam blanditiis consequatur.",
            "latitude": -47.854138,
            "longitude": -18.526692,
            "image": "http:\/\/wajad.test\/",
            "address": ""
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/maps/{type?}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>in:lost,found,office</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>longitude</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>latitude</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>radius</code></td>
<td>integer</td>
<td>required</td>
</tr>
<tr>
<td><code>unit</code></td>
<td>string,in:kilo,mile</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_bd6ef4ad5e299a34f4c6db1eb27ba327 -->
<h1>Packages</h1>
<!-- START_c9db6d511dc413ffed938cbd76dd5af7 -->
<h2>Packages</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/packages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"aliquid"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/packages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "aliquid"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 12,
            "name": "Platinum Package",
            "description": "Get 25 QrCodes As Sticker To Sticker it on any item to protect it Activated for one year.",
            "qrcodes_count": 1500,
            "price": 1500,
            "currency": "USD",
            "period": "12 days",
            "type": "single",
            "incrementally": true,
            "max_increments": 1
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/packages</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_c9db6d511dc413ffed938cbd76dd5af7 -->
<h1>Pages</h1>
<!-- START_727da77b51e4f96916de138b4b71c037 -->
<h2>Contact Us</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/pages/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/pages/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data contact-us": {
        "Facebook-Link": "http:\/\/www.facebook.com",
        "Twitter-Link": "http:\/\/www.twitter.com",
        "Phone-Number-1": "+96611111111",
        "Phone-Number-2": "+96622222222",
        "Address1": "KSA \/ Jedda",
        "Address2": "KSA \/ Jedda 2",
        "Email1": "info@wajad.com",
        "Email2": "info2@wajad.com"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/pages/{page?}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>contact-us</code></td>
<td>required</td>
</tr>
<tr>
<td><code>about-us</code></td>
<td>required</td>
</tr>
<tr>
<td><code>privacy-policy</code></td>
<td>required</td>
</tr>
<tr>
<td><code>terms</code></td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_727da77b51e4f96916de138b4b71c037 -->
<h1>Post Request</h1>
<!-- START_b8c093319f63f6104bb55df0e5169242 -->
<h2>This item is mine</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/post/1/answer" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"data":[{"answers":"sint","question_id":17}],"token":"occaecati"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/post/1/answer"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "data": [
        {
            "answers": "sint",
            "question_id": 17
        }
    ],
    "token": "occaecati"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post request created successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/post/{post}/answer</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>post_id</code></td>
<td>required</td>
<td>int, exists in posts</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>data</code></td>
<td>array</td>
<td>required</td>
</tr>
<tr>
<td><code>data.*.answers</code></td>
<td>string</td>
<td>required</td>
<td>min:20, max:500</td>
</tr>
<tr>
<td><code>data.*.question_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:questions,id</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_b8c093319f63f6104bb55df0e5169242 -->
<h1>Posts</h1>
<!-- START_93fe34fffcec9f399970d7fffb9bcc14 -->
<h2>User Posts</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/userPosts/found." \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"fuga"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/userPosts/found."
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "fuga"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/userPosts/{type}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>lost or found.</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_93fe34fffcec9f399970d7fffb9bcc14 -->
<!-- START_af5dda572adce7d093ba91ef873857b9 -->
<h2>api/request/{post}/accept</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/request/1/accept" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/request/1/accept"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/request/{post}/accept</code></p>
<!-- END_af5dda572adce7d093ba91ef873857b9 -->
<!-- START_744b6fe741992bf8fdb4f532ceaa3586 -->
<h2>Report Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/report/post/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"details":"id","image":"nostrum","token":"nobis"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/report/post/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "details": "id",
    "image": "nostrum",
    "token": "nobis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post reported successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/report/post/{post}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int Post Id</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>details</code></td>
<td>string</td>
<td>optional</td>
<td>nullable max:1000</td>
</tr>
<tr>
<td><code>image</code></td>
<td>image</td>
<td>optional</td>
<td>sometimes mimes:jpeg,jpg,png,gif max:5102</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_744b6fe741992bf8fdb4f532ceaa3586 -->
<!-- START_726b7bf93b3209836a1cbcda5b3b6703 -->
<h2>Show Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"sed"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "sed"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 3,
        "title": "Quibusdam aliquid omnis quia quibusdam molestiae placeat voluptatum consequatur.",
        "approval_status": 1,
        "reward": 0,
        "description": "Repudiandae sequi enim aut et praesentium adipisci. Expedita deleniti explicabo aspernatur labore occaecati quidem unde sequi. Non omnis veritatis blanditiis harum perspiciatis cum sint. Et dignissimos temporibus ut excepturi. Molestiae eos qui occaecati iste. Accusantium enim quo rerum. Dignissimos omnis rerum voluptatem fugiat id. Ad optio blanditiis quis placeat. Officiis illum id sint omnis. Quisquam tempore beatae nesciunt. Reprehenderit sed quo est nobis excepturi nisi. Non nihil dignissimos alias totam. Adipisci occaecati accusantium illum itaque velit unde. Autem voluptas voluptatem qui commodi inventore ullam quia.",
        "status": "found",
        "attached_to_item": true,
        "item": {
            "id": 1,
            "title": "poj",
            "details": "pokpo",
            "status": "found",
            "owner": {
                "id": 2,
                "name": "User",
                "email": "user@nova.com",
                "status": 1,
                "mobile_number": "01142416124",
                "receive_emails": false,
                "receive_push_notifications": false,
                "is_email_verified": false,
                "is_mobile_number_verified": false,
                "default_distance_unit": "kilo"
            },
            "model": {
                "id": 3,
                "name": "Explicabo rerum ut et dolores officiis et.",
                "description": "Laudantium fugit ut harum magnam magnam deserunt.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": {
                "id": 1,
                "name": "Red",
                "icon": "images\/colors\/red.png"
            },
            "brand": {
                "id": 2,
                "name": "Et dicta similique adipisci ut autem deleniti qui.",
                "description": "Facilis incidunt dolores consequatur quis aliquam quia voluptatem.",
                "image": "http:\/\/wajad.test\/\/tmp\/4886df1c2c60650759bf348635be787a.jpg"
            },
            "date": "2019-12-13 00:00:00",
            "images": []
        },
        "sub_category": {
            "id": 5,
            "name": "Est ipsa explicabo et suscipit maxime quidem illo.",
            "description": "Quia impedit hic nesciunt quis eum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        "model": {
            "id": 3,
            "name": "Explicabo rerum ut et dolores officiis et.",
            "description": "Laudantium fugit ut harum magnam magnam deserunt.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        "color": {
            "id": 1,
            "name": "Red",
            "icon": "images\/colors\/red.png"
        },
        "date": "2019-12-08 15:40:37",
        "images": [
            {
                "id": 1,
                "image": "http:\/\/wajad.test\/default-icon.png"
            }
        ],
        "questions": [
            {
                "id": 1,
                "question": "question1?",
                "answer": "answer1"
            },
            {
                "id": 2,
                "question": "question2?",
                "answer": "answer2"
            },
            {
                "id": 3,
                "question": "question3?",
                "answer": "answer3"
            }
        ],
        "claimers": [
            {
                "questions": [
                    {
                        "id": 1,
                        "question": "question1?",
                        "answer": "answer1"
                    },
                    {
                        "id": 2,
                        "question": "question2?",
                        "answer": "answer2"
                    },
                    {
                        "id": 3,
                        "question": "question3?",
                        "answer": "answer3"
                    }
                ],
                "id": 4,
                "name": "Braden Heathcote",
                "email": "matt.koelpin@wunsch.com",
                "status": 1,
                "mobile_number": "+18155885009",
                "receive_emails": true,
                "receive_push_notifications": true,
                "is_email_verified": true,
                "is_mobile_number_verified": false,
                "default_distance_unit": "kilo",
                "image": "http:\/\/admin-wajad.smartappco.net\/images\/profile\/default-profile.png"
            }
        ],
        "city": {
            "id": 1,
            "name": "Al Riyadh"
        },
        "publisher": {
            "id": 105,
            "name": "teddy tf high j",
            "email": "ss@ss.com",
            "status": 1,
            "mobile_number": "966512345678",
            "receive_emails": false,
            "receive_push_notifications": false,
            "is_email_verified": false,
            "is_mobile_number_verified": true,
            "default_distance_unit": "kilo",
            "image": "http:\/\/admin-wajad.smartappco.net\/images\/profile\/sKtIyY1Kl67j9gp.png"
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/posts/{post}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int Post Id</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_726b7bf93b3209836a1cbcda5b3b6703 -->
<!-- START_f01269a1d8321c0c8787967b5346c585 -->
<h2>Create Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/posts/add/voluptate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"et","description":"non","reward":"rerum","longitude":"nihil","latitude":"quis","sub_category_id":11,"brand_id":8,"model_id":4,"color_id":6,"item_id":12,"city":"harum","images":["dignissimos"],"questions":["qui"],"token":"earum"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/posts/add/voluptate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "et",
    "description": "non",
    "reward": "rerum",
    "longitude": "nihil",
    "latitude": "quis",
    "sub_category_id": 11,
    "brand_id": 8,
    "model_id": 4,
    "color_id": 6,
    "item_id": 12,
    "city": "harum",
    "images": [
        "dignissimos"
    ],
    "questions": [
        "qui"
    ],
    "token": "earum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post created successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/posts/add/{type}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>string in:lost,found</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>title</code></td>
<td>string</td>
<td>required</td>
<td>min:6 max:255</td>
</tr>
<tr>
<td><code>description</code></td>
<td>string</td>
<td>required</td>
<td>min:9 max:255</td>
</tr>
<tr>
<td><code>reward</code></td>
<td>string</td>
<td>optional</td>
</tr>
<tr>
<td><code>longitude</code></td>
<td>regex:/^[-]?(([0-8]?[0-9]).(\d+))</td>
<td>(90(.0+)?)$/</td>
<td>required</td>
</tr>
<tr>
<td><code>latitude</code></td>
<td>regex:/^[-]?(([0-8]?[0-9]).(\d+))</td>
<td>(90(.0+)?)$/</td>
<td>required</td>
</tr>
<tr>
<td><code>sub_category_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:sub_categories,id</td>
</tr>
<tr>
<td><code>brand_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:brands,id</td>
</tr>
<tr>
<td><code>model_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:models,id</td>
</tr>
<tr>
<td><code>color_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:colors,id</td>
</tr>
<tr>
<td><code>item_id</code></td>
<td>integer</td>
<td>optional</td>
<td>nullable exists:items,id</td>
</tr>
<tr>
<td><code>city</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>images</code></td>
<td>array</td>
<td>required</td>
<td>between:1,5</td>
</tr>
<tr>
<td><code>images.*</code></td>
<td>image</td>
<td>required</td>
<td>mimes:jpeg,jpg,png,gif max:5012</td>
</tr>
<tr>
<td><code>questions</code></td>
<td>array</td>
<td>optional</td>
<td>sometimes size:3</td>
</tr>
<tr>
<td><code>questions.*</code></td>
<td>required</td>
<td>optional</td>
<td>min:9 max:500</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_f01269a1d8321c0c8787967b5346c585 -->
<!-- START_ddec2b5ffb0465b4f2916ca57e164686 -->
<h2>Update Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"quis","description":"reiciendis","status":"placeat","reward":"facilis","longitude":"quis","latitude":"voluptas","sub_category_id":17,"brand_id":10,"model_id":8,"color_id":7,"item_id":20,"city":"odio","images":["delectus"],"token":"odio"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "quis",
    "description": "reiciendis",
    "status": "placeat",
    "reward": "facilis",
    "longitude": "quis",
    "latitude": "voluptas",
    "sub_category_id": 17,
    "brand_id": 10,
    "model_id": 8,
    "color_id": 7,
    "item_id": 20,
    "city": "odio",
    "images": [
        "delectus"
    ],
    "token": "odio"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post updated successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/posts/{post}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int Post Id</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>title</code></td>
<td>string</td>
<td>required</td>
<td>min:6 max:255</td>
</tr>
<tr>
<td><code>description</code></td>
<td>string</td>
<td>required</td>
<td>min:9 max:255</td>
</tr>
<tr>
<td><code>status</code></td>
<td>numeric</td>
<td>required</td>
<td>in:0,1</td>
</tr>
<tr>
<td><code>reward</code></td>
<td>string</td>
<td>optional</td>
</tr>
<tr>
<td><code>longitude</code></td>
<td>regex:/^[-]?(([0-8]?[0-9]).(\d+))</td>
<td>(90(.0+)?)$/</td>
<td>required</td>
</tr>
<tr>
<td><code>latitude</code></td>
<td>regex:/^[-]?(([0-8]?[0-9]).(\d+))</td>
<td>(90(.0+)?)$/</td>
<td>required</td>
</tr>
<tr>
<td><code>sub_category_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:sub_categories,id</td>
</tr>
<tr>
<td><code>brand_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:brands,id</td>
</tr>
<tr>
<td><code>model_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:models,id</td>
</tr>
<tr>
<td><code>color_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:colors,id</td>
</tr>
<tr>
<td><code>item_id</code></td>
<td>integer</td>
<td>optional</td>
<td>nullable exists:items,id</td>
</tr>
<tr>
<td><code>city</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>images</code></td>
<td>array</td>
<td>optional</td>
<td>sometimes between:1,5</td>
</tr>
<tr>
<td><code>images.*</code></td>
<td>image</td>
<td>optional</td>
<td>sometimes mimes:jpeg,jpg,png,gif max:5012</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_ddec2b5ffb0465b4f2916ca57e164686 -->
<!-- START_790d23dbb8c799c36c70f7133a51e7a5 -->
<h2>Delete Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"asperiores"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "asperiores"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post deleted successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/posts/{post}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int Post Id</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_790d23dbb8c799c36c70f7133a51e7a5 -->
<h1>QR Codes</h1>
<!-- START_31a59373caf0e95a483c98e25d562cd6 -->
<h2>User QR Codes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/userQRCodes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"corrupti"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/userQRCodes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "corrupti"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "available": {
        "single": [
            {
                "id": 1,
                "url": "http:\/\/api.wajad.test\/api\/scan-qr-code\/1",
                "image": "",
                "type": "Single Assign",
                "status": "Assigned To User",
                "unique_reference_number": "QR-2020115-16814-wlB2C",
                "generate_reference_number": "N-2020115-16812",
                "assign_reference_number": "C-202023-161247",
                "user": {
                    "id": 2,
                    "name": "User",
                    "email": "user@nova.com",
                    "status": 1,
                    "mobile_number": "0096601120650906",
                    "receive_emails": false,
                    "receive_push_notifications": false,
                    "is_email_verified": false,
                    "is_mobile_number_verified": false,
                    "default_distance_unit": "kilo",
                    "image": "http:\/\/wajad.test\/images\/profile\/default-profile.png"
                },
                "item": null,
                "available_period": 12,
                "start_at": null,
                "end_at": null,
                "created_at": null
            }
        ],
        "available_single_count": 1,
        "multi": [],
        "available_multi_count": 1
    },
    "active": [],
    "active_count": 1,
    "expired": [],
    "expired_count": 1
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/userQRCodes</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_31a59373caf0e95a483c98e25d562cd6 -->
<!-- START_98a9f611f7c0880f849db435165db194 -->
<h2>Generate &amp; Assign QRcodes (after payment)</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/qrcodes/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"package_id":19,"count":13,"token":"temporibus"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/qrcodes/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "package_id": 19,
    "count": 13,
    "token": "temporibus"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "qrcode created successfully.",
    "status_code": 200,
    "data": [
        "http:\/\/admin.wajad.test\/images\/qrcodes\/1582038260RUIWysWSgVQdk9wRiw0p.png",
        "http:\/\/admin.wajad.test\/images\/qrcodes\/15820382600Mew2xPd332r1BoV7sIn.png",
        "http:\/\/admin.wajad.test\/images\/qrcodes\/1582038260bpxW4CDRAAZ0C1jtJApP.png"
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/qrcodes/create</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>package_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists in packages</td>
</tr>
<tr>
<td><code>count</code></td>
<td>integer</td>
<td>optional</td>
<td>min:1</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_98a9f611f7c0880f849db435165db194 -->
<!-- START_a135eedc11c467641d3a89a349a5ee2f -->
<h2>Rename QR Code</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/qrcodes/rename" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"qrcode_url":"aut","name":"et"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/qrcodes/rename"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "qrcode_url": "aut",
    "name": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "QR Code Renamed Successfully",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/qrcodes/rename</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>qrcode_url</code></td>
<td>string</td>
<td>required</td>
<td>exists in qrcodes</td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_a135eedc11c467641d3a89a349a5ee2f -->
<!-- START_389e00f673c885b6fba89198b9f21f84 -->
<h2>Assign QR Code To Me</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/qrcodes/assigntome" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"qrcode_url":"voluptas"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/qrcodes/assigntome"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "qrcode_url": "voluptas"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "QR Code Assigned Successfully",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/qrcodes/assigntome</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>qrcode_url</code></td>
<td>string</td>
<td>required</td>
<td>exists in qrcodes</td>
</tr>
</tbody>
</table>
<!-- END_389e00f673c885b6fba89198b9f21f84 -->
<!-- START_e44911633d1d17258a3523f155a43c3c -->
<h2>Register QR Code</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/register/qrcode" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"cumque"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/register/qrcode"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "cumque"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "qrcode registered successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/register/qrcode</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>qrcode_id</code></td>
<td>required</td>
<td>int exists in qrcodes</td>
</tr>
<tr>
<td><code>item_id</code></td>
<td>required</td>
<td>int exists in items</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_e44911633d1d17258a3523f155a43c3c -->
<!-- START_156b1225d7a2d5d0667f08fa8d62cc13 -->
<h2>Reregister QR Code</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/reregister/qrcode" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"repellat"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/reregister/qrcode"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "repellat"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "qrcode registered successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/reregister/qrcode</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>qrcode_id</code></td>
<td>required</td>
<td>int exists in qrcodes</td>
</tr>
<tr>
<td><code>item_id</code></td>
<td>required</td>
<td>int exists in items</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_156b1225d7a2d5d0667f08fa8d62cc13 -->
<!-- START_dbc9425b5035a4fc7e1d9d20a4f2fbcb -->
<h2>Scan QR Code</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/scan-qr-code/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"perferendis"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/scan-qr-code/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "perferendis"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 1,
        "url": "http:\/\/api.wajad.test\/api\/scan-qr-code\/1",
        "user": {
            "id": 2,
            "name": "User",
            "email": "user@nova.com",
            "status": 1,
            "mobile_number": "0096601120650906",
            "receive_emails": false,
            "receive_push_notifications": false,
            "is_email_verified": false,
            "is_mobile_number_verified": false,
            "default_distance_unit": "kilo",
            "image": "http:\/\/wajad.test\/images\/profile\/default-profile.png"
        },
        "item": null,
        "available_period": "1",
        "start_at": null,
        "end_at": null,
        "created_at": null
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/scan-qr-code/{qr_code}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>qrcode_url</code></td>
<td>required</td>
<td>string exists in qrcodes</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_dbc9425b5035a4fc7e1d9d20a4f2fbcb -->
<h1>Search</h1>
<!-- START_9d08a4da7d839136b63a8291497ec010 -->
<h2>Search Filter</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"model":15,"color":12,"brand":4,"subcategory":14,"date":"et","status":14}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/home/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "model": 15,
    "color": 12,
    "brand": 4,
    "subcategory": 14,
    "date": "et",
    "status": 14
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 3,
            "title": "Animi consectetur et expedita sit corrupti officia qui.",
            "approval_status": 1,
            "reward": 0,
            "description": "Voluptatem voluptate nesciunt nemo assumenda magni. Iste qui quia est aut. Beatae ea similique vero et quis. Dolorum aspernatur qui deserunt deserunt optio explicabo. Aut culpa autem dolor a omnis qui. Hic esse mollitia earum unde et. Eum qui tempore excepturi repellat illum. Aut ad adipisci iure est assumenda eligendi qui nemo. Modi eos libero molestiae saepe reiciendis corporis quia eveniet. Eveniet ad ducimus aspernatur in praesentium omnis voluptatem. In vel voluptatem itaque voluptatem sunt. Ad aperiam et amet et.",
            "status": "lost",
            "attached_to_item": false,
            "item": null,
            "sub_category": {
                "id": 6,
                "name": "Et expedita est explicabo qui sit veritatis.",
                "description": "Dolore rerum quo quis explicabo magni occaecati.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 4,
                "name": "Deleniti quis et ut sapiente dolores sunt.",
                "description": "Sapiente quaerat et in suscipit.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-04 18:49:46",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 4,
            "title": "Quo cupiditate quod quae recusandae iure voluptas voluptas.",
            "approval_status": 1,
            "reward": 0,
            "description": "Dolorem libero vitae eos eveniet et repellat. Veritatis eos officiis quaerat esse reprehenderit quaerat non. Hic laboriosam tenetur asperiores nemo distinctio. Rerum libero dicta et pariatur. Eveniet repudiandae consequatur quasi vero. Sit sit sunt quasi esse et debitis. Placeat non porro molestiae. Porro reprehenderit voluptas modi dolorem et. Et rerum cupiditate tempora et saepe iusto est aut. Consectetur repellendus aliquam et non in optio. Ab rerum aliquam est aspernatur laudantium suscipit. Facilis quod sed accusamus sunt ducimus nulla. Incidunt quia eligendi aut ut praesentium culpa perferendis. Ut nihil doloribus dolores. Atque qui saepe et sunt enim architecto inventore consequatur. Fugiat temporibus voluptas voluptatem sed dolor officia. Et quibusdam provident repellendus facere. Voluptas voluptatem quis ut voluptatum deserunt. Nostrum ratione fugiat qui aut nihil. Et voluptatem adipisci impedit cumque recusandae. Ut consequatur delectus ea dolor labore quaerat. Quisquam quisquam non vel.",
            "status": "found",
            "attached_to_item": false,
            "item": null,
            "sub_category": {
                "id": 8,
                "name": "Qui maiores aut sapiente aut molestiae in quam ipsam.",
                "description": "Aut soluta laborum sequi et similique.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 5,
                "name": "Id fugit corporis harum expedita.",
                "description": "Fugiat nesciunt quasi sequi autem.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-04 18:49:46",
            "images": [],
            "questions": [],
            "city": null
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/search</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>model</code></td>
<td>integer</td>
<td>optional</td>
<td>exist in models.</td>
</tr>
<tr>
<td><code>color</code></td>
<td>integer</td>
<td>optional</td>
<td>exist in colors.</td>
</tr>
<tr>
<td><code>brand</code></td>
<td>integer</td>
<td>optional</td>
<td>exist in brands.</td>
</tr>
<tr>
<td><code>subcategory</code></td>
<td>integer</td>
<td>optional</td>
<td>exist in subcategories.</td>
</tr>
<tr>
<td><code>date</code></td>
<td>date</td>
<td>optional</td>
</tr>
<tr>
<td><code>status</code></td>
<td>integer</td>
<td>optional</td>
<td>in:0,1,0 for lost, 1 for found</td>
</tr>
</tbody>
</table>
<!-- END_9d08a4da7d839136b63a8291497ec010 -->
<!-- START_a381454c94e24449400bd187815c6920 -->
<h2>Search By KeyWords</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/search/keywords" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/home/search/keywords"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 3,
            "title": "Animi consectetur et expedita sit corrupti officia qui.",
            "approval_status": 1,
            "reward": 0,
            "description": "Voluptatem voluptate nesciunt nemo assumenda magni. Iste qui quia est aut. Beatae ea similique vero et quis. Dolorum aspernatur qui deserunt deserunt optio explicabo. Aut culpa autem dolor a omnis qui. Hic esse mollitia earum unde et. Eum qui tempore excepturi repellat illum. Aut ad adipisci iure est assumenda eligendi qui nemo. Modi eos libero molestiae saepe reiciendis corporis quia eveniet. Eveniet ad ducimus aspernatur in praesentium omnis voluptatem. In vel voluptatem itaque voluptatem sunt. Ad aperiam et amet et.",
            "status": "lost",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 6,
                "name": "Et expedita est explicabo qui sit veritatis.",
                "description": "Dolore rerum quo quis explicabo magni occaecati.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 4,
                "name": "Deleniti quis et ut sapiente dolores sunt.",
                "description": "Sapiente quaerat et in suscipit.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-04 18:49:46",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 4,
            "title": "Quo cupiditate quod quae recusandae iure voluptas voluptas.",
            "approval_status": 1,
            "reward": 0,
            "description": "Dolorem libero vitae eos eveniet et repellat. Veritatis eos officiis quaerat esse reprehenderit quaerat non. Hic laboriosam tenetur asperiores nemo distinctio. Rerum libero dicta et pariatur. Eveniet repudiandae consequatur quasi vero. Sit sit sunt quasi esse et debitis. Placeat non porro molestiae. Porro reprehenderit voluptas modi dolorem et. Et rerum cupiditate tempora et saepe iusto est aut. Consectetur repellendus aliquam et non in optio. Ab rerum aliquam est aspernatur laudantium suscipit. Facilis quod sed accusamus sunt ducimus nulla. Incidunt quia eligendi aut ut praesentium culpa perferendis. Ut nihil doloribus dolores. Atque qui saepe et sunt enim architecto inventore consequatur. Fugiat temporibus voluptas voluptatem sed dolor officia. Et quibusdam provident repellendus facere. Voluptas voluptatem quis ut voluptatum deserunt. Nostrum ratione fugiat qui aut nihil. Et voluptatem adipisci impedit cumque recusandae. Ut consequatur delectus ea dolor labore quaerat. Quisquam quisquam non vel.",
            "status": "found",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 8,
                "name": "Qui maiores aut sapiente aut molestiae in quam ipsam.",
                "description": "Aut soluta laborum sequi et similique.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 5,
                "name": "Id fugit corporis harum expedita.",
                "description": "Fugiat nesciunt quasi sequi autem.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-04 18:49:46",
            "images": [],
            "questions": [],
            "city": null
        }
    ]
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/search/keywords</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>keywords</code></td>
<td>optional</td>
<td>string required</td>
</tr>
</tbody>
</table>
<!-- END_a381454c94e24449400bd187815c6920 -->
<!-- START_16f48877f83d0a8ab32bef962081ffac -->
<h2>Get search data in Dropdown lists</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/search/data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/home/search/data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "regions": [
        {
            "id": 1,
            "name": "Al Riyadh Region"
        }
    ],
    "subcategories": [
        {
            "id": 1,
            "name": "opjmp",
            "description": "jmiojoi",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "brands": [
                {
                    "id": 1,
                    "name": "pojmop",
                    "description": "ijoi",
                    "image": "http:\/\/wajad.test\/images\/default.png",
                    "models": [
                        {
                            "id": 1,
                            "name": "jhinoi",
                            "description": "pjipo",
                            "image": "http:\/\/wajad.test\/images\/default.png"
                        }
                    ]
                }
            ]
        }
    ],
    "colors": [
        {
            "id": 1,
            "name": "Red",
            "icon": "images\/colors\/red.png"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/search/data</code></p>
<!-- END_16f48877f83d0a8ab32bef962081ffac -->
<h1>User Profile</h1>
<!-- START_b4f4625b609a18310a50b1dddf752a55 -->
<h2>Forget Password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/resetPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user":"mail@gmail.com"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/resetPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user": "mail@gmail.com"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "New password sent successfully to your mail.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/resetPassword</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user</code></td>
<td>email,min:9,max:14</td>
<td>required</td>
<td>email or phone.</td>
</tr>
</tbody>
</table>
<!-- END_b4f4625b609a18310a50b1dddf752a55 -->
<!-- START_0b828966a9f31e695693fe9650b70eb1 -->
<h2>User Data</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/userData" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"illum"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/userData"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "illum"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/userData</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_0b828966a9f31e695693fe9650b70eb1 -->
<!-- START_734623b7e60cc9f20fd5b5b67df87d7d -->
<h2>Verify Code for Phone or Email</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/verify/phone." \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"1234","token":"velit"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/verify/phone."
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "1234",
    "token": "velit"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Phone Verified Successfully",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/verify/{type}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>phone or email.</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>code</code></td>
<td>numeric</td>
<td>required</td>
<td>digits:4</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_734623b7e60cc9f20fd5b5b67df87d7d -->
<!-- START_72a884b85bf7bf4198984d6ccecce2b7 -->
<h2>Update User Profile</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/updateUserProfile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"mollitia","receive_emails":true,"receive_push_notifications":true,"default_distance_unit":"mile","image":"quibusdam","token":"provident"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/updateUserProfile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "mollitia",
    "receive_emails": true,
    "receive_push_notifications": true,
    "default_distance_unit": "mile",
    "image": "quibusdam",
    "token": "provident"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "User updated successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/updateUserProfile</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>required</td>
<td>min:6,max:255</td>
</tr>
<tr>
<td><code>receive_emails</code></td>
<td>boolean</td>
<td>required</td>
<td>in:true,false,0,1.</td>
</tr>
<tr>
<td><code>receive_push_notifications</code></td>
<td>boolean</td>
<td>required</td>
<td>in:true,false,0,1.</td>
</tr>
<tr>
<td><code>default_distance_unit</code></td>
<td>string,in:kilo,mile</td>
<td>required</td>
<td>kilo or mile.</td>
</tr>
<tr>
<td><code>image</code></td>
<td>file</td>
<td>optional</td>
<td>mimes:jpeg,jpg,png,gif, max:5102</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_72a884b85bf7bf4198984d6ccecce2b7 -->
<!-- START_dd73fe89d9872ce37d284636141ae526 -->
<h2>Change Password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/changePassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"old_password":"sapiente","new_password":"quisquam","new_password_confirmation":"velit","token":"nostrum"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/changePassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "old_password": "sapiente",
    "new_password": "quisquam",
    "new_password_confirmation": "velit",
    "token": "nostrum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Password Updated Successfully",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/changePassword</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>old_password</code></td>
<td>string</td>
<td>required</td>
<td>'min:6' 'max:255'</td>
</tr>
<tr>
<td><code>new_password</code></td>
<td>string</td>
<td>required</td>
<td>'confirmed' 'min:6', 'max:255'</td>
</tr>
<tr>
<td><code>new_password_confirmation</code></td>
<td>string</td>
<td>required</td>
<td>confirm new password</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_dd73fe89d9872ce37d284636141ae526 -->
<!-- START_cb0e89a15b080a33f4c18135f097480d -->
<h2>Change Phone Number</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/changePhone" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"mobile_number":"voluptatibus","mobile_country_id":"ab","token":"ut"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/changePhone"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mobile_number": "voluptatibus",
    "mobile_country_id": "ab",
    "token": "ut"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Verification code sent.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/changePhone</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>mobile_number</code></td>
<td>numeric</td>
<td>required</td>
<td>digits_between:9,14 unique:user ignore:user-id</td>
</tr>
<tr>
<td><code>mobile_country_id</code></td>
<td>numeric</td>
<td>optional</td>
<td>exists:countries,id</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_cb0e89a15b080a33f4c18135f097480d -->
<!-- START_d0ad6077a075427e4ae216d3352ed1ef -->
<h2>Change Email</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/changeEmail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"saepe","token":"totam"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/changeEmail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "saepe",
    "token": "totam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Verification code sent.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/changeEmail</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>email</code></td>
<td>email</td>
<td>required</td>
</tr>
<tr>
<td><code>token</code></td>
<td>Barier-token</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_d0ad6077a075427e4ae216d3352ed1ef -->
<h1>general</h1>
<!-- START_e4d239ac8a5a2883bb4c41b1264d1930 -->
<h2>api/request/post/{post}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/request/post/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/request/post/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/request/post/{post}</code></p>
<!-- END_e4d239ac8a5a2883bb4c41b1264d1930 -->
<!-- START_109013899e0bc43247b0f00b67f889cf -->
<h2>api/categories</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "name": "Apparel, Shoes &amp; Accessories",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 2,
            "name": "Art, Crafts &amp; Collectables",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 3,
            "name": "Baby",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 4,
            "name": "Beauty",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 5,
            "name": "Bed &amp; Bath",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 6,
            "name": "Books",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 7,
            "name": "Coins, Stamps &amp; Paper money",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 8,
            "name": "Computers, IT &amp; Networking",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 9,
            "name": "Eyewear &amp; Optics",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 10,
            "name": "Garden &amp; Outdoor",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 11,
            "name": "Furniture",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 12,
            "name": "Electronics",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 13,
            "name": "Home Appliances",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 14,
            "name": "Grocery, Food &amp; Beverages",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 15,
            "name": "Kitchen Appliances",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 16,
            "name": "Gaming",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 17,
            "name": "Health &amp; Personal Care",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 18,
            "name": "Music &amp; Movies",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 19,
            "name": "Jewelry &amp; Accessories",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 20,
            "name": "Toys",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 21,
            "name": "Mobile Phones, Tablets &amp; Accessories",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 22,
            "name": "Sports &amp; Fitness",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 23,
            "name": "Perfumes &amp; Fragrances",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 24,
            "name": "Vehicle Parts &amp; Accessories",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 25,
            "name": "Others",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 26,
            "name": "sefgdfgsdfgsdfgs",
            "description": "sdbvsdfbvsdbsdgbfdbg",
            "image": "http:\/\/wajad.test\/\/images\/hmgoepprod-1601561358-HbMVo.jpeg",
            "item_coount": 0
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/categories</code></p>
<!-- END_109013899e0bc43247b0f00b67f889cf -->
<!-- START_34925c1e31e7ecc53f8f52c8b1e91d44 -->
<h2>api/categories/{category}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 1,
        "name": "Apparel, Shoes &amp; Accessories",
        "description": "",
        "image": "http:\/\/wajad.test\/\/images\/default.png",
        "item_coount": 0
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/categories/{category}</code></p>
<!-- END_34925c1e31e7ecc53f8f52c8b1e91d44 -->
<!-- START_5e5665d3d2e746a7e25d945b8f88e0f6 -->
<h2>api/subCategories/{type?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/subCategories/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/subCategories/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "name": "Blouse",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 2,
            "name": "shoes",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 3,
            "name": "artifact",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 4,
            "name": "candlestick",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 5,
            "name": "wall clock",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 6,
            "name": "Antiquities",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 7,
            "name": "Estatua",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 8,
            "name": "Art object",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 10,
            "name": "Lap top",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 11,
            "name": "Cameras",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 12,
            "name": "Others",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 13,
            "name": "dgbfdgvbsfsbvefbsgbfbgsd",
            "description": "sdgbsdgbsdgbsg",
            "image": "http:\/\/wajad.test\/\/images\/subcategories\/w3YOzMut5Dyk88EpL9TQzn3xTzDoXsxYHoxNPjIW.png"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/subCategories/{type?}</code></p>
<!-- END_5e5665d3d2e746a7e25d945b8f88e0f6 -->
<!-- START_9a21b1430b311e3f5c5e91bf23343711 -->
<h2>api/subCategories/{subCategory}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/subCategories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/subCategories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "name": "Blouse",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 2,
            "name": "shoes",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 3,
            "name": "artifact",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 4,
            "name": "candlestick",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 5,
            "name": "wall clock",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 6,
            "name": "Antiquities",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 7,
            "name": "Estatua",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 8,
            "name": "Art object",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 10,
            "name": "Lap top",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 11,
            "name": "Cameras",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 12,
            "name": "Others",
            "description": null,
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 13,
            "name": "dgbfdgvbsfsbvefbsgbfbgsd",
            "description": "sdgbsdgbsdgbsg",
            "image": "http:\/\/wajad.test\/\/images\/subcategories\/w3YOzMut5Dyk88EpL9TQzn3xTzDoXsxYHoxNPjIW.png"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/subCategories/{subCategory}</code></p>
<!-- END_9a21b1430b311e3f5c5e91bf23343711 -->
<!-- START_068c0e43d7427c487297faaa68a4489a -->
<h2>api/brands/{subcategory_id?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/brands/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/brands/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "name": "LCWIKIKI",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post7.jpg"
        },
        {
            "id": 2,
            "name": "H&amp;M",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post7.jpg"
        },
        {
            "id": 3,
            "name": "lacoste",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post7.jpg"
        },
        {
            "id": 4,
            "name": "corocs",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post7.jpg"
        },
        {
            "id": 5,
            "name": "gohnson",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post7.jpg"
        },
        {
            "id": 6,
            "name": "panten",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post1.jpg"
        },
        {
            "id": 7,
            "name": "sherosa",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post1.jpg"
        },
        {
            "id": 8,
            "name": "Toshiba",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post2.jpg"
        },
        {
            "id": 9,
            "name": "Hp",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post2.jpg"
        },
        {
            "id": 10,
            "name": "Dell",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post3.jpg"
        },
        {
            "id": 11,
            "name": "Nicon",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post5.jpg"
        },
        {
            "id": 12,
            "name": "Canon",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post5.jpg"
        },
        {
            "id": 13,
            "name": "Sony",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post6.jpg"
        },
        {
            "id": 14,
            "name": "Other",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post6.jpg"
        },
        {
            "id": 16,
            "name": "whatever",
            "description": "whatever",
            "image": "http:\/\/wajad.test\/\/images\/brands\/16dxXN8XVkFvoiAo5noHLTBQ3FwX7kEuCY7SpEUk.png"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/brands/{subcategory_id?}</code></p>
<!-- END_068c0e43d7427c487297faaa68a4489a -->
<!-- START_9c1f67877e90ac8688a0652bb104ee79 -->
<h2>api/models/{brand_id?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/models/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/models/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "name": "Dell XPS 13",
            "description": "CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch FHD (1,920 x 1,080) – 4k (3840 x 2160) | Storage: 256GB – 1TB SSD",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post3.jpg"
        },
        {
            "id": 2,
            "name": "Huawei MateBook 13",
            "description": "CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 , Nvidia GeForce MX150 2GB GDDR5 | RAM: 8GB | Screen: 13-inch 1440p (2,160 x 1,440) | Storage: 256GB - 512GB SSD",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post4.jpg"
        },
        {
            "id": 3,
            "name": "HP Spectre x360 (2019)",
            "description": "CPU: Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch full HD (1,920 x 1,080) – UHD (3,840 x 2,160) touchscreen | Storage: 256GB – 2TB PCIe SSD",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post4.jpg"
        },
        {
            "id": 4,
            "name": "Apple MacBook Pro (15-inch, 2019)",
            "description": "CPU: Intel Core i7 – i9 | Graphics: AMD Radeon Pro 555X - Radeon Pro Vega 20, Intel UHD Graphics 630 | RAM: 16GB | Screen: 15.4-inch, (2,880 x 1,800) IPS | Storage: 256GB – 4TB SSD",
            "image": "http:\/\/wajad.test\/\/images\/default.png"
        },
        {
            "id": 5,
            "name": "Sony SA1",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post6.jpg"
        },
        {
            "id": 6,
            "name": "Others",
            "description": "",
            "image": "http:\/\/wajad.test\/\/images\/posts\/post6.jpg"
        },
        {
            "id": 7,
            "name": "Shirt",
            "description": "gbsdgbsdgbs",
            "image": "http:\/\/wajad.test\/\/images\/models\/8RrtHN5RA6DvrMtm50fGLZXuoVNOsmw8UlmFxU74.jpeg"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/models/{brand_id?}</code></p>
<!-- END_9c1f67877e90ac8688a0652bb104ee79 -->
<!-- START_02ab26dc9c34cdbbe59219b9bdec9be5 -->
<h2>api/models/{model}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/models/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/models/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/models/{model}</code></p>
<!-- END_02ab26dc9c34cdbbe59219b9bdec9be5 -->
<!-- START_657bc03edc12abbb56cd6cba090a5f5d -->
<h2>api/colors</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/colors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/colors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "name": "Red",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 2,
            "name": "Black",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 3,
            "name": "Blue",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 4,
            "name": "Brown",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 5,
            "name": "Gold",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 6,
            "name": "Green",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 7,
            "name": "Orange",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 8,
            "name": "Pink",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 9,
            "name": "Silver",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 10,
            "name": "White",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 11,
            "name": "Yellow",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 12,
            "name": "Crimson",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 13,
            "name": "Others",
            "icon": "images\/profile\/default-profile.png"
        },
        {
            "id": 14,
            "name": "sdgbsdgb",
            "icon": ""
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/colors</code></p>
<!-- END_657bc03edc12abbb56cd6cba090a5f5d -->
<!-- START_f7434b1702d26d8f9b8761c51d1b63b4 -->
<h2>api/colors/{color}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/colors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/colors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 1,
        "name": "Red",
        "icon": "images\/profile\/default-profile.png"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/colors/{color}</code></p>
<!-- END_f7434b1702d26d8f9b8761c51d1b63b4 -->
<!-- START_f23167370c8a1250be599e87d07e6451 -->
<h2>api/offices</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/offices" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/offices"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/offices</code></p>
<!-- END_f23167370c8a1250be599e87d07e6451 -->
<!-- START_316a4c3b4f6a4c4ff34e5893943cdebd -->
<h2>api/countries</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/countries"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "name": "Afghanistan",
            "iso_code": "AF",
            "country_code": "93"
        },
        {
            "id": 2,
            "name": "Albania",
            "iso_code": "AL",
            "country_code": "355"
        },
        {
            "id": 3,
            "name": "Algeria",
            "iso_code": "DZ",
            "country_code": "213"
        },
        {
            "id": 4,
            "name": "American Samoa",
            "iso_code": "AS",
            "country_code": "684"
        },
        {
            "id": 5,
            "name": "Andorra",
            "iso_code": "AD",
            "country_code": "376"
        },
        {
            "id": 6,
            "name": "Angola",
            "iso_code": "AO",
            "country_code": "244"
        },
        {
            "id": 7,
            "name": "Anguilla",
            "iso_code": "AI",
            "country_code": "1"
        },
        {
            "id": 8,
            "name": "Antarctica",
            "iso_code": "AQ",
            "country_code": "268"
        },
        {
            "id": 9,
            "name": "Antigua and Barbuda",
            "iso_code": "AG",
            "country_code": "1"
        },
        {
            "id": 10,
            "name": "Argentina",
            "iso_code": "AR",
            "country_code": "54"
        },
        {
            "id": 11,
            "name": "Armenia",
            "iso_code": "AM",
            "country_code": "374"
        },
        {
            "id": 12,
            "name": "Aruba",
            "iso_code": "AW",
            "country_code": "297"
        },
        {
            "id": 13,
            "name": "Australia",
            "iso_code": "AU",
            "country_code": "61"
        },
        {
            "id": 14,
            "name": "Austria",
            "iso_code": "AT",
            "country_code": "43"
        },
        {
            "id": 15,
            "name": "Azerbaijan",
            "iso_code": "AZ",
            "country_code": "994"
        },
        {
            "id": 16,
            "name": "Bahamas",
            "iso_code": "BS",
            "country_code": "1"
        },
        {
            "id": 17,
            "name": "Bahrain",
            "iso_code": "BH",
            "country_code": "973"
        },
        {
            "id": 18,
            "name": "Bangladesh",
            "iso_code": "BD",
            "country_code": "880"
        },
        {
            "id": 19,
            "name": "Barbados",
            "iso_code": "BB",
            "country_code": "1"
        },
        {
            "id": 20,
            "name": "Belarus",
            "iso_code": "BY",
            "country_code": "375"
        },
        {
            "id": 21,
            "name": "Belgium",
            "iso_code": "BE",
            "country_code": "32"
        },
        {
            "id": 22,
            "name": "Belize",
            "iso_code": "BZ",
            "country_code": "501"
        },
        {
            "id": 23,
            "name": "Benin",
            "iso_code": "BJ",
            "country_code": "229"
        },
        {
            "id": 24,
            "name": "Bermuda",
            "iso_code": "BM",
            "country_code": "1"
        },
        {
            "id": 25,
            "name": "Bhutan",
            "iso_code": "BT",
            "country_code": "975"
        },
        {
            "id": 26,
            "name": "Bolivia",
            "iso_code": "BO",
            "country_code": "591"
        },
        {
            "id": 27,
            "name": "Bosnia and Herzegovina",
            "iso_code": "BA",
            "country_code": "387"
        },
        {
            "id": 28,
            "name": "Botswana",
            "iso_code": "BW",
            "country_code": "267"
        },
        {
            "id": 29,
            "name": "Bouvet Island",
            "iso_code": "BV",
            "country_code": "1"
        },
        {
            "id": 30,
            "name": "Brazil",
            "iso_code": "BR",
            "country_code": "55"
        },
        {
            "id": 31,
            "name": "British Indian Ocean Territory",
            "iso_code": "IO",
            "country_code": "246"
        },
        {
            "id": 32,
            "name": "British Virgin Islands",
            "iso_code": "VG",
            "country_code": "1"
        },
        {
            "id": 33,
            "name": "Brunei",
            "iso_code": "BN",
            "country_code": "1"
        },
        {
            "id": 34,
            "name": "Bulgaria",
            "iso_code": "BG",
            "country_code": "359"
        },
        {
            "id": 35,
            "name": "Burkina Faso",
            "iso_code": "BF",
            "country_code": "226"
        },
        {
            "id": 36,
            "name": "Burundi",
            "iso_code": "BI",
            "country_code": "257"
        },
        {
            "id": 37,
            "name": "Cambodia",
            "iso_code": "KH",
            "country_code": "855"
        },
        {
            "id": 38,
            "name": "Cameroon",
            "iso_code": "CM",
            "country_code": "237"
        },
        {
            "id": 39,
            "name": "Canada",
            "iso_code": "CA",
            "country_code": "1"
        },
        {
            "id": 40,
            "name": "Cape Verde",
            "iso_code": "CV",
            "country_code": "238"
        },
        {
            "id": 41,
            "name": "Cayman Islands",
            "iso_code": "KY",
            "country_code": "1"
        },
        {
            "id": 42,
            "name": "Central African Republic",
            "iso_code": "CF",
            "country_code": "236"
        },
        {
            "id": 43,
            "name": "Chad",
            "iso_code": "TD",
            "country_code": "235"
        },
        {
            "id": 44,
            "name": "Chile",
            "iso_code": "CL",
            "country_code": "56"
        },
        {
            "id": 45,
            "name": "China",
            "iso_code": "CN",
            "country_code": "86"
        },
        {
            "id": 46,
            "name": "Christmas Island",
            "iso_code": "CX",
            "country_code": "16"
        },
        {
            "id": 47,
            "name": "Cocos [Keeling] Islands",
            "iso_code": "CC",
            "country_code": "16"
        },
        {
            "id": 48,
            "name": "Colombia",
            "iso_code": "CO",
            "country_code": "57"
        },
        {
            "id": 49,
            "name": "Comoros",
            "iso_code": "KM",
            "country_code": "269"
        },
        {
            "id": 50,
            "name": "Congo - Brazzaville",
            "iso_code": "CG",
            "country_code": "242"
        },
        {
            "id": 51,
            "name": "Congo - Kinshasa",
            "iso_code": "CD",
            "country_code": "243"
        },
        {
            "id": 52,
            "name": "Cook Islands",
            "iso_code": "CK",
            "country_code": "682"
        },
        {
            "id": 53,
            "name": "Costa Rica",
            "iso_code": "CR",
            "country_code": "506"
        },
        {
            "id": 54,
            "name": "Croatia",
            "iso_code": "HR",
            "country_code": "385"
        },
        {
            "id": 55,
            "name": "Cuba",
            "iso_code": "CU",
            "country_code": "53"
        },
        {
            "id": 56,
            "name": "Cyprus",
            "iso_code": "CY",
            "country_code": "357"
        },
        {
            "id": 57,
            "name": "Czech Republic",
            "iso_code": "CZ",
            "country_code": "420"
        },
        {
            "id": 58,
            "name": "Côte d’Ivoire",
            "iso_code": "CI",
            "country_code": "225"
        },
        {
            "id": 59,
            "name": "Denmark",
            "iso_code": "DK",
            "country_code": "45"
        },
        {
            "id": 60,
            "name": "Djibouti",
            "iso_code": "DJ",
            "country_code": "253"
        },
        {
            "id": 61,
            "name": "Dominica",
            "iso_code": "DM",
            "country_code": "1"
        },
        {
            "id": 62,
            "name": "Dominican Republic",
            "iso_code": "DO",
            "country_code": "1"
        },
        {
            "id": 63,
            "name": "Ecuador",
            "iso_code": "EC",
            "country_code": "593"
        },
        {
            "id": 64,
            "name": "Egypt",
            "iso_code": "EG",
            "country_code": "20"
        },
        {
            "id": 65,
            "name": "El Salvador",
            "iso_code": "SV",
            "country_code": "503"
        },
        {
            "id": 66,
            "name": "Equatorial Guinea",
            "iso_code": "GQ",
            "country_code": "240"
        },
        {
            "id": 67,
            "name": "Eritrea",
            "iso_code": "ER",
            "country_code": "291"
        },
        {
            "id": 68,
            "name": "Estonia",
            "iso_code": "EE",
            "country_code": "372"
        },
        {
            "id": 69,
            "name": "Ethiopia",
            "iso_code": "ET",
            "country_code": "251"
        },
        {
            "id": 70,
            "name": "Falkland Islands",
            "iso_code": "FK",
            "country_code": "500"
        },
        {
            "id": 71,
            "name": "Faroe Islands",
            "iso_code": "FO",
            "country_code": "298"
        },
        {
            "id": 72,
            "name": "Fiji",
            "iso_code": "FJ",
            "country_code": "679"
        },
        {
            "id": 73,
            "name": "Finland",
            "iso_code": "FI",
            "country_code": "358"
        },
        {
            "id": 74,
            "name": "France",
            "iso_code": "FR",
            "country_code": "33"
        },
        {
            "id": 75,
            "name": "French Guiana",
            "iso_code": "GF",
            "country_code": "594"
        },
        {
            "id": 76,
            "name": "French Polynesia",
            "iso_code": "PF",
            "country_code": "689"
        },
        {
            "id": 77,
            "name": "French Southern Territories",
            "iso_code": "TF",
            "country_code": "1"
        },
        {
            "id": 78,
            "name": "Gabon",
            "iso_code": "GA",
            "country_code": "241"
        },
        {
            "id": 79,
            "name": "Gambia",
            "iso_code": "GM",
            "country_code": "220"
        },
        {
            "id": 80,
            "name": "Georgia",
            "iso_code": "GE",
            "country_code": "995"
        },
        {
            "id": 81,
            "name": "Germany",
            "iso_code": "DE",
            "country_code": "49"
        },
        {
            "id": 82,
            "name": "Ghana",
            "iso_code": "GH",
            "country_code": "233"
        },
        {
            "id": 83,
            "name": "Gibraltar",
            "iso_code": "GI",
            "country_code": "350"
        },
        {
            "id": 84,
            "name": "Greece",
            "iso_code": "GR",
            "country_code": "30"
        },
        {
            "id": 85,
            "name": "Greenland",
            "iso_code": "GL",
            "country_code": "299"
        },
        {
            "id": 86,
            "name": "Grenada",
            "iso_code": "GD",
            "country_code": "1"
        },
        {
            "id": 87,
            "name": "Guadeloupe",
            "iso_code": "GP",
            "country_code": "590"
        },
        {
            "id": 88,
            "name": "Guam",
            "iso_code": "GU",
            "country_code": "1"
        },
        {
            "id": 89,
            "name": "Guatemala",
            "iso_code": "GT",
            "country_code": "502"
        },
        {
            "id": 90,
            "name": "Guinea",
            "iso_code": "GN",
            "country_code": "224"
        },
        {
            "id": 91,
            "name": "Guinea-Bissau",
            "iso_code": "GW",
            "country_code": "245"
        },
        {
            "id": 92,
            "name": "Guyana",
            "iso_code": "GY",
            "country_code": "592"
        },
        {
            "id": 93,
            "name": "Haiti",
            "iso_code": "HT",
            "country_code": "509"
        },
        {
            "id": 94,
            "name": "Heard Island and McDonald Islands",
            "iso_code": "HM",
            "country_code": "1"
        },
        {
            "id": 95,
            "name": "Honduras",
            "iso_code": "HN",
            "country_code": "504"
        },
        {
            "id": 96,
            "name": "Hong Kong SAR China",
            "iso_code": "HK",
            "country_code": "852"
        },
        {
            "id": 97,
            "name": "Hungary",
            "iso_code": "HU",
            "country_code": "36"
        },
        {
            "id": 98,
            "name": "Iceland",
            "iso_code": "IS",
            "country_code": "354"
        },
        {
            "id": 99,
            "name": "India",
            "iso_code": "IN",
            "country_code": "91"
        },
        {
            "id": 100,
            "name": "Indonesia",
            "iso_code": "ID",
            "country_code": "62"
        },
        {
            "id": 101,
            "name": "Iran",
            "iso_code": "IR",
            "country_code": "98"
        },
        {
            "id": 102,
            "name": "Iraq",
            "iso_code": "IQ",
            "country_code": "964"
        },
        {
            "id": 103,
            "name": "Ireland",
            "iso_code": "IE",
            "country_code": "353"
        },
        {
            "id": 104,
            "name": "Isle of Man",
            "iso_code": "IM",
            "country_code": "1"
        },
        {
            "id": 105,
            "name": "Israel",
            "iso_code": "IL",
            "country_code": "972"
        },
        {
            "id": 106,
            "name": "Italy",
            "iso_code": "IT",
            "country_code": "39"
        },
        {
            "id": 107,
            "name": "Jamaica",
            "iso_code": "JM",
            "country_code": "1"
        },
        {
            "id": 108,
            "name": "Japan",
            "iso_code": "JP",
            "country_code": "81"
        },
        {
            "id": 109,
            "name": "Jersey",
            "iso_code": "JE",
            "country_code": "1"
        },
        {
            "id": 110,
            "name": "Jordan",
            "iso_code": "JO",
            "country_code": "962"
        },
        {
            "id": 111,
            "name": "Kazakhstan",
            "iso_code": "KZ",
            "country_code": "7"
        },
        {
            "id": 112,
            "name": "Kenya",
            "iso_code": "KE",
            "country_code": "254"
        },
        {
            "id": 113,
            "name": "Kiribati",
            "iso_code": "KI",
            "country_code": "686"
        },
        {
            "id": 114,
            "name": "Kuwait",
            "iso_code": "KW",
            "country_code": "59"
        },
        {
            "id": 115,
            "name": "Kyrgyzstan",
            "iso_code": "KG",
            "country_code": "996"
        },
        {
            "id": 116,
            "name": "Laos",
            "iso_code": "LA",
            "country_code": "856"
        },
        {
            "id": 117,
            "name": "Latvia",
            "iso_code": "LV",
            "country_code": "371"
        },
        {
            "id": 118,
            "name": "Lebanon",
            "iso_code": "LB",
            "country_code": "961"
        },
        {
            "id": 119,
            "name": "Lesotho",
            "iso_code": "LS",
            "country_code": "266"
        },
        {
            "id": 120,
            "name": "Liberia",
            "iso_code": "LR",
            "country_code": "231"
        },
        {
            "id": 121,
            "name": "Libya",
            "iso_code": "LY",
            "country_code": "218"
        },
        {
            "id": 122,
            "name": "Liechtenstein",
            "iso_code": "LI",
            "country_code": "243"
        },
        {
            "id": 123,
            "name": "Lithuania",
            "iso_code": "LT",
            "country_code": "370"
        },
        {
            "id": 124,
            "name": "Luxembourg",
            "iso_code": "LU",
            "country_code": "352"
        },
        {
            "id": 125,
            "name": "Macau SAR China",
            "iso_code": "MO",
            "country_code": "853"
        },
        {
            "id": 126,
            "name": "Macedonia",
            "iso_code": "MK",
            "country_code": "389"
        },
        {
            "id": 127,
            "name": "Madagascar",
            "iso_code": "MG",
            "country_code": "261"
        },
        {
            "id": 128,
            "name": "Malawi",
            "iso_code": "MW",
            "country_code": "265"
        },
        {
            "id": 129,
            "name": "Malaysia",
            "iso_code": "MY",
            "country_code": "60"
        },
        {
            "id": 130,
            "name": "Maldives",
            "iso_code": "MV",
            "country_code": "960"
        },
        {
            "id": 131,
            "name": "Mali",
            "iso_code": "ML",
            "country_code": "223"
        },
        {
            "id": 132,
            "name": "Malta",
            "iso_code": "MT",
            "country_code": "356"
        },
        {
            "id": 133,
            "name": "Marshall Islands",
            "iso_code": "MH",
            "country_code": "692"
        },
        {
            "id": 134,
            "name": "Martinique",
            "iso_code": "MQ",
            "country_code": "596"
        },
        {
            "id": 135,
            "name": "Mauritania",
            "iso_code": "MR",
            "country_code": "222"
        },
        {
            "id": 136,
            "name": "Mauritius",
            "iso_code": "MU",
            "country_code": "230"
        },
        {
            "id": 137,
            "name": "Mayotte",
            "iso_code": "YT",
            "country_code": "262"
        },
        {
            "id": 138,
            "name": "Mexico",
            "iso_code": "MX",
            "country_code": "52"
        },
        {
            "id": 139,
            "name": "Micronesia",
            "iso_code": "FM",
            "country_code": "691"
        },
        {
            "id": 140,
            "name": "Moldova",
            "iso_code": "MD",
            "country_code": "373"
        },
        {
            "id": 141,
            "name": "Monaco",
            "iso_code": "MC",
            "country_code": "377"
        },
        {
            "id": 142,
            "name": "Mongolia",
            "iso_code": "MN",
            "country_code": "976"
        },
        {
            "id": 143,
            "name": "Montenegro",
            "iso_code": "ME",
            "country_code": "382"
        },
        {
            "id": 144,
            "name": "Montserrat",
            "iso_code": "MS",
            "country_code": "1"
        },
        {
            "id": 145,
            "name": "Morocco",
            "iso_code": "MA",
            "country_code": "212"
        },
        {
            "id": 146,
            "name": "Mozambique",
            "iso_code": "MZ",
            "country_code": "258"
        },
        {
            "id": 147,
            "name": "Myanmar [Burma]",
            "iso_code": "MM",
            "country_code": "95"
        },
        {
            "id": 148,
            "name": "Namibia",
            "iso_code": "NA",
            "country_code": "264"
        },
        {
            "id": 149,
            "name": "Nauru",
            "iso_code": "NR",
            "country_code": "674"
        },
        {
            "id": 150,
            "name": "Nepal",
            "iso_code": "NP",
            "country_code": "977"
        },
        {
            "id": 151,
            "name": "Netherlands",
            "iso_code": "NL",
            "country_code": "31"
        },
        {
            "id": 152,
            "name": "Netherlands Antilles",
            "iso_code": "AN",
            "country_code": "599"
        },
        {
            "id": 153,
            "name": "New Caledonia",
            "iso_code": "NC",
            "country_code": "687"
        },
        {
            "id": 154,
            "name": "New Zealand",
            "iso_code": "NZ",
            "country_code": "64"
        },
        {
            "id": 155,
            "name": "Nicaragua",
            "iso_code": "NI",
            "country_code": "505"
        },
        {
            "id": 156,
            "name": "Niger",
            "iso_code": "NE",
            "country_code": "227"
        },
        {
            "id": 157,
            "name": "Nigeria",
            "iso_code": "NG",
            "country_code": "234"
        },
        {
            "id": 158,
            "name": "Niue",
            "iso_code": "NU",
            "country_code": "683"
        },
        {
            "id": 159,
            "name": "Norfolk Island",
            "iso_code": "NF",
            "country_code": "672"
        },
        {
            "id": 160,
            "name": "North Korea",
            "iso_code": "KP",
            "country_code": "850"
        },
        {
            "id": 161,
            "name": "Northern Mariana Islands",
            "iso_code": "MP",
            "country_code": "1"
        },
        {
            "id": 162,
            "name": "Norway",
            "iso_code": "NO",
            "country_code": "47"
        },
        {
            "id": 163,
            "name": "Oman",
            "iso_code": "OM",
            "country_code": "968"
        },
        {
            "id": 164,
            "name": "Pakistan",
            "iso_code": "PK",
            "country_code": "92"
        },
        {
            "id": 165,
            "name": "Palau",
            "iso_code": "PW",
            "country_code": "680"
        },
        {
            "id": 166,
            "name": "Palestinian Territories",
            "iso_code": "PS",
            "country_code": "970"
        },
        {
            "id": 167,
            "name": "Panama",
            "iso_code": "PA",
            "country_code": "507"
        },
        {
            "id": 168,
            "name": "Papua New Guinea",
            "iso_code": "PG",
            "country_code": "675"
        },
        {
            "id": 169,
            "name": "Paraguay",
            "iso_code": "PY",
            "country_code": "595"
        },
        {
            "id": 170,
            "name": "Peru",
            "iso_code": "PE",
            "country_code": "51"
        },
        {
            "id": 171,
            "name": "Philippines",
            "iso_code": "PH",
            "country_code": "63"
        },
        {
            "id": 172,
            "name": "Pitcairn Islands",
            "iso_code": "PN",
            "country_code": "870"
        },
        {
            "id": 173,
            "name": "Poland",
            "iso_code": "PL",
            "country_code": "48"
        },
        {
            "id": 174,
            "name": "Portugal",
            "iso_code": "PT",
            "country_code": "351"
        },
        {
            "id": 175,
            "name": "Puerto Rico",
            "iso_code": "PR",
            "country_code": "1"
        },
        {
            "id": 176,
            "name": "Qatar",
            "iso_code": "QA",
            "country_code": "974"
        },
        {
            "id": 177,
            "name": "Romania",
            "iso_code": "RO",
            "country_code": "40"
        },
        {
            "id": 178,
            "name": "Russia",
            "iso_code": "RU",
            "country_code": "7"
        },
        {
            "id": 179,
            "name": "Rwanda",
            "iso_code": "RW",
            "country_code": "250"
        },
        {
            "id": 180,
            "name": "Réunion",
            "iso_code": "RE",
            "country_code": "262"
        },
        {
            "id": 181,
            "name": "Saint Helena",
            "iso_code": "SH",
            "country_code": "290"
        },
        {
            "id": 182,
            "name": "Saint Kitts and Nevis",
            "iso_code": "KN",
            "country_code": "1"
        },
        {
            "id": 183,
            "name": "Saint Lucia",
            "iso_code": "LC",
            "country_code": "1"
        },
        {
            "id": 184,
            "name": "Saint Martin",
            "iso_code": "MF",
            "country_code": "1"
        },
        {
            "id": 185,
            "name": "Saint Pierre and Miquelon",
            "iso_code": "PM",
            "country_code": "508"
        },
        {
            "id": 186,
            "name": "Saint Vincent and the Grenadines",
            "iso_code": "VC",
            "country_code": "1"
        },
        {
            "id": 187,
            "name": "Samoa",
            "iso_code": "WS",
            "country_code": "685"
        },
        {
            "id": 188,
            "name": "San Marino",
            "iso_code": "SM",
            "country_code": "378"
        },
        {
            "id": 189,
            "name": "Saudi Arabia",
            "iso_code": "SA",
            "country_code": "966"
        },
        {
            "id": 190,
            "name": "Senegal",
            "iso_code": "SN",
            "country_code": "221"
        },
        {
            "id": 191,
            "name": "Serbia",
            "iso_code": "RS",
            "country_code": "381"
        },
        {
            "id": 192,
            "name": "Serbia and Montenegro",
            "iso_code": "CS",
            "country_code": "1"
        },
        {
            "id": 193,
            "name": "Seychelles",
            "iso_code": "SC",
            "country_code": "248"
        },
        {
            "id": 194,
            "name": "Sierra Leone",
            "iso_code": "SL",
            "country_code": "232"
        },
        {
            "id": 195,
            "name": "Singapore",
            "iso_code": "SG",
            "country_code": "65"
        },
        {
            "id": 196,
            "name": "Slovakia",
            "iso_code": "SK",
            "country_code": "421"
        },
        {
            "id": 197,
            "name": "Slovenia",
            "iso_code": "SI",
            "country_code": "386"
        },
        {
            "id": 198,
            "name": "Solomon Islands",
            "iso_code": "SB",
            "country_code": "677"
        },
        {
            "id": 199,
            "name": "Somalia",
            "iso_code": "SO",
            "country_code": "252"
        },
        {
            "id": 200,
            "name": "South Africa",
            "iso_code": "ZA",
            "country_code": "27"
        },
        {
            "id": 201,
            "name": "South Georgia and the South Sandwich Islands",
            "iso_code": "GS",
            "country_code": "1"
        },
        {
            "id": 202,
            "name": "South Korea",
            "iso_code": "KR",
            "country_code": "82"
        },
        {
            "id": 203,
            "name": "Spain",
            "iso_code": "ES",
            "country_code": "34"
        },
        {
            "id": 204,
            "name": "Sri Lanka",
            "iso_code": "LK",
            "country_code": "94"
        },
        {
            "id": 205,
            "name": "Sudan",
            "iso_code": "SD",
            "country_code": "249"
        },
        {
            "id": 206,
            "name": "Suriname",
            "iso_code": "SR",
            "country_code": "597"
        },
        {
            "id": 207,
            "name": "Svalbard and Jan Mayen",
            "iso_code": "SJ",
            "country_code": "47"
        },
        {
            "id": 208,
            "name": "Swaziland",
            "iso_code": "SZ",
            "country_code": "268"
        },
        {
            "id": 209,
            "name": "Sweden",
            "iso_code": "SE",
            "country_code": "46"
        },
        {
            "id": 210,
            "name": "Switzerland",
            "iso_code": "CH",
            "country_code": "41"
        },
        {
            "id": 211,
            "name": "Syria",
            "iso_code": "SY",
            "country_code": "963"
        },
        {
            "id": 212,
            "name": "São Tomé and Príncipe",
            "iso_code": "ST",
            "country_code": "1"
        },
        {
            "id": 213,
            "name": "Taiwan",
            "iso_code": "TW",
            "country_code": "886"
        },
        {
            "id": 214,
            "name": "Tajikistan",
            "iso_code": "TJ",
            "country_code": "992"
        },
        {
            "id": 215,
            "name": "Tanzania",
            "iso_code": "TZ",
            "country_code": "255"
        },
        {
            "id": 216,
            "name": "Thailand",
            "iso_code": "TH",
            "country_code": "66"
        },
        {
            "id": 217,
            "name": "Timor-Leste",
            "iso_code": "TL",
            "country_code": "670"
        },
        {
            "id": 218,
            "name": "Togo",
            "iso_code": "TG",
            "country_code": "228"
        },
        {
            "id": 219,
            "name": "Tokelau",
            "iso_code": "TK",
            "country_code": "690"
        },
        {
            "id": 220,
            "name": "Tonga",
            "iso_code": "TO",
            "country_code": "676"
        },
        {
            "id": 221,
            "name": "Trinidad and Tobago",
            "iso_code": "TT",
            "country_code": "1"
        },
        {
            "id": 222,
            "name": "Tunisia",
            "iso_code": "TN",
            "country_code": "216"
        },
        {
            "id": 223,
            "name": "Turkey",
            "iso_code": "TR",
            "country_code": "90"
        },
        {
            "id": 224,
            "name": "Turkmenistan",
            "iso_code": "TM",
            "country_code": "993"
        },
        {
            "id": 225,
            "name": "Turks and Caicos Islands",
            "iso_code": "TC",
            "country_code": "1"
        },
        {
            "id": 226,
            "name": "Tuvalu",
            "iso_code": "TV",
            "country_code": "688"
        },
        {
            "id": 227,
            "name": "U.S. Minor Outlying Islands",
            "iso_code": "UM",
            "country_code": "1"
        },
        {
            "id": 228,
            "name": "U.S. Virgin Islands",
            "iso_code": "VI",
            "country_code": "1"
        },
        {
            "id": 229,
            "name": "Uganda",
            "iso_code": "UG",
            "country_code": "256"
        },
        {
            "id": 230,
            "name": "Ukraine",
            "iso_code": "UA",
            "country_code": "380"
        },
        {
            "id": 231,
            "name": "United Arab Emirates",
            "iso_code": "AE",
            "country_code": "971"
        },
        {
            "id": 232,
            "name": "United Kingdom",
            "iso_code": "GB",
            "country_code": "44"
        },
        {
            "id": 233,
            "name": "United States",
            "iso_code": "US",
            "country_code": "1"
        },
        {
            "id": 234,
            "name": "Unknown or Invalid Region",
            "iso_code": "ZZ",
            "country_code": "1"
        },
        {
            "id": 235,
            "name": "Uruguay",
            "iso_code": "UY",
            "country_code": "598"
        },
        {
            "id": 236,
            "name": "Uzbekistan",
            "iso_code": "UZ",
            "country_code": "998"
        },
        {
            "id": 237,
            "name": "Vanuatu",
            "iso_code": "VU",
            "country_code": "678"
        },
        {
            "id": 238,
            "name": "Vatican City",
            "iso_code": "VA",
            "country_code": "379"
        },
        {
            "id": 239,
            "name": "Venezuela",
            "iso_code": "VE",
            "country_code": "58"
        },
        {
            "id": 240,
            "name": "Vietnam",
            "iso_code": "VN",
            "country_code": "84"
        },
        {
            "id": 241,
            "name": "Wallis and Futuna",
            "iso_code": "WF",
            "country_code": "681"
        },
        {
            "id": 242,
            "name": "Western Sahara",
            "iso_code": "EH",
            "country_code": "212"
        },
        {
            "id": 243,
            "name": "Yemen",
            "iso_code": "YE",
            "country_code": "967"
        },
        {
            "id": 244,
            "name": "Zambia",
            "iso_code": "ZM",
            "country_code": "260"
        },
        {
            "id": 245,
            "name": "Zimbabwe",
            "iso_code": "ZW",
            "country_code": "236"
        },
        {
            "id": 246,
            "name": "Åland Islands",
            "iso_code": "AX",
            "country_code": "358"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/countries</code></p>
<!-- END_316a4c3b4f6a4c4ff34e5893943cdebd -->
<!-- START_d3a06985ef377a31eecb832106f4a5e6 -->
<h2>api/regions</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/regions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/regions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "name": "Al Riyadh Region"
        },
        {
            "id": 2,
            "name": "Makkah Region"
        },
        {
            "id": 3,
            "name": "Al Madinah Region"
        },
        {
            "id": 4,
            "name": "Al-Qassim Region"
        },
        {
            "id": 5,
            "name": "Eastern Province"
        },
        {
            "id": 6,
            "name": "Asir Region"
        },
        {
            "id": 7,
            "name": "Tabuk Region"
        },
        {
            "id": 8,
            "name": "Hail Region"
        },
        {
            "id": 9,
            "name": "Northern Borders Region"
        },
        {
            "id": 10,
            "name": "Jizan Region"
        },
        {
            "id": 11,
            "name": "Najran Region"
        },
        {
            "id": 12,
            "name": "Al Bahah Region"
        },
        {
            "id": 13,
            "name": "Al Jawf Region"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/regions</code></p>
<!-- END_d3a06985ef377a31eecb832106f4a5e6 -->
<!-- START_e0cc7781f77aa50d54a15c7851b36d0b -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/contact-us" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/contact-us"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/contact-us</code></p>
<!-- END_e0cc7781f77aa50d54a15c7851b36d0b -->
<!-- START_0ee5bf7a76203366c8ac325bd8ada596 -->
<h2>Invoke the controller method.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/mario" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/mario"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/mario</code></p>
<!-- END_0ee5bf7a76203366c8ac325bd8ada596 -->
<!-- START_50c0a334d57bffdf48ce568bad023ce0 -->
<h2>api/test</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/test" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/test"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/test</code></p>
<!-- END_50c0a334d57bffdf48ce568bad023ce0 -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>