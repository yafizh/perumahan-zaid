@extends('landing.layouts.main')

@section('content')
    <style>
        .navbar {
            background-color: #204A40 !important;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            transition: background-color 200ms linear;
        }
    </style>
    <div class="row w-100 p-5 mx-0 justify-content-center">
        <div class="col-12 text-center mb-4">
            <h3 class="text-decoration-underline">UNIT PERUMAHAN</h3>
        </div>
        <div class="col-12 col-md-8 mb-3">
            Berikut merupakan ketersediaan rumah yang dapat dibeli. Anda bisa meninjau lokasi rumah yang kemungkinan Anda
            beli seperti dimana posisi blok perumahannya maupun titik koordinat rumah tersebut nantinya yang akan dibangun
            dengan mengklik atau sentuh tanda pin yang terletak pada sisi kanan atas foto rumah dibawah yang tampil.
        </div>
    </div>

    <h4 class="text-center mb-3">KETERANGAN</h4>
    <div class="mb-3 gap-3 d-flex justify-content-center">
        <div class="flex-column d-flex mb-3 gap-2 align-items-center">
            <div style="width: 3rem; height: 2rem;" class="bg-info"></div>
            <h5>Promo</h5>
        </div>
        <div class="flex-column d-flex mb-3 gap-2 align-items-center">
            <div style="width: 3rem; height: 2rem;" class="bg-success"></div>
            <h5>Tersedia</h5>
        </div>
        <div class="flex-column d-flex mb-3 gap-2 align-items-center">
            <div style="width: 3rem; height: 2rem;" class="bg-warning"></div>
            <h5>Dipesan</h5>
        </div>
        <div class="flex-column d-flex mb-3 gap-2 align-items-center">
            <div style="width: 3rem; height: 2rem;" class="bg-danger"></div>
            <h5>Terjual</h5>
        </div>
    </div>

    <div class="w-100 d-flex justify-content-center">
        <img src="{{ asset('map.jpg') }}" usemap="#image-map" class="w-100" />
    </div>

    <map name="image-map">
        <area nomor="A1" href="" coords="4941,6293,5020,6510,4871,6557,4807,6340" shape="poly">
        <area nomor="A2" href="" coords="4799,6348,4657,6411,4720,6608,4877,6553" shape="poly">
        <area nomor="A3" href="" coords="4649,6403,4500,6451,4579,6663,4728,6616" shape="poly">
        <area nomor="A4" href="" coords="4506,6478,4372,6526,4451,6714,4577,6683" shape="poly">
        <area nomor="A5" href="" coords="5003,6498,5098,6687,4940,6750,4870,6561" shape="poly">
        <area nomor="A6" href="" coords="4240,6576,4099,6624,4170,6836,4319,6773" shape="poly">
        <area nomor="A7" href="" coords="4107,6616,3941,6694,4028,6883,4162,6828" shape="poly">
        <area nomor="A8" href="" coords="3934,6687,3792,6750,3871,6938,4028,6883" shape="poly">
        <area nomor="A9" href="" coords="3776,6742,3627,6805,3705,7001,3871,6954" shape="poly">
        <area nomor="A10" href="" coords="4806,5980,4897,6194,4761,6233,4677,6065" shape="poly">
        <area nomor="A11" href="" coords="4670,6058,4534,6110,4612,6317,4754,6259" shape="poly">
        <area nomor="A12" href="" coords="4527,6103,4391,6162,4456,6363,4605,6317" shape="poly">
        <area nomor="A13" href="" coords="4385,6155,4249,6207,4326,6421,4456,6356" shape="poly">
        <area nomor="A14" href="" coords="4871,6551,4735,6629,4813,6823,4949,6752" shape="poly">
        <area nomor="A15" href="" coords="4106,6272,3957,6337,4048,6531,4184,6480" shape="poly">
        <area nomor="A16" href="" coords="3963,6337,3801,6395,3899,6590,4048,6538" shape="poly">
        <area nomor="A17" href="" coords="3821,6395,3678,6460,3749,6655,3905,6583" shape="poly">
        <area nomor="A18" href="" coords="3665,6441,3523,6486,3613,6700,3743,6648" shape="poly">
        <area nomor="A19" href="" coords="4747,5792,4592,5857,4676,6052,4825,5987" shape="poly">
        <area nomor="A20" href="" coords="4599,5851,4443,5922,4540,6097,4683,6052" shape="poly">
        <area nomor="A21" href="" coords="4481,5902,4313,5961,4397,6155,4546,6090" shape="poly">
        <area nomor="A22" href="" coords="4320,5974,4164,6019,4236,6220,4378,6155" shape="poly">
        <area nomor="A23" href="" coords="4752,6609,4584,6674,4688,6875,4837,6829" shape="poly">
        <area nomor="A24" href="" coords="4022,6071,4100,6266,3957,6324,3879,6129" shape="poly">
        <area nomor="A25" href="" coords="3886,6142,3743,6194,3814,6389,3963,6337" shape="poly">
        <area nomor="A26" href="" coords="3743,6181,3607,6233,3678,6467,3821,6389" shape="poly">
        <area nomor="A27" href="" coords="3594,6250,3458,6276,3510,6484,3672,6445" shape="poly">
        <area nomor="A28" href="" coords="4618,5492,4709,5693,4573,5751,4482,5550" shape="poly">
        <area nomor="A29" href="" coords="4482,5550,4326,5615,4417,5810,4560,5745" shape="poly">
        <area nomor="A30" href="" coords="4326,5602,4184,5667,4268,5861,4411,5803" shape="poly">
        <area nomor="A31" href="" coords="4203,5667,4048,5719,4119,5907,4262,5874" shape="poly">
        <area nomor="A32" href="" coords="4054,5719,3899,5784,3976,5972,4125,5913" shape="poly">
        <area nomor="A33" href="" coords="3899,5771,3756,5835,3853,6036,3976,5978" shape="poly">
        <area nomor="A34" href="" coords="3762,5822,3613,5887,3704,6075,3847,6036" shape="poly">
        <area nomor="A35" href="" coords="3626,5887,3477,5952,3548,6147,3698,6095" shape="poly">
        <area nomor="A36" href="" coords="3471,5939,3341,6004,3432,6205,3542,6147" shape="poly">
        <area nomor="A37" href="" coords="3328,5991,3179,6056,3263,6257,3412,6192" shape="poly">
        <area nomor="A38" href="" coords="4540,5278,4625,5485,4482,5544,4404,5356" shape="poly">
        <area nomor="A39" href="" coords="4404,5349,4268,5401,4339,5609,4482,5537" shape="poly">
        <area nomor="A40" href="" coords="4261,5386,4112,5457,4203,5645,4345,5593" shape="poly">
        <area nomor="A41" href="" coords="4113,5464,3976,5516,4054,5710,4190,5645" shape="poly">
        <area nomor="A42" href="" coords="3957,5503,3834,5580,3905,5768,4054,5710" shape="poly">
        <area nomor="A43" href="" coords="3821,5561,3691,5632,3756,5827,3899,5768" shape="poly">
        <area nomor="A44" href="" coords="3685,5613,3555,5678,3626,5879,3756,5827" shape="poly">
        <area nomor="A45" href="" coords="3529,5678,3393,5736,3471,5937,3633,5879" shape="poly">
        <area nomor="A46" href="" coords="3380,5743,3250,5788,3335,6008,3477,5924" shape="poly">
        <area nomor="A47" href="" coords="3263,5801,3121,5840,3198,6060,3348,5976" shape="poly">
        <area nomor="A48" href="" coords="4599,6678,4437,6730,4547,6931,4664,6860" shape="poly">
        <area nomor="A49" href="" coords="4307,6789,4391,6990,4242,7028,4158,6834" shape="poly">
        <area nomor="A50" href="" coords="4417,4988,4508,5176,4372,5235,4288,5040" shape="poly">
        <area nomor="A51" href="" coords="4275,5034,4119,5092,4223,5299,4359,5248" shape="poly">
        <area nomor="A52" href="" coords="4132,5124,3996,5170,4080,5364,4223,5286" shape="poly">
        <area nomor="A53" href="" coords="4002,5163,3860,5221,3937,5422,4074,5357" shape="poly">
        <area nomor="A54" href="" coords="3853,5196,3704,5280,3795,5475,3937,5423" shape="poly">
        <area nomor="A55" href="" coords="3691,5286,3568,5325,3646,5520,3795,5475" shape="poly">
        <area nomor="A56" href="" coords="3555,5325,3419,5390,3497,5578,3646,5520" shape="poly">
        <area nomor="A57" href="" coords="3419,5390,3276,5442,3354,5637,3490,5578" shape="poly">
        <area nomor="A58" href="" coords="3263,5442,3121,5500,3211,5701,3360,5650" shape="poly">
        <area nomor="A59" href="" coords="3140,5494,2991,5559,3082,5747,3198,5708" shape="poly">
        <area nomor="A60" href="" coords="4171,6843,4022,6894,4100,7089,4236,7031" shape="poly">
        <area nomor="A61" href="" coords="3873,6953,4015,6901,4087,7089,3957,7160" shape="poly">
        <area nomor="A62" href="" coords="4339,4796,4203,4835,4275,5036,4417,4977" shape="poly">
        <area nomor="A63" href="" coords="4190,4841,4054,4893,4119,5081,4262,5029" shape="poly">
        <area nomor="A64" href="" coords="4048,4887,3918,4958,3989,5140,4132,5101" shape="poly">
        <area nomor="A65" href="" coords="3918,4945,3762,4997,3853,5198,3989,5146" shape="poly">
        <area nomor="A66" href="" coords="3626,5068,3756,5010,3840,5211,3711,5269" shape="poly">
        <area nomor="A67" href="" coords="3633,5062,3484,5127,3574,5321,3711,5263" shape="poly">
        <area nomor="A68" href="" coords="3477,5133,3341,5178,3425,5386,3555,5321" shape="poly">
        <area nomor="A69" href="" coords="3334,5183,3204,5248,3282,5443,3425,5384" shape="poly">
        <area nomor="A70" href="" coords="3192,5243,3049,5282,3140,5477,3276,5438" shape="poly">
        <area nomor="A71" href="" coords="3043,5282,2907,5347,2991,5548,3134,5490" shape="poly">
        <area nomor="A72" href="" coords="3866,6948,3711,7020,3814,7208,3944,7149" shape="poly">
        <area nomor="A73" href="" coords="2991,5548,2848,5606,2926,5801,3075,5749" shape="poly">
        <area nomor="A74" href="" coords="2900,5347,2770,5392,2848,5600,2984,5548" shape="poly">
        <area nomor="A75" href="" coords="2712,5418,2803,5619,2667,5665,2563,5496" shape="poly">
        <area nomor="A76" href="" coords="2706,5075,2796,5282,2654,5321,2570,5120" shape="poly">
        <area nomor="A77" href="" coords="2420,5178,2563,5114,2654,5321,2511,5386" shape="poly">
        <area nomor="A78" href="" coords="4236,4543,4320,4692,4113,4751,4041,4621" shape="poly">
        <area nomor="A79" href="" coords="4184,4400,4242,4537,4054,4621,3989,4478" shape="poly">
        <area nomor="A80" href="" coords="4132,4258,4190,4387,4002,4472,3925,4329" shape="poly">
        <area nomor="A81" href="" coords="4087,4113,4145,4256,3937,4333,3873,4191" shape="poly">
        <area nomor="A82" href="" coords="4015,3951,4080,4107,3879,4185,3821,4042" shape="poly">
        <area nomor="A83" href="" coords="4028,4612,3853,4696,3899,4846,4100,4768" shape="poly">
        <area nomor="A84" href="" coords="3976,4476,3795,4554,3853,4696,4041,4625" shape="poly">
        <area nomor="A85" href="" coords="3937,4340,3730,4411,3782,4554,3983,4483" shape="poly">
        <area nomor="A86" href="" coords="3873,4191,3678,4269,3730,4418,3937,4333" shape="poly">
        <area nomor="A87" href="" coords="3827,4042,3613,4119,3659,4269,3866,4184" shape="poly">
        <area nomor="A88" href="" coords="3736,4742,3801,4878,3600,4975,3548,4820" shape="poly">
        <area nomor="A89" href="" coords="3678,4599,3749,4735,3542,4813,3503,4677" shape="poly">
        <area nomor="A90" href="" coords="3620,4444,3672,4599,3484,4684,3419,4541" shape="poly">
        <area nomor="A91" href="" coords="3581,4301,3646,4444,3432,4534,3380,4392" shape="poly">
        <area nomor="A92" href="" coords="3510,4171,3574,4301,3367,4405,3309,4230" shape="poly">
        <area nomor="A93" href="" coords="3529,4807,3335,4904,3406,5040,3594,4975" shape="poly">
        <area nomor="A94" href="" coords="3471,4677,3270,4755,3328,4897,3536,4813" shape="poly">
        <area nomor="A95" href="" coords="3412,4534,3237,4619,3270,4748,3471,4677" shape="poly">
        <area nomor="A96" href="" coords="3360,4398,3166,4476,3218,4612,3425,4541" shape="poly">
        <area nomor="A97" href="" coords="3309,4236,3108,4288,3172,4483,3367,4392" shape="poly">
        <area nomor="A98" href="" coords="3243,4930,3029,5021,3101,5163,3308,5079" shape="poly">
        <area nomor="A99" href="" coords="3179,4794,2984,4872,3036,5014,3231,4936" shape="poly">
        <area nomor="A100" href="" coords="3134,4649,2920,4727,2984,4863,3179,4785" shape="poly">
        <area nomor="A101" href="" coords="3075,4500,2861,4604,2913,4720,3134,4655" shape="poly">
        <area nomor="A102" href="" coords="3004,4344,2790,4422,2874,4591,3062,4500" shape="poly">
        <area nomor="A103" href="" coords="3043,5006,2835,5103,2887,5239,3095,5174" shape="poly">
        <area nomor="A104" href="" coords="2978,4856,2770,4967,2822,5090,3030,5018" shape="poly">
        <area nomor="A105" href="" coords="2926,4733,2719,4817,2777,4960,2978,4876" shape="poly">
        <area nomor="A106" href="" coords="2855,4584,2667,4668,2725,4811,2913,4733" shape="poly">
        <area nomor="A107" href="" coords="2796,4409,2595,4487,2660,4668,2874,4591" shape="poly">
        <area nomor="A108" href="" coords="2615,4852,2485,4923,2563,5118,2706,5066" shape="poly">
        <area nomor="A109" href="" coords="2485,4921,2317,4967,2407,5181,2563,5122" shape="poly">

        <!-- Blok B -->
        <area nomor="B1" href="" coords="1591,3011,1668,3225,1526,3289,1448,3088" shape="poly">
        <area nomor="B2" href="" coords="1727,2946,1811,3147,1688,3218,1597,3024" shape="poly">
        <area nomor="B3" href="" coords="1856,2879,1960,3093,1824,3151,1720,2950" shape="poly">
        <area nomor="B4" href="" coords="1993,2827,2090,3021,1967,3099,1869,2892" shape="poly">
        <area nomor="B5" href="" coords="2148,2764,2226,2965,2090,3024,2005,2823" shape="poly">
        <area nomor="B6" href="" coords="2297,2680,2356,2888,2232,2959,2135,2751" shape="poly">
        <area nomor="B7" href="" coords="2414,2622,2498,2823,2375,2900,2284,2693" shape="poly">
        <area nomor="B8" href="" coords="2563,2557,2653,2751,2504,2823,2426,2628" shape="poly">
        <area nomor="B9" href="" coords="2699,2492,2796,2680,2654,2771,2563,2550" shape="poly">
        <area nomor="B10" href="" coords="2835,2427,2926,2628,2790,2680,2680,2498" shape="poly">
        <area nomor="B11" href="" coords="2984,2369,3069,2563,2926,2615,2842,2434" shape="poly">
        <area nomor="B12" href="" coords="3172,2278,3250,2479,3108,2537,3017,2349" shape="poly">
        <area nomor="B13" href="" coords="3302,2215,3393,2396,3263,2474,3159,2280" shape="poly">
        <area nomor="B14" href="" coords="3432,2157,3523,2326,3406,2403,3302,2215" shape="poly">
        <area nomor="B15" href="" coords="3587,2079,3665,2274,3523,2339,3445,2144" shape="poly">
        <area nomor="B16" href="" coords="3717,1988,3795,2209,3678,2254,3587,2073" shape="poly">
        <area nomor="B17" href="" coords="3853,1937,3937,2138,3821,2196,3717,2001" shape="poly">
        <area nomor="B18" href="" coords="3996,1878,4080,2079,3944,2125,3847,1937" shape="poly">
        <area nomor="B19" href="" coords="4145,1807,4236,2014,4093,2066,4002,1878" shape="poly">
        <area nomor="B20" href="" coords="1487,2823,1578,3011,1441,3082,1351,2888" shape="poly">
        <area nomor="B21" href="" coords="1623,2758,1720,2952,1584,3030,1487,2823" shape="poly">
        <area nomor="B22" href="" coords="1766,2693,1869,2888,1720,2952,1629,2777" shape="poly">
        <area nomor="B23" href="" coords="1902,2628,2005,2823,1863,2875,1759,2693" shape="poly">
        <area nomor="B24" href="" coords="2044,2557,2135,2771,1986,2829,1915,2641" shape="poly">
        <area nomor="B25" href="" coords="2193,2498,2291,2687,2142,2764,2057,2550" shape="poly">
        <area nomor="B26" href="" coords="2330,2434,2420,2641,2278,2667,2200,2505" shape="poly">
        <area nomor="B27" href="" coords="2459,2375,2563,2563,2407,2615,2323,2434" shape="poly">
        <area nomor="B28" href="" coords="2595,2304,2693,2492,2557,2563,2459,2369" shape="poly">
        <area nomor="B29" href="" coords="2738,2233,2829,2440,2686,2486,2595,2297" shape="poly">
        <area nomor="B30" href="" coords="2874,2174,2971,2369,2822,2434,2758,2239" shape="poly">
        <area nomor="B31" href="" coords="3069,2084,3172,2272,3023,2343,2939,2148" shape="poly">
        <area nomor="B32" href="" coords="3211,2006,3296,2213,3166,2278,3069,2077" shape="poly">
        <area nomor="B33" href="" coords="3348,1954,3451,2148,3296,2207,3205,2006" shape="poly">
        <area nomor="B34" href="" coords="3484,1883,3587,2084,3445,2142,3341,1941" shape="poly">
        <area nomor="B35" href="" coords="3613,1811,3717,2006,3581,2071,3471,1889" shape="poly">
        <area nomor="B36" href="" coords="3756,1746,3853,1941,3717,1999,3633,1818" shape="poly">
        <area nomor="B37" href="" coords="3899,1688,4002,1883,3860,1954,3743,1766" shape="poly">
        <area nomor="B38" href="" coords="4028,1617,4132,1824,4002,1889,3892,1682" shape="poly">
        <area nomor="B39" href="" coords="1364,2550,1474,2719,1305,2797,1215,2622" shape="poly">
        <area nomor="B40" href="" coords="1525,2466,1610,2661,1467,2725,1370,2537" shape="poly">
        <area nomor="B41" href="" coords="1668,2408,1759,2589,1610,2635,1526,2473" shape="poly">
        <area nomor="B42" href="" coords="1811,2330,1902,2498,1779,2589,1668,2395" shape="poly">
        <area nomor="B43" href="" coords="1980,2252,2070,2453,1902,2511,1824,2343" shape="poly">
        <area nomor="B44" href="" coords="2122,2187,2200,2369,2057,2434,1986,2265" shape="poly">
        <area nomor="B45" href="" coords="2271,2109,2369,2297,2200,2375,2109,2187" shape="poly">
        <area nomor="B46" href="" coords="2420,2038,2505,2226,2356,2310,2278,2129" shape="poly">
        <area nomor="B47" href="" coords="2570,1967,2667,2155,2505,2220,2433,2058" shape="poly">
        <area nomor="B48" href="" coords="2719,1902,2809,2077,2667,2142,2563,1980" shape="poly">
        <area nomor="B49" href="" coords="2920,1818,3017,1993,2855,2058,2783,1889" shape="poly">
        <area nomor="B50" href="" coords="3069,1733,3159,1928,3017,1980,2926,1798" shape="poly">
        <area nomor="B51" href="" coords="3224,1669,3309,1850,3166,1908,3075,1746" shape="poly">
        <area nomor="B52" href="" coords="3373,1591,3471,1779,3315,1844,3218,1675" shape="poly">
        <area nomor="B53" href="" coords="3523,1513,3613,1720,3471,1766,3380,1597" shape="poly">
        <area nomor="B54" href="" coords="3665,1455,3756,1630,3613,1694,3536,1526" shape="poly">
        <area nomor="B55" href="" coords="1137,2431,1292,2367,1383,2529,1215,2620" shape="poly">
        <area nomor="B56" href="" coords="1441,2295,1526,2457,1377,2529,1292,2367" shape="poly">
        <area nomor="B57" href="" coords="1584,2224,1668,2399,1519,2464,1435,2289" shape="poly">
        <area nomor="B58" href="" coords="1733,2159,1824,2315,1668,2386,1584,2224" shape="poly">
        <area nomor="B59" href="" coords="1889,2075,1980,2263,1824,2334,1733,2153" shape="poly">
        <area nomor="B60" href="" coords="2038,2012,2122,2181,1980,2259,1895,2084" shape="poly">
        <area nomor="B61" href="" coords="2187,1941,2271,2109,2122,2194,2031,2006" shape="poly">
        <area nomor="B62" href="" coords="2343,1857,2433,2045,2265,2122,2174,1941" shape="poly">
        <area nomor="B63" href="" coords="2492,1798,2570,1967,2420,2045,2336,1870" shape="poly">
        <area nomor="B64" href="" coords="2641,1714,2725,1895,2570,1967,2485,1798" shape="poly">
        <area nomor="B65" href="" coords="2848,1630,2926,1811,2770,1883,2693,1707" shape="poly">
        <area nomor="B66" href="" coords="2991,1558,3075,1727,2926,1798,2848,1623" shape="poly">
        <area nomor="B67" href="" coords="3140,1493,3218,1669,3075,1733,2991,1558" shape="poly">
        <area nomor="B68" href="" coords="3289,1422,3373,1578,3224,1669,3140,1493" shape="poly">
        <area nomor="B69" href="" coords="3432,1351,3529,1519,3373,1597,3289,1416" shape="poly">
        <area nomor="B70" href="" coords="3587,1286,3672,1455,3529,1526,3438,1344" shape="poly">
        <area nomor="B71" href="" coords="1156,2086,1240,2255,1078,2346,994,2164" shape="poly">
        <area nomor="B72" href="" coords="1312,2025,1396,2187,1240,2265,1150,2090" shape="poly">
        <area nomor="B73" href="" coords="1454,1945,1539,2120,1383,2192,1312,2010" shape="poly">
        <area nomor="B74" href="" coords="1604,1872,1688,2040,1539,2131,1467,1950" shape="poly">
        <area nomor="B75" href="" coords="1759,1800,1850,1975,1694,2059,1616,1878" shape="poly">
        <area nomor="B76" href="" coords="1908,1723,1993,1904,1837,1982,1759,1800" shape="poly">
        <area nomor="B77" href="" coords="2064,1658,2142,1839,1993,1904,1902,1729" shape="poly">
        <area nomor="B78" href="" coords="2206,1586,2291,1761,2148,1833,2057,1658" shape="poly">
        <area nomor="B79" href="" coords="2362,1515,2440,1703,2291,1768,2213,1586" shape="poly">
        <area nomor="B80" href="" coords="2505,1448,2602,1630,2453,1694,2349,1513" shape="poly">
        <area nomor="B81" href="" coords="2706,1344,2796,1539,2641,1604,2550,1422" shape="poly">
        <area nomor="B82" href="" coords="2855,1286,2939,1461,2783,1532,2699,1351" shape="poly">
        <area nomor="B83" href="" coords="3010,1215,3095,1396,2939,1461,2848,1280" shape="poly">
        <area nomor="B84" href="" coords="3159,1139,3244,1314,3095,1392,3017,1210" shape="poly">
        <area nomor="B85" href="" coords="3309,1059,3393,1241,3250,1318,3166,1137" shape="poly">
        <area nomor="B86" href="" coords="1072,1915,1156,2084,1001,2168,903,1993" shape="poly">
        <area nomor="B87" href="" coords="1227,1824,1305,2012,1150,2084,1072,1902" shape="poly">
        <area nomor="B88" href="" coords="1377,1772,1467,1934,1312,2032,1227,1824" shape="poly">
        <area nomor="B89" href="" coords="1526,1694,1604,1870,1461,1941,1364,1759" shape="poly">
        <area nomor="B90" href="" coords="1668,1617,1753,1811,1604,1876,1526,1707" shape="poly">
        <area nomor="B91" href="" coords="1824,1545,1908,1733,1759,1792,1668,1617" shape="poly">
        <area nomor="B92" href="" coords="1967,1487,2057,1656,1902,1733,1824,1539" shape="poly">
        <area nomor="B93" href="" coords="2122,1396,2200,1584,2070,1656,1967,1474" shape="poly">
        <area nomor="B94" href="" coords="2265,1344,2356,1513,2213,1591,2122,1396" shape="poly">
        <area nomor="B95" href="" coords="2420,1271,2511,1433,2356,1517,2265,1349" shape="poly">
        <area nomor="B96" href="" coords="2621,1176,2706,1344,2550,1409,2479,1241" shape="poly">
        <area nomor="B97" href="" coords="2770,1098,2855,1280,2712,1338,2621,1176" shape="poly">
        <area nomor="B98" href="" coords="2913,1027,3004,1208,2855,1267,2770,1098" shape="poly">
        <area nomor="B99" href="" coords="3075,955,3159,1137,3010,1202,2913,1033" shape="poly">
        <area nomor="B100" href="" coords="3218,878,3302,1072,3166,1124,3082,962" shape="poly">
        <area nomor="B101" href="" coords="2109,968,2239,1137,2122,1247,1980,1066" shape="poly">
        <area nomor="B102" href="" coords="2239,865,2369,1072,2239,1143,2116,981" shape="poly">
        <area nomor="B103" href="" coords="2362,800,2485,968,2356,1059,2239,865" shape="poly">
        <area nomor="B104" href="" coords="2472,705,2615,880,2485,977,2362,789" shape="poly">
        <area nomor="B105" href="" coords="2595,610,2732,791,2628,882,2479,700" shape="poly">
        <area nomor="B106" href="" coords="2725,527,2861,709,2732,793,2602,612" shape="poly">
        <area nomor="B107" href="" coords="2842,437,2991,618,2861,696,2732,514" shape="poly">
    </map>

    <br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise/dist/es6-promise.auto.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imagemapster/1.5.4/jquery.imagemapster.min.js"></script>
    <script>
        const a = {{ Js::from($map) }};
        const basic_opts = {
            mapKey: "nomor",
            onClick: function(data) {
                window.location.href =
                    `${window.location.origin}/pelanggan/pemesanan-rumah/create?nomor_rumah=${data.key.substring(1)}`;
            },
            clickNavigate: true,
            showToolTip: true,
            toolTipContainer: "<div class='border rounded p-3 shadow bg-white'></div>",
            areas: []
        };

        a.forEach((element) => {
            basic_opts.areas.push({
                key: element.nomor,
                toolTip: `
                    Nomor Rumah: ${element.nomor}
                    <br>
                    Harga: ${element.harga}
                `
            })
        });



        const initial_opts = $.extend({}, basic_opts, {
            staticState: false,
            fill: false,
            stroke: false,
            strokeWidth: 2,
            strokeColor: "ff0000",
        });

        const img = $("img").mapster(initial_opts);
        a.forEach((element) => {
            if (element.status == 1) {
                img.mapster("set", true, element.nomor, {
                    fill: true,
                    fillColor: "198754",
                });
            }
            if (element.sedang_diskon) {
                img.mapster("set", true, element.nomor, {
                    fill: true,
                    fillColor: "0DCAF0",
                });
            }
            if (element.status == 2) {
                img.mapster("set", true, element.nomor, {
                    fill: true,
                    fillColor: "FFC107",
                });
            }
            if (element.status == 3) {
                img.mapster("set", true, element.nomor, {
                    fill: true,
                    fillColor: "DC3545",
                });
            }
        });

        img.mapster("snapshot").mapster("rebind", basic_opts);
    </script>
@endsection
